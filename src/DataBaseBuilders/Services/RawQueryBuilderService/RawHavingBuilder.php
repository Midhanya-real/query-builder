<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

class RawHavingBuilder extends AbstractRawBuilder
{
    private string $rowQuery = '';

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $this->rowQuery .= implode(', ', $this->query->getFields()) . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}