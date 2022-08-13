<?php
Class Addresslist extends Controller{
    function index(){
        $this->model("addresslistmodel");
        $this->view("addresslist");
    }
    
}

?>