<?php

declare(strict_types=1);

namespace App\Service;

use App\Builder\TreeStructureBuilder;
use App\Entity\NodeEntity;
use App\Repository\NodeRepository;

/**
 * Class TreeService
 * @package App\Service
 */
class TreeService
{
    /**
     * @var NodeRepository
     */
    protected $nodeRepository;

    /**
     * @var TreeStructureBuilder
     */
    protected $treeStructureBuilder;

    /**
     * TreeService constructor.
     * @param NodeRepository $nodeRepository
     * @param TreeStructureBuilder $treeStructureBuilder
     */
    public function __construct(NodeRepository $nodeRepository, TreeStructureBuilder $treeStructureBuilder)
    {
        $this->nodeRepository = $nodeRepository;
        $this->treeStructureBuilder = $treeStructureBuilder;
    }

    /**
     * @return array
     */
    public function getTree(): ?NodeEntity
    {
        $nodes = $this->nodeRepository->getSortedFromLeft();
        $root = $this->treeStructureBuilder->build($nodes);

        return $root;
    }

    /**
     * @param int $nodeId
     * @return NodeEntity|null
     */
    public function getNode(int $nodeId): ?NodeEntity
    {
        $parent = $this->nodeRepository->getNode($nodeId);
        $nodes = $this->nodeRepository->getChildren($parent);

        return $this->treeStructureBuilder->build($nodes);
    }

    /**
     * @param NodeEntity $parent
     * @param NodeEntity $child
     */
    public function addNode(NodeEntity $parent, NodeEntity $child)
    {
        $leftChild = $parent->getLeftChild();
        $rightChild = $parent->getRightChild();
        if($leftChild) {
            $child->setLft($leftChild->getRgt() + 1);
            $child->setRgt($leftChild->getRgt() + 2);

            $lft = $child->getLft();
            $rgt = $child->getLft();

        } elseif($rightChild) {
            $child->setLft($parent->getLft() + 1);
            $child->setRgt($parent->getLft() + 2);

            $lft = $child->getLft();
            $rgt = $child->getRgt();
        } else {

            $child->setLft($parent->getLft() + 1);
            $child->setRgt($parent->getLft() + 2);
            $lft = $child->getLft();
            $rgt = $parent->getRgt();

        }

        $this->nodeRepository->addNode($child, $lft, $rgt);
    }
}
