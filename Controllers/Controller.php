<?php

     Class Controller extends BaseModel {
        public static function CreateView($viewname){
            require_once './Views/'.$viewname.'.php';
        }
//         public static function CreateViewParam($viewname,$id){
//             require_once './Views/'.$viewname.'.php';
//         }

     }