<?php
class addmodel
{

    public function insert($name,$address,$city,$age,$country_id,$state_id)
    {
        $insert = "INSERT INTO address(name,address,city,age,country_id,state_id) VALUES ('".$name."','".$address."','".$city."','".$country_id."',,'".$state_id."')";
        $inserting = mysqli_query($this->conn,$insert);
        return $inserting;
    }
}



?>