<?php
class registermodel extends Database
{
     public function register(){
          if (isset($_POST['button'])) {
               $email = $_POST['email'];
               $password = $_POST['password'];
               $sql = "INSERT INTO user('email', 'password') VALUES ('$email','$password')";
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