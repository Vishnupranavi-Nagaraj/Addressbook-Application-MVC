<?php
class Addressmodel extends Database
{
  //
  public function __construct()
  {
    parent::__construct();
    $this->logger = new Logger();
  }
   
  public function add_insert($name, $address, $city, $age, $country, $state)
  {
    try
    {
      $add_obj=new Database();
      $fields=array("name"=>"$name","address"=>"$address","city"=>"$city","age"=>$age,"country_id"=>$country,"state_id"=>$state);
      $insert_status=$add_obj->insertinto(ADDRESSTABLE,$fields);
      $this->logger->logquery($insert_status);
      return $insert_status;
    }
    catch(Exception $error){
      $this->logger->logerror($error);
    }
  }
 
  //this is for update query
  public function update_button($name, $address, $city, $age, $country, $state, $id)
  {
      $add_obj=new Database();
      $fields=array("name"=>"$name","address"=>"$address","city"=>"$city","age"=>$age,"country_id"=>$country,"state_id"=>$state,"id"=>"$id");
      $update_result=$add_obj->update_into(ADDRESSTABLE,$fields,$id);
      return $update_result;
  }
  //this is for delete the the rows in address list page
  public function delete_db($extract_id)
  {
      $delete=new Database();
      $del=$delete->delete_into(ADDRESSTABLE,$extract_id);
      return $del;
  }
  //this is for view all the the rows in address list page
  public function display_db()
  {
    $display=new Database();
    $result=$display->display_into(ADDRESSTABLE);
    return $result;
  }
  public function display()
  {
    $const = 'constant';
    $display = mysqli_query($this->conn, "Select * from {$const('ADDRESSTABLE')}");
    return $display;
  }
  //this is for select query passing the url parameter
  public function update($buttonid)
  {
    $const = 'constant';
    $update_result = mysqli_query($this->conn, "Select *from {$const('ADDRESSTABLE')} where id=$buttonid");
    $row_data = mysqli_fetch_assoc($update_result);
    return $row_data;
  }
  //This is for viewing the country in a dropdown
  public function country_db()
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('COUNTRYTABLE')}");
    return $con;
  }
  public function state_db($c_id)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select* from {$const('STATETABLE')} where country_id = $c_id");
    return $con;
  }
  public function update_country($c_id)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('COUNTRYTABLE')} where id = $c_id");  
    return $con;
  }
  public function update_state($sid)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('STATETABLE')} where id = $sid");
    return $con;
  }
}
