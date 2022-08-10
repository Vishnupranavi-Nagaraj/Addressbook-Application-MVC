<?php
require_once "../core/controller.php";
class logincontroller extends Controller{
   public function index(){
       $this->loadmodel("addmodel");
       $this->view("addressadd");
   }
}
?>