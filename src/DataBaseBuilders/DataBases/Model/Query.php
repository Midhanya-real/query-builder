<?php

namespace App\DataBaseBuilders\DataBases\Model;

class Query
{
    private string $method;

    private string $table;

    private array $fields;

    private ?array $values;

    private string $rowQuery;

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
     */
    public function setTable(string $table): static
    {
        $this->table = $table;
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
     * @return array
     */
    public function getFields(): array
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
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param string $rowQuery
     */
    public function setRowQuery(string $rowQuery): void
    {
        $this->rowQuery = $rowQuery;
    }

    /**
     * @return string
     */
    public function getRowQuery(): string
    {
        return $this->rowQuery;
    }
}