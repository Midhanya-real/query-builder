<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\Insert\InsertMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Select\SelectMethod;
use App\DataBaseBuilders\Services\QueryBuilderService\InsertBuilder;
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

    public function insert(string $table, array $fields): static
    {
        $insert = new InsertMethod($table, $fields);
        $query = $insert->getSelectQuery();
        $insertBuilder = new InsertBuilder($query);

        $rowQuery = $insertBuilder->getMethod()
            ->getTable()
            ->getFields()
            ->getValues()
            ->getQuery();

        $query->setRowQuery($rowQuery);

        return $this;
    }
}