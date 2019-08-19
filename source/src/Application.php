<?php

declare(strict_types=1);

namespace App;

use App\Request\GetRequest;
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
        $this->params = new GetRequest($params);
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
        if ($reflection->hasMethod($actionName)) {
            /** @var ResponseInterface $response */
            $response = call_user_func([$controllerName, $actionName], $this->params);

            echo $response->render();
        } else {
            throw new \Exception('method not found');
        }
    }
}
