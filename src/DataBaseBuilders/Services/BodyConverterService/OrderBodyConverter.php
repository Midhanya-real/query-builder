<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class OrderBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): array
    {
        $order = [];
        foreach ($fields as $row => $mode) {
            if (!is_int($row)) {
                $order['fields'][] = "{$row} {$mode}";
            } else {
                $order['values'][] = "{$mode}";
            }
        }

        return $order;
    }
}