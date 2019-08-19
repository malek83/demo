<?php

declare(strict_types=1);

namespace App\Repository;

/**
 * Class AbstractRepository
 * @package App\Repository
 */
abstract class AbstractRepository
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @param array $orderBy
     * @return mixed
     */
    public function findAll($orderBy = [])
    {
        return $this->connection->findAll(static::getTable(), static::getEntity(), $orderBy);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function findOne(array $params = [])
    {
        $result = $this->connection->findOne($params, static::getTable(), static::getEntity());
        return $result === false ? null : $result;
    }

    /**
     * @param array $row
     */
    public function persist(array $row): void
    {
        $this->connection->persist($row, static::getTable());
    }

    /**
     * @return string
     */
    abstract protected static function getTable(): string;


    /**
     * @return string
     */
    abstract protected static function getEntity(): string;
}
