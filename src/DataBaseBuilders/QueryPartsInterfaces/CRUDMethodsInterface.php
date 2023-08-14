<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

use App\DataBaseBuilders\Model\Query;

interface CRUDMethodsInterface
{
    public function select(string $table, array $fields): Query;

    public function insert(string $table, array $fields, array $values): Query;

    public function delete(string $table): Query;

    public function update(string $table, array $fields, array $values): Query;
}