<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods\Delete;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;

class DeleteMethod extends AbstractMethod
{
    public function __construct(
        private readonly string $table,
    )
    {
    }

    protected final function getFiller(Query $query): DeleteQueryFiller
    {
        return new DeleteQueryFiller($query);
    }

    public function getFillingQuery(): Query
    {
        $query = $this->getFiller($this->getQuery());

        return $query->getQuery($this->table);
    }
}