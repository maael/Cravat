<?php namespace Cravat;
class Router{
    static public $controller;
    static public $action;
    static public function route($routes){
        $path = trim(str_replace(APP_BASE,'',$_SERVER['REQUEST_URI']),'/');
        $path = explode('?', $path)[0];
        if(array_key_exists($path, $routes)){
            $controller = new $routes[$path]['controller']();
            if(array_key_exists('action', $routes[$path])){
                $action = $routes[$path]['action'];
                self::$action = $action; 
                $controller->$action();
            } else {
                self::$action = 'index';
               $controller->index(); 
            }
        } else {
            error::log_route("No controller/actions for '".$path."'");
        }
        Cravat::$controller = get_class($controller);
        Cravat::$action = isset($action)? $action : 'index';
    }
}