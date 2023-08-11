<?php

namespace App\DataBaseBuilders\QueryPartsInterfaces;

interface LinksMethodsInterface
{
    public function join(string $table, array $keys): static;

    public function outJoin(string $table, array $keys): static;
}