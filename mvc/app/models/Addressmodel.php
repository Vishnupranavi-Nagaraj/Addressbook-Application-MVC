<?php
class Addressmodel extends Database
{
  /**
   * This function inherit all the function from the database class
   */
  public function __construct()
  {
    parent::__construct();
    $this->logger = new Logger();
  }
  /**
     * This add function gives the values to Database
     * @param $name,$address,$city,$age,$country,$state
     * @return $insert_status will return the values to the controller
     */
  public function add($name, $address, $city, $age, $country, $state)
  {
    $add_obj=new Database();
    $fields=array("name"=>"$name","address"=>"$address","city"=>"$city","age"=>$age,"country_id"=>$country,"state_id"=>$state);
    $insert_status=$add_obj->insert(ADDRESSTABLE,$fields);
    return $insert_status; 
  }
    /**
     * This function gives the values to Database
     * @param $name,$address,$city,$age,$country,$state,$id
     * @return $update_result will return the values to the controller
     */
  public function updaterecord($name, $address, $city, $age, $country, $state, $id)
  {
      $add_obj=new Database();
      $fields=array("name"=>"$name","address"=>"$address","city"=>"$city","age"=>$age,"country_id"=>$country,"state_id"=>$state,"id"=>"$id");
      $update_result=$add_obj->updatedetails(ADDRESSTABLE,$fields,$id);
      return $update_result;
  }
   /**
     * This function gives the values to Database
     * @param $extract_id
     * @return $update_result will return the values to the controller
     */
  public function deleterecord($extract_id)
  {
      $delete=new Database();
      $del=$delete->delete(ADDRESSTABLE,$extract_id);
      return $del;
  }
   /**
     * This function gives the values to Database
     * @return $result will return the values to the controller
     */
   public function display_db()
  {
    $display=new Database();
    $result=$display->displaydetails(ADDRESSTABLE);
    return $result;
  }
  /**
    * This function check for the addresstable values
    * @return $display will return the values to the controller
    */
  public function display()
  {
    $const = 'constant';
    $display = mysqli_query($this->conn, "Select * from {$const('ADDRESSTABLE')}");
    return $display;
  }
  /**
    * This function check for the updates in controller
    * @return $row_data will return the values to the controller
    */

  public function update($buttonid)
  {
    $const = 'constant';
    $update_result = mysqli_query($this->conn, "Select *from {$const('ADDRESSTABLE')} where id=$buttonid");
    $row_data = mysqli_fetch_assoc($update_result);
    return $row_data;
  }
   /**
    * This function check for the country database
    * @return $con will return the values to the controller
    */
  public function country_db()
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('COUNTRYTABLE')}");
    return $con;
  }
  /**
    * This function check for the state database
    * @return $con will return the values to the controller
    */
  public function state_db($c_id)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select* from {$const('STATETABLE')} where country_id = $c_id");
    return $con;
  }
  /**
    * This function will check a dropdown for country given id
    * @return $con will return the values to the controller
    */
  public function update_country($c_id)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('COUNTRYTABLE')} where id = $c_id");  
    return $con;
  }
  /**
    * This function will check a dropdown for state id according to the state id
    * @return $con will return the values to the controller
    */
  public function update_state($sid)
  {
    $const = 'constant';
    $con = mysqli_query($this->conn, "select*from {$const('STATETABLE')} where id = $sid");
    return $con;
  }
}
