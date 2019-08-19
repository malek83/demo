<?php

declare(strict_types=1);

namespace App;

use App\Container\NaiveContainer;
use App\Controller\ControllerInterface;
use App\Request\GetRequest;
use App\Request\PostRequest;
use App\Request\RequestInterface;
use App\Response\ResponseInterface;

/**
 * Class Application
 * @package App
 */
class Application
{
    /**
     * @type string
     */
    protected const DEFAULT_CONTROLLER = 'index';

    /**
     * @type string
     */
    protected const DEFAULT_ACTION = 'index';

    /**
     * @var RequestInterface
     */
    protected $params;

    /**
     * Application constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        switch ($this->getRequestType()) {
            case RequestInterface::POST:
                $this->params = new PostRequest($params);
                break;
            case RequestInterface::GET:
                $this->params = new GetRequest($params);
                break;
            default:
                throw new \Exception('HTTP Method not implemented');
                break;
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function run(): void
    {
        $controllerName = sprintf(
            '\App\Controller\\%sController',
            ucfirst($this->params->get('controller', static::DEFAULT_CONTROLLER))
        );

        $actionName = $this->params->get('action', static::DEFAULT_ACTION);

        $reflection = new \ReflectionClass($controllerName);

        if (!$reflection->implementsInterface(ControllerInterface::class)) {
            throw new \Exception('Class is not a controller');
        }

        if ($reflection->hasMethod($actionName)) {
            $instance = $reflection->newInstance(
                $this->getContainer()
            );

            /** @var ResponseInterface $response */
            $response = call_user_func([$instance, $actionName], $this->params);

            $this->sendReponse($response);
        } else {
            throw new \Exception('action not found');
        }
    }

    /**
     * @return NaiveContainer
     */
    public function getContainer(): NaiveContainer
    {
        return new NaiveContainer(include __DIR__ . '/../config/container.php');
    }

    /**
     * @return string
     */
    private function getRequestType(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param ResponseInterface $response
     */
    private function sendReponse(ResponseInterface $response): void
    {
        $this->sendHeaders($response->headers());

        echo $response->render();
    }

    /**
     * @param array $headers
     */
    private function sendHeaders(array $headers): void
    {
        foreach ($headers as $header) {
            header($header);
        }
    }
}
