<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers;

use App\DataBaseBuilders\Enums\SortOperators;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;

class WhereQueryFiller extends AbstractQueryFiller
{
    protected function setQuery(?string $table, ?array $fields): Query
    {
        return $this->query
            ->setMethod(SortOperators::WHERE->value)
            ->setFields($fields['fields'])
            ->setValues($fields['values']);
    }

    public function getQuery(?string $table, ?array $fields): Query
    {
        $fields = UpdateBodyConverter::convert($fields);

        return $this->setQuery(null, $fields);
    }
}