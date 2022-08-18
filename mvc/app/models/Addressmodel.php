<?php
Class Addressmodel extends Database
{
    //this is for inserting query
    public function add_insert($name,$address,$city,$age,$country,$state)
    {
    $insert_db = mysqli_query($this->conn,"INSERT INTO `address` (name,address,city,age,country_id,state_id) VALUES ('$name','$address','$city','$age','$country','$state')");
    return $insert_db;
    }
    //this is for display query
    public function display()
    {
    $display=mysqli_query($this->conn,"Select * from address");
    return $display;
    }
     //this is for select query passing the url parameter
    public function update($buttonid){
     $id = $buttonid;
     $update_result=mysqli_query($this->conn,"Select *from address where id=$id");
     $row_data=mysqli_fetch_assoc($update_result);
     return $row_data;
    }
     //this is for update query
    public function update_button($name,$address,$city,$age,$country,$state,$id)
    {
     $update_result=mysqli_query($this->conn,"Update address set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id");
     return $update_result;
    }
    //this is for delete the the rows in address list page
    public function delete_db($extract_id){
        $del=mysqli_query($this->conn,"DELETE FROM address WHERE id IN($extract_id) ");
        return $del;
    }
     //this is for view all the the rows in address list page
    public function display_db(){
        
        $q="select*from `address`";
        $result=mysqli_query($this->conn,$q);
        return $result;

      
      }

}
?>