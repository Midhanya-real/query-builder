<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\AbstractQueryFiller;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\GroupByQueryFiller;

class GroupByMethod extends AbstractMethod
{
    protected function createFiller(Query $query): AbstractQueryFiller
    {
        return new GroupByQueryFiller($query);
    }

    public function getQuery(): Query
    {
        $query = $this->createFiller($this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}