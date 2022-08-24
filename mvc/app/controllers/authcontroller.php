<?php
/**
 * Authcontroller contains add,list,display
 */
Class Authcontroller extends Controller
{

    /**this is a main controller which renders default page of the website*/
    public function main()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    /**This login method renders the realtion between the Authmodel and login*/
    public function login()
    {
        $this->model('Authmodel');
        $this->view("login"); 
    }
    /**Here in this method we are initializing the values for register page*/
	public function register()
    {
        if(isset($_POST['registerbutton']))
        {
        $reg = new Database();
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $table=USERTABLE;
        $fields=array("email"=>"$email","password"=>"$password");
       
        $insert=$reg->insertinto($table,$fields);
        //Insert into user(email,password)values($email,$password)
        // if($email==""){
        //     echo $error_email=  "<span class = 'error'>Please enter your email</span>"; 
        // }
        // else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
        //     echo $error_email= "<span class='error'>Please enter a valid email</span>";
        // }
        // else if($password==""){
        //     echo $error_password=  "<span class = 'error'>Password cannot be empty</span>"; 
        // }
        if($insert)
        {
            //redirect("Please login!",'authcontroller/login');
        }
        else{
            //redirect("Invalid details",'');
        }
      }
     }
      /**Here in this method we are initializing the values for login page*/
     
     public function login_validation()
     {
        
        if (isset($_POST['loginbutton']))
        {
        $log=new Authmodel();
        $email = stripslashes($_POST['email']);   
        $password = stripslashes($_POST['password']);
        $read=$log->login_validation($email,$password);
        
        // if($email=="")
        // {
        //     echo $error_email=  "<span class = 'error'>Please enter your email</span>"; 
        // }
        // else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
        // {
        //     echo $error_email= "<span class='error'>Please enter a valid email</span>";
        // }
        // else if($password=="")
        // {
        //     echo $error_password=  "<span class = 'error'>Password cannot be empty</span>"; 
        // }
        
        if($read==1)
        {

            $_SESSION['email'] = $email;
           //echo $_SESSION['email'];
            redirect("Welcome".$_SESSION['email'] , BASEURL."addresscontroller/display");
        }
         else
         {
            redirect("Invalid details!",'');
         }

     }
    }
    }
?>