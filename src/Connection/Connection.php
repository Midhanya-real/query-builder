<?php

namespace App\Connection;

use App\Connection\Config\DbConfig;
use App\Connection\Config\DnsConfig;
use App\Connection\Connections\PDOConnection;
use App\Connection\Services\ConnectionService\DnsBuilder;

final class Connection
{
    private static ?Connection $connection;

    private function __construct()
    {
    }

    public static function getInstance(): ?Connection
    {
        if (is_null(self::$connection)) {
            self::$connection = new Connection();
        }

        return self::$connection;
    }

    private function setConfig(): DbConfig
    {
        $config = new DbConfig();

        $config->setDriver($_ENV['DB_CONNECTION_DRIVER']);
        $config->setHost($_ENV['DB_HOST']);
        $config->setPort($_ENV['DB_PORT']);
        $config->setDbName($_ENV['DB_NAME']);
        $config->setUser($_ENV['DB_USERNAME']);
        $config->setPass($_ENV['DB_PASSWORD']);

        return $config;
    }

    private function setDns(DbConfig $config): DnsConfig
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

    public function getConnection(): PDOConnection
    {
        $config = $this->setConfig();
        $dns = $this->setDns($config);

        return new PDOConnection($config, $dns);
    }
}