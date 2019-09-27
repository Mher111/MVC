<?php
    Class AboutUs extends Controller{
        public static function test(){
            print_r(self::query('SELECT * FROM users'));
        }
        public static function id($id){
            echo $id;
        }
    }