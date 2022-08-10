<?php
require_once "../core/Controller.php";
class logincontroller extends Controller{
   public function index(){
      $this->loadmodel("loginmodel");
       $this->view("login");
   }
}

