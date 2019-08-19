<?php

declare(strict_types=1);

namespace App\Validator;

/**
 * Class StringValidator
 * @package App\Validator
 */
class StringValidator implements ValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate($param): bool
    {
        return is_string($param) && strlen($param) < 255 && strlen($param) > 1;
    }
}
