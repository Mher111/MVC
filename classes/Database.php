<?php
    Class Database{
        public static $host   = 'localhost';
        public static $user   = 'root';
        public static $dbname = 'users';
        public static $pass   = '';


        private static function connect()
        {
            $pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname,self::$user,self::$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }


        public static function query($query,$params=array()){
            $stmt=self::connect()->prepare($query);
            $stmt->execute($params);
            if (explode(' ',$query)[0]=='SELECT'){
                $data=$stmt->fetchAll();
                return $data;
            }
        }

}