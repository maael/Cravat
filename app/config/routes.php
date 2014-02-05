<?php
$routes = array(
    '' => array('controller' => 'indexController'),
    'admin' => array('controller'=> 'adminController'),
    'admin/settings' => array('controller' => 'adminController','action' => 'settings'),
    'users' => array('controller'=> 'usersController')
);