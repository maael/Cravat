<?php
class usersView extends \Cravat\View{
    public $template = 'users';
    public function render(){
        $this->tpl->assign('title','Hello!');
        $this->add('style','users');
        $this->add('script','test');
    }
}