<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addresslist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light"> Add</a>
            </button>
        <table class="table">
  <thead>
  
     <tr>
      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql="select*from `address`";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
          $age=$row['age'];
          $city=$row['city'];
          $country=$row['country'];
          $state=$row['state'];
          echo '
          <tr>
          <th scope="row">'.$id.'</th>
          <td>'.$name.'</td>
          <td>'.$address.'</td>
          <td>
          <button class="btn btn-primary"><a href="update.php" class="text-light" updateid='.$id.'>Update</a>
          <button class="btn btn-danger"><a href="delete.php" class="text-light">Delete</a>
          </td>
          </tr>';

        }
    }

  ?>
    

    
  </tbody>
</table> -->


    </div>
    
</body>
</html>