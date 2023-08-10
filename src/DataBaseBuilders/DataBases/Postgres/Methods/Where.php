<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\WhereQueryFiller;

class Where extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(WhereQueryFiller::class, $this->createQuery());

        return $query->getQuery(null, $this->fields);
    }
}