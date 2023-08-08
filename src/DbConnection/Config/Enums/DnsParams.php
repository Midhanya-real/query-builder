<?php

namespace App\DbConnection\Config\Enums;

enum DnsParams: string
{
    case Host = ';host';
    case Post = ';port';
    case DbName = ';dbname';
}
