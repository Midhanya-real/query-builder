<?php

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$builder = new \App\QueryBuilder();

$query1 = $builder->createBuilder()
    ->select('products', ['product_id', 'product_name'])
    ->andWhere(['product_id' => 24])
    ->getQuery();

$query2 = $builder->createBuilder()
    ->select('products', ['category_id', 'category_name'])
    ->andWhere(['category_name' => 'Hardware'])
    ->getQuery();

$unionQuery = $builder->createBuilder()->with(['query1' => $query1, 'query2' => $query2])->getQuery();

var_dump($unionQuery->getQuery(true));

echo '<pre>';
print_r($unionQuery->getParams());
echo '</pre>';