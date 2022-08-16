<?php
Class Authmodel extends Database
{
    public function register($email,$password)
    {
    $query    = mysqli_query($this->conn,"INSERT into `user` (email, password)
               VALUES ('$email', MD5('$password'))");   
    return $query;
    }
    public function login($email,$password)
    {
        $var  = mysqli_query($this->conn,"SELECT * FROM `user` WHERE email='$email' AND password=MD5('$password')");
        $rows = mysqli_num_rows($var);
        return $rows;

    }

}
?>
    
<!-- //helpers
//raw queries
//isset not use
//controller should send data to mdel and the to view
//loggers->create 4hrs
error logger
notice,warning
db loggers//identify -->