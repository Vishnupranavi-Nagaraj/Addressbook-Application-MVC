
<?php
$update=new Updatemodel();
$update=$this->update();
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
        <form method="POST">
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
                <select class="form-control" id="country"  name="country">
                <?php
                 $counrseult=$update->updatecountry($country);
                  $convar=mysqli_fetch_assoc($counrseult);
                echo '<option value = '.$convar['id'].'> '.$convar['name'].'</option>';
                   
                  
                  ?>
                   <?php
                 $counrseult=$update->updatecountry($country);
                  if($counrseult){
                    while($convar=mysqli_fetch_assoc($counrseult)){
                        echo '<option value = '.$convar['id'].'> '.$convar['name'].'</option>';
                    }
                  }
                    ?>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="state" >State</label>
                <select class="form-control" id="state"name="state" ?>
                <?php
                  $coun="select*from state where id = $state ";
                  $counrseult=mysqli_query ($this->conn,$coun);
                  $convar=mysqli_fetch_assoc($counrseult);
                  echo '<option value = '.$convar['id'].'> '.$convar['name'].'</option>';
                 ?>
    
                <?php
                  $coun="select*from state where id != $state";
                  $counrseult=mysqli_query ($this->conn,$coun);
                  if($counrseult){
                    while($convar=mysqli_fetch_assoc($counrseult)){
                        echo '<option value = '.$convar['id'].'> '.$convar['name'].'</option>';
                    }
                  }
                    ?>
                   
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="updatebutton">Update</button>
        </form>


    </div>
<div>
   
</div>
</body>

</html>