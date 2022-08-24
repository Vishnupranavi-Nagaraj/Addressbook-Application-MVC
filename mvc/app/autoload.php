<?php
spl_autoload_register(function ($class) { 

$pathContorllers = 'Controllers/' . $class . '.php';
$pathhelper = 'helper/' . $class . '.php';
$pathModels = 'Models/' . $class . '.php';
$pathViews = 'Models/' . $class . '.php';

    if (file_exists($pathContorllers))
    {
    require_once $pathContorllers;
    } 
    else if (file_exists($pathhelper)) 
    {
    require_once $pathhelper;
    } 
    else if (file_exists($pathModels)) 
    {
    require_once $pathModels ;
    }
    else if (file_exists($pathviews)) {
    require_once $pathViews ;
}
});
