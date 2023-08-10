<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\DeleteMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\InsertMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\SelectMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\UpdateMethod;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawDeleteBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawInsertBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawSelectBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawUpdateBuilder;

class PostgresQueryBuilder extends Builder
{
    public function select(string $table, array $fields): Query
    {
        $select = $this->createMethod(SelectMethod::class, $table, $fields)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawSelectBuilder::class, $select)
            ->setMethod()
            ->setFields()
            ->setTable()
            ->getRawQuery();

        $select->setRowQuery($rowQuery);

        return $select;
    }

    public function insert(string $table, array $fields): Query
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

        return $insert;
    }

    public function delete(string $table): Query
    {
        $delete = $this->createMethod(DeleteMethod::class, $table)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawDeleteBuilder::class, $delete)
            ->setMethod()
            ->setTable()
            ->getRawQuery();

        $delete->setRowQuery($rowQuery);

        return $delete;
    }

    public function update(string $table, array $values): Query
    {
        $update = $this->createMethod(UpdateMethod::class, $table, $values)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawUpdateBuilder::class, $update)
            ->setMethod()
            ->setTable()
            ->setFields()
            ->getRawQuery();

        $update->setRowQuery($rowQuery);

        return $update;
    }

    public function where(array $values)
    {

    }
}