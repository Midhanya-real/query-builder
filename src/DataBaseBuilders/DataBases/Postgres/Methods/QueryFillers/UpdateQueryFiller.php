<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\CRUDMethods;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;

class UpdateQueryFiller extends AbstractQueryFiller
{
    public function __construct(
        private readonly Query $query
    )
    {
    }

    protected function setQuery(string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDMethods::UPDATE->name)
            ->setTable($table)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(string $table, ?array $fields): Query
    {
        $fields = UpdateBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}