
<?php
/* инициализация игры, 
   сравнение оружия, 
   возвращает результат,который будет отображаться  */

class Game
{
    
    private $player1;
    private $player2;
    private $winnerName;
   
    public function __construct($player1, $player2) 
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    
    
    public function getWinnerName(){
        return $this->winnerName;
    }
    
    
    public function getPlayer1(){
        return $this->player1;
    }
    
   
    public function getPlayer2(){
        return $this->player2;
    }
    
    
  
    public function play(){
        
        $winningWeapon = Weapon::setWinner($this->player1->getWeapon(),$this->player2->getWeapon());
        $resultSentence = "";
        
        if (is_array($winningWeapon)){
          $resultSentence = "It's a tie !";
          $this->winnerName = "It's a tie !";
        }
        else if($winningWeapon === $this->player1->getWeapon()){
          $resultSentence = Weapon::displayResult($this->player1->getWeapon(), $this->player2->getWeapon()) . " : ". $this->player1->getName() . " wins !";
          $this->winnerName = $this->player1->getName();
        }
        else if($winningWeapon === $this->player2->getWeapon()){
          $resultSentence = Weapon::displayResult($this->player2->getWeapon(),$this->player1->getWeapon()) . " : ". $this->player2->getName() . " wins !";
          $this->winnerName = $this->player2->getName();
        }
        else{
          $resultSentence = "Error";
        }
        
            
        return $resultSentence;
    }
    
    public function initGame(){
        $this->player1 = null;
        $this->player2 = null;
        $this->winnerName = null;
    }
    
}