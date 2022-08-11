<?php
Class Home extends Controller{
    function index(){
        $this->model("registermodel");
        $this->view("register");
    }
}

?>