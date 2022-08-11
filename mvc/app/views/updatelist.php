<?php
// Include config file
require_once "connect.php";
$id=$_GET['id'];
$sql="Select *from address where id=$id";
$result($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name = $row['name'];
$address = $row['address'];
$city = $row['city'];
$age = $row['age'];
$country = $row['country'];
$state = $row['state'];

if(isset($_REQUEST['updateid']))
{	 
	 $name = $_POST['name'];
	 $address = $_POST['address'];
     $city = $_POST['city'];
	 $age = $_POST['age'];
     $country = $_POST['country'];
     $state = $_POST['state'];
  
	 $sql = "Update address set id=$id,name='$name',address='$address',city='$city',age='$age',country='$country',state='$state' where id=$id";
	 if (mysqli_query($con, $sql)) {
	//echo "Updated successfully !";
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
                <input type="text" class="form-control" placeholder="Enter name" name="name" value=<?php echo $name;?>>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" value=<?php echo $address;?>>

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" value=<?php echo $age;?>>

            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" value=<?php echo $city;?>>

            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country"  name="country" value=<?php echo $country;?>>
                    <option value=1>Select</option>
                    <option value=2>India</option>
                    <option value=3>China</option>
                    <option value=4>USA</option>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="state" >State</label>
                <select class="form-control" id="state"name="state" value=<?php echo $state;?>>
                    <option value=1>Select</option>
                    <option value=2>Tamilnadu</option>
                    <option value=3>Kerala</option>
                    <option value=4>Gansu</option>
                    <option value=5>Hongkong</option>
                    <option value=6>Newyork</option>
                   
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>


    </div>

</body>

</html>