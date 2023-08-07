<?php

namespace App\Services\ConnectionService;

interface DnsBuilderInterface
{
    public function setDb(string $db): static;

    public function setHost(string $host): static;

    public function setPort(string $port): static;

    public function setDbName(string $dbName): static;

    public function getDns(): string;
}