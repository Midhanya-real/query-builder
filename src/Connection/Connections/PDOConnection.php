<?php

namespace App\Connection\Connections;

use App\Connection\Config\DbConfig;
use App\Connection\Config\DnsConfig;
use PDO;

class PDOConnection implements ConnectionInterface
{
    public function __construct(
        private readonly DbConfig  $config,
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