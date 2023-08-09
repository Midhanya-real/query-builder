<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawBuilderInterface;

abstract class AbstractPostgresBuilder
{
    protected function createMethod(string $method, string $table, ?array $fields = null): AbstractMethod
    {
        return new $method($table, $fields);
    }

    protected function createRawBuilder(string $builder, Query $query): RawBuilderInterface
    {
        return new $builder($query);
    }
}