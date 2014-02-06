<?php
class usersController extends \Cravat\Controller{
    public function index(){
        if(isset($_GET['id'])){$this->view = 'userView';}
        else{
            if(isset(Cravat\Cravat::$route_variables[0])){
                $_GET['id'] = Cravat\Cravat::$route_variables[0];
            }
        }
    }
} 