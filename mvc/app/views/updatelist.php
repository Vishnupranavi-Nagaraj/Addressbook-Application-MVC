
<?php
$update=new Updatemodel();

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
<?php 

$result = $update->update();
$row=mysqli_fetch_assoc($result);
?>
    <div class="container my-5" >
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value=<?php echo $row['name'];?>>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" value=<?php echo $row['address'];?>>

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" value=<?php echo $row['age'];?>>

            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" value=<?php echo $row['city'];?>>

            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country"  name="country">
                <?php
                 $counrseult=$update->updatecountry($row['country_id']);
                  $convar=mysqli_fetch_assoc($counrseult);
                echo '<option value = '.$convar['id'].'> '.$convar['name'].'</option>';
                   
                  
                  ?>
                   <?php
                 $counrseult=$update->update_remaining_country($row['country_id']);
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
                  $starseult=$update->updatestate($row['state_id']);
                  $stavar=mysqli_fetch_assoc($starseult);
                  echo '<option value = '.$stavar['id'].'> '.$stavar['name'].'</option>';
                 ?>
    
                <?php
                  $starseult=$update->update_remaining_state($row['state_id']);
                  if($starseult){
                    while($stavar=mysqli_fetch_assoc($starseult)){
                        echo '<option value = '.$stavar['id'].'> '.$stavar['name'].'</option>';
                    }
                  }
                    ?>
                   
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="updatebutton"><a href="addresslist" class="text-light">Update</button>
            
           
        </form>

        <?php $update->update_table($row['id']); ?>
    </div>
<div>
   
</div>
</body>

</html>