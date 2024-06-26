<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\DeleteQueryFiller;
use App\DataBaseBuilders\QueryModels\Query;

final class Delete extends AbstractMethod
{
    public function getQuery(): Query
    {
        $query = $this->createFiller(DeleteQueryFiller::class, $this->createQuery());

        return $query->getQuery($this->table, $this->fields, $this->values);
    }
}