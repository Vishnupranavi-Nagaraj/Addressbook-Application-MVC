<?php
$validate = new Authcontroller();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signup page</title>
    <link rel="stylesheet" href= "<?php echo BASEURL?>assets/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
  <body>
  
    <!-- header -->
  <form id="create-account-form" method='POST' action=''>
       <div class="title">
         <h2>Signup</h2>
       </div>

        <!-- email -->
        <div class="input-group">
           <label for="email">Email</label>
           <input type="email" name="email" value="" id="email" placeholder="Email">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
           <span><?php $validate->emailValidate();?></span>

        </div>
        
        <!-- password -->
        <div class="input-group">
           <label for="password">Password</label>
           <input type="password" name="password" value="" id="password" placeholder="Password">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
           <span><?php $validate->passwordValidate();?></span>

        </div>
        <!-- confirm password -->
        <div class="input-group">
           <label for="confirm-password">Confirm Password</label>
           <input type="password" name="confirmpassword" value="" id="confirm-password" placeholder="Confirm Password">
           <i class="fas fa-check-circle"></i>
           <i class="fas fa-exclamation-circle"></i>
           <p>Error Message</p>
        </div>
       
      <button type="submit" name="registerbutton" class="btn" onclick="validateform()">Register</button>
      </div>
      <div>
        <br>
      <p><a href="<?php echo BASEURL?>authcontroller/login" >Already an user?</a></p>
      </div>
    </form>
    
    
    <script type="text/javascript" src="<?php echo BASEURL?>assets/register.js">
   
    </script>
        
    <?php
    $obj=new Authcontroller();
    $obj->register();
    ?>  
   
  </body>
</html>