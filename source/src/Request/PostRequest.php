<?php

declare(strict_types=1);

namespace App\Request;

/**
 * Class Request
 * @package App\Request
 */
class PostRequest implements RequestInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * GetRequest constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name, $default = null)
    {
        return $this->data[$name] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function getRequestType(): string
    {
        return static::POST;
    }
}
