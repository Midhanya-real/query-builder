<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\QueryModels\Query;

class RawSelectBuilder implements RawBuilderInterface
{
    private string $rowQuery = '';

    public function __construct(
        private readonly Query $query,
    )
    {
    }

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $this->rowQuery .= implode(', ', $this->query->getFields()) . " ";

        return $this;
    }

    public function setTable(): static
    {
        $this->rowQuery .= TableAliases::FROM->value . " " . $this->query->getTable() . " ";

        return $this;
    }

    public function setValues(): static
    {
        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}