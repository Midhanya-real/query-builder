<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\TableAliases;

class RawUpdateBuilder extends AbstractRawBuilder
{
    private string $rowQuery = '';

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setTable(): static
    {
        $this->rowQuery .= $this->query->getTable() . " ";

        return $this;
    }

    public function setFields(): static
    {
        $this->rowQuery .= TableAliases::SET->value . " " . implode(', ', $this->query->getFields());

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}