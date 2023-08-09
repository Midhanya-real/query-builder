<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class SelectBodyConverter
{
    private static function isAlias(int|string $key): bool
    {
        return is_int($key);
    }

    public static function convert(array $fields): array
    {
        $converted = [];

        foreach ($fields as $key => $value) {
            if (!self::isAlias($key)) {
                $converted[] = $value;
            } else {
                $converted[] = $key . " AS " . $value;
            }
        }

        return $converted;
    }
}