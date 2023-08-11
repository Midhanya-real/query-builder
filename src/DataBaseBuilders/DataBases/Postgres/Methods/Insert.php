<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\InsertQueryFiller;
use App\DataBaseBuilders\Model\Query;

final class Insert extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(InsertQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}