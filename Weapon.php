<?php

/*

определяет победителя
вывод на экран результата боя

*/

class Weapon
{
    
    private $name;
    private $win_against; 
    
    public function __construct($name, $win_against) 
    {
        $this->name = $name;
        $this->win_against = $win_against;
    }
    
  
    public function displayWeapon(){
        return '<span class="chooseWeapon" name="'.$this->name .'" id="'.$this->name.'"><i'.$this->name .'></i><br>' . $this->name . '</span> ';
    }
        
    public function __toString()
    {
        return "\nWeapon // name = $this->name \n";
    }
    public function getName(){
        return $this->name;
    }
   
    
    static function setWinner($weapon1, $weapon2){
        
        if($weapon1->name === $weapon2->name){
            return array($weapon1, $weapon2);
        }
        else if( ($weapon1->name === $weapon2->win_against[0][1])){
            return $weapon2;
        }
        else if( ($weapon2->name === $weapon1->win_against[0][1]) ){
            return $weapon1;
        }
        else{
            return false;
        }
    }
    
    
    static function displayResult($weaponWinner, $weaponLooser){
        if( $weaponLooser->name === $weaponWinner->win_against[0][1]){
            return ucfirst($weaponWinner->name) . " " . $weaponWinner->win_against[0][0] . " " . ucfirst($weaponWinner->win_against[0][1]);
           
        }
        else if ($weaponLooser->name === $weaponWinner->win_against[1][1]){
            return ucfirst($weaponWinner->name) . " " . $weaponWinner->win_against[1][0] . " " . ucfirst($weaponWinner->win_against[1][1]);
        }
        else{
            return false;
        }
    }
}