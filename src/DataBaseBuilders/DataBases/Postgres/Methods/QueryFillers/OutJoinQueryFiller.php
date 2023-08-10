<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;

class OutJoinQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(TableAliases::FULL_OUTER_JOIN->value)
            ->setTable($table)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = UpdateBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}