<?php namespace Cravat;
abstract class Controller{
    protected $redirect = null;
    public $view = null;
    function __destruct(){
        Cravat::$view = $this->view;
        if(!is_null($this->redirect)){
            header("Location: ".$this->redirect);
            die();
        } else if(!is_null($this->view)){
            $view = new $this->view();
            $view->render();
        }
    }
    abstract public function index();
}
