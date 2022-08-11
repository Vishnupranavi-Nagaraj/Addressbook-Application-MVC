<?php
// Include config file
require_once "connect.php";
if(isset($_REQUEST['submit']))
{	 
	 $name = $_POST['name'];
	 $address = $_POST['address'];
   $city = $_POST['city'];
	 $age = $_POST['age'];
   $country = $_POST['country'];
   $state = $_POST['state'];
  
	 $sql = "INSERT INTO address (name,address,city,age,country_id,state_id)
	 VALUES ('$name','$address','$city','$age','$country','$state')";
	 if (mysqli_query($con, $sql)) {
	echo "New record created successfully !";
    header("Location:addresslist.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}else{

}
?>

<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>Addresslistpage</title>
</head>

<body>
    <div class="container my-5" >
        <form action="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address">

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age">

            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city">

            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country"  name="country">
                    <option value=1>Select</option>
                    <option value=2>India</option>
                    <option value=3>China</option>
                    <option value=4>USA</option>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="state" >State</label>
                <select class="form-control" id="state"name="state">
                    <option value=1>Select</option>
                    <option value=2>Tamilnadu</option>
                    <option value=3>Kerala</option>
                    <option value=4>Gansu</option>
                    <option value=5>Hongkong</option>
                    <option value=6>Newyork</option>
                   
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>


    </div>

</body>

</html>