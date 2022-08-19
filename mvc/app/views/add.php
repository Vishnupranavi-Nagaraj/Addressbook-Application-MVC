<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>Addressadd</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST" action="<?php "echo BASEURL"; ?>addresscontroller/display">
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
            <div class="form-group">
                <label for="country">Country</label>
               
                <select class="form-control" id="country" name="country">
                    <?php
                    //$info->country();
                    echo "hai";
                    if($data)
                    {
                        while($convar=mysqli_fetch_assoc($data))
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="country">State</label>
                <select class="form-control" id="state" name="state">
                    <?php
                    //$info->country();
                    if($data)
                    {
                        while($convar=mysqli_fetch_assoc($data))
                        {
                        echo '<option value = ' . $convar['id'] . '> ' . $convar['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
          

            <button type="submit" class="btn btn-primary" name="savebutton">Submit</button>
            <?php

            $info = new Addresscontroller();

            $info->add_to_database();

            ?>
        </form>


    </div>

</body>

</html>