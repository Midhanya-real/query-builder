<?php

namespace App\DataBaseBuilders\Services\BodyConverterService;

interface BodyConverterInterface
{
    public static function convert(array $fields): array|string;
}