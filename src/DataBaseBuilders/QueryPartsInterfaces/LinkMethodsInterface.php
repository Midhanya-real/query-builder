<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

use App\DataBaseBuilders\Models\Query;

interface LinkMethodsInterface
{
    public function join(string $table, array $fields, array $values): Query;

    public function outJoin(string $table, array $fields, array $values): Query;
}