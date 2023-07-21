<?php
 session_start();
 include 'db.php';

 if(isset($_POST['user_name']) && isset($_POST['password'])){
   
   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
  
    $user_name = test_input($_POST['user_name']); 
    $password = test_input($_POST['password']);

    $user_data = 'Username:' . $user_name . "Password" . $password;
   

    if (empty($user_name)) {
        header("Location: login.php?error=User Name is required&$user_data");
        exit();
    } else if(empty($password)){
        header("Location: login.php?error=Password is required&$user_data");
        exit();
    }  else{
        $password = md5($password);

       $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";
       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) > 0){
        header("Location: login.php?success=Welcome back, $user_name&$user_data");
        $_SESSION['user_name'] = $user_name; 
        header("Location: index.php");
        exit();
       }else{
        header("Location:login.php?error=Account doesn't exist");
        exit();
       }
    }



 } 

?>