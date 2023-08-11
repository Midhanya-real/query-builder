<?php

namespace App;

use App\Connection\Connection;

class QueryBuilder
{
    public function getDataBase(): Connection
    {
        return Connection::getInstance();
    }
}