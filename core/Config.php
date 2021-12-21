<?php
namespace Core;

class Config {

        private $settings = [];
        private static $_instance;

        public function __construct($file)
        {
            $this->settings = require($file);// dirname(__DIR__) ."/config/config.php";
        }

        public static function getInstance($file)
        {
            if(self::$_instance === NULL){
                self::$_instance = new Config($file);
            }

            return self::$_instance;
        }

        public function get($key)
        {
            return isset($this->settings[$key]) ? $this->settings[$key] : NULL;
        }

}