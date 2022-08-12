<?php
Class Updatemodel extends Database{
function update(){
$id=$_GET['buttonid'];
$sql="Select *from address where id=$id";
$result=mysqli_query($this->conn,$sql);
$row=mysqli_fetch_assoc($result);
$name = $row['name'];
$address = $row['address'];
$city = $row['city'];
$age = $row['age'];
$country = $row['country_id'];
$state = $row['state_id'];

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
}
?>

