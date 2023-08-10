<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\CRUDOperators;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;

class SelectQueryFiller extends AbstractQueryFiller
{
    protected final function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::SELECT->value)
            ->setTable($table)
            ->setFields($fields);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = SelectBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }

}