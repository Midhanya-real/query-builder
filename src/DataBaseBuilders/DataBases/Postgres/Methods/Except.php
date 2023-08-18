<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\AbstractMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\ExceptQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Except extends AbstractMethod
{

    public function getQuery(): Query
    {
        $query = $this->createFiller(ExceptQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}