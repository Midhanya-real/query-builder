<?php

use App\DataBaseBuilders\DataBases\Postgres\PostgresQueryBuilder;

require_once __DIR__ . "/vendor/autoload.php";

$test = new PostgresQueryBuilder();

$query = $test->orWhere(['name' => 'Pack', 'sec_name' => 'Opares']);

var_dump($query->getRawQuery());
var_dump($query->getValues());