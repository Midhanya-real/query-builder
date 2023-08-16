<?php

namespace App;

use App\Connection\Connection;
use App\DataBaseBuilders\DataBases\Provider;
use App\DataBaseBuilders\Fetch\Fetch;
use App\DataBaseBuilders\Handlers\PostgresHandler;
use App\DataBaseBuilders\QueryModels\Pool;
use PDO;

abstract class AbstractQueryBuilder
{
    protected function createConnection(): Connection
    {
        return new Connection();
    }

    protected function createPool(): Pool
    {
        return new Pool();
    }

    protected function createProvider(): Provider
    {
        return new Provider();
    }

    protected function createHandler(Provider $provider, Pool $pool): PostgresHandler
    {
        return match ($_ENV['DB_CONNECTION_DRIVER']) {
            'pgsql' => new PostgresHandler($provider->pgsql(), $pool),

        };
    }

    protected function createFetch(PDO $connection, Pool $pool): Fetch
    {
        return new Fetch($connection, $pool);
    }

    abstract protected function createBuilder(): PostgresHandler;

    abstract protected function fetch(Pool $pool): Fetch;

}