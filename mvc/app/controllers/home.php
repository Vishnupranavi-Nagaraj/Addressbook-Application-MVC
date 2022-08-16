<?php
Class Home extends Controller
{
    public function index()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    public function user(){
        $this->model('Authmodel');
        $this->view("Login"); 
    }
        //$authobj->register($email,$password);
	public function register()
    {
        if(isset($_POST['registerbutton'])){
        $reg = new Authmodel();
        $email    = $_POST['email'];
        //$email    = mysqli_real_escape_string($this->conn, $email);
        $password = $_POST['password'];
        //$password = mysqli_real_escape_string($this->conn, $password);
        $insert=$reg->register($email,$password);
        if($insert)
        {
            echo "inserted";
        }
        else{
            echo "not working";
        }
    }
     }
     public function login()
     {
        if (isset($_POST['loginbutton'])) {
        $log=new Authmodel();
        $email = stripslashes($_POST['email']);   
        //$email = mysqli_real_escape_string($this->conn, $email);
        $password = stripslashes($_POST['password']);
        //$password = mysqli_real_escape_string($this->conn, $password);
         $read=$log->login($email,$password);
         if($read==1){
            echo("Loggin");
            //header("Location:addresslist");
         }

     }
    }
}
?>