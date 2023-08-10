<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\AbstractQueryFiller;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\OffsetQueryFiller;

class OffsetMethod extends AbstractMethod
{
    protected function createFiller(Query $query): AbstractQueryFiller
    {
        return new OffsetQueryFiller($query);
    }

    public function getQuery(): Query
    {
        $query = $this->createFiller($this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}