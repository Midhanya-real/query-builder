<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\SortOperators;
use App\DataBaseBuilders\DataBases\Model\Query;

class WhereQueryFiller extends AbstractQueryFiller
{
    public function __construct(
        private readonly Query $query
    )
    {
    }

    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::WHERE->name)
            ->setValues($fields);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        return $this->setQuery(null, $fields);
    }
}