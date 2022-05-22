<?php
/**
 * Implementation of sql query builder
 * @author Ivan Danylenko
 */

namespace IvanDanylenko\Builder;

use Aigletter\Contracts\Builder\QueryBuilderInterface;

class QueryBuilder implements QueryBuilderInterface
{
    public $select;
    public $table;
    public $where = '';
    public $order = '';
    public $limit = '';
    public $offset = '';

    public function select($columns): QueryBuilder
    {
        $this->select = implode(', ', $columns);
        return $this;
    }

    public function where($conditions): QueryBuilder
    {
        $where = '';
        foreach ($conditions as $key => $value) {
            $where = $where . "$key = $value" . ' AND ';
        }
        $where = substr($where, 0, -5);
        $this->where = $where;
        return $this;
    }

    public function table($table): QueryBuilder
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): QueryBuilder
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): QueryBuilder
    {
        $this->offset = $offset;
        return $this;
    }

    public function order($order): QueryBuilder
    {
        $sort = '';
        foreach ($order as $key => $value) {
            $sort = $sort . "$key = $value" . ', ';
        }
        $sort = substr($sort, 0, -2);
        $this->order = $sort;
        return $this;
    }

    public function build(): Query
    {
        return new Query($this);
    }
}
