<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\SelectQueryFiller;

final class Select extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(SelectQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}