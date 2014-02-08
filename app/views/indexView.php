<?php
class indexView extends \Cravat\View{
    public $template = 'index';
    public function render(){
        $this->tpl->assign('title','Cravat');
        $hey = \Cravat\Format::make()->tag('b')->format('hey');
        $less = \Cravat\Validation::make()->less_than(12);
        $this->tpl->assign('description','A simple PHP MVC framework');
        $this->add('css','css/tie.css');
        $this->add('css','vendor/css/font-awesome-4.0.3/css/font-awesome.min.css');
    }
}