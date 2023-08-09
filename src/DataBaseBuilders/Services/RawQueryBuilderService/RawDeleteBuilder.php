<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;

class RawDeleteBuilder implements RawBuilderInterface
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
        $this->rowQuery .= TableAliases::FROM->name . $this->query->getTable() . " ";

        return $this;
    }

    public function setFields(): static
    {
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