<?php

namespace App\DbConnection;

use App\DbConnection\Config\DBConfig;
use App\DbConnection\Config\DnsConfig;
use App\DbConnection\Connections\Connection;
use App\DbConnection\Services\ConnectionService\DnsBuilder;

final class DbConnection
{
    private static ?DbConnection $connection;

    private function __construct()
    {
    }

    public static function getInstance(): ?DbConnection
    {
        if (is_null(self::$connection)) {
            self::$connection = new DbConnection();
        }

        return self::$connection;
    }

    private function setConfig(): DBConfig
    {
        $config = new DBConfig();

        $config->setDriver($_ENV['DB_CONNECTION_DRIVER']);
        $config->setHost($_ENV['DB_HOST']);
        $config->setPort($_ENV['DB_PORT']);
        $config->setDbName($_ENV['DB_NAME']);
        $config->setUser($_ENV['DB_USERNAME']);
        $config->setPass($_ENV['DB_PASSWORD']);

        return $config;
    }

    private function setDns(DBConfig $config): DnsConfig
    {
        $dns = new DnsConfig();
        $dnsBuilder = new DnsBuilder($dns);

        return $dnsBuilder
            ->setDb(db: $config->getDriver())
            ->setHost(host: $config->getHost())
            ->setPort(port: $config->getPort())
            ->setDbName(dbName: $config->getDbName())
            ->getDns();
    }

    public function getConnection(): Connection
    {
        $config = $this->setConfig();
        $dns = $this->setDns($config);

        return new Connection($config, $dns);
    }
}