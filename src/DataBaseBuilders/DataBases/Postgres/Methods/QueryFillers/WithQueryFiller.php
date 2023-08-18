<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\LinkOperators;
use App\DataBaseBuilders\QueryModels\Query;

class WithQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->query
            ->setMethod(LinkOperators::WITH->value)
            ->setFields($fields)
            ->setValues($values);

    }

    public function getQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}