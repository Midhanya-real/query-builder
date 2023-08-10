<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\DataBases\Enums\TableAliases;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawBuilderInterface;

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
    }

    public function setTable(): static
    {
        $this->rowQuery .= $this->query->getTable() . " ";
    }

    public function setFields(): static
    {
        $this->rowQuery .= TableAliases::ON->value . implode(', ', $this->query->getFields());
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