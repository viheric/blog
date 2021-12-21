<?php

namespace Core\Database;

use \PDO;

class Database
{
 /*   private $pdo;


    public function __construct(
        private $db_name,
        private $db_user = 'root',
        private $db_pass = '',
        private $db_host = 'localhost'
    ) {
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO(
                'mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . ';',
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


    public function query($statement, $class, $one=false)
    {
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        //
        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        //
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        //
        return $datas;
    }*/
}
