<?php namespace Cravat;
class Router{
    static public $controller;
    static public $action;
    static public function route($routes){
        $path = trim(str_replace(APP_BASE,'',$_SERVER['REQUEST_URI']),'/');
        $path = explode('?', $path)[0];
        if(array_key_exists($path, $routes)){
            (array_key_exists('action', $routes[$path])) ? $action = $routes[$path]['action'] : $action = 'index'; 
            Cravat::$page = new Page($routes[$path]);
            Cravat::$page->load();
        } else {
            error::log_route("No controller/actions for '".$path."'");
        }
    }
}