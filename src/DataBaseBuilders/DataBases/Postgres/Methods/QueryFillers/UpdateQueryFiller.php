<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\QueryModels\Query;

class UpdateQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::UPDATE->value)
            ->setTable($table)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}