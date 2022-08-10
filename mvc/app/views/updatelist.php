<?php
// Include config file
require_once "../core/config.php";
if(isset($_REQUEST['name']))
{	 
   $name = $_POST['name'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $age = $_POST['age'];
   $country = $_POST['country'];
   $state = $_POST['state'];
  
	 $sql = "Update address SET name='$name',address='$address',city='$city',age='$age',country_id='$country',state_id='$state'";

	 if (mysqli_query($con, $sql)) {
		echo "updated successfully !";
    header("Location:addresslist.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addressupdate</title>
</head>
<body>
    <!-- header -->
    <form id="add" method="POST" action="">
       <div class="title">
         <h2>Edit</h2>
       </div>

        <!-- name-->
        <div class="input-group">
           <label for="name">Name</label>
           <input type="name" name="name" value="" id="name" placeholder="name">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>

        <!-- address-->
        <div class="input-group">
           <label for="address">Address</label>
           <textarea name="address" value="" id="address" placeholder="address"></textarea>
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
         <!-- city-->
         <div class="input-group">
           <label for="city">City</label>
           <input type="city" name="city" value="" id="city" placeholder="city">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
         <!-- age-->
         <div class="input-group">
           <label for="age">Age</label>
           <input type="age" name="age" value="" id="age" placeholder="age">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
       <!-- COUNTRY -->
        <label for="country">Select country</label>
        <select name="country" id="country" name="state">
        <option value="">Select</option>
        <option value=1>India</option>
        <option value=2>China</option>
        <option value=3>USA</option>
        </select>
       <br>
        
       <!-- state -->
       <br>
       <label for="state">Select state</label>
        <select name="state" id="state" name="state">
        <option value="">Select</option>
        <option value=1>Tamilnadu</option>
        <option value=2>Kerala</option>
        <option value=3>Gansu</option>
        <option value=4>HongKong</option>
        <option value=5>California</option>
        <option value=6>Newyork</option>
        </select>
        <br>
        
       <br>
      <button type="submit" name="button" class="btn" onclick="">Update</button>
      <button type="submit" name="button" class="btn" onclick="">cancel</button>
    </p>
    
      </div>
      
    </form>
    
        
    
</body>
</html>