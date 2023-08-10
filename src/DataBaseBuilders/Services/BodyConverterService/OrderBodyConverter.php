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
                $order['values'][] = "{$mode}";
            } else {
                $order['fields'][] = "{$row} {$mode}";
            }
        }

        return $order;
    }
}