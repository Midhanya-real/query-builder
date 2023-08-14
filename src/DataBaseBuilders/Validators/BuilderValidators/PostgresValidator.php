<?php

namespace App\DataBaseBuilders\Validators\BuilderValidators;

use App\DataBaseBuilders\Services\BodyConverterService\InsertBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\OrderBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\TableBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;

class PostgresValidator
{
    public static function getValidTable(string|array $table): string
    {
        return is_array($table)
            ? TableBodyConverter::convert($table)
            : $table;
    }

    public static function getValidSelectBody(array|null $body): array
    {
        return SelectBodyConverter::convert($body);
    }

    public static function getValidInsertBody(array $body): array
    {
        return InsertBodyConverter::convert($body);
    }

    public static function getValidUpdateBody(array $body): array
    {
        return UpdateBodyConverter::convert($body);
    }

    public static function getValidOrderBody(array $body): array
    {
        return OrderBodyConverter::convert($body);
    }
}