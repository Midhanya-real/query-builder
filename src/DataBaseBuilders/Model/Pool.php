<?php

namespace App\DataBaseBuilders\Model;

class Pool
{
    private array $queries = [];

    private string $query = '';

    private array $params = [];

    /**
     * @param Query $queries
     */
    public function setQueries(Query $queries): void
    {
        $this->queries[] = $queries;
    }

    /**
     * @return array<Query>
     */
    private function getQueries(): array
    {
        return $this->queries;
    }

    public function getQuery(): string
    {
        foreach ($this->getQueries() as $query) {
            $this->query .= $query->getRawQuery() . " ";
        }

        $this->query .= ';';

        return $this->query;
    }

    public function getParams(): array
    {
        $params = [];

        foreach ($this->getQueries() as $query) {
            $params = array_merge($params, $query->getValues());
        }

        return $params;
    }
}