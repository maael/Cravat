<?php
class usersView extends \Cravat\View{
    public $template = 'users';
    public function render(){
        $this->tpl->assign('title','Users');
        $this->add('style','css/tie');
        $this->add('style','css/vendor/font-awesome-4.0.3/css/font-awesome.min');
        $users = new userGroupEntity();
        $users->load_all();
        $names = array();
        foreach($users->get() as $auser){
            array_push($names, $auser->getName());
        }
        $this->tpl->assign('user_list',$names);
    }
}