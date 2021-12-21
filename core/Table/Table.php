<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    private $db;


    public function __construct(Database $db)
    {
        $this->db = $db;

        if ($this->table === NULL) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }

        //
    }

    public function all()
    {
        return $this->query("
            SELECT *
            FROM " . $this->table . "
        ");
    }

    public function find($id)
    {
        return $this->query("
        SELECT *
        FROM " . $this->table . "
        WHERE id = ?
    ", [$id], true);
    }

    public function query($statement, $attributes = null, $one = false)
    {

        if (is_array($attributes)) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
}
