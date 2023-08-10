<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\UpdateQueryFiller;

final class Update extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(UpdateQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields);
    }
}