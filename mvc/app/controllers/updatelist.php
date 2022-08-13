<?php

Class Updatelist extends Controller
{
	function index()
	{
		
		$this->model("updatemodel");
		$this->view("updatelist");
	}

}