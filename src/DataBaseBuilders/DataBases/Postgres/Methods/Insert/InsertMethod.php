<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Insert;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;

class InsertMethod extends AbstractMethod
{
    public function __construct(
        private readonly string $table,
        private readonly array  $fields,
    )
    {
    }

    protected final function getFiller(Query $query): InsertQueryFiller
    {
        return new InsertQueryFiller($query);
    }

    public function getFillingQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}