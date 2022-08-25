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
    $const = 'constant';
    $insert_db = mysqli_query($this->conn, "INSERT INTO  {$const('ADDRESSTABLE')}(name,address,city,age,country_id,state_id) VALUES ('$name','$address','$city','$age','$country','$state')");
    return $insert_db;
  }
  //this is for display query
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
  //this is for update query
  public function update_button($name, $address, $city, $age, $country, $state, $id)
  {
    $const = 'constant';
    $update_result = mysqli_query($this->conn, "Update {$const('ADDRESSTABLE')} set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id");
    return $update_result;
  }
  //this is for delete the the rows in address list page
  public function delete_db($extract_id)
  {
    $const = 'constant';
    $del = mysqli_query($this->conn, "DELETE FROM {$const('ADDRESSTABLE')} WHERE id IN($extract_id) ");
    return $del;
  }
  //this is for view all the the rows in address list page
  public function display_db()
  {

    // $q="select*from `address`";
    //echo ADDRESSTABLE;
    $const = 'constant';
    $q = "SELECT * from {$const('ADDRESSTABLE')}";
    $result = mysqli_query($this->conn, $q);
    return $result;
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
