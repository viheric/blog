<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{

    public  $title = "Mon super site";
    private  $db_instance;

    private static $_instance;


    public static function getInstance()
    {
        if (self::$_instance ===  NULL) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }


    public function getTable($name)
    {
        $class_name = "\\App\\Table\\" . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public static function load()
    {
        session_start();
        /*require ROOT . "/app/Autoloader.php";
        App\Autoloader::register();
        require ROOT . "/Core/Autoloader.php";
        Core\Autoloader::register();*/
    }




    public function getDb()
    {
        if ($this->db_instance === null) {
            $config = Config::getInstance(ROOT . "/config/config.php");

            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host'),
                $config->get('db_port'),
            );
        }

        return $this->db_instance;
    }



    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        header("Location:./?p=404");
    }
}
