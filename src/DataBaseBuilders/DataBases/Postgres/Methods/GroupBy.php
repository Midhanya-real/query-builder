<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\GroupByQueryFiller;

class GroupBy extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(GroupByQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}