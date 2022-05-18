<?php
define('USER', 'root');
define('PASSWORD', '');

    class DB{
        private static $_instance = null;
        private $connection = null;

        public static function getInstance(){
            if(self::$_instance == null){
               self::$_instance = new static();
            }
            return self::$_instance;
        }

        private function __construct(){
            try{
                $this->connection = new PDO('mysql:host=localhost;dbname=exhibition', USER, PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]);
            } catch (PDOException $e){
                print "Error!: " . $e->getMessage();
                die();
            }
        }

        private function __clone(){}
        private function __wakeup(){}

        public static function connection(){
            return static::getInstance()->connection;
        }

        public static function prepare($statement){
            return static::connection()->prepare($statement);
        }

    }
?>