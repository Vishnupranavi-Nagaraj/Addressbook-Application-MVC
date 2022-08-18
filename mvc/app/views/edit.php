<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>Address edit</title>
</head>

<body>
<!-- <?php 
//fetchuser details

?> -->
    <div class="container my-5" >
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value=<?php echo $data['name'] ?>>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" value=<?php echo $data['address'];?>>

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" value=<?php echo $data['age'];?>>

            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" value=<?php echo $data['city'];?>>

            </div>
            <button type="submit" class="btn btn-primary" name="updatebutton">Update</button>
            
           
        </form>
        <?php 
        $update_obj=new Addresscontroller();
        $update_obj->update($data['id']);
        ?>
    </div>
<div>
   
</div>
</body>

</html>