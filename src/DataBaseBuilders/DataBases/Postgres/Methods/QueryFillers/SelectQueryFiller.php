<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\TableBodyConverter;

class SelectQueryFiller extends AbstractQueryFiller
{
    protected final function setQuery(null|string|array $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::SELECT->value)
            ->setTable($table)
            ->setFields($fields);
    }

    public function getQuery(null|string|array $table, null|array $fields): Query
    {
        if (static::isAlias($table)) {
            $table = TableBodyConverter::convert($table);
        }

        $fields = SelectBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }

}