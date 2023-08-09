<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\Delete\DeleteMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Insert\InsertMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Select\SelectMethod;
use App\DataBaseBuilders\Services\QueryBuilderService\DeleteBuilder;
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
        $query = $insert->getInsertQuery();
        $insertBuilder = new InsertBuilder($query);

        $rowQuery = $insertBuilder->getMethod()
            ->getTable()
            ->getFields()
            ->getValues()
            ->getQuery();

        $query->setRowQuery($rowQuery);

        return $this;
    }

    public function delete(string $table): static
    {
        $delete = new DeleteMethod($table);
        $query = $delete->getDeleteQuery();

        $deleteBuilder = new DeleteBuilder($query);

        $rowQuery = $deleteBuilder->getMethod()
            ->getTable()
            ->getQuery();

        $query->setRowQuery($rowQuery);

        return $this;
    }
}