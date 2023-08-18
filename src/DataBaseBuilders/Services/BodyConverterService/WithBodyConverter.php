<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

use App\DataBaseBuilders\Enums\TableAliases;

class WithBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): array
    {
        $converted = [
            'queries' => [],
            'params' => [],
        ];

        foreach ($fields as $alias => $query) {
            $converted['queries'][] = $alias . " " . TableAliases::AS->value . " " . "(" . $query->getQuery() . ")";
            $converted['params'] = array_merge($converted['params'], $query->getParams());
        }

        return $converted;
    }
}