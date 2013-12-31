<?php
class adminController extends \Cravat\Controller{
    public function index(){
        $this->view = "adminView";
    }
    public function settings(){
        echo "settings loaded";
    }
} 