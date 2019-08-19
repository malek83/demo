<?php

declare(strict_types=1);

namespace App\Builder;

use App\Entity\NodeEntity;

/**
 * Class TreeStructureBuilder
 * @package App\Builder
 */
class TreeStructureBuilder
{
    /**
     * @param array $nodes
     * @return NodeEntity|null
     */
    public function build(array $nodes): ?NodeEntity
    {
        if (is_array($nodes) && count($nodes) > 1) {
            $root = \array_shift($nodes);

            $this->recursiveBuild($root, $nodes);
        }

        return $root;
    }

    /**
     * @param NodeEntity $root
     * @param array $nodes
     */
    protected function recursiveBuild(NodeEntity $root, array &$nodes): void
    {
        while (count($nodes) > 0) {
            $node = $nodes[0];

            if ($node->getRgt() < $root->getRgt()) {
                $node = \array_shift($nodes);
                switch ($node->getDirection()) {
                    case 'L':
                        $root->setLeftChild($node);
                        $this->recursiveBuild($node, $nodes);
                        break;
                    case 'R':
                        $root->setRightChild($node);
                        $this->recursiveBuild($node, $nodes);
                        break;
                }
            }

            if ($node->getRgt() > $root->getRgt()) {
                return;
            }
        }
    }
}
