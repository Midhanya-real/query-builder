<?php

namespace App\DataBaseBuilders\DataBases\Postgres\Methods;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\AbstractQueryFiller;
use App\DataBaseBuilders\DataBases\Postgres\Methods\QueryFillers\WhereQueryFiller;

class WhereMethod extends AbstractMethod
{
    public function __construct(
        private readonly array $fields,
    )
    {
    }

    protected function createFiller(Query $query): AbstractQueryFiller
    {
        return new WhereQueryFiller($query);
    }

    public function getQuery(): Query
    {
        $query = $this->createFiller($this->createQuery());

        return $query->getQuery(null, $this->fields);
    }
}