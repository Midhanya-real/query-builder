<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Delete;

use App\DataBaseBuilders\DataBases\Model\Query;

class DeleteMethod
{
    public function __construct(
        private readonly string $table,
    )
    {
    }

    private function getQuery(): Query
    {
        return new Query();
    }

    private function getFiller(Query $query): DeleteQueryFiller
    {
        return new DeleteQueryFiller($query);
    }

    public function getDeleteQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table);
    }
}