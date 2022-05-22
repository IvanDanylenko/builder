<?php

include 'vendor/autoload.php';

use IvanDanylenko\Builder\QueryBuilder;

$builder = new QueryBuilder();
$query = $builder->table('users')
    ->select(['name', 'age', 'gender'])
    ->where(['gender' => 'M', 'age' => 20])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();
$sql = (string) $query;

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$res = $pdo->query('SELECT * from user')->fetchAll();
var_dump($res);
exit();