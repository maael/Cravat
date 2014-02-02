<?php
class indexView extends \Cravat\View{
    public $template = 'index';
    public function render(){
        $this->tpl->assign('title','Cravat');
        $this->tpl->assign('description','A simple PHP MVC framework');
        $this->add('css','css/tie.css');
        $this->add('css','css/vendor/font-awesome-4.0.3/css/font-awesome.min.css');
    }
}