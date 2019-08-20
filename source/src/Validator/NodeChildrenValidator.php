<?php

declare(strict_types=1);

namespace App\Validator;

use App\Entity\NodeEntity;

/**
 * Class NodeChildrenValidator
 * @package App\Validator
 */
class NodeChildrenValidator implements ValidatorInterface
{
    /**
     * @var NodeEntity
     */
    private $node;

    /**
     * NodeChildrenValidator constructor.
     * @param NodeEntity $node
     */
    public function __construct(NodeEntity $node)
    {
        $this->node = $node;
    }

    /**
     * @param $param
     * @return bool
     */
    public function validate($param): bool
    {
        switch (strtoupper($param)) {
            case 'L':
                return $this->node->getLeftChild() === null;
                break;
            case 'R':
                return $this->node->getRightChild() === null;
                break;
            default:
                return false;
                break;
        }
    }
}
