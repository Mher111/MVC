<?php

     Class Controller extends Database {
        public static function CreateView($viewname){
            require_once './Views/'.$viewname.'.php';
        }

     }