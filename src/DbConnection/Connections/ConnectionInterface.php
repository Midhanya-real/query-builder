<?php

namespace App\DbConnection\Connections;

use PDO;

interface ConnectionInterface
{
    public function connect(): PDO;
}