<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\Select\SelectMethod;
use App\DataBaseBuilders\Services\QueryBuilderService\SelectBuilder;

class PostgresQueryBuilder
{
    public function select(string $table, array $fields): static
    {
        $select = new SelectMethod($table, $fields);
        $query = $select->getSelectQuery();
        $selectBuilder = new SelectBuilder($query);

        $rowQuery = $selectBuilder->getMethod()
            ->getFields()
            ->getTable()
            ->getQuery();

        $query->setRowQuery($rowQuery);

        return $this;
    }


}