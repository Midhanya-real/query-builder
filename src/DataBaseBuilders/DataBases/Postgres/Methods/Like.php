<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\LikeQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Like extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(LikeQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}