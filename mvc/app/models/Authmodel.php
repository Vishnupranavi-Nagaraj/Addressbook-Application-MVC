<?php
Class Authmodel extends Database
{
    //This is for register page insert query
    public function register($email,$password)
    {
    $query    = mysqli_query($this->conn,"INSERT into `user` (email, password)
               VALUES ('$email', MD5('$password'))");   
    return $query;
    }
    //Here we are checking with username and password is present in DB
    public function login_validation($email,$password)
    {
        $var  = mysqli_query($this->conn,"SELECT * FROM `user` WHERE email='$email' AND password=MD5('$password')");
        $rows = mysqli_num_rows($var);
        return $rows;                                                                                                                           

    }

}
?>
    
