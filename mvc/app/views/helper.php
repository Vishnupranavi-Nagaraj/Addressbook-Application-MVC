<?php
$conn=new mysqli('localhost','root','Weakpass$12','addressbook');
$country_id = $_POST["country_id"];
$result = mysqli_query($conn,"SELECT * FROM state where country_id = $country_id");
?>
<option value="">Select State</option>
<?php
while($row = mysqli_fetch_array($result))
 {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}

?>