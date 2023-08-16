<?php

namespace App\DataBaseBuilders\Handlers;

use App\DataBaseBuilders\DataBases\Postgres\PostgresQueryBuilderInterface;
use App\DataBaseBuilders\QueryModels\Pool;
use App\DataBaseBuilders\QueryModels\Query;
use App\DataBaseBuilders\Validators\BuilderValidators\PostgresValidator;

class PostgresHandler
{
    public function __construct(
        private readonly PostgresQueryBuilderInterface $queryBuilder,
        private readonly Pool                          $pool,
    )
    {
    }

    public function select(string|array $table, array|null $body = null): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidSelectBody($body);

        $query = $this->queryBuilder->select($table, $body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function insert(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidInsertBody($body);
        $query = $this->queryBuilder->insert($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function delete(string|array $table): static
    {
        $table = PostgresValidator::getValidTable($table);
        $query = $this->queryBuilder->delete($table);

        $this->pool->setQueries($query);

        return $this;
    }

    public function update(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidUpdateBody($body);

        $query = $this->queryBuilder->update($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function andWhere(array $body): static
    {
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->queryBuilder->andWhere($body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function orWhere(array $body): static
    {
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->queryBuilder->orWhere($body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function join(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidJoinBody($body);
        $query = $this->queryBuilder->join($table, $body['fields'], []);

        $this->pool->setQueries($query);

        return $this;
    }

    public function outJoin(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidJoinBody($body);
        $query = $this->queryBuilder->outJoin($table, $body['fields'], []);

        $this->pool->setQueries($query);

        return $this;
    }

    public function limit(string $limit): static
    {
        $query = $this->queryBuilder->limit($limit);
        $this->pool->setQueries($query);

        return $this;
    }

    public function offset(string $limit): static
    {
        $query = $this->queryBuilder->offset($limit);
        $this->pool->setQueries($query);

        return $this;
    }

    public function groupBy(array $body): static
    {
        $body = PostgresValidator::getValidSelectBody($body);
        $query = $this->queryBuilder->groupBy($body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function orderBy(array $body): static
    {
        $body = PostgresValidator::getValidOrderBody($body);
        $query = $this->queryBuilder->orderBy($body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function having(array $agrFunc, string $alias, string $value): static
    {
        $body = PostgresValidator::getValidHavingBody($agrFunc, $alias, $value);
        $query = $this->queryBuilder->having($body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function with(array $query): static
    {
        $body = PostgresValidator::getValidWithBody($query);
        $query = $this->queryBuilder->with($body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function getQuery(): Pool
    {
        return $this->pool;
    }
}