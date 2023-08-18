<?php

namespace App\DataBaseBuilders\Services\RawQueryBuilderService;

use App\DataBaseBuilders\Enums\TableAliases;
use App\DataBaseBuilders\QueryModels\Query;

class RawDeleteBuilder extends AbstractRawBuilder
{
    private string $rowQuery = '';

    public function setMethod(): static
    {
        $this->rowQuery .= $this->query->getMethod() . " ";

        return $this;
    }

    public function setTable(): static
    {
        $this->rowQuery .= TableAliases::FROM->value . " " . $this->query->getTable() . " ";

        return $this;
    }

    public function getRawQuery(): string
    {
        return $this->rowQuery;
    }
}