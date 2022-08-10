<?php
require_once '../core/Controller.php';
//  require_once '../core/database.php';
class Home extends Controller
{
    function index()
    {
       echo "hai";
       $this->view("home");
       //$this->loadmodel('model');
    }
    
}
?>