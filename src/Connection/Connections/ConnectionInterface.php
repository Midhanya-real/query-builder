<?php

namespace App\Connection\Connections;

use PDO;

interface ConnectionInterface
{
    public function connect(): PDO;
}