<?php

namespace App;

use App\DbConnection\DbConnection;

class QueryBuilder
{
    public function getDataBase(): DbConnection
    {
        return DbConnection::getInstance();
    }
}