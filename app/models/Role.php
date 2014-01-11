<?php
class Role{
    protected $id;
    protected $role;
    public function getId(){
        return $this->id;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }
}