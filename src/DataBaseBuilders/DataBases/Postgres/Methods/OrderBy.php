<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\OrderByQueryFiller;
use App\DataBaseBuilders\Model\Query;

class OrderBy extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(OrderByQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}