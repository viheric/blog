<?php

namespace App\Table;

use App\App;

class Table
{
    protected static $table;


    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public static function all()
    {
        return self::query("
            SELECT *
            FROM " . static::$table . "
        ");
    }

    public static function find($id)
    {
        return self::query("
        SELECT *
        FROM " . static::$table . "
        WHERE id = ?
    ", [$id], true);
    }

    public static function query($statement, $attributes = null, $one = false)
    {

        if (is_array($attributes)) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDb()->query($statement, get_called_class(), $one);
        }
    }
}
