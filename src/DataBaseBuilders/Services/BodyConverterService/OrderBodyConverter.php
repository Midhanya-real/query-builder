<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class OrderBodyConverter implements BodyConverterInterface
{
    private static function isAlias(int|string $key): bool
    {
        return is_int($key);
    }

    public static function convert(array $fields): array
    {
        $order = [];
        foreach ($fields as $row => $mode) {
            if (!static::isAlias($row)) {
                $order[] = "{$row} {$mode}";
            } else {
                $order[] = $mode;
            }
        }

        return $order;
    }
}