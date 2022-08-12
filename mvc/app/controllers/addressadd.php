<?php

Class Addressadd extends Controller
{
	function index()
	{
		$this->model("addressaddmodel");
		$this->view("addressadd");
	}

}