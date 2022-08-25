<?php

class Database
{
    public $conn;

    public function __construct()//scope
    
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
    public function update_into($table,$fields,$id){
        foreach($fields as $key=>$value){
            $k[]=$key;
            $v[]="'".$value."'";
          }
          //query=concat..;
          $key=implode(",",$k);
          $value=implode(",",$v);
          
          $update=mysqli_query($this->conn,"Update $table ($key)($value) where id=$id");
          //"Update {$const('ADDRESSTABLE')} set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id";
          print_r("Update $table SET ($key)=($value) where id=$id");
          return $update;
    }
    public function delete_into($table,$id)
    {
        $delete=mysqli_query($this->conn,"DELETE FROM $table WHERE id IN($id)");
        print_r("DELETE FROM $table WHERE id IN($id)");
        return $delete;
    }
    public function display_into($table){
        $display=mysqli_query($this->conn,"SELECT * from $table");
        return $display;
    }
}