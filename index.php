<?php

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$builder = new \App\QueryBuilder();

$query = $builder->createBuilder()->having(['SUM' => '*'], '>', 28)->getQuery();

$builder->fetch($query)->first();