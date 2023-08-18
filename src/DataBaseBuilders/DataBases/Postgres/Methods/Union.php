<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\UnionQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Union extends AbstractMethod
{

    public function getQuery(): Query
    {
        $query = $this->createFiller(UnionQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}