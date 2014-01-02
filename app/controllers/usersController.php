<?php
class usersController extends \Cravat\Controller{
    public function index(){
        $this->view = "usersView";
        $user = new userEntity();
        echo $user->get(1)->getName();
    }
} 