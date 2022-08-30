<?php
$validate = new Addresscontroller();
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
    <title>Addressadd</title>
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
    p{
        color: red;
    }
</style>
<body>
<header class="header">
    <div class="container">


  <strong><h2>ADD USER DETAILS</h2></strong>
  
  <style>
    .header {background-color: blue;}
    body {background-color: white;}
    h2  {color: pink;}
    h2  {font-style: sans-serif;}
    h2  {height:60px;}
    /* h2 {text-align: center;} */
   </style>

    </div>
  </header>

    <div class="container my-5">

        <form id="add" method="POST" action="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" id="name" onblur = "validateForm()">
                <p></p>
                <span><?php $validate->nameValidate();?></span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address" id="address" onblur = "validateForm()">
                <p></p>
                <span><?php $validate->addressValidate();?></span>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age" id="age" onblur = "validateForm()">
                <p></p>
                <span><?php $validate->ageValidate();?></span>
                
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city" id="city" onblur = "validateForm()">
                <p></p>
                <span><?php $validate->cityValidate();?></span>
                
            </div>
            <div class="form-group">
                <label for="country">Country</label>

                <select class="form-control" id="country-dropdown" name="country">
                    <option value="">Select Country</option>
                    <?php

                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <p></p>
                <span><?php $validate->countryValidate();?></span>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state-dropdown" name="state">
                    <option value="">Select State</option>
                </select>
                
                
            </div>


            <script>
                $(document).ready(function() {
                    $('#country-dropdown').on('change', function() {
                        var country_id = this.value;
                        $.ajax({
                            url: "/addresscontroller/add/".country_id,
                            type: 'GET',
                            data: {
                                country_id: country_id
                            },

                            success: function(html) {
                                console.log(html)
                                $("#state-dropdown").html(html);
                            },

                            error: function() {
                                console.log("error")
                            }
                        });
                    });
                });
            </script>
            
            <button type="submit" class="btn btn-primary" name="savebutton" id = "submit-button" onclick="validateForm()">Submit</button>
            <button type="submit" class="btn btn-primary" name="cancel" ><a href ="display" class = "text-light">Cancel</button>
            <?php
            $info = new Addresscontroller();
            $info->add_to_database();
            ?>
        </form>

    </div>
    <script type="text/javascript" src="http://localhost/mvc/public/assets/add.js"></script>
</body>

</html>