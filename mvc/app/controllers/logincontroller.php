<?php
require_once 'core/config.php';
class logincontroller extends controller{
    public function index(){
        $this->model("loginmodel");
        $this->view("login");
    }
}


?>