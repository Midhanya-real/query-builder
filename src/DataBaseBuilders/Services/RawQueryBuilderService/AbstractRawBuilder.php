<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\QueryModels\Query;

abstract class AbstractRawBuilder implements RawBuilderInterface
{
    public function __construct(
        protected readonly Query $query,
    )
    {
    }

    public function setMethod(): static
    {
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
        return $this;
    }
}