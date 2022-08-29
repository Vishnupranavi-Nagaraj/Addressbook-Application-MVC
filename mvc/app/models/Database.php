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
        $this->logger = new Logger();
    }
    public function insert($table,$fields)
    {
        foreach($fields as $key=>$value)
        {
            $k[]=$key;
            $v[]="'".$value."'";
        }
        $key=implode(",",$k);
        $value=implode(",",$v);
        try{
            $insert=mysqli_query($this->conn,"Insert into $table ($key) values($value)");
            var_dump($insert);
            $this->logger->logquery();
            return $insert;
        }catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
    public function updatedetails($table,$fields,$id)
    {
        foreach ($fields as $key=>$value)
        {
            $columns[] = "$key = '$value'";
        }
        $query="UPDATE $table SET " .implode(', ', $columns);
        $update=mysqli_query($this->conn,"$query where id=$id");
        return $update;
    }
    public function delete($table,$id)
    {
        $delete=mysqli_query($this->conn,"DELETE FROM $table WHERE id IN($id)");
        print_r("DELETE FROM $table WHERE id IN($id)");
        return $delete;
    }
    public function displaydetails($table){
        $display=mysqli_query($this->conn,"SELECT * from $table");
        return $display;
    }
}