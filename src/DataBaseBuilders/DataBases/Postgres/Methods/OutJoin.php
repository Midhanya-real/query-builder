<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\OutJoinQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class OutJoin extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(OutJoinQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}