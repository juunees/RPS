<?php

class Player
{
    
    private $id;
    private $name; 
    
    private $weapon;
    
    public function __construct($id, $name) 
    {
        $this->name = $name;
        $this->id = $id;
        $this->weapon = null;
    }
    
    public function getWeapon(){
        return $this->weapon;
    }
    
    public function setWeapon($weapon){
        $this->weapon = $weapon; 
    }
    
    public function isReady(){
        if ($this->weapon !== false && $this->weapon !== null){
            return true;
        }
        return false;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function __toString()
    {
        return "\nPlayer// id = $this->id, name = $this->name \n";
    }
    
    public function initWeapon(){
        $this->weapon = null;
    }
    
    public function getName(){
        return $this->name;
    }
 
}