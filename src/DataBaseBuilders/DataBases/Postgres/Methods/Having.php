<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\HavingQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Having extends AbstractMethod
{

    public function getQuery(): Query
    {
        $query = $this->createFiller(HavingQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}