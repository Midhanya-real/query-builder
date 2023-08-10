<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\SortOperators;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Select;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;

class GroupByQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::GROUP_BY->value)
            ->setFields($fields);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = SelectBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}