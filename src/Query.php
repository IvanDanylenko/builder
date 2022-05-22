<?php

namespace IvanDanylenko\Builder;

use Aigletter\Contracts\Builder\QueryBuilderInterface;
use Aigletter\Contracts\Builder\QueryInterface;

class Query implements QueryInterface
{
    public $select;
    public $table;
    public $where = '';
    public $order = '';
    public $limit = '';
    public $offset = '';

    public function __construct(QueryBuilderInterface $builder)
    {
        $this->select = $builder->select;
        $this->table = $builder->table;
        $this->where = $builder->where;
        $this->order = $builder->order;
        $this->limit = $builder->limit;
        $this->offset = $builder->offset;
    }

    public function toSql(): string
    {
        return "SELECT " . $this->select
        . " FROM " . $this->table
            . (!empty($this->where) ? " WHERE " . $this->where : '')
            . (!empty($this->order) ? " ORDER BY " . $this->order : '')
            . (!empty($this->limit) ? " LIMIT " . $this->limit : '')
            . (!empty($this->offset) ? " OFFSET " . $this->offset : '');
    }

    public function __toString(): string
    {
        return $this->toSql();
    }
}
