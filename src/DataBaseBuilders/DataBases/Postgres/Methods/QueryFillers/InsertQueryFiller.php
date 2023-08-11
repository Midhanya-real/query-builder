<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\CRUDOperators;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\InsertBodyConverter;

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
            $table = static::setAlias($table);
        }

        $fields = InsertBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}