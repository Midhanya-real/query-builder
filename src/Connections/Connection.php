<?php

namespace App\Connections;

use App\Config\Config;
use App\Services\ConnectionService\DnsBuilderInterface;
use PDO;

class Connection implements ConnectionInterface
{
    public function __construct(
        private readonly Config              $config,
        private readonly DnsBuilderInterface $dnsBuilder,
    )
    {
    }

    private function getDns(): string
    {
        return $this->dnsBuilder
            ->setDb(db: $this->config->getDb())
            ->setHost(host: $this->config->getHost())
            ->setPort(port: $this->config->getPort())
            ->setDbName(dbName: $this->config->getDbName())
            ->getDns();
    }

    public function connect(): PDO
    {
        return new PDO(
            dsn: $this->getDns(),
            username: $this->config->getUser(),
            password: $this->config->getPass()
        );
    }
}