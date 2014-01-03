<?php
class usersController extends \Cravat\Controller{
    public function index(){
        $this->view = "usersView";
        if(isset($_GET['id'])){
            $this->view = "userView";
            $user = new userEntity();
            $user->load($_GET['id']);
        } else {
            $users = new userGroupEntity();
            $users->load_all();
            foreach($users->get() as $auser){
                echo $auser->getName();
                echo '<br/>';
            }
        }
        if(isset($user)&&!is_null($user)){
            echo (is_null($user->get()) ? 'No user with id '.$_GET['id'].' exists' : $user->get()->getPassword());
        }
    }
} 