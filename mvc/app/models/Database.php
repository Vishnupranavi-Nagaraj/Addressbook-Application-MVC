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
    public function insertinto($table,$fields)
    {
       foreach($fields as $key=>$value){
       $k[]=$key;
       $v[]="'".$value."'";
     }
     $key=implode(",",$k);
     $value=implode(",",$v);
     $insert=mysqli_query($this->conn,"Insert into $table ($key) values($value)");
     print_r("Insert into $table ($key) values($value)");
     return $insert;
    // echo $insert;
    }
}






















