<?php

declare(strict_types=1);

namespace App\Form;

use App\Request\RequestInterface;
use App\Validator\NumericValidator;
use App\Validator\StringValidator;

/**
 * Class NodeForm
 * @package App\Form
 */
class NodeForm
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param RequestInterface $request
     * @return mixed
     */
    public function validate(RequestInterface $request)
    {
        $errors = [];
        $username = $request->get('username');
        $creditsLeft = $request->get('credits_left');
        $creditsRight = $request->get('credits_right');

        $validator = new StringValidator();
        if ($validator->validate($username) === false) {
            $errors['username'] = 'Value is invalid';
        }

        $validator = new NumericValidator();
        if ($validator->validate($creditsLeft) === false) {
            $errors['credits_left'] = 'Value is invalid';
        }

        if ($validator->validate($creditsRight) === false) {
            $errors['credits_right'] = 'Value is invalid';
        }

        return count($errors) > 0 ? $errors : true;
    }
}
