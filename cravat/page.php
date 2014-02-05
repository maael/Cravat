<?php namespace Cravat;
class Page{
    private $controller = null;
    private $action = null;
    private $view = null;
    function __construct($information){
        if(isset($information['controller'])){$this->controller = $information['controller'];}else{}
        if(isset($information['action'])){$this->action = $information['action'];}else{$this->action = 'index';}
        if(isset($information['view'])){$this->view = $information['view'];}
        return $this;
    }
    private function controller(){
        $controller = new $this->controller;
        $action = $this->action;
        $controller->$action();
    }
    private function view(){
        if(!is_null($this->view)){
            $view = new $this->view();
            $view->render();
        }
    }
    public function getController(){
        return $this->controller;            
    }
    public function getAction(){
        return $this->action;    
    }
    public function getView(){
        return $this->view;
    }
    public function setView($view){
        $this->view = $view;
    }
    public function load(){
        $this->controller();
        $this->view();
    }
}