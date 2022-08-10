<?php
// require_once 'core/config.php';
require_once '../core/Controller.php';
class Registercontroller extends Controller
{
    public function index()
    {
        echo  "hai";
       $this->loadmodel("registermodel");
       $this->view("register");
    }
}


?>