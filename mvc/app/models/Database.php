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
            $insert = mysqli_query($this->conn,"Insert into $table ($key) values($value)");
            $this->logger->logquery();
            if(!($insert=1)){

                throw new Exception('Number is zero.');
            }
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
        try{
        $query="UPDATE $table SET " .implode(', ', $columns);
        $update=mysqli_query($this->conn,"$query where id=$id");
        $this->logger->logquery();
        return $update;
        }
        catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
    public function delete($table,$id)
    {
        try{
        $delete=mysqli_query($this->conn,"DELETE FROM $table WHERE id IN($id)");
        print_r("DELETE FROM $table WHERE id IN($id)");
        $this->logger->logquery();
        return $delete;
        }catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
    public function displaydetails($table){
        try{
        $display=mysqli_query($this->conn,"SELECT * from $table");
        $this->logger->logquery();
        return $display;
        }
        catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
}