<?php

/*
определение видов оружия : оружие - кого побеждает 
*/

class WeaponList {
 
   private static $_instance = null;
   
    private $weaponList;
    
    private function __construct() { 
        
        $this->weaponList = array(
            array('name' => 'rock',       'win_against' => array( array('crushes','scissors')    )),
            array('name' => 'paper',      'win_against' => array( array('covers','rock')         )),
            array('name' => 'scissors',   'win_against' => array( array('cuts','paper')          )),
            );
    }
    
    public function getWeaponArray(){
        return $this->weaponList;
    }
 
    
   public static function getInstance() {
 
     if(is_null(self::$_instance)) {
       self::$_instance = new WeaponList();  
     }
     return self::$_instance;
   }
}
 
?>