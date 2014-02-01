<?php
class userView extends \Cravat\View{
    public $template = 'users';
    public function render(){
        $this->tpl->assign('title','User');
        $this->add('style','css/tie');
        $this->add('style','css/vendor/font-awesome-4.0.3/css/font-awesome.min');
        $user = new userEntity();
        $user->load($_GET['id']);
        if(isset($user)&&!is_null($user->get())){
            $this->tpl->assign('user',$user->get()->getName());
        }
    }
}