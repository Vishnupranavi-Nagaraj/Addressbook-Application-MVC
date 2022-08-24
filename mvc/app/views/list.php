<?php
//session_start();

if(isset($_SESSION['email']) == null)
{
    redirect("Please login to continue to view ","http://localhost/mvc/public/Authcontroller/login");
    echo "not work";
    
}
else{
?>
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
  <header>
    <div class="container my-5">
      
  <h1 style="text-align:center">Welcome to Address Application </h1>
  <style>
    body {background-color: lightgrey;}
    h1   {color: black;}
    h1   {font-style: oblique;}
   </style>

    </div>
  </header>
    <div class="container">
    <form method="POST">
        <button class="btn btn-primary my-5">
            <a href="add" class="text-light"> Add</a>
            </button>

            <button class="btn btn-warning my-5" style=float:right>
            <a href="http://localhost/mvc/public/Authcontroller/login" class="text-light"> Logout</a>
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
  $delete_obj=new Addresscontroller();
  $delete_obj->delete();
    if($data)
    {
        while($row=mysqli_fetch_assoc($data))
        {        
          ?>
          <tr>
          <th scope="row"><?php echo $row['id'] ?></th>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td>
          <button type="submit" name = "selectupdate" class="btn btn-primary" value =<?php echo $row['id'] ?>> <a href="update_main/<?php echo $row['id'] ?>" class="text-light" >Update</a></button>
          <button class="btn btn-danger"><input type="checkbox" name="stud_delete_id[]" value=<?php echo $row['id'] ?>></button>
          </td>
          </tr>
<?php 
}
} 
?>
    
  </tbody>
</table>

  </form>
    </div>
    
</body>
</html>
<?php  } ?>