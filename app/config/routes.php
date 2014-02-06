<?php
$routes = array(
    '' => array('controller' => 'indexController', 'view' => 'indexView'),
    'home' => array('controller' => 'indexController', 'view' => 'indexView'),
    'admin' => array('controller' => 'adminController', 'view' => 'adminView'),
    'admin/settings' => array('controller' => 'adminController','action' => 'settings', 'view' => 'adminView'),
    'users' => array('controller' => 'usersController', 'view' => 'usersView'),
    'user/*' => array('controller' => 'usersController', 'view' => 'userView')
);