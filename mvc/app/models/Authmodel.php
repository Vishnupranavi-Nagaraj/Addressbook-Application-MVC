<?php
Class Authmodel extends Database
{
    //This is for register page inse
    public function __construct()
    {
        parent::__construct();
        $this->logger = new Logger();
    }
    public function register($email,$password)
    {
        $create=new Database($this->details);
        $fields=array("email"=>"$email","password"=>md5($password));
        $query=$create->insertinto(USERTABLE,$fields);
        return $query;
    }
    //Here we are checking with username and password is present in DB
    public function login_validation($email,$password)
    {
        $const = 'constant';
        $var  = mysqli_query($this->conn,"SELECT * FROM {$const('USERTABLE')} WHERE email='$email' AND password=MD5('$password')");
        $rows = mysqli_num_rows($var);
        return $rows;                                                                                                                           

    }

}
?>
    
