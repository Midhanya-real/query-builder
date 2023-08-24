<?php

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$builder = new \App\QueryBuilder();

$query = $builder->createBuilder()
    ->select('t', ['name', 'sec_name'])
    ->andWhere(['name' => ['>', 26], 'sec_name' => 'Ueban'])
    ->getQuery();

var_dump($query->getQuery());
var_dump($query->getParams());