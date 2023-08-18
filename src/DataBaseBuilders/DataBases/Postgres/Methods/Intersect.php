<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\IntersectQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Intersect extends AbstractMethod
{

    public function getQuery(): Query
    {
        $query = $this->createFiller(IntersectQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}