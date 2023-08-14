<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\Model\Query;

class InsertQueryFiller extends AbstractQueryFiller
{
    protected final function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::INSERT->value)
            ->setTable($table)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}