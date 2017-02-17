<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="prs.css" />

    </head>
    
    <body>


    <header class="inTheGame">
        <h1><small>Rock, Paper, Scissors </small><br/>
        Player VS Player</h1>

    </header>
        
    <div class="wrapper">    
        <section id="score">
            <p><strong>Score</strong><br>
            Player 1 : <span id="j1">0</span><br>
            Player 2 : <span id="j2">0</span>
            </p>
            <div id="multiplayers"><em>Multiplayers : </em><br></div>
            
            
        </section>

        <section id="game">
            <?php
    
                $weaponListObj = WeaponList::getInstance();
    
                $weaponsArray = [];
                foreach ($weaponListObj->getWeaponArray() as $weapon){
                    $temp_weapon = new Weapon($weapon["name"],$weapon["win_against"]);
                    array_push($weaponsArray,$temp_weapon);
                }
    
            ?>
            
        
            <div id = "first" class="choose">
            
                <?php
                    foreach($weaponsArray as $weapon){
    
                        echo $weapon->displayWeapon();
                    }
                ?>
            </div>
            <h2>VS</h2>
            <div id="second">
                <span class="opponentWeapon" name="opponent" id="opponent"><i></i></span> 
            </div>
            
            <div class="result">
                <h2><span id="winner"></span> <span id="playAgain">Play again</span></h2>
            </div>
            
        </section>

    </div>    
     
     <script src="jscript.js"></script>
    
  </body>
</html>