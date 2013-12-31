<?php
class indexView extends \Cravat\View{
    public function render(){
        $this->template->assign('title','Hello!');
        $this->draw('index');
    }
}