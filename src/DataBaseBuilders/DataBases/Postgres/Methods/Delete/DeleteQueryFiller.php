<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Delete;

use App\DataBaseBuilders\DataBases\Enums\CRUDMethods;
use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\Services\BodyConverterService\SelectBodyConverter;

class DeleteQueryFiller
{
    public function __construct(
        private readonly Query $query,
    )
    {

    }

    private function setQuery(string $table): Query
    {
        return $this->query
            ->setMethod(CRUDMethods::DELETE->name)
            ->setTable($table);
    }

    public function getQuery(string $table): Query
    {
        return $this->setQuery($table);
    }
}