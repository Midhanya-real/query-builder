<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;

abstract class AbstractMethod
{
    protected function getQuery(): Query
    {
        return new Query();
    }

    abstract protected function getFiller(Query $query): AbstractQueryFiller;

    abstract public function getFillingQuery(): Query;
}