<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addressadd</title>
</head>
<body>
    <!-- header -->
    <form id="add" method="POST" action="">
       <div class="title">
         <h2>Details</h2>
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
         <!-- age-->
         <div class="input-group">
           <label for="age">Age</label>
           <input type="age" name="age" value="" id="age" placeholder="age">
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
        
       <!-- state -->
       <label for="state">Select state</label>
        <select name="state" id="state">
        <option value="Tamilnadu">Tamilnadu</option>
        <option value="kerala">Kerala</option>
        <option value="Gansu">Gansu</option>
        <option value="Hong kong">HongKong</option>
        <option value="California">California</option>
        <option value="Newyork">Newyork</option>
        </select>
        <br>
        <!-- country -->
        <br>
        <label for="country">Select country</label>
        <select name="country" id="country">
        <option value="India">India</option>
        <option value="China">China</option>
        <option value="USA">USA</option>
        </select>
       <br>
      <button type="submit" name="button" class="btn" onclick=" ">Add</button>
    </p>
    
      </div>
      
    </form>
    <?php
        $add=new addmodel();
        $register->insert($name,$address,$age,$city,$country,$state);
        ?>
    
</body>
</html>