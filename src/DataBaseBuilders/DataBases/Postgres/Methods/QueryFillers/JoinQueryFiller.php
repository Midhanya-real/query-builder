<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\Model\Query;

class JoinQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(null|string|array $table, null|array $fields, null|array $values): Query
    {
        return $this->query
            ->setMethod(TableAliases::JOIN->value)
            ->setTable($table)
            ->setFields($fields)
            ->setValues($values);
    }

    public function getQuery(null|string|array $table, null|array $fields, null|array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}