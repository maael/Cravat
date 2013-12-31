<?php
use \Cravat as Cravat;
use Doctrine\ORM\EntityRepository;
class userEntity extends Cravat\Entity{
    public function create($name,$password,$email){
        $user = new User();
        $user->setName($name);
        $user->setPassword($password);
        $user->setEmail($email);
        Cravat\Cravat::$entityManager->persist($user);
        Cravat\Cravat::$entityManager->flush();
    }
    public function get($id){
        return Cravat\Cravat::$entityManager->find('User', $id);
    }
}