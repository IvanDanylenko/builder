<?php

namespace IvanDanylenko\Builder;

use Aigletter\Contracts\Builder\DbInterface;
use Aigletter\Contracts\Builder\QueryInterface;

class DB implements DbInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     * Used to receive ready to use database connection
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function one(QueryInterface $query): object
    {
        return $this->pdo->query($query)->fetchObject();
    }

    public function all(QueryInterface $query): array
    {
        return $this->pdo->query($query)->fetchAll();
    }
}
