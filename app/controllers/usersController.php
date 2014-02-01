<?php
class usersController extends \Cravat\Controller{
    public function index(){
        $this->view = "usersView";
        if(isset($_GET['id'])){$this->view = "userView";}
    }
} 