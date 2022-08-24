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

    // public function convertArray($fields)
    // {
    //     //process
    //     //keys//values
    //     print_r($fields);
    //     foreach($fields as $key=>$value){
    //        print_r("$key=$value"); 
    //     }
    // }

    public function insertinto($table,$fields)
    {
       // print_r($fields);
       // exit;
    

       foreach($fields as $key=>$value){
        //print_r("$key=$value"); 
        //print "Insert into $table (arraykeys ) values (arrayvalues(fields))";
        //insert into tsbl_name(``,``) values ('','');
        //insert into table values('$emaolid','$pwd');
        
        print_r("Insert into $table ($key) values($value)");
        $insert=mysqli_query($this->conn,"Insert into $table ($key) values($value)");
        //
        return $insert;
       }
    }
    
    

}






















