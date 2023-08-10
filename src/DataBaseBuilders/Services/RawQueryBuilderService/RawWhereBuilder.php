<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\LogicalOperators;
use App\DataBaseBuilders\DataBases\Model\Query;

class RawWhereBuilder implements RawBuilderInterface
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
    }

    public function setTable(): static
    {
        return $this;
    }

    public function setFields(): static
    {
        return $this;
    }

    public function setValues(): static
    {
        $and = LogicalOperators::AND->name;

        $this->rawQuery .= implode(" {$and} ", $this->query->getValues()) . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rawQuery;
    }
}