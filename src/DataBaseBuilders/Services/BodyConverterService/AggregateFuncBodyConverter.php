<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

class AggregateFuncBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): string
    {
        $converted = "";

        foreach ($fields as $key => $value) {
            $converted = $key . "(" . implode(", ", $value) . ")";
        }

        return $converted;
    }
}