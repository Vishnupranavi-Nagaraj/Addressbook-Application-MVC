<?php
require __DIR__."/vendor/autoload.php"; 

use Monolog\Logger; 
use Monolog\Handler\StreamHandler;

//log craeting
$logger = new Logger("newfile");

$stream_handler = new StreamHandler("php://stdout");
$logger->pushHandler($stream_handler);

$logger->error("It has some errors");
$logger->warning("This is warining");
//crud the values in the table check

?>