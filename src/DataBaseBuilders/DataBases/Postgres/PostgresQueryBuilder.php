<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Delete\DeleteMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Insert\InsertMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Select\SelectMethod;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawDeleteBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawInsertBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawSelectBuilder;

class PostgresQueryBuilder extends AbstractPostgresBuilder
{
    public function select(string $table, array $fields): static
    {
        $select = $this->createMethod(SelectMethod::class, $table, $fields)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawSelectBuilder::class, $select)
            ->setMethod()
            ->setFields()
            ->setTable()
            ->getRawQuery();

        $select->setRowQuery($rowQuery);

        return $this;
    }

    public function insert(string $table, array $fields): static
    {
        $insert = $this->createMethod(InsertMethod::class, $table, $fields)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawInsertBuilder::class, $insert)
            ->setMethod()
            ->setTable()
            ->setFields()
            ->setValues()
            ->getRawQuery();

        $insert->setRowQuery($rowQuery);

        return $this;
    }

    public function delete(string $table): static
    {
        $delete = $this->createMethod(DeleteMethod::class, $table)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawDeleteBuilder::class, $delete)
            ->setMethod()
            ->setTable()
            ->getRawQuery();

        $delete->setRowQuery($rowQuery);

        return $this;
    }
}