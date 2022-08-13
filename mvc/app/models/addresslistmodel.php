<?php
Class Addresslistmodel extends Database{
public function delete(){

if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    
    $extract_id = implode(',' , $all_id);
    
    $query = "DELETE FROM address WHERE id IN($extract_id) ";
    $query_run = mysqli_query($this->conn, $query);

    if($query_run)
    {
      echo "Multiple Data Deleted Successfully";
        //header("Location: index.php");
    }
    else
    {
        echo "Multiple Data Not Deleted";
        header("Location: addresslist");
    }
}
}
public function display(){
  $sql="select*from `address`";
  $result=mysqli_query($this->conn,$sql);
  return $result;

}

public function test(){
  return 'Nithya';
}
}
?>
