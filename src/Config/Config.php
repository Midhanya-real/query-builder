<?php

namespace App\Config;

class Config
{
    private string $db;

    private string $host;

    private string $port;

    private string $dbName;

    private string $user;

    private string $pass;

    /**
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     * @return Config
     */
    public function setDb(string $db): Config
    {
        $this->db = $db;

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
     * @return Config
     */
    public function setHost(string $host): Config
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
     * @return Config
     */
    public function setPort(string $port): Config
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
     * @return Config
     */
    public function setDbName(string $dbName): Config
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
     * @return Config
     */
    public function setUser(string $user): Config
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
     * @return Config
     */
    public function setPass(string $pass): Config
    {
        $this->pass = $pass;

        return $this;
    }
}