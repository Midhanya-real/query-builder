<?php

namespace App\DataBaseBuilders\Handlers;

use App\DataBaseBuilders\DataBases\Postgres\PostgresQueryBuilder;
use App\DataBaseBuilders\DataBases\Postgres\PostgresQueryBuilderInterface;
use App\DataBaseBuilders\Model\Pool;
use App\DataBaseBuilders\Validators\BuilderValidators\PostgresValidator;

class PostgresHandler
{
    public function __construct(
        private readonly Pool $pool,
    )
    {
    }

    private function createBuilder(): PostgresQueryBuilderInterface
    {
        return new PostgresQueryBuilder();
    }

    public function select(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidSelectBody($body);

        $query = $this->createBuilder()->select($table, $body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function insert(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidInsertBody($body);
        $query = $this->createBuilder()->insert($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function delete(string|array $table): static
    {
        $table = PostgresValidator::getValidTable($table);
        $query = $this->createBuilder()->delete($table);

        $this->pool->setQueries($query);

        return $this;
    }

    public function update(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidUpdateBody($body);

        $query = $this->createBuilder()->update($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function andWhere(array $body): static
    {
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->createBuilder()->andWhere($body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function orWhere(array $body): static
    {
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->createBuilder()->orWhere($body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function join(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->createBuilder()->join($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function outJoin(string|array $table, array $body): static
    {
        $table = PostgresValidator::getValidTable($table);
        $body = PostgresValidator::getValidUpdateBody($body);
        $query = $this->createBuilder()->outJoin($table, $body['fields'], $body['values']);

        $this->pool->setQueries($query);

        return $this;
    }

    public function limit(string $limit): static
    {
        $query = $this->createBuilder()->limit($limit);
        $this->pool->setQueries($query);

        return $this;
    }

    public function offset(string $limit): static
    {
        $query = $this->createBuilder()->offset($limit);
        $this->pool->setQueries($query);

        return $this;
    }

    public function groupBy(array $body): static
    {
        $body = PostgresValidator::getValidSelectBody($body);
        $query = $this->createBuilder()->groupBy($body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function orderBy(array $body): static
    {
        $body = PostgresValidator::getValidOrderBody($body);
        $query = $this->createBuilder()->orderBy($body);

        $this->pool->setQueries($query);

        return $this;
    }

    public function getQuery(): Pool
    {
        return $this->pool;
    }
}