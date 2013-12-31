<?php namespace Cravat;
    require_once('cravat'.DIRECTORY_SEPARATOR.'cravat.php');
    Cravat::initialize();
    Router::route(Cravat::$routes);