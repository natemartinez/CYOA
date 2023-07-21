<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
   <div>
      <form id='login_form' action='login_chk.php' method='post'>
        <p class='error'><?php if(isset($_GET['error'])){
          echo $_GET['error'];
        } ?></p>
        <p class='success'><?php if(isset($_GET['success'])){
          echo $_GET['success'];
        } ?></p>
        <input type="text" name='user_name' for='user_name' placeholder='Username' required>
        <input type="text" id='pswd_input' name='password' for='password' placeholder='Password' required>
        <p id='pswd_err'></p>
        <button type='submit'>Submit</button> 
        <br>
        <br>
        <a href="signup.php">Create a new account</a>
        <br>
        <a href="index.php">Homepage</a>
      </form>

   </div>

   
    
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>