<?php
Class Login extends Controller
{
    function index()
    {
        $this->model("loginmodel");
        $this->view("login");
    }
}

?>