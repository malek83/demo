<?php

declare(strict_types=1);

namespace App\Request;

/**
 * Interface RequestInterface
 * @package App\Request
 */
interface RequestInterface
{
    /**
     * @type string
     */
    public const GET = 'GET';

    /**
     * @type string
     */
    public const POST = 'POST';

    /**
     * @param string $name
     * @param string $default
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * @return string
     */
    public function getRequestType(): string;
}
