<?php
Class Updatemodel extends Database{
// public function update(){
// 	$id=$_GET['updateid'];
// 	echo "$id";
//     if (isset($_POST['Update'])) {
//     $name = $_GET['name'];
// 	echo $name;
//     $address = $_POST['address'];
//     $city = $_POST['city'];
//     $age = $_POST['age'];
//     $country = $_POST['country_id'];
//     $state = $_POST['state_id'];

//     $sql = "Update address set id='$id',name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state' where id=$id ";
// 	$result=mysqli_query($this->conn,$sql);
//     if ($result) {
//         //header("Location:addresslist");
//         echo "Updated successfully !";
//     } else {
//         echo "Error: " . $sql . "
// " . mysqli_error($this->conn);
//     }
//     mysqli_close($this->conn);
// } else {
// }
// }
function update($name,$address,$age,$city,$id){
	echo "renu";
// $id=$_REQUEST['buttonid'];
echo "hai";

echo $query = "UPDATE address SET name = '$name',address = '$address',city = '$city',age = '$age' WHERE id = $id";
$update = mysqli_query($this->conn,$query);
return $update;
}
// function displaycountry(){
// 	$coun="select*from country";
//     $counrseult=mysqli_query ($this->conn,$coun);
// 	return $counrseult;
// }
// function displaystate(){
// 	$state_filter= "select * from state ";
//     $filter_result = mysqli_query($this->conn, $state_filter);
// 	return $filter_result;
// }
}
?>
