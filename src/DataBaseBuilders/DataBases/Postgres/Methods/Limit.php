<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\LimitQueryFiller;
use App\DataBaseBuilders\Model\Query;

class Limit extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(LimitQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}