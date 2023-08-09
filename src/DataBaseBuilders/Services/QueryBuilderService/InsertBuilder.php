<?php

namespace App\DataBaseBuilders\Services\QueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;

class InsertBuilder
{
    private string $rowQuery = '';

    public function __construct(
        private readonly Query $query,
    )
    {
    }

    public function getMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " " . TableAliases::INTO->name . " ";

        return $this;
    }

    public function getTable(): static
    {
        $this->rowQuery .= $this->query->getTable() . " ";

        return $this;
    }

    public function getFields(): static
    {
        $this->rowQuery .= "(" . implode(', ', array_keys($this->query->getFields()['fields'])) . ")" . " ";

        return $this;
    }

    public function getValues(): static
    {
        $this->rowQuery .= TableAliases::VALUES->name
            . "(" . implode(', ', $this->query->getFields()['fields']) . ")" . " ";

        return $this;
    }

    public function getQuery(): string
    {
        return $this->rowQuery;
    }
}