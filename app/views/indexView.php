<?php
class indexView extends \Cravat\View{
    public $template = 'index';
    public function render(){
        $this->tpl->assign('title','Cravat');
        $this->tpl->assign('description','A simple PHP MVC framework');
        $this->add('style','css/tie');
        $this->add('style','css/vendor/font-awesome-4.0.3/css/font-awesome.min');
    }
}