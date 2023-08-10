<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\DataBases\Enums\SortOperators;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\OrderBodyConverter;

class OrderByQueryFiller extends AbstractQueryFiller
{

    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::ORDER_BY->value)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = OrderBodyConverter::convert($fields);

        return $this->setQuery($table, $fields);
    }
}