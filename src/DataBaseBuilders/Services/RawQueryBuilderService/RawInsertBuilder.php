<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\Model\Query;

class RawInsertBuilder implements RawBuilderInterface
{
    private string $rowQuery = '';

    public function __construct(
        private readonly Query $query,
    )
    {
    }

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " " . TableAliases::INTO->name . " ";

        return $this;
    }

    public function setTable(): static
    {
        $this->rowQuery .= $this->query->getTable() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $this->rowQuery .= "(" . implode(', ', array_keys($this->query->getFields())) . ")" . " ";

        return $this;
    }

    public function setValues(): static
    {
        $this->rowQuery .= TableAliases::VALUES->value
            . "(" . implode(', ', $this->query->getFields()) . ")" . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}