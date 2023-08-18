<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

use App\DataBaseBuilders\QueryModels\Query;

interface SortMethodsInterface
{
    public function andWhere(array $fields, array $values): Query;

    public function orWhere(array $fields, array $values): Query;

    public function limit(string $limit): Query;

    public function offset(string $limit): Query;

    public function groupBy(array $groupColumns): Query;

    public function orderBy(array $orderFields): Query;

    public function having(array $fields, array $values): Query;

    public function like(string $pattern): Query;
}