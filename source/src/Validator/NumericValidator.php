<?php

declare(strict_types=1);

namespace App\Validator;

/**
 * Class NumericValidator
 * @package App\Validator
 */
class NumericValidator implements ValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate($param): bool
    {
        return is_numeric($param);
    }
}
