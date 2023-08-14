<?php

namespace App;

use App\DataBaseBuilders\Fetch\Fetch;
use App\DataBaseBuilders\Handlers\PostgresHandler;
use App\DataBaseBuilders\Models\Pool;

class QueryBuilder extends AbstractQueryBuilder
{
    public function createBuilder(): PostgresHandler
    {
        $provider = $this->createProvider();
        $pool = $this->createPool();

        return $this->createHandler($provider, $pool);
    }

    public function fetch(Pool $pool): Fetch
    {
        $connection = $this->createConnection()->getConnection()->connect();

        return $this->createFetch($connection, $pool);
    }
}