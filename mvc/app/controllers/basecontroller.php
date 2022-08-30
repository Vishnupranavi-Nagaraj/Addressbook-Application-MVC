<?php
Class Basecontroller extends Controller{
    public function __construct(){

        spl_autoload_register(function ($class) { 
            $pathControllers = 'controllers/' . $class . '.php';
            $pathhelper = 'helper/' . $class . '.php';
            $pathModels = 'models/' . $class . '.php';
                if (file_exists($pathControllers))
                {
                require_once $pathControllers;
                } 
                else if (file_exists($pathhelper)) 
                {
                require_once $pathhelper;
                } 
                else if (file_exists($pathModels)) 
                {
                require_once $pathModels ;
                }
            });
    }
}
?>