<?php

namespace App\DataBaseBuilders\QueryModels;

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

    public function getQuery(bool $end = false): string
    {
        foreach ($this->getQueries() as $query) {
            $this->query .= $query->getRawQuery() . " ";
        }

        if ($end) {
            $this->query .= ";";
        }

        return $this->query;
    }

    public function getParams(): array
    {
        foreach ($this->getQueries() as $query) {
            $this->params = array_merge($this->params, $query->getValues());
        }

        return $this->params;
    }
}