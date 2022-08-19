<?php
Class Authcontroller extends Controller
{
    //this is a main controller which renders default page of the website
    public function main()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    //This login method renders the realtion between the Authmodel and login
    public function login()
    {
        $this->model('Authmodel');
        $this->view("login"); 
    }
    //Here in this method we are initializing the values for register page
	public function register()
    {
        if(isset($_POST['registerbutton']))
        {
        $reg = new Authmodel();
        $email    = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email)){
            $emailEmptyErr = '<div class="error">
                Email can not be empty
            </div>';
        }
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            $emailErr = '<div class="error">
                    Email is not valid.
            </div>';
        } else {
            echo $email . '<br>';
        }
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
      //Here in this method we are initializing the values for login page
     
     public function login_validation()
     {
        if (isset($_POST['loginbutton'])) {
        $log=new Authmodel();
        $email = stripslashes($_POST['email']);   
        $password = stripslashes($_POST['password']);
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