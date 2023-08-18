<?php

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$builder = new \App\QueryBuilder();

$query = $builder->createBuilder()->select('persons')->andWhere('name')->like('%re%')->getQuery();

$results = $builder->fetch($query)->all();

echo '<pre>';
print_r($results);
echo '</pre>';