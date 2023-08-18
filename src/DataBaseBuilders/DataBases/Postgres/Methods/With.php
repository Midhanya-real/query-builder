<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\WithQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class With extends AbstractMethod
{

    public function getQuery(): Query
    {
        $query = $this->createFiller(WithQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}