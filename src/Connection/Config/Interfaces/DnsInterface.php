<?php

namespace App\Connection\Config\Interfaces;

interface DnsInterface
{
    public function getDriver(): string;

    public function setDriver(string $driver): static;

    public function getHost(): string;

    public function setHost(string $host): static;

    public function getPort(): string;

    public function setPort(string $port): static;

    public function getDbName(): string;

    public function setDbName(string $dbName): static;
}