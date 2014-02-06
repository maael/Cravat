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
            $variable_routes = preg_grep('/\*/', array_keys($routes));
            foreach ($variable_routes as $route) {
                $pat = str_replace('*', '[^/]*/?', $route);
                $pat = '/^'.str_replace('/','\/',$pat).'$/';
                if(preg_match($pat,$path)){
                    $variable_path = $route;
                    $path_array = explode('/',$path);
                    $variable_index = array_keys(preg_grep('/^\*$/',explode('/',$variable_path)));
                    Cravat::$route_variables[] = $path_array[$variable_index[0]];
                    break;
                }
            }
            if(isset($variable_path)){
                Cravat::$page = new Page($routes[$variable_path]);
                Cravat::$page->load();
            } else {
                error::log_route("No controller/actions for '".$path."'");  
            }
        }
    }
}