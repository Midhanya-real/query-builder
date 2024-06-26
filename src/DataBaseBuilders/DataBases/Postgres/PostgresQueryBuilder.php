<?php

namespace App\DataBaseBuilders\DataBases\Postgres;

use App\DataBaseBuilders\DataBases\Postgres\Methods\Delete;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Except;
use App\DataBaseBuilders\DataBases\Postgres\Methods\GroupBy;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Having;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Insert;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Intersect;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Join;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Like;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Limit;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Offset;
use App\DataBaseBuilders\DataBases\Postgres\Methods\OrderBy;
use App\DataBaseBuilders\DataBases\Postgres\Methods\OutJoin;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Select;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Union;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Update;
use App\DataBaseBuilders\DataBases\Postgres\Methods\Where;
use App\DataBaseBuilders\DataBases\Postgres\Methods\With;
use App\DataBaseBuilders\QueryModels\Query;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawAndWhereBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawDeleteBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawGroupByBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawHavingBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawInsertBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawJoinBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawLimitBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawOrWhereBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawSelectBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawUnionBuilder;
use App\DataBaseBuilders\Services\RawQueryBuilderService\RawUpdateBuilder;

class PostgresQueryBuilder extends Builder implements PostgresQueryBuilderInterface
{
    public function select(string $table, array $fields): Query
    {
        $select = $this->createMethod(Select::class, $table, $fields)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawSelectBuilder::class, $select)
            ->setMethod()
            ->setFields()
            ->setTable()
            ->getRawQuery();

        $select->setRawQuery($rowQuery);

        return $select;
    }

    public function insert(string $table, array $fields, array $values): Query
    {
        $insert = $this->createMethod(Insert::class, $table, $fields, $values)
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
        $delete = $this->createMethod(Delete::class, $table)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawDeleteBuilder::class, $delete)
            ->setMethod()
            ->setTable()
            ->getRawQuery();

        $delete->setRawQuery($rowQuery);

        return $delete;
    }

    public function update(string $table, array $fields, array $values): Query
    {
        $update = $this->createMethod(Update::class, $table, $fields, $values)
            ->getQuery();

        $rowQuery = $this->createRawBuilder(RawUpdateBuilder::class, $update)
            ->setMethod()
            ->setTable()
            ->setFields()
            ->getRawQuery();

        $update->setRawQuery($rowQuery);

        return $update;
    }

    public function andWhere(array $fields, array $values): Query
    {
        $where = $this->createMethod(Where::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawAndWhereBuilder::class, $where)
            ->setMethod()
            ->setFields()
            ->getRawQuery();

        $where->setRawQuery($rawQuery);

        return $where;
    }

    public function orWhere(array $fields, array $values): Query
    {
        $where = $this->createMethod(Where::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawOrWhereBuilder::class, $where)
            ->setMethod()
            ->setFields()
            ->getRawQuery();

        $where->setRawQuery($rawQuery);

        return $where;
    }

    public function join(string $table, array $fields, array $values): Query
    {
        $join = $this->createMethod(Join::class, $table, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawJoinBuilder::class, $join)
            ->setMethod()
            ->setTable()
            ->setFields()
            ->getRawQuery();

        $join->setRawQuery($rawQuery);

        return $join;
    }

    public function outJoin(string $table, array $fields, array $values): Query
    {
        $join = $this->createMethod(OutJoin::class, $table, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawJoinBuilder::class, $join)
            ->setMethod()
            ->setTable()
            ->setFields()
            ->getRawQuery();

        $join->setRawQuery($rawQuery);

        return $join;
    }

    public function limit(string $limit): Query
    {
        $limits = $this->createMethod(Limit::class, null, [$limit])
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawLimitBuilder::class, $limits)
            ->setMethod()
            ->setValues()
            ->getRawQuery();

        $limits->setRawQuery($rawQuery);

        return $limits;
    }

    public function offset(string $limit): Query
    {
        $offset = $this->createMethod(Offset::class, null, [$limit])
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawLimitBuilder::class, $offset)
            ->setMethod()
            ->setValues()
            ->getRawQuery();

        $offset->setRawQuery($rawQuery);

        return $offset;
    }

    public function groupBy(array $groupColumns): Query
    {
        $groupBy = $this->createMethod(GroupBy::class, null, $groupColumns)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawGroupByBuilder::class, $groupBy)
            ->setMethod()
            ->setFields()
            ->getRawQuery();

        $groupBy->setRawQuery($rawQuery);

        return $groupBy;
    }

    public function orderBy(array $orderFields): Query
    {
        $orderBy = $this->createMethod(OrderBy::class, null, $orderFields)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawGroupByBuilder::class, $orderBy)
            ->setMethod()
            ->setFields()
            ->getRawQuery();

        $orderBy->setRawQuery($rawQuery);

        return $orderBy;
    }

    public function having(array $fields, array $values): Query
    {
        $having = $this->createMethod(Having::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawHavingBuilder::class, $having)
            ->setMethod()
            ->setFields()
            ->setValues()
            ->getRawQuery();

        $having->setRawQuery($rawQuery);

        return $having;
    }

    public function with(array $fields, array $values): Query
    {
        $with = $this->createMethod(With::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawGroupByBuilder::class, $with)
            ->setMethod()
            ->setFields()
            ->getRawQuery();

        $with->setRawQuery($rawQuery);

        return $with;
    }

    public function like(string $pattern): Query
    {
        $like = $this->createMethod(Like::class, null, [$pattern])
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawLimitBuilder::class, $like)
            ->setMethod()
            ->setValues()
            ->getRawQuery();

        $like->setRawQuery($rawQuery);

        return $like;
    }

    public function union(array $fields, $values): Query
    {
        $union = $this->createMethod(Union::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawUnionBuilder::class, $union)
            ->setFields()
            ->getRawQuery();

        $union->setRawQuery($rawQuery);

        return $union;
    }

    public function intersect(array $fields, array $values): Query
    {
        $intersect = $this->createMethod(Intersect::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawUnionBuilder::class, $intersect)
            ->setFields()
            ->getRawQuery();

        $intersect->setRawQuery($rawQuery);

        return $intersect;
    }

    public function except(array $fields, array $values): Query
    {
        $except = $this->createMethod(Except::class, null, $fields, $values)
            ->getQuery();

        $rawQuery = $this->createRawBuilder(RawUnionBuilder::class, $except)
            ->setFields()
            ->getRawQuery();

        $except->setRawQuery($rawQuery);

        return $except;
    }
}