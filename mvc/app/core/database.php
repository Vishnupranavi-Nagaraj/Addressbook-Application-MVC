<?php

class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "Weakpass$12";
    public $database = "addressbook";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host,$this->username,$this->password,$this->database);

        if(!$this->conn)
        {
            echo "Not connect";
        }else{
            echo "Connected";
        }

    }
}

$obj=new Database();
   

?>