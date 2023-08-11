<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;
use App\DataBaseBuilders\Model\Query;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawBuilderInterface;

class Builder
{
    protected function createMethod(string $method, string|array|null $table, array|null $fields = null): AbstractMethod
    {
        return new $method($table, $fields);
    }

    protected function createRawBuilder(string $builder, Query $query): RawBuilderInterface
    {
        return new $builder($query);
    }
}