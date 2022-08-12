<?php


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
    <div class="container my-5">
        <form method="POST">
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
            
            
                         
                
         

            <button type="submit" class="btn btn-primary" name="update" id="buttonid">Update</button>
        </form>


    </div>
    <?php
    
    $update = new Updatemodel();
    //$update->update($name,$address,$age,$city,$id);
    //$update->displaycountry();
    //$update->displaystate();
    
    $id  = $_GET['idbutton'];
    echo $id;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    //$country=$_POST['country_id'];
    //$state=$_POST['state_id'];
echo "hai";
    $sql = $update->update($name,$address,$age,$city,$id);

    if($sql)
    {
        echo "Updated";
    }
    echo "Not";
?>    

</body>

</html>