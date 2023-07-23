<?php    
 session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CYOA</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

    <div id='hud-menu'>
       <div id='level-div'>
        <img id='level-circle' src="icons/level-circle.png" alt="black circle">
        <p>1</p>
       </div>
      
       <div class='hud-div' id='hp-div'>
        <img class='hud-img' id='hud-heart' src="icons/heart.png" alt="heart">
         <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
            40%
          </div>
         </div>
       </div>
       <div class='hud-div' id='energy-div'>
        <img class='hud-img' id='hud-energy' src="icons/energy.png" alt="lightning bolt">
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
            40%
          </div>
         </div>        
       </div>        
     
    </div>

    <div id='game-div'>
     <p>Example Text - Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit at suscipit quis iste, saepe vero dicta repellat</p>

     <button class='choice_btn'>Choice 1</button>
     <button class='choice_btn'>Choice 2</button>     
    </div>


    <div id='main-menu'>
     <p class='title'>Menu</p>
      <div id='menu-contents'>
        <div class='menu-div'>
         <a href="pages/character.php">Character</a>
        </div>
        <div class='menu-div'>
         <a href="pages/inventory.php">Inventory</a>
        </div>
        <div class='menu-div'>
        <a href="pages/skills.php">Skills</a>
        </div>                
        <div class='menu-div'>
        <a href="pages/goals.php">Goals</a>
        </div>                           
        <div class='menu-div'>
        <a href="pages/settings.php">Settings</a>
        </div>                           
      </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>

