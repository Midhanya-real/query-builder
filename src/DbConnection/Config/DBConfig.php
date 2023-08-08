<?php

namespace App\DbConnection\Config;

class DBConfig
{
    private string $dbDriver;

    private string $host;

    private string $port;

    private string $dbName;

    private string $user;

    private string $pass;

    /**
     * @return string
     */
    public function getDbDriver(): string
    {
        return $this->dbDriver;
    }

    /**
     * @param string $dbDriver
     * @return DBConfig
     */
    public function setDbDriver(string $dbDriver): DBConfig
    {
        $this->dbDriver = $dbDriver;

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
    public function setHost(string $host): DBConfig
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
    public function setPort(string $port): DBConfig
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
    public function setDbName(string $dbName): DBConfig
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
    public function setUser(string $user): DBConfig
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
    public function setPass(string $pass): DBConfig
    {
        $this->pass = $pass;

        return $this;
    }
}