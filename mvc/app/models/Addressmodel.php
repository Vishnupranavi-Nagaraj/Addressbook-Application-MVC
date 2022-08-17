<?php
Class Addressmodel extends Database
{
    public function insert($name,$address,$city,$age,$country,$state)
    {
    $sql = mysqli_query($this->conn,"INSERT INTO `address` (name,address,city,age,country_id,state_id)VALUES ('$name','$address','$city','$age','$country','$state')");
    return $sql;
    }
    public function display()
    {
    $display=mysqli_query($this->conn,"Select * from address");
    return $display;
    }
    public function update($name,$address,$city,$age,$country,$state,$buttonid)
    {
        $id=$buttonid;
        $update=mysqli_query($this->conn,"Update address set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id");
       // $sql = "Update address set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id";
        $value=mysqli_fetch_assoc($update);
        return $value;
    }
    public function delete($extract_id){
        $del=mysqli_query($this->conn,"DELETE FROM address WHERE id IN($extract_id) ");
        return $del;
    }

}
?>