<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

interface RawBuilderInterface
{
    public function setMethod(): static;

    public function setTable(): static;

    public function setFields(): static;

    public function setValues(): static;

    public function getRawQuery(): string;
}