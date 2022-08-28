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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Address edit</title>
</head>
<style>
    .form-control
     {
        width: 400px;
        height: 40px;
    }
    .container{
    margin-left: 35%;
    margin-right:35%;
    width: 100%;
    }
</style>
<body>
<header class="header">
    <div class="container my-1">


  <h2>EDIT USER DETAILS</h2>
  
  <style>
    .header {background-color: blue;}
    body {background-color: white;}
    h2  {color: pink;}
    h2  {font-style: sans-serif;}
    h2  {height:60px;}
   </style>

    </div>
  </header>
<?php 
        $update_obj=new Addresscontroller();
        $update_obj->update($data[0]['id']);    
?>
    <div class="container my-5" >
        <form method="POST" action="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value=<?php echo $data[0]['name'] ?>>
                <p></p>
                <span><?php $validate->nameValidate();?></span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" value=<?php echo $data[0]['address'];?>>
                <p></p>
                <span><?php $validate->addressValidate();?></span>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" value=<?php echo $data[0]['age'];?>>
                <p></p>
                <span><?php $validate->ageValidate();?></span>
            </div>
            
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" value=<?php echo $data[0]['city'];?>>
                <span><?php $validate->cityValidate();?></span>
            </div>
                <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country-dropdown" name="country" required>

                <?php $row = mysqli_fetch_array($data[1]) ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                <?php
                while($convar=mysqli_fetch_assoc($data[2]))
                       if($convar['id'] != $data[0]['country_id'])
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['name'] . '</option>';
                        } ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state-dropdown" name="state" required>
                <?php $row = mysqli_fetch_array($data[3]) ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                    while($convar=mysqli_fetch_assoc($data[4]))
                       if($convar['id'] != $data[0]['state_id'])
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['name'] . '</option>';
                        } ?>  
                </select>
                
                </div>
                <button type="submit" class="btn btn-primary" name="updatebutton" action="<?php echo BASEURL;?>Addresscontroller/display">Update</button>
                <button type="submit" class="btn btn-primary" name="cancel" ><a href ="http://localhost/mvc/public/Addresscontroller/display" class = "text-light">Cancel</button>                <!-- <a href="http://localhost/mvc/public/Authcontroller/login" class="text-light"> Logout</a> -->
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
<script type="text/javascript" src="http://localhost/mvc/public/assets/edit.js"></script>
</body>

</html>