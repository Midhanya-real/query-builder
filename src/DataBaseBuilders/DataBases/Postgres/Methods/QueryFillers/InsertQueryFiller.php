<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\InsertBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\TableBodyConverter;

class InsertQueryFiller extends AbstractQueryFiller
{
    protected final function setQuery(null|string|array $table, null|array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::INSERT->value)
            ->setTable($table)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(null|string|array $table, null|array $fields): Query
    {
        if (static::isAlias($table)) {
            $table = TableBodyConverter::convert($table);
        }

        $fields = InsertBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}