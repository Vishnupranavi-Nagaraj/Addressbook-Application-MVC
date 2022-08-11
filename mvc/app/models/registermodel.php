<?php

Class Registermodel extends Database
{
    public function reg()
    {
    if(isset($_POST['registerbutton'])){
     $email    = $_POST['email'];
    $email    = mysqli_real_escape_string($this->conn, $email);
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($this->conn, $password);
    $query    = "INSERT into `user` (email, password)
               VALUES ('$email', MD5('$password'))";         
    $result   = mysqli_query($this->conn, $query);
    if ($result){
     header("Location:login");
    }
    else{
        echo "fail";
    }
    } 
}
}
?>