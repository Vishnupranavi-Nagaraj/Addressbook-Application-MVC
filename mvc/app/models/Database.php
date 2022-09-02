<?php
class Database
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
            $insert = mysqli_query($this->conn,"Insert into $table ($key) values($value)");
            $insert1="Insert into $table ($key) values($value)";
            $this->logger->logquery($insert1);
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
        $update1="$query where id=$id";
        $this->logger->logquery($update1);
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
        $delete1="DELETE FROM $table WHERE id IN($id)";
        $this->logger->logquery($delete1);
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
        $display=mysqli_query($this->conn,"SELECT address.id,address.name,address.address,address.city,country.cname,state.sname  from address JOIN country ON address.country_id= country.id join state on address.state_id = state.id ORDER BY address.id DESC");
        $display1="SELECT address.id,address.name,address.address,address.city,country.cname,state.sname  from address JOIN country ON address.country_id= country.id join state on address.state_id = state.id";
        $this->logger->logquery($display1);
        return $display;
        }
        catch(Exception $error){
            $this->logger->logerror($error);
        }
    }
}