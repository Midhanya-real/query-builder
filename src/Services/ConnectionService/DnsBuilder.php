<?php

namespace App\Services\ConnectionService;

class DnsBuilder implements DnsBuilderInterface
{
    private string $dns = '';

    public function setDb(string $db): static
    {
        $this->dns .= $db;

        return $this;
    }

    public function setHost(string $host): static
    {
        $this->dns .= ":host=" . $host;

        return $this;
    }

    public function setPort(string $port): static
    {
        $this->dns .= ";port=" . $port;

        return $this;
    }

    public function setDbName(string $dbName): static
    {
        $this->dns .= ";dbname=" . $dbName;

        return $this;
    }

    public function getDns(): string
    {
        return $this->dns;
    }
}