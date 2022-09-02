<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert1 {
  position: fixed;
  top:30px;
  padding: 20px;
  background-color: #04AA6D;
  color: white;
  width: 700px;  
}
.closebtn1 {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn1:hover {
  color: black;
}
</style>
</head>


<?php
function redirect($msg,$url='')
{

echo '
<div class="alert1">
<a href='.$url.'>
  <span class="closebtn1" onclick="this.parentElement.style.display="none";">&times;</span></a>
  <strong>'.$msg.'</strong> 
</div>';
  unset($_SESSION["status"]);
  
}
?>

</html>
<?php
function state_dropdown($state_data)
{
    echo '<option >select state</option>';
        while($row = mysqli_fetch_array($state_data)) {
           echo '<option value='.$row['id'].'>'.$row['sname'].'</option>';
        }

} ?>




