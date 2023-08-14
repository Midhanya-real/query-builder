<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;
use App\DataBaseBuilders\Models\Query;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawBuilderInterface;

class Builder
{
    protected function createMethod(string $method, null|string $table, array|null $fields = null, array|null $values = null): AbstractMethod
    {
        return new $method($table, $fields, $values);
    }

    protected function createRawBuilder(string $builder, Query $query): RawBuilderInterface
    {
        return new $builder($query);
    }
}