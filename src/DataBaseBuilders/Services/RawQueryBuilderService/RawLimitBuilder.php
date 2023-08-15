<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Models\Query;

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

        return $this;
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
        $this->rowQuery .= "?" . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}