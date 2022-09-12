<?php
/**
 * Authcontroller contains add,list,display
 */
Class Authcontroller
{
    /**
     *this is a main method which renders gives a link between model and a view
     */
    use Controller;
    public function main()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    /**
     * This login method renders gives a link between model and a view
     */
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
            if($insert)
            {
              $_SESSION['status']="Registered successfully";
              redirect($_SESSION['status'], BASEURL."authcontroller/login");
            }
            else{
                $_SESSION['status']="Registered unsuccessfully";
                redirect($_SESSION['status'], BASEURL."");
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
                $username = substr($email, 0, strpos($email, '@'));
                redirect("Welcome  ".$username, BASEURL."addresscontroller/display");
            }
            else
            {
                redirect("Seems,user or password not exists,Please signup");
            }

        }
    }
    /**
     * This function used for the validation of email in the view page
     */
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
    /**
     * This function used for the validation of password in the view page
     */
    public function passwordValidate()
    {
        if (isset($_POST['sub_btn']))
        {
            $password = $_POST['Password'];
            if ($password == "")
            {
                echo $error_password =  "<span class='error'>Please enter password</span>";
            }
      }
    }

  
    }
?>