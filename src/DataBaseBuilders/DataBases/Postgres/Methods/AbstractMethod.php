<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\AbstractQueryFiller;

abstract class AbstractMethod
{
    public function __construct(
        protected readonly null|string $table = null,
        protected readonly null|array  $fields = null,
    )
    {
    }

    protected function createQuery(): Query
    {
        return new Query();
    }

    protected function createFiller(string $filler, Query $query): AbstractQueryFiller
    {
        return new $filler($query);
    }

    abstract public function getQuery(): Query;
}