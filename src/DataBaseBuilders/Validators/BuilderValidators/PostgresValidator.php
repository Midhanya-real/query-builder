<?php

namespace App\DataBaseBuilders\Validators\BuilderValidators;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\Services\BodyConverterService\AggregateFuncBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\InsertBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\JoinBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\OrderBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\TableBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\UnionBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\UpdateBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\WhereBodyConverter;
use App\DataBaseBuilders\Services\BodyConverterService\WithBodyConverter;

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
        return empty($body)
            ? [TableAliases::ALL->value]
            : SelectBodyConverter::convert($body);
    }

    public static function getValidHavingBody(array $agrFunc, string $alias, string $value): array
    {
        $queryBody = AggregateFuncBodyConverter::convert($agrFunc) . " " . $alias . " " . "?";

        $body['fields'][] = $queryBody;
        $body['values'][] = $value;

        return $body;
    }

    public static function getValidInsertBody(array $body): array
    {
        return InsertBodyConverter::convert($body);
    }

    public static function getValidUpdateBody(array $body): array
    {
        return UpdateBodyConverter::convert($body);
    }

    public static function getValidWhereBody(array|string $body): array
    {
        $validBody = [];
        if (is_array($body)) {
            $validBody = WhereBodyConverter::convert($body);
        } else {
            $validBody['fields'] = [$body];
            $validBody['values'] = [];
        }

        return $validBody;
    }

    public static function getValidOrderBody(array $body): array
    {
        return OrderBodyConverter::convert($body);
    }

    public static function getValidJoinBody(array $body): array|string
    {
        return JoinBodyConverter::convert($body);
    }

    public static function getValidWithBody(array $body): array
    {
        return WithBodyConverter::convert($body);
    }

    public static function getValidUnionBody(array $body): array
    {
        return UnionBodyConverter::convert($body);
    }
}