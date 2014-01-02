<?php
class indexView extends \Cravat\View{
    public $template = 'index';
    public function render(){
        $this->tpl->assign('title','Home');
    }
}