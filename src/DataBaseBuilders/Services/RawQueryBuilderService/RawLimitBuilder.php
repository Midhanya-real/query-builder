<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

class RawLimitBuilder extends AbstractRawBuilder
{
    private string $rowQuery = '';

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

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