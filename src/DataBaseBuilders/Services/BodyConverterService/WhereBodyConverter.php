<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class WhereBodyConverter implements BodyConverterInterface
{
    private static function isFullQuery(array|string $field): bool
    {
        return is_array($field);
    }

    public static function convert(array $fields): array|string
    {
        $converted = [];

        foreach ($fields as $key => $value) {
            if (!self::isFullQuery($value)) {
                $converted['fields'][] = $key . " = " . "?";
                $converted['values'][] = $value;
            } else {
                $converted['fields'][] = $key . " " . $value[0] . " " . "?";
                $converted['values'][] = $value[1];
            }
        }

        return $converted;
    }
}