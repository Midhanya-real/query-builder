<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class UpdateBodyConverter
{
    public static function convert(array $fields): array
    {
        $converted = [];

        foreach ($fields as $key => $value) {
            $converted['fields'][] = $key . " = " . "?";
            $converted['values'][] = $value;
        }

        return $converted;
    }
}