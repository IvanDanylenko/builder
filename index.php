<?php

include 'vendor/autoload.php';

use IvanDanylenko\Builder\SqlBuilder;

$builder = new SqlBuilder();
$sql = $builder->table('users')
    ->select(['name', 'age', 'gender'])
    ->where(['gender' => 'M', 'age' => 20])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();
echo $sql;
