<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\OrderBodyConverter;

class OrderByQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::ORDER_BY->value)
            ->setFields($fields['fields']);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = OrderBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}