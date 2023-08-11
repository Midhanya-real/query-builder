<?php

namespace App\DataBaseBuilders\Model;

class Query
{
    private string $method;

    private string $table;

    private array|null $fields = null;

    private array|null $values = null;

    private string $rawQuery;

    /**
     * @param string $method
     * @return Query
     */
    public function setMethod(string $method): static
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $table
     * @return Query
     */
    public function setTable(string $table): static
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param array $fields
     * @return Query
     */
    public function setFields(array $fields): static
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFields(): array|null
    {
        return $this->fields;
    }

    /**
     * @param array|null $values
     * @return Query
     */
    public function setValues(?array $values): static
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getValues(): array|null
    {
        return $this->values;
    }

    /**
     * @param string $rawQuery
     */
    public function setRawQuery(string $rawQuery): void
    {
        $this->rawQuery = $rawQuery;
    }

    /**
     * @return string
     */
    public function getRawQuery(): string
    {
        return $this->rawQuery;
    }
}