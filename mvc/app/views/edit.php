<?php
$validate=new Addresscontroller();
?>
<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo BASEURL?>assets/add.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Address edit</title>
  
</head>
<body>
<header>
<div class="head">
    <div class="text">
    <h1>Edit User Details</h1>
    </div>
</div>
  </header>
    <?php 
        $update_obj=new Addresscontroller();
        $update_obj->update($data[0]['id']);    
    ?>
    <div class="container my-5" >
        <form id="add" method="POST" onsubmit="validateForm()">
            <div class="form-group">
                <label>Name<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" value=<?php echo $data[0]['name'];?>  onblur="validateForm()">
                <span><?php $validate->nameValidate();?></span>
                <p></p>
            </div>
            <div class="form-group">
                <label>Address<sup>*</sup></label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" id="address" value=<?php echo $data[0]['address']; ?> onblur="validateForm()">
                <span><?php $validate->addressValidate();?></span>
                <p></p>
            </div>
            <div class="form-group">
                <label>Age<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" id="age" value=<?php echo $data[0]['age'];?> onblur="validateForm()">
                <span><?php $validate->ageValidate();?></span>
                <p></p>
            </div>
            
            <div class="form-group">
                <label>City<sup>*</sup></label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" id="city" value=<?php echo $data[0]['city'];?> onblur="validateForm()">
                <span><?php $validate->cityValidate();?></span>
                <p></p>
            </div>
                <div class="form-group">
                <label for="country">Country<sup>*</sup></label>
                <select class="form-control" id="country-dropdown" name="country" required>

                <?php $row = mysqli_fetch_array($data[1]) ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row["cname"]; ?></option>
                <?php
                while($convar=mysqli_fetch_assoc($data[2]))
                       if($convar['id'] != $data[0]['country_id'])
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['cname'] . '</option>';
                        } ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="state">State<sup>*</sup></label>
                <select class="form-control" id="state-dropdown" name="state" required>
                <?php $row = mysqli_fetch_array($data[3]) ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row["sname"]; ?></option>
                    <?php
                    while($convar=mysqli_fetch_assoc($data[4]))
                       if($convar['id'] != $data[0]['state_id'])
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['cname'] . '</option>';
                        } ?>  
                </select>
                
                </div>
                <div class="form-group">
                  <label>Profile Photo<sup>*</sup></label>
                  <br>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <input type="file" name="image" />
                  <p></p>
            </div>
              
                <button type="submit" class="btn btn-primary" name="updatebutton" id="updatebtn">Update</button>
                <button type="submit" class="btn btn-danger" id="btn" name="cancel" ><a href = "<?php echo BASEURL?>addresscontroller/display" class = "text-light">Cancel</button>                <!-- <a href="http://localhost/mvc/public/Authcontroller/login" class="text-light"> Logout</a> -->
                <footer>
                    <div class="foot">   
                    <h4>Any Queries? Reach us @addresslocal.com </h4>
            </div>    
            </footer>
            </div>
            <script>
                $(document).ready(function() 
                {
                    $('#country-dropdown').on('change', function()
                     {
                        var country_id = this.value;
                       
                        $.ajax({
                            url: "/addresscontroller/edit/".country_id,
                            type: 'GET',
                            data: {
                                country_id: country_id
                            },
                            
                            success: function(html)
                            {
                                console.log(html)
                                $("#state-dropdown").html(html);
                },
        
            error: function()
            {
                console.log("error")
            }
            });
          });
        });
            </script>
        </form>
        
    </div>
<div>
   
</div>
<script type="text/javascript" src="<?php echo BASEURL?>assets/add.js"></script>
</body>

</html>