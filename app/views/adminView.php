<?php
use \Cravat\Validation as Validator;
class adminView extends \Cravat\View{
    public function render(){
        $this->template->assign('title','Admin');
        $this->template->assign('isEmail',Validator::choice(array(3,4),2));
        $this->draw('admin');
    }
}