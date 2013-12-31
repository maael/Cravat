<?php namespace Cravat;
abstract class Controller{
    protected $redirect = null;
    protected $view = null;
    function __destruct(){
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
