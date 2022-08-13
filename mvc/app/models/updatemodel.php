<?php
//require "../app/core/Database.php";
Class Updatemodel extends Database{

public function update(){
   $id = 20;
   $sql="Select *from address where id=$id";
   $result=mysqli_query($this->conn,$sql);
   return $result;
}

public function update_table($id){

if(isset($_POST['updatebutton']))
{	 
	 $name = $_POST['name'];
	 $address = $_POST['address'];
     $city = $_POST['city'];
	 $age = $_POST['age'];
     $country = $_POST['country'];
     $state = $_POST['state'];
  
	 $sql = "Update address set name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id";
	 if (mysqli_query($this->conn, $sql)) {
       header("Location:update");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($this->conn);
	 }
	 mysqli_close($this->conn);
}else{

}
}


function updatecountry($country)
{
	$coun="select*from country where id = $country ";
	$counrseult=mysqli_query ($this->conn,$coun);
	return $counrseult;
}

function update_remaining_country($country){
	$coun="select*from country where id != $country";
	$counrseult=mysqli_query ($this->conn,$coun);
	return $counrseult;
}
function updatestate($state)
{
	$coun="select*from state where id = $state ";
	$staterseult=mysqli_query ($this->conn,$coun);
	return $staterseult;
}

function update_remaining_state($state){
	$coun="select*from state where id != $state";
	$staterseult=mysqli_query ($this->conn,$coun);
	return $staterseult;
}

}
?>

