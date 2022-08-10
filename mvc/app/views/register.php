<?php
// Include config file
require_once "../core/config.php";
// Processing form data when form is submitted
if(isset($_REQUEST['email'])){
  //escapes special characters in a string
  $email    = $_REQUEST['email'];
  $email    = mysqli_real_escape_string($con, $email);
  $password = $_REQUEST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $query    = "INSERT into `user` (email, password)
               VALUES ('$email', '$password')";         
  $result   = mysqli_query($con, $query);
 } else {
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signup page</title>
    <link rel="stylesheet" href="http://localhost/mvc/public/assets/view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
  <body>
  
    <!-- header -->
    <form id="create-account-form" method='POST' action="">
       <div class="title">
         <h2>Signup</h2>
       </div>

        <!-- email -->
        <div class="input-group">
           <label for="email">Email</label>
           <input type="email" name="email" value="" id="email" placeholder="email">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
        
        <!-- password -->
        <div class="input-group">
           <label for="password">Password</label>
           <input type="password" name="password" value="" id="password" placeholder="Password">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
        <!-- confirm password -->
        <div class="input-group">
           <label for="confirm-password">Confirm Password</label>
           <input type="password" name="confirmpassword" value="" id="confirm-password" placeholder="Confirm Password">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
       
      <button type="submit" name="button" class="btn" onclick="validateform()">Register</button>
      
      </div>
      <p><a href="login.php" >Already an user?</a></p>
     

  
   
      
    </form>
    <?php   if ($result){
    //echo "<script >alert('Registeration success Please Login')</script>";
    ("Location:login.phpheader");

  } 
  
?>
    <script type="text/javascript" src="http://localhost/mvc/public/assets/view.js">
   
    </script>
        
       
   
  </body>
</html>
