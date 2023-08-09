<?php

namespace App\DataBaseBuilders\Services\QueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;

class SelectBuilder
{
    private string $rowQuery = '';

    public function __construct(
        private readonly Query $query,
    )
    {
    }

    public function getMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function getFields(): static
    {
        $this->rowQuery .= implode(', ', $this->query->getFields()) . " ";

        return $this;
    }

    public function getTable(): static
    {
        $this->rowQuery .= TableAliases::FROM->name . " " . $this->query->getTable() . " ";

        return $this;
    }

    public function getQuery(): string
    {
        return $this->rowQuery;
    }
}