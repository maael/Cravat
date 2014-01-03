<?php
use Doctrine\ORM\EntityRepository;
class userGroupEntity extends User{
    private $users = array();
    public function load_all(){
        $userRepo = \Cravat\Cravat::$entityManager->getRepository('User');
        $this->users = $userRepo->findAll();
    }
    public function get(){
        return ((count($this->users)>0) ? $this->users : null);
    }
}