<?php

namespace App\Connection\Config\Enums;

enum DnsParams: string
{
    case Host = ':host=';
    case Post = ';port=';
    case DbName = ';dbname=';
}
