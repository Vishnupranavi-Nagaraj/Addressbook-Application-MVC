<?php
/**
 * Authcontroller contains add,list,display
 */
Class Authcontroller extends Controller
{

    // public function __construct()
    // {
    //     parent::__construct();

    // }
    /**
     *this is a main controller which renders default page of the website
     */
    public function main()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    /**
     * This login method renders the realtion between the Authmodel and login
     * */
    public function login()
    {
        $this->model('Authmodel');
        $this->view("login"); 
    }
    /**
     * Here in this method we are initializing the values for register page
     **/
	public function register()
    {
        if (isset($_POST['registerbutton']))
        {
            $reg = new Authmodel();
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $insert=$reg->register($email,$password,$_POST['registerbutton']);
            if ($insert)
            {
            redirect("Please login!",'authcontroller/login');
            }
            else{
            redirect("Invalid details",'');
            }
        }
    }
    /**
     * Here in this method we are initializing the values for login page
     **/ 
    public function login_validation()
    {
        
        if (isset($_POST['loginbutton']))
        {
            $log=new Authmodel();
            $email = stripslashes($_POST['email']);   
            $password = stripslashes($_POST['password']);
            $read=$log->login_validation($email,$password);
            if ($read==1)
            {
                $_SESSION['email'] = $email;
                redirect("Welcome".$_SESSION['email'] , BASEURL."addresscontroller/display");
            }
            else
            {
                redirect("Invalid details!",'');
            }

        }
    }
    public function emailValidate()
    {
        if (isset($_POST['submit']))
        {
            $email = $_POST['email'];
            if ($email == "")
            {
                echo $error_email=  "<span class = 'error'>Please enter candidate email</span>"; 
            }
         }
    }
    public function passwordValidate()
    {
        if (isset($_POST['sub_btn']))
        {
            $password = $_POST['rolePassword'];
            if ($password == "")
            {
                echo $error_password =  "<span class='error'>Please enter password</span>";
            }
      }
    }
    }
?>