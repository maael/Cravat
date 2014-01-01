<?php
class adminView extends \Cravat\View{
    public $template = 'admin';
    public function render(){
        $this->tpl->assign('title','Admin');
    }
}