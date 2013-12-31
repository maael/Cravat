<?php
class indexController extends \Cravat\Controller{
    public function index(){
        $this->view = "indexView";
        $user = new userEntity();
        $user = $user->get(1);
    }
} 