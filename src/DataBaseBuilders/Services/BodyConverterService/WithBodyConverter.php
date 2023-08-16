<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

use App\DataBaseBuilders\Enums\TableAliases;

class WithBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): array
    {
        $converted = [];

        foreach ($fields as $alias => $query) {
            $converted[] = $alias . " " . TableAliases::AS->value . " " . "(" . $query->getQuery() . ")";
        }

        return $converted;
    }
}