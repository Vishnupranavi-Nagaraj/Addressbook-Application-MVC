<?php

class Database
{
    public $conn;

    public function __construct()
    
    {
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(!$this->conn)
        {
            echo "Not connect";
        }

    }
}



?>