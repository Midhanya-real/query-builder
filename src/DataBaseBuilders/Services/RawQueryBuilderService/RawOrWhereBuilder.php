<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\LogicalOperators;

class RawOrWhereBuilder extends AbstractRawBuilder
{
    private string $rawQuery = '';

    public function setMethod(): static
    {
        $this->rawQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $and = LogicalOperators::OR->value;

        $this->rawQuery .= implode(" {$and} ", $this->query->getFields()) . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rawQuery;
    }
}