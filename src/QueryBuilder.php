<?php

namespace App;

use App\Connection\Connection;
use App\DataBaseBuilders\Handlers\PostgresHandler;
use App\DataBaseBuilders\Model\Pool;

class QueryBuilder
{
    private function getDataBase(): Connection
    {
        return new Connection();
    }

    private function createPool(): Pool
    {
        return new Pool();
    }

    private function getHandler(): PostgresHandler
    {
        return new PostgresHandler($this->createPool());
    }
}