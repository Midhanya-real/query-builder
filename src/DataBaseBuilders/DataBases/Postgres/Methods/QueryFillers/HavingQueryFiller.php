<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\QueryModels\Query;

class HavingQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->query
            ->setMethod(SortOperators::HAVING->value)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}