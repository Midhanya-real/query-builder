<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

class RawUnionBuilder extends AbstractRawBuilder
{
    private string $rowQuery = '';

    public function setFields(): static
    {
        $method = $this->query->getMethod();

        $this->rowQuery .= "(" . implode(" {$method} ", $this->query->getFields()) . ")" . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}