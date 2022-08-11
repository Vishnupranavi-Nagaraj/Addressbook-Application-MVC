<?php
Class Loginmodel extends Database{
    public function log(){
    if (isset($_POST['loginbutton'])) {
        $email = stripslashes($_POST['email']);   
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($this->conn, $password);
        $query    = "SELECT * FROM `user` WHERE email='$email'
                     AND password=MD5('$password')";
        $result = mysqli_query($this->conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1)
         {
          echo '<script>alert("welcome")</script>';
          header("Location:addresslist.php");
         } else
          {
          echo '<script>alert("invalid Username or password")</script>';
         }
        } else{
        echo "Not valid";
       }
}
}
?>

