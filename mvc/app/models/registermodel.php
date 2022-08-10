<?php
require_once "../core/database.php";
class registermodel extends Database
{
    
     public function register($email,$password){
          
          if (isset($_POST['button'])) {
               echo "hai";
               $email = $_POST['email'];
               $password = $_POST['password'];
               $sql = "INSERT INTO user ('email', 'password') VALUES ('$email','$password')";
               $result = $this->conn->query($sql);
               if ($result == TRUE) {
                 echo "New record created successfully.";
               }else{
                 echo "Error";
               } 
             }
     }
}



?>