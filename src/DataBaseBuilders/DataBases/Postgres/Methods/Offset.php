<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\OffsetQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Offset extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(OffsetQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}