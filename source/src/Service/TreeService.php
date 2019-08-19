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
        return $this->nodeRepository->getNode($nodeId);
    }

    /**
     * @param NodeEntity $parent
     * @param NodeEntity $child
     */
    public function addNode(NodeEntity $parent, NodeEntity $child)
    {
        $this->nodeRepository->addNode($child, $parent->getLft(), $parent->getRgt());
    }
}
