<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Model\Query;

abstract class AbstractQueryFiller
{
    public function __construct(
        protected readonly Query $query,
    )
    {

    }

    abstract protected function setQuery(null|string $table, null|array $fields): Query;

    abstract public function getQuery(null|string $table, null|array $fields): Query;
}