<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Select;

use App\DataBaseBuilders\DataBases\Enums\CRUDMethods;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;

class SelectQueryFiller
{
    public function __construct(
        private readonly Query $query,
    )
    {

    }

    private function setQuery(string $table, array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDMethods::SELECT->name)
            ->setTable($table)
            ->setFields($fields);
    }

    public function getQuery(string $table, array $fields): Query
    {
        $fields = SelectBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }

}