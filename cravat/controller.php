<?php namespace Cravat;
abstract class Controller{
    protected $redirect = null;
    public $view = null;
    function __destruct(){
        if(!is_null($this->view)){
            $page = Cravat::$page;
            $page->setView($this->view);
        }
        if(!is_null($this->redirect)){
            header("Location: ".$this->redirect);
            die();
        }
    }
    abstract public function index();
}
