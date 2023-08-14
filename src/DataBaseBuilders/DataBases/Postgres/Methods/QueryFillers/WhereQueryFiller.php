<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\Models\Query;

class WhereQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(SortOperators::WHERE->value)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}