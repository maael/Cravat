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
        if(isset($_GET['debug'])&&Cravat::$devMode){
            Debug::output();
        }
    }
    abstract public function index();
}
