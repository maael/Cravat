<?php
class usersView extends \Cravat\View{
    public $template = 'users';
    public function render(){
        $this->tpl->assign('title','Users');
        $this->add('css','css/tie.css');
        $this->add('css','css/vendor/font-awesome-4.0.3/css/font-awesome.min.css');
        $users = new userGroupEntity();
        $users->load_all();
        $names = array();
        foreach($users->get() as $auser){
            array_push($names, $auser->getName());
        }
        $this->tpl->assign('user_list',$names);
    }
}