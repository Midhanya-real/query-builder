<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class JoinBodyConverter implements BodyConverterInterface
{

    public static function convert(array $fields): array|string
    {
        $converted = [];

        foreach ($fields as $key => $value) {
            $converted['fields'][] = $key . " = " . $value;
        }

        return $converted;
    }
}