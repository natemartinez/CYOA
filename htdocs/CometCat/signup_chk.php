<?php
 session_start();
 include 'db.php';

 if(isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password']) && 
   isset($_POST['re_password'])){
   
   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
  
    $user_name = test_input($_POST['user_name']); 
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $re_password = test_input($_POST['re_password']);

    $user_data = 'Username:' . $user_name . "Password" . $password . "email" . $email;
   

    if (empty($user_name)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if(empty($re_password)){
        header("Location: signup.php?error=Reentering your password is required&$user_data");
        exit();
    } else if($password !== $re_password){
        header("Location: signup.php?error=Your password doesn't match&$user_data");
        exit();
    } else{
       $password = md5($password);

       $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
       $result = mysqli_query($conn, $sql);

       $sql2 = "SELECT * FROM users WHERE email = '$email'";
       $result2 = mysqli_query($conn, $sql2);

       if(mysqli_num_rows($result) > 0){
        header("Location: signup.php?error=The username is already taken&$user_data");
        exit();
       } elseif(mysqli_num_rows($result2) > 0){
        header("Location: signup.php?error=The email is already taken&$user_data");
        exit();
       } else{
        $sql3= "INSERT INTO users (user_name, password, email) VALUES(
                 '$user_name', '$password', '$email')";
        $result3 = mysqli_query($conn, $sql3);

        if($result3){
           $_SESSION['user_name'] = $user_name; 
           header("Location:signup.php?success=Your account has been created");
           header("Location:index.php?");
            exit();
        }

       }
    }



 } 

?>