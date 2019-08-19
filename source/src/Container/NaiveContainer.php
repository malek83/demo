<?php

declare(strict_types=1);

namespace App\Container;

use Psr\Container\ContainerInterface;

/**
 * Class NaiveContainer
 * @package App\Container
 */
final class NaiveContainer implements ContainerInterface
{
    /**
     * @var array
     */
    private $container;

    /**
     * NaiveContainer constructor.
     * @param array $container
     */
    public function __construct(array $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $serviceName
     * @return mixed|void
     */
    public function get($serviceName)
    {
        return $this->has($serviceName) ? $this->instanitate($serviceName) : null;
    }

    /**
     * @param string $serviceName
     * @return bool
     */
    public function has($serviceName): bool
    {
        return isset($this->container[$serviceName]);
    }

    /**
     * @param string $serviceName
     * @return mixed
     */
    private function instanitate(string $serviceName)
    {
        return $this->container[$serviceName]($this);
    }
}
