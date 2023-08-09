<?php

namespace App\DataBaseBuilders\DataBases\QueryPartsInterfaces;

interface SortMethodsInterface
{
    public function limit(int $limit): static;

    public function offset(int $limit): static;

    public function groupBy(array $groupColumns): static;

    public function orderBy(array $orderValues): static;

    public function having(string $agrFunc, string $sign, string $value): static;
}