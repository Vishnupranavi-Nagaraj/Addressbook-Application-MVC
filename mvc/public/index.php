<?php
session_start();
require "../app/init.php";


/**
 * Creating an instance for App class
 */
$a=new App();

spl_autoload_register("autoload");
    function autoload($class){
    require "../app/helper/config.php";
    require "../app/models/Database.php";
    require "../app/helper/helpers.php";
    require "../app/controllers/controller.php";
    require "../app/helper/app.php";
    require "../app/logger.php";
    require "../app/init.php";
               $pathControllers = '../app/controllers/' . $class . '.php';
               $pathhelper = '../app/helper/' . $class . '.php';
               $pathModels = '../app/models/' . $class . '.php';
                   if (file_exists($pathControllers)){
                       include $pathControllers;
                   }else if (file_exists($pathhelper)) {
                       include $pathhelper;
                   } else if (file_exists($pathModels)) {
                       include $pathModels;
                   }else{
                       require('../controllers/authcontroller/main');
                       throw new Exception("Not loaded");
                       echo $class;
                   }
                }
?>
