<?php    
 session_start();
 include '../db.php';
 header('Content-Type: application/json');
 
 $username = "SELECT name, mind, social, wake, temper FROM stats ORDER BY id DESC LIMIT 1";
 $result = $conn->query($username);

 //Displays name of user
 if ($conn->query($username) == TRUE) {
   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
       $playername = $row["name"];
       $mindTrait = $row["mind"];
       $socialTrait = $row["social"];
       $wakeTrait = $row["wake"];
       $temperTrait = $row["temper"];
       $data = array(
        'name' => $playername,
        'mind' => $mindTrait,
        'social' => $socialTrait,
        'wake' => $wakeTrait,
        'temper' => $temperTrait,
       );
       $jsonData = json_encode($data);
       
       echo $jsonData;
      };
   }else{
       echo "Error: " . $username . "<br>" . $conn->error;
     } 
 }else{
    echo "Error";
};


?>
