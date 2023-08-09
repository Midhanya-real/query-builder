<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Insert;

use App\DataBaseBuilders\DataBases\Enums\CRUDMethods;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractQueryFiller;
use App\DataBaseBuilders\Services\BodyConverterService\InsertBodyConverter;

class InsertQueryFiller extends AbstractQueryFiller
{
    public function __construct(
        private readonly Query $query,
    )
    {

    }

    protected final function setQuery(string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDMethods::INSERT->name)
            ->setTable($table)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(string $table, ?array $fields): Query
    {
        $fields = InsertBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}