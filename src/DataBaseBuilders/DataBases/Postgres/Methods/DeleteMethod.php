<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\DeleteQueryFiller;

final class DeleteMethod extends AbstractMethod
{
    public function __construct(
        private readonly string $table,
    )
    {
    }

    protected function createFiller(Query $query): DeleteQueryFiller
    {
        return new DeleteQueryFiller($query);
    }

    public function getQuery(): Query
    {
        $query = $this->createFiller($this->createQuery());

        return $query->getQuery($this->table);
    }
}