<?php
/**
 * Implementation of sql query builder
 * @author Ivan Danylenko
 */

namespace IvanDanylenko\Builder;

use Aigletter\Contracts\Builder\SqlBuilderInterface;

class SqlBuilder implements SqlBuilderInterface
{
    public $select;
    public $table;
    public $where = '';
    public $order = '';
    public $limit = '';
    public $offset = '';

    public function select($columns): SqlBuilder
    {
        $this->select = implode(', ', $columns);
        return $this;
    }

    public function where($conditions): SqlBuilder
    {
        $where = '';
        foreach ($conditions as $key => $value) {
            $where = $where . "$key = $value" . ' AND ';
        }
        $where = substr($where, 0, -5);
        $this->where = $where;
        return $this;
    }

    public function table($table): SqlBuilder
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): SqlBuilder
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): SqlBuilder
    {
        $this->offset = $offset;
        return $this;
    }

    public function order($order): SqlBuilder
    {
        $sort = '';
        foreach ($order as $key => $value) {
            $sort = $sort . "$key = $value" . ', ';
        }
        $sort = substr($sort, 0, -2);
        $this->order = $sort;
        return $this;
    }

    public function build(): string
    {
        return "SELECT " . $this->select
        . " FROM " . $this->table
            . (!empty($this->where) ? " WHERE " . $this->where : '')
            . (!empty($this->order) ? " ORDER BY " . $this->order : '')
            . (!empty($this->limit) ? " LIMIT " . $this->limit : '')
            . (!empty($this->offset) ? " OFFSET " . $this->offset : '');
    }
}
