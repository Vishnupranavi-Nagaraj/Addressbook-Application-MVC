<?php
abstract class Db{
    abstract function insert($table,$fields);
    abstract function updatedetails($table,$fields,$id);
    abstract function delete($table,$id);
    abstract function displaydetails($table);
}
class Database extends Db
{
    public $conn;
    /**
     * This function is used for database connections
     */
    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(!$this->conn)
        {
            echo "Not connect";
        }
        $this->logger = new Logger();
    }
     /**
     * This function fetch records from the model as key value pairs
     * @param $table,$fields are the parameters passed inside
     * @return $insert will return the values to the controller
     */
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
            //$insert = mysqli_query($this->conn,"Insert into $table ($key) values($value)");
            $insertquery="Insert into $table ($key) values($value)";
            $insert=$this->conn->prepare($insertquery);
            $insert->execute();
            $this->logger->logquery($insertquery);
            if(!($insert=1)){
                throw new Exception('Number is zero.');
            }
            return $insert;
        }catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
     /**
     * This function fetch records from the model as key value pairs
     *@param $table,$fields,$id are the parameters passed inside
     * @return $update will return the values to the controller
     */
    public function updatedetails($table,$fields,$id)
    {
        foreach ($fields as $key=>$value)
        {
            $columns[] = "$key = '$value'";
        }
        try{
        $query="UPDATE $table SET " .implode(', ', $columns);
        $update=mysqli_query($this->conn,"$query where id=$id");
        $updatequery="$query where id=$id";
        $this->logger->logquery($updatequery);
        return $update;
        }
        catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
     /**
     * This function fetch records from the model as key value pairs
     * @param $table,$id are the parameters passed inside
     * @return $delete will return the values to the controller
     */
    public function delete($table,$id)
    {
        try{
        $delete=mysqli_query($this->conn,"DELETE FROM $table WHERE id IN($id)");
        $deletequery="DELETE FROM $table WHERE id IN($id)";
        $this->logger->logquery($deletequery);
        return $delete;
        }catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
     /**
     * This function fetch records from the model as key value pairs
     * @param $table are the parameters passed inside
     * @return $displaydetails will return the values to the controller
     */
    public function displaydetails($table){
        try{
        $display=mysqli_query($this->conn,"SELECT $table.id,$table.file,$table.name,$table.address,$table.city,country.cname,state.sname  from $table JOIN country ON $table.country_id= country.id join state on $table.state_id = state.id ORDER BY $table.id DESC");
        $displayquery="SELECT address.id,address.name,address.address,address.city,country.cname,state.sname  from address JOIN country ON address.country_id= country.id join state on address.state_id = state.id";
        $this->logger->logquery($displayquery);
        return $display;
        }
        catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
}