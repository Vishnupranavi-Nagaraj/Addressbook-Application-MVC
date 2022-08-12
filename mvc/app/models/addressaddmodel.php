<?php
Class Addressaddmodel extends Database{
public function add(){
if (isset($_POST['savebutton'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $state = $_POST['state'];

    $sql = "INSERT INTO address (name,address,city,age,country_id,state_id)
	 VALUES ('$name','$address','$city','$age','$country','$state')";
    if (mysqli_query($this->conn, $sql)) {
        header("Location:addresslist");
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($this->conn);
    }
    mysqli_close($this->conn);
} else {
}
}
function displaycountry(){
	$coun="select*from country";
    $counrseult=mysqli_query ($this->conn,$coun);
	return $counrseult;
}
function displaystate(){
	$state_filter= "select * from state ";
    $filter_result = mysqli_query($this->conn, $state_filter);
	return $filter_result;
}
}
?>
