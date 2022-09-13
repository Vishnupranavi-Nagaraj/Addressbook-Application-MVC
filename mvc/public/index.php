<?php
session_start();
spl_autoload_register("autoloader");
function autoloader($class){   
    $pathControllers = '../app/controllers/' . strtolower($class) . '.php';
    $pathhelper = '../app/helper/' . strtolower($class) . '.php';
    $pathModels = '../app/models/' . $class . '.php';
    $path = '../app/'.strtolower($class).'.php';
           if (file_exists($pathControllers)){
                include $pathControllers;
            }else if (file_exists($pathhelper)) {
                include $pathhelper;
             } else if (file_exists($pathModels)) {
                 include $pathModels;
            }else if (file_exists($path)) {
                include $path;
            }else{
                echo "File not found";
            }   
}
require "../app/helper/config.php";
require "../app/helper/helpers.php";
$a=new App();
?>
