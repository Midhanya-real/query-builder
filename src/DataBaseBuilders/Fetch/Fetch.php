<?php

namespace App\DataBaseBuilders\Fetch;

use App\DataBaseBuilders\QueryModels\Pool;
use PDO;

class Fetch
{
    public function __construct(
        private readonly PDO  $connection,
        private readonly Pool $pool,
    )
    {
    }

    public function all(): bool|array
    {
        $query = $this->connection->prepare($this->pool->getQuery(end: true));
        $query->execute($this->pool->getParams());

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function first(): object
    {
        $query = $this->connection->prepare($this->pool->getQuery(end: true));
        $query->execute($this->pool->getParams());

        return $query->fetchObject();
    }

    public function save(): bool
    {
        $query = $this->connection->prepare($this->pool->getQuery(end: true));
        $query->execute($this->pool->getParams());

        return true;
    }


}