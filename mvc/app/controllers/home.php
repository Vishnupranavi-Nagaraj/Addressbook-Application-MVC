<?php
Class Home extends Controller
{
    public function index()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    public function login()
    {
        $this->model('Authmodel');
        $this->view("login"); 
    }
        
	public function register()
    {
        if(isset($_POST['registerbutton']))
        {
        $reg = new Authmodel();
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $insert=$reg->register($email,$password);
        if($insert)
        {
            redirect("Please login!",'home/login');
        }
        else{
            redirect("Invalid details",'');
        }
      }
     }
     
     public function login_validation()
     {
        if (isset($_POST['loginbutton'])) {
        $log=new Authmodel();
        $email = stripslashes($_POST['email']);   
        //$email = mysqli_real_escape_string($this->conn, $email);
        $password = stripslashes($_POST['password']);
        //$password = mysqli_real_escape_string($this->conn, $password);
         $read=$log->login_validation($email,$password);
         if($read==1){
            redirect("Sucessfully logged in !",'');
         }
         else{
            redirect("Invalid details!",'');
         }

     }
    }
    }
?>