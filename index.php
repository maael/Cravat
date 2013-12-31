<?php namespace Cravat;
    require_once('cravat'.DIRECTORY_SEPARATOR.'cravat.php');
    Cravat::initialize();
    $router = new Router;
    $router->route(Cravat::$routes);