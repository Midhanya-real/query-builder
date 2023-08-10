<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\CRUDMethods;
use App\DataBaseBuilders\DataBases\Model\Query;

class DeleteQueryFiller extends AbstractQueryFiller
{
    public function __construct(
        private readonly Query $query,
    )
    {

    }

    protected final function setQuery(string $table, ?array $fields = null): Query
    {
        return $this->query
            ->setMethod(CRUDMethods::DELETE->name)
            ->setTable($table);
    }

    public function getQuery(string $table, ?array $fields = null): Query
    {
        return $this->setQuery($table);
    }
}