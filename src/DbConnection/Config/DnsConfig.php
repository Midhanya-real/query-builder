<?php

namespace App\DbConnection\Config;

use App\DbConnection\Config\Interfaces\DnsInterface;

class DnsConfig implements DnsInterface
{
    private string $driver;

    private string $host;

    private string $port;

    private string $dbName;

    /**
     * @param string $driver
     * @return DnsConfig
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $host
     * @return DnsConfig
     */
    public function setHost(string $host): static
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
    public function setPort(string $port): static
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
    public function setDbName(string $dbName): static
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
        return $this->getDriver()
            . $this->getHost()
            . $this->getPort()
            . $this->getDbName();
    }
}