<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\CRUDOperators;
use App\DataBaseBuilders\DataBases\Model\Query;

class DeleteQueryFiller extends AbstractQueryFiller
{
    public function __construct(
        private readonly Query $query,
    )
    {

    }

    protected final function setQuery(?string $table, ?array $fields = null): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::DELETE->name)
            ->setTable($table);
    }

    public function getQuery(?string $table, ?array $fields = null): Query
    {
        return $this->setQuery($table);
    }
}