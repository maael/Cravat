<?php namespace Cravat;
class Router{
    static public $controller;
    static public $action = 'index';
    static public function route($routes){
        $parts = explode(DS,BASE);
        $pattern = "/^(".implode($parts,")?(\/").")\/?/";
        $path = preg_replace($pattern,"",$_SERVER['REQUEST_URI']);
        $path = trim(explode("?",$path)[0],'/');
        if(array_key_exists($path, $routes)){
            $controller = new $routes[$path]();
            Cravat::$controller = $routes[$path];
            Cravat::$action = 'index';
            $controller->index(); 
        } else {
            $actionless_path = explode('/',$path);
            $action = array_pop($actionless_path);
            $actionless_path = implode('/',$actionless_path);
            if(array_key_exists($actionless_path, $routes)){
                $controller = new $routes[$actionless_path]();
                if(in_array($action,get_class_methods($controller))){
                    Cravat::$controller = $routes[$actionless_path];
                    Cravat::$action = $action;
                    $controller->$action(); 
                } else {
                    error::log_route("No Action '".$action."' exists for Controller '".(($actionless_path=="") ? "index" : $actionless_path)."'");
                } 
            } else {
                error::log_route("No controller/actions for '".$path."'");
            }
        }
    }
}