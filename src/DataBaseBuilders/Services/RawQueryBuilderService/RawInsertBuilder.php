<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;

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
        $this->rowQuery .= "(" . implode(', ', array_keys($this->query->getFields()['fields'])) . ")" . " ";

        return $this;
    }

    public function setValues(): static
    {
        $this->rowQuery .= TableAliases::VALUES->name
            . "(" . implode(', ', $this->query->getFields()['fields']) . ")" . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}