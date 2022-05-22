# PHP query builder

Implement query builder following `Builder` pattern

```
$builder = new SqlBuilder();
$sql = $builder->table('users')
    ->select(['name', 'age', 'gender'])
    ->where(['gender' => 'M', 'age' => 20])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();
```
