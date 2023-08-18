<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\QueryModels\Query;

class OrderByQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(SortOperators::ORDER_BY->value)
            ->setFields($fields);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}