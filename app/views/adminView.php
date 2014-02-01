<?php
class adminView extends \Cravat\View{
    public $template = 'admin';
    public function render(){
        $this->tpl->assign('title','Admin|'.\Cravat\Cravat::$action);
        $this->add('style','css/tie');
        $this->add('style','css/vendor/font-awesome-4.0.3/css/font-awesome.min');
    }
}