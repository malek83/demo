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
     * @param string $name
     * @param string $default
     * @return mixed
     */
    public function get(string $name, $default = null);
}
