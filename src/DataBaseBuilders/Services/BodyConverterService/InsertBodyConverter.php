<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class InsertBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): array
    {
        $converted = [];

        foreach ($fields as $key => $value) {
            $converted['fields'][$key] = '?';
            $converted['values'][] = $value;
        }

        return $converted;
    }
}