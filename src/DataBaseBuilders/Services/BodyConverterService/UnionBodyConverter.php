<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class UnionBodyConverter implements BodyConverterInterface
{

    public static function convert(array $fields): array|string
    {
        $converted = [
            'queries' => [],
            'params' => [],
        ];

        foreach ($fields as $field) {
            $converted['queries'][] = "(" . $field->getQuery() . ")";
            $converted['params'] = array_merge($converted['params'], $field->getParams());
        }

        return $converted;
    }
}