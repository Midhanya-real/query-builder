<?php

namespace App\DbConnection\Config;

use App\DbConnection\Config\Interfaces\AccessDataInterface;
use App\DbConnection\Config\Interfaces\DnsInterface;

class DBConfig implements DnsInterface, AccessDataInterface
{
    private string $driver;

    private string $host;

    private string $port;

    private string $dbName;

    private string $user;

    private string $pass;

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return DBConfig
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return DBConfig
     */
    public function setHost(string $host): static
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param string $port
     * @return DBConfig
     */
    public function setPort(string $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->dbName;
    }

    /**
     * @param string $dbName
     * @return DBConfig
     */
    public function setDbName(string $dbName): static
    {
        $this->dbName = $dbName;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return DBConfig
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     * @return DBConfig
     */
    public function setPass(string $pass): static
    {
        $this->pass = $pass;

        return $this;
    }
}