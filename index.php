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
echo $sql;
