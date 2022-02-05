<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database
{
    private $pdo;


    public function __construct(
        private string $db_name,
        private string $db_user = 'root',
        private string $db_pass = '',
        private string $db_host = 'localhost',
        private mixed $db_port = '3308'
    ) {
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO(
                'mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . ';port=' . $this->db_port . ';',
                $this->db_user,
                $this->db_pass
            );
            //
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        //
        return $this->pdo;
    }


    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);

        return $this->fetchData($req, $class_name, $one);
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);

        return $this->fetchData($req, $class_name, $one, $attributes);
    }

    private function fetchData($pdo_obj, $class_name = null, $one = false, $attributes = null)
    {
        if (is_array($attributes))
            $pdo_obj->execute($attributes);

        if ($class_name !== null)
            $pdo_obj->setFetchMode(PDO::FETCH_CLASS, $class_name);
        else
            $pdo_obj->setFetchMode(PDO::FETCH_OBJ);
        //
        if ($one) {
            $datas = $pdo_obj->fetch();
        } else {
            $datas = $pdo_obj->fetchAll();
        }
        //
        return $datas;
    }
}
