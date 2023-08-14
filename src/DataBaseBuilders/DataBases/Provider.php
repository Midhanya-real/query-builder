<?php

namespace App\DataBaseBuilders\DataBases;

use App\DataBaseBuilders\DataBases\Postgres\PostgresQueryBuilder;

class Provider
{
    public function pgsql(): PostgresQueryBuilder
    {
        return new PostgresQueryBuilder();
    }

    public function mysql()
    {
        //return MysqlQueryBuilder
    }
}