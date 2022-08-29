<?php
//class

//constructor
spl_autoload_register(function ($class) { 

$pathContorllers = 'controllers/' . $class . '.php';
$pathhelper = 'helper/' . $class . '.php';
$pathModels = 'models/' . $class . '.php';
    if (file_exists($pathContorllers))
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
//basecontroller
//extends //auth,address//