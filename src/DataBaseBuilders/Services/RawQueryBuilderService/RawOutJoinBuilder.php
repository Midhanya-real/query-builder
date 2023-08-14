<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\Models\Query;

class RawOutJoinBuilder implements RawBuilderInterface
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

    public function setTable(): static
    {
        $this->rowQuery .= $this->query->getTable() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $this->rowQuery .= TableAliases::ON->value . " " . implode(', ', $this->query->getFields());

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