<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\UpdateQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

final class Update extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(UpdateQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}