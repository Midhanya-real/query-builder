<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\QueryModels\Query;

class WithQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->query
            ->setMethod(TableAliases::WITH->value)
            ->setFields($fields);

    }

    public function getQuery(?string $table, ?array $fields, ?array $values): Query
    {
        return $this->setQuery($table, $fields, $values);
    }
}