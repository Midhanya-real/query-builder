<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\DataBases\Model\Query;

class RawLimitBuilder implements RawBuilderInterface
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
        return $this;
    }

    public function setFields(): static
    {
        return $this;
    }

    public function setValues(): static
    {
        $this->rowQuery .= implode(', ', $this->query->getValues()) . " ";
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}