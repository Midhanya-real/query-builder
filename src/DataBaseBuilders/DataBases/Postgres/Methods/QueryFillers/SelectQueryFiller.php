<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\CRUDOperators;
use App\DataBaseBuilders\QueryModels\Query;

final class SelectQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(CRUDOperators::SELECT->value)
            ->setTable($table)
            ->setFields($fields);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }

}