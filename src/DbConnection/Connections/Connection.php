<?php

namespace App\DbConnection\Connections;

use App\DbConnection\Config\DBConfig;
use App\DbConnection\Config\DnsConfig;
use PDO;

class Connection implements ConnectionInterface
{
    public function __construct(
        private readonly DBConfig  $config,
        private readonly DnsConfig $dns,
    )
    {
    }

    public function connect(): PDO
    {
        return new PDO(
            dsn: $this->dns->getDns(),
            username: $this->config->getUser(),
            password: $this->config->getPass()
        );
    }
}