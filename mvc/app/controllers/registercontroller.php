<?php
// require_once 'core/config.php';
class Registercontroller extends controller
{
    public function index(){
        $this->model("registermodel");
        $this->view("register");
    }
}


?>