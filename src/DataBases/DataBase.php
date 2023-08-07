<?php

namespace App\DataBases;

use App\Config\Config;
use App\Connections\Connection;
use App\Services\ConnectionService\DnsBuilder;

class DataBase
{
    private function setConfig(): Config
    {
        $config = new Config();

        $config->setDb($_ENV['DB_CONNECTION']);
        $config->setHost($_ENV['DB_HOST']);
        $config->setPort($_ENV['DB_PORT']);
        $config->setDbName($_ENV['DB_NAME']);
        $config->setUser($_ENV['DB_USERNAME']);
        $config->setPass($_ENV['DB_PASSWORD']);

        return $config;
    }

    public function getConnection(): Connection
    {
        return new Connection($this->setConfig(), new DnsBuilder());
    }
}