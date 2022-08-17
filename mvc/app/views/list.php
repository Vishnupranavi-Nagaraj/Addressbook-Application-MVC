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
    <form method="POST">
        <button class="btn btn-primary my-5">
            <a href="addressadd" class="text-light"> Add</a>
            </button>

        <table class="table">
  <thead>
  
     <tr>
      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <button type="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button>
    </tr>
    
  </thead>
  <tbody>
  
  <?php
   $result= $delete->display();
    
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
          $age=$row['age'];
          $city=$row['city'];
          $country=$row['country_id'];
          $state=$row['state_id'];
          echo '
          <tr>
          <th scope="row">'.$id.'</th>
          <td>'.$name.'</td>
          <td>'.$address.'</td>
          <td>
          <button type="submit" name = "selectupdate" class="btn btn-primary" value ='.$id.'> <a href="updatelist/'.$id.'" class="text-light" >Update</a></button>
          <button class="btn btn-danger"><input type="checkbox" name="stud_delete_id[]" value='.$id.'></button>
          </td>
          </tr>';

        }
       
    }
   
  ?>
    
  
    
  </tbody>
</table>

  </form>
    </div>
    
</body>
</html>