<?php
Class Authmodel extends Database
{
     /**
    * This function will check a dropdown for country given id
    * Instantiate the Logger class to check the queries
    */
    public function __construct()
    {
        parent::__construct();
        $this->logger = new Logger();
    }
      /**
     * This function gives the values to Database
     * @param Parameters are $email,$password
     * @return $query will return the values to the controller
     */
    public function register($email,$password)
    {
        $var="SELECT *from user where email='$email'";
        $res = mysqli_query($this->conn,$var);
        if(mysqli_num_rows($res) > 0)
        {
         $row = mysqli_fetch_assoc($res);
         if($email==isset($row['email']))
         {
          echo "<script>alert('user already exists')</script>";
         }
        }
         else
        {
        $create=new Database();
        $values=md5($password);
        $fields=array("email"=>$email,"password"=>$values);
        $query=$create->insert(USERTABLE,$fields);
        return $query;
         }
    }
     
    public function login_validation($email,$password)
    {
        $const = 'constant';
        $var  = mysqli_query($this->conn,"SELECT * FROM {$const('USERTABLE')} WHERE email='$email' AND password=MD5('$password')");
        $rows = mysqli_num_rows($var);
        return $rows;                                                                                                                           
    }
    

}
?>
