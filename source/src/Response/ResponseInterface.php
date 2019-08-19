<?php

declare(strict_types=1);

namespace App\Response;

/**
 * Interface ResponseInterface
 * @package App\Response
 */
interface ResponseInterface
{
    /**
     * @return string
     */
    public function render(): string;

    /**
     * @return array
     */
    public function headers(): array;
}
