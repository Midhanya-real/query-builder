<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Select;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;

class SelectMethod extends AbstractMethod
{
    public function __construct(
        private readonly string $table,
        private readonly array  $fields,
    )
    {
    }

    protected final function createFiller(Query $query): SelectQueryFiller
    {
        return new SelectQueryFiller($query);
    }

    public function getQuery(): Query
    {
        $query = $this->createFiller($this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}