<?php

declare(strict_types=1);

namespace App\Validator;

/**
 * Interface ValidatorInterface
 * @package App\Validator
 */
interface ValidatorInterface
{
    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool;
}
