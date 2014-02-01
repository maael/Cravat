<?php
class indexController extends \Cravat\Controller{
    public function index(){
        $this->view = "indexView";
        $hey = \Cravat\Format::make()->tag('b')->format('hey');
        $less = \Cravat\Validation::make()->less_than(12);
    }
}