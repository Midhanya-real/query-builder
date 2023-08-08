<?php

namespace App\DbConnection\Services\ConnectionService;

use App\DbConnection\Config\DnsConfig;
use App\DbConnection\Config\Enums\DnsParams;

class DnsBuilder implements DnsBuilderInterface
{
    public function __construct(
        private readonly DnsConfig $dns,
    )
    {
    }

    public function setDb(string $db): static
    {
        $this->dns->setDriver($db);

        return $this;
    }

    public function setHost(string $host): static
    {
        $dnsHost = DnsParams::Host->value . $host;

        $this->dns->setHost($dnsHost);

        return $this;
    }

    public function setPort(string $port): static
    {
        $dnsPort = DnsParams::Post->value . $port;

        $this->dns->setPort($dnsPort);

        return $this;
    }

    public function setDbName(string $dbName): static
    {
        $dnsDbName = DnsParams::DbName->value . $dbName;

        $this->dns->setDbName($dnsDbName);

        return $this;
    }

    public function getDns(): DnsConfig
    {
        return $this->dns;
    }
}