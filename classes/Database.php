<?php
    Class Database{
        public static $host   = 'localhost';
        public static $user   = 'root';
        public static $dbname = 'users';
        public static $pass   = '';




        private static $_instance = null;
        protected $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

        private function __construct()
        {
            try {
                $this->_pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname,self::$user,self::$pass);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public static function getInstance()
        {
            if (!isset(self::$_instance)) {
                self::$_instance = new Database();
            }
            return self::$_instance;
        }

        public function query($sql, $params = array())
        {
            $this->_error = false;
            if ($this->_query = $this->_pdo->prepare($sql)) {
                $x = 1;
                if (count($params)) {
                    foreach ($params as $param) {
                        $this->_query->bindValue($x, $param);
                        $x++;

                    }
                }
                if ($this->_query->execute()) {
                    $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                    $this->_count = $this->_query->rowCount();
                } else {
                    $this->_error = true;
                }
            }
            return $this;
        }

}