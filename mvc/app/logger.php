<?php
class Logger
{
    // error message to be logged
    public function logError($error)
    {
        $error_message = "This is an error message!";
        $log_file = "./my-errors.log";
        ini_set("log_errors", TRUE); 
        ini_set('error_log', $log_file);
        error_log($error_message);
        fopen('Addressmodel','r');
    }
    public function logquery()
    {
        //redirect("hello");
        //echo "bsjwekj";
        $error_message = "This is query message!";
        $log_file = "./my-errors.log";
        error_log($error_message, 3, $log_file);
        // ini_set("log_errors", TRUE); 
        // ini_set('error_log', $log_file);
        //error_log($error_message);
        
        //fopen('Addressmodel','r');
        
    }
    }
    // $data=new Logger();
    // $data->logquery();
?>