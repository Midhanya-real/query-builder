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

    protected final function getFiller(Query $query): SelectQueryFiller
    {
        return new SelectQueryFiller($query);
    }

    public function getFillingQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}