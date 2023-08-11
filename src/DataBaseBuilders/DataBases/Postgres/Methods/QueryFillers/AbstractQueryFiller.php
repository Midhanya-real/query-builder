<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Model\Query;

abstract class AbstractQueryFiller
{
    public function __construct(
        protected readonly Query $query,
    )
    {

    }

    protected final static function isAlias(string|array $table): bool
    {
        return is_array($table);
    }

    abstract protected function setQuery(null|string $table, null|array $fields): Query;

    abstract public function getQuery(null|string $table, null|array $fields): Query;
}