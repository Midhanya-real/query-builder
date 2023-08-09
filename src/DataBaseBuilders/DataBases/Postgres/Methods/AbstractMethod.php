<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;

abstract class AbstractMethod
{
    protected function createQuery(): Query
    {
        return new Query();
    }

    abstract protected function createFiller(Query $query): AbstractQueryFiller;

    abstract public function getQuery(): Query;
}