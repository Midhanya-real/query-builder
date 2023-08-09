<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Insert;

use App\DataBaseBuilders\DataBases\Model\Query;

class InsertMethod
{
    public function __construct(
        private readonly string $table,
        private readonly array  $fields,
    )
    {
    }

    private function getQuery(): Query
    {
        return new Query();
    }

    private function getFiller(Query $query): InsertQueryFiller
    {
        return new InsertQueryFiller($query);
    }

    public function getInsertQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}