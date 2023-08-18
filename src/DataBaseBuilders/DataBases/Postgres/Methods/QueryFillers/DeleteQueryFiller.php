<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\QueryModels\Query;

class DeleteQueryFiller extends AbstractQueryFiller
{
    protected final function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::DELETE->value)
            ->setTable($table);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}