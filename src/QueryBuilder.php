<?php

namespace App;

use App\Connection\Connection;
use App\DataBaseBuilders\Fetch\Fetch;
use App\DataBaseBuilders\Handlers\PostgresHandler;
use App\DataBaseBuilders\Models\Pool;

class QueryBuilder
{
    private function createConnection(): Connection
    {
        return new Connection();
    }

    private function createPool(): Pool
    {
        return new Pool();
    }

    private function createHandler(): PostgresHandler
    {
        return new PostgresHandler($this->createPool());
    }
}