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

    protected final static function isAlias(string|array $table): bool
    {
        return is_array($table);
    }

    protected final static function setAlias(array $table): string
    {
        return $table[0];
    }

    abstract protected function setQuery(null|string $table, null|array $fields): Query;

    abstract public function getQuery(null|string $table, null|array $fields): Query;
}