<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\WhereQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

class Where extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(WhereQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}