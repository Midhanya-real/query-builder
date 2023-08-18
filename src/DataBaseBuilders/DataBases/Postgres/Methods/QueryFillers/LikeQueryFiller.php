<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\QueryModels\Query;

class LikeQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->query
            ->setMethod(SortOperators::LIKE->value)
            ->setValues($fields);
    }

    public function getQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}