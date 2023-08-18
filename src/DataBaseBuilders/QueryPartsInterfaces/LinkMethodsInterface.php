<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

use App\DataBaseBuilders\QueryModels\Query;

interface LinkMethodsInterface
{
    public function join(string $table, array $fields, array $values): Query;

    public function outJoin(string $table, array $fields, array $values): Query;

    public function with(array $fields, array $values): Query;

    public function union(array $fields, array $values): Query;

    public function intersect(array $fields, array $values): Query;

    public function except(array $fields, array $values): Query;
}