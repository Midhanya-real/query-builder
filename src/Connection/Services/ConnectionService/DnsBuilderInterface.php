<?php

namespace App\Connection\Services\ConnectionService;

use App\Connection\Config\DnsConfig;

interface DnsBuilderInterface
{
    public function setDb(string $db): static;

    public function setHost(string $host): static;

    public function setPort(string $port): static;

    public function setDbName(string $dbName): static;

    public function getDns(): DnsConfig;
}