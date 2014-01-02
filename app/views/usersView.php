<?php
class usersView extends \Cravat\View{
    public $template = 'users';
    public function render(){
        $this->tpl->assign('title','Users');
    }
}