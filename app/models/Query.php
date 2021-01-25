<?php

namespace app\models;

class Query extends Crud
{

    protected $sql;
    protected $table;
    protected $attributes;
    protected $where;

    public function createSelect(string $select)
    {
        $this->sql = $select;
    }

    public function createInsert($table, $attributes)
    {
        $this->table      = $table;
        $this->attributes = (array) $attributes;
    }

    public function createUpdate($table, $attributes, $where)
    {
        $this->table      = $table;
        $this->attributes = (array) $attributes;
        $this->where      = $where;
    }

    public function createDelete($table, $where)
    {
        $this->table = $table;
        $this->where = (array) $where;
    }

}
