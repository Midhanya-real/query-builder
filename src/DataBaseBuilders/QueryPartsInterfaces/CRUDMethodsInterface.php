<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

interface CRUDMethodsInterface
{
    public function select(string $table, array $fields): string;

    public function insert(string $table, array $fields): static;

    public function delete(string $table): static;

    public function update(string $table, array $values): static;

    public function where(array $condition): static;
}