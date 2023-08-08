<?php

namespace App\DbConnection;

use App\DbConnection\Config\DBConfig;
use App\DbConnection\Config\DnsConfig;
use App\DbConnection\Connections\Connection;
use App\DbConnection\Services\ConnectionService\DnsBuilder;

class DbConnection
{
    private function setConfig(): DBConfig
    {
        $config = new DBConfig();

        $config->setDb($_ENV['DB_CONNECTION']);
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
            ->setDb(db: $config->getDb())
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