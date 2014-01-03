<?php
use Doctrine\ORM\EntityRepository;
class userEntity extends User{
    private $user = null;
    function __construct(){
        $this->user = new User();
    }
    public function create($name,$password,$email){
        $this->user->setName($name);
        $this->user->setPassword($password);
        $this->user->setEmail($email);
        \Cravat\Cravat::$entityManager->persist($this->user);
        \Cravat\Cravat::$entityManager->flush();
    }
    public function load($id){
        $search = \Cravat\Cravat::$entityManager->find('User', $id);
        if(!is_null($search)){$this->user = $search;}
    }
    public function get(){
        return (is_null($this->user->getName()) ? null : $this->user);
    }
}