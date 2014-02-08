<?php
class adminView extends \Cravat\View{
    public $template = 'admin';
    public function render(){
        $this->tpl->assign('title','Admin|'.\Cravat\Cravat::$page->getAction());
        $this->add('css','css/tie.css');
        $this->add('css','vendor/css/font-awesome-4.0.3/css/font-awesome.min.css');
    }
}