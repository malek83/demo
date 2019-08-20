<?php

declare(strict_types=1);

namespace App\Db;

/**
 * Class Connection
 * @package App\Db
 */
class Connection
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * Connection constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $params
     * @param string $tableName
     * @param string $entityName
     * @param array $orderBy
     * @return array
     */
    public function findAll(array $params, string $tableName, string $entityName, array $orderBy = [])
    {
        $query = 'select * from ' . $tableName;

        list($query, $queryParams) = $this->getWhereStatement($params, $query);

        $query .= $this->getOrderStatement($orderBy);

        $statement = $this->pdo->prepare($query);

        $statement->execute($queryParams);

        return $statement->fetchAll(\PDO::FETCH_CLASS, $entityName);
    }

    /**
     * @param array $params
     * @param string $tableName
     * @param string $entityName
     * @return mixed
     */
    public function findOne(array $params, string $tableName, string $entityName)
    {
        $query = 'select * from ' . $tableName;

        list($query, $queryParams) = $this->getWhereStatement($params, $query);

        $statement = $this->pdo->prepare($query);

        $statement->execute($queryParams);

        return $statement->fetchObject($entityName);
    }

    /**
     * @param array $order
     * @return string
     */
    protected function getOrderStatement(array $order): string
    {
        $result = '';
        if (count($order) > 0) {
            $result = ' ORDER BY';
            foreach ($order as $key => $value) {
                $result .= ' ' . $key . ' ' . (in_array(strtoupper($value), ['DESC', 'ASC']) ? $value : 'ASC');
            }
        }
        return $result;
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function executeQuery(string $query, array $params = []): bool
    {
        $statement = $this->pdo->prepare($query);

        $execute = $statement->execute($params);
        return $execute;
    }

    /**
     * @param array $row
     * @param string $tableName
     * @return bool
     */
    public function persist(array $row, string $tableName): bool
    {
        $query = 'INSERT INTO ' . $tableName . '(';
        $columns = array_keys($row);
        $query .= implode(',', $columns) . ') values(';
        $params = [];
        foreach ($columns as $key) {
            $query .= ':' . $key . ', ';
            $params[':' . $key] = $row[$key];
        }

        $query = substr($query, 0, strlen($query) - 2) . ');';

        return $this->executeQuery($query, $params);
    }

    /**
     * @param array $params
     * @param string $query
     * @return array
     */
    public function getWhereStatement(array $params, string $query): array
    {
        $queryParams = [];
        if (count($params) > 0) {
            $query .= ' WHERE 1=1';
            foreach ($params as $key => $value) {
                if (is_array($value)) {
                    $query .= ' and ' . $value[0] . ' ' . $value[1] . ' :' . $value[0] . $key;
                    $queryParams[':' . $value[0] . $key] = $value[2];

                } else {
                    $query .= ' and ' . $key . ' = :' . $key;
                    $queryParams[':' . $key] = $value;
                }
            }
        }
        return array($query, $queryParams);
    }
}
