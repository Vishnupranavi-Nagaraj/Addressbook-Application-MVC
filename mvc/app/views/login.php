<?php
$login = new Loginmodel();
$login->log();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signin</title>
    <link rel="stylesheet" href="http://localhost/mvc/public/assets/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
  <body>
    <!-- header -->
    <form id="create-account-form" method="POST" action="">
       <div class="title">
         <h2>Signin</h2>
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
       
      <button type="submit" name="loginbutton" class="btn" onclick="validateForm()">Login</button>
      <p style="text-align: centre;">
        <a href="addresslist.php">New user?</a>
    </p>
    
      </div>
      
    </form>
     

    <script type="text/javascript" src="http://localhost/mvc/public/assets/login.js">

    </script>
    
  </body>
</html>

