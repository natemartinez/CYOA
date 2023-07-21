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
    <link rel="stylesheet" href="menu-styles/character.css">
  
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

    <div id='char-menu'>
     <a href="../index.php"><img id='back-arrow' src="../images/back-arrow.png" alt=""></a>
     <div id='bio-link' class='char-links'>
        <button id='bio-btn'>Bio</button>
     </div>       
     <div id='dna-link' class='char-links'>
        <button id='dna-btn'>DNA</button>
     </div>       
     <div id='stats-link' class='char-links'>
        <button id='stats-btn'>Stats</button>
     </div>         
    </div>

    <div id='char-wrapper'>
        <div class='char-content' id='bio-content'>    
          <div id='bio-stats'>
            <div>
             <p>Name:</p>
             <p>Type:</p>
             <p>Birthplace:</p>
             <p>Birthdate:</p>
            </div>
            <div id='profile'></div>            
          </div>

          <div id='bio-history'>
            <h2 class='text-center'>History</h2>
          </div>
        </div>
        <div class='char-content content-deactive' id='dna-content'>

          <p>Put the user's overall type here(MBTI)</p>

          <div id='brain-div'>
            <img id='brain' src="../images/demo-brain.png" alt="top view of brain">
            <div id='brain-title'>
             <p>Left-brained</p>
             <p>Right-brained</p> 
            </div>
            
          </div>     

          <div id='dna-stats'>
            <div class='dna-div' id='left-div'>
              <img class='social-img' id='intro-img' src="../images/introvert.png" alt="">  
              <p>Introverted</p>
              <img id='earlybird-img' src="../images/earlybird.png" alt="">
              <p>Early Bird</p>
              <img id='snowflake-img' src="../images/snowflake.png" alt="">
              <p>Cold-blooded</p>              
            </div>
            <div class='dna-div' id='right-div'>
              <img class='social-img' id='extro-img' src="../images/extrovert.png" alt=""> 
              <p>Extroverted</p>
            
              <img id='nightowl-img' src="../images/nightowl.png" alt="">              
              <p>Night Owl</p>

              <img id='flame-img' src="../images/flame.png" alt="">
              <p>Hot-headed</p>              
                         
            </div>
          </div>
  
        </div>
        <div class='char-content content-deactive' id='stats-content'>
          <p>Attributes</p> 
          <ul>
            <li>Strength:</li>
            <li>Willpower:</li>
            <li>Technique:</li>
            <li>Agility:</li>
            <li>Intuition:</li>
            <li>Perception:</li>
          </ul>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../script.js"></script>
</body>
</html>

