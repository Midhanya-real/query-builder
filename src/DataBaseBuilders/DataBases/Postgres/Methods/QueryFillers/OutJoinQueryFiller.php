<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\TableBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;

class OutJoinQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(null|string|array $table, null|array $fields): Query
    {
        return $this->query
            ->setMethod(TableAliases::FULL_OUTER_JOIN->value)
            ->setTable($table)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(null|string|array $table, null|array $fields): Query
    {
        if (static::isAlias($table)) {
            $table = TableBodyConverter::convert($table);
        }

        $fields = UpdateBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}