<?php

namespace app\models;

use app\models\Connection;

abstract class Crud
{

    protected $connection;
    protected $path = "../database/migrations/";
    protected $file = "config_db.ini";

    public function __construct()
    {
        $this->connection = Connection::getConnection($this->path . $this->file);
    }

    public function all()
    {
        $list = $this->connection->prepare($this->sql);
        $list->execute();

        return $list->fetchAll();
    }

    public function insert()
    {
        $sql = "INSERT INTO {$this->table} (";
        $sql .= implode(',', array_keys($this->attributes)) . ") VALUES (";
        $sql .= ":" . implode(', :', array_keys($this->attributes)) . ");";

        $insert = $this->connection->prepare($sql);
        return $insert->execute($this->attributes);
    }

    public function update()
    {
        $sql = "UPDATE {$this->table} SET ";

        $k = $this->attributes;
        unset($k[array_keys($this->where)[0]]);

        foreach ($k as $key => $value) {
            $sql .= "{$key} = :{$key}, ";
        }

        $sql = rtrim($sql, ', ');

        $sql .= " WHERE " . array_keys($this->where)[0] . "= :" . array_keys($this->where)[0] . ";";

        $update = $this->connection->prepare($sql);
        return $update->execute($this->attributes);
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->table}";

        $sql .= " WHERE " . array_keys($this->where)[0] . "= :" . array_keys($this->where)[0] . ";";

        $delete = $this->connection->prepare($sql);
        $delete->execute([':'.array_keys($this->where)[0] => array_values($this->where)[0]]);
        return $delete->rowCount();
    }

}
