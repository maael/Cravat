<?php
class usersController extends \Cravat\Controller{
    public function index(){
        if(isset($_GET['id'])){$this->view = 'userView';}
    }
} 