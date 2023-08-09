<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Select;

use App\DataBaseBuilders\DataBases\Model\Query;

class SelectMethod
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

    private function getFiller(Query $query): QueryFiller
    {
        return new QueryFiller($query);
    }

    public function getSelectQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}