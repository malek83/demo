<?php

declare(strict_types=1);

namespace App\Repository;

use App\Db\Connection;
use App\Entity\NodeEntity;

/**
 * Class NodeRepository
 * @package App\Repository
 */
class NodeRepository extends AbstractRepository
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * NodeRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return NodeEntity[]|null
     */
    public function getSortedFromLeft(): ?array
    {
        return $this->findAll([], ['lft' => 'asc']);
    }

    public function getChildren(NodeEntity $parent): ?array
    {
        $params = [
            ['lft', '>=', $parent->getLft()],
            ['lft', '<=', $parent->getRgt()]
        ];
        return $this->findAll($params, ['lft' => 'asc']);
    }

    /**
     * @param int $nodeId
     * @return NodeEntity|null
     */
    public function getNode(int $nodeId): ?NodeEntity
    {
        return $this->findOne(['id' => $nodeId]);
    }

    public function addNode(NodeEntity $node, int $lft, int $rgt): void
    {
        $this->moveLeft($lft, 2);
        $this->moveRight($rgt, 2);

        $this->persist($node->toArray());
    }

    /**
     * @param int $from
     * @param int $pos
     */
    private function moveLeft(int $from, int $pos): void
    {
        $query = 'UPDATE `'.self::getTable().'` SET `lft` = `lft` + :pos WHERE `lft` >= :lft';
        $params = [
            ':pos' => $pos,
            ':lft' => $from
        ];

        $this->connection->executeQuery($query, $params);
    }

    /**
     * @param int $from
     * @param int $pos
     */
    private function moveRight(int $from, int $pos): void
    {
        $query = 'UPDATE `'.self::getTable().'` SET `rgt` = `rgt` + :pos WHERE `rgt` >= :rgt';
        $params = [
            ':pos' => $pos,
            ':rgt' => $from
        ];

        $this->connection->executeQuery($query, $params);
    }

    /**
     * @return string
     */
    protected static function getTable(): string
    {
        return 'node';
    }

    /**
     * @return string
     */
    protected static function getEntity(): string
    {
        return NodeEntity::class;
    }
}
