<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "Weakpass$12";
    private $database = "addressbook";
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