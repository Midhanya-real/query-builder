<?php

namespace App\DbConnection\Config;

class DnsConfig
{
    private string $connection;

    private string $host;

    private string $port;

    private string $dbName;

    /**
     * @param string $connection
     * @return DnsConfig
     */
    public function setConnection(string $connection): DnsConfig
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @return string
     */
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @param string $host
     * @return DnsConfig
     */
    public function setHost(string $host): DnsConfig
    {
        $this->host = $host;

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
     * @param string $port
     * @return DnsConfig
     */
    public function setPort(string $port): DnsConfig
    {
        $this->port = $port;

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
     * @param string $dbName
     * @return DnsConfig
     */
    public function setDbName(string $dbName): DnsConfig
    {
        $this->dbName = $dbName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->dbName;
    }

    public function getDns(): string
    {
        return $this->getConnection()
            . $this->getHost()
            . $this->getPort()
            . $this->getDbName();
    }
}