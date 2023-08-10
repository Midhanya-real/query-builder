<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\SortOperators;
use App\DataBaseBuilders\DataBases\Model\Query;

class LimitQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::LIMIT->value)
            ->setValues($fields);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        return $this->setQuery(null, $fields);
    }
}