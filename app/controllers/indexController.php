<?php
class indexController extends \Cravat\Controller{
    public function index(){
        $this->view = "indexView";
        echo \Cravat\Format::make()->tag('b')->format('hey');
        echo '<br/>';
    }
}