<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\NodeEntity;
use App\Request\RequestInterface;
use App\Validator\NodeChildrenValidator;
use App\Validator\NumericValidator;
use App\Validator\StringValidator;

/**
 * Class NodeForm
 * @package App\Form
 */
class NodeForm
{

    /**
     * @var NodeEntity
     */
    protected $node;

    /**
     * NodeForm constructor.
     * @param NodeEntity $node
     */
    public function __construct(NodeEntity $node)
    {
        $this->node = $node;
    }

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

        $validator = new NodeChildrenValidator($this->node);
        if ($validator->validate($request->get('direction')) === false) {
            $errors['parent'] = 'Child already exists';
        }

        return count($errors) > 0 ? $errors : true;
    }
}
