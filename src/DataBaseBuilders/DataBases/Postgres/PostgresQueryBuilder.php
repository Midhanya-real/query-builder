<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Model\Query;
use App\DataBaseBuilders\DataBases\Postgres\Methods\DeleteMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\InsertMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\SelectMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\UpdateMethod;
use App\DataBaseBuilders\DataBases\Postgres\Methods\WhereMethod;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawDeleteBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawInsertBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawSelectBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawUpdateBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawWhereBuilder;

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

        $select->setRawQuery($rowQuery);

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

        $insert->setRawQuery($rowQuery);

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

        $delete->setRawQuery($rowQuery);

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

        $update->setRawQuery($rowQuery);

        return $update;
    }

    public function where(array $values): Query
    {
        $where = $this->createMethod(WhereMethod::class, null, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawWhereBuilder::class, $where)
            ->setMethod()
            ->setValues()
            ->getRawQuery();

        $where->setRawQuery($rawQuery);

        return $where;
    }
}