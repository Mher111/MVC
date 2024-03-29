<?php
namespace application\core;

 class View{
    public $path;
    public $route;
    public $layout='default';
    public function __construct($route)
    {
        $this->route=$route;
        $this->path=$route['controller'].'/'.$route['action'];
//        debug($this->path);
    }

    public function render($title,$vars=[]){
        extract($vars);
        ob_start();

        require 'application/views/'.$this->path.'.php';
        $content=ob_get_clean();
        require 'application/views/layouts/'.$this->layout.'.php';
    }
    public function redirect($url){
        header('location :'.$url);
        exit;
    }
    public static function errorCode($code){
        http_response_code($code);
        require 'application/views/errors'.$code.'.php';
        exit;
    }
}