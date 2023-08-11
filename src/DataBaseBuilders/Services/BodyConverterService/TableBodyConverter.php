<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;

class TableBodyConverter implements BodyConverterInterface
{
    private static function isAlias(int|string $key): bool
    {
        return is_int($key);
    }

    public static function convert(array $fields): string
    {
        $converted = '';

        foreach ($fields as $key => $value) {
            if (!static::isAlias($key)) {
                $converted = $value;
            } else {
                $converted = $key . " " . TableAliases::AS->value . " " . $value;
            }
        }

        return $converted;

    }
}