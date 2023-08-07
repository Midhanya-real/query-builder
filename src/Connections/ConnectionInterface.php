<?php

namespace App\Connections;

use PDO;

interface ConnectionInterface
{
    public function connect(): PDO;
}