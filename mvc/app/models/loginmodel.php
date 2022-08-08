<?php
class loginmodel extends controller{
    public function login(){

   if(isset($_POST['but_submit'])){

    $email = mysqli_real_escape_string($this->conn,$_POST['email']);
    $password = mysqli_real_escape_string($this->conn,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select*from user where email='".$email."' and password='".$password."'";
        $result = mysqli_query($this->con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('addresslist.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
    }
}
?>