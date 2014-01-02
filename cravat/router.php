<?php namespace Cravat;
class Router{
    static public $controller;
    static public $action = 'index';
    static public function route($routes){
        $path = trim(str_replace(APP_BASE,'',$_SERVER['REQUEST_URI']),'/');
        $path = explode('?', $path)[0];
        if(array_key_exists($path, $routes)){
            $controller = new $routes[$path]();
            $controller->index(); 
        } else {
            $actionless_path = explode('/',$path);
            $action = array_pop($actionless_path);
            $actionless_path = implode('/',$actionless_path);
            if(array_key_exists($actionless_path, $routes)){
                $controller = new $routes[$actionless_path];
                if(in_array($action,get_class_methods($controller))){ 
                    $controller->$action(); 
                } else {
                    error::log_route("No Action '".$action."' exists for Controller '".(($actionless_path=="") ? "index" : $actionless_path)."'");
                } 
            } else {
                error::log_route("No controller/actions for '".$path."'");
            }
        }
        Cravat::$controller = get_class($controller);
        Cravat::$action = isset($action)? $action : 'index';
    }
}