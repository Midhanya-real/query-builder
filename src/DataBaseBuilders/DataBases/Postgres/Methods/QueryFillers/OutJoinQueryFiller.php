<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\LinkOperators;
use App\DataBaseBuilders\QueryModels\Query;

class OutJoinQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(LinkOperators::FULL_OUTER_JOIN->value)
            ->setTable($table)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(null|string $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}