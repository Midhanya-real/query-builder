<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

use App\DataBaseBuilders\Enums\TableAliases;

class TableBodyConverter implements BodyConverterInterface
{
    public static function convert(array $fields): string
    {
        $converted = '';

        foreach ($fields as $key => $value) {
            $converted = $key . " " . TableAliases::AS->value . " " . $value;
        }

        return $converted;
    }
}