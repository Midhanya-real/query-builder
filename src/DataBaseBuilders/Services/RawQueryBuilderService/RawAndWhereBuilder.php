<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\LogicalOperators;
use App\DataBaseBuilders\Model\Query;

class RawAndWhereBuilder implements RawBuilderInterface
{
    private string $rawQuery = '';

    public function __construct(
        private readonly Query $query,
    )
    {
    }

    public function setMethod(): static
    {
        $this->rawQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setTable(): static
    {
        return $this;
    }

    public function setFields(): static
    {
        $and = LogicalOperators::AND->value;

        $this->rawQuery .= implode(" {$and} ", $this->query->getFields()) . " ";

        return $this;
    }

    public function setValues(): static
    {
        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rawQuery;
    }
}