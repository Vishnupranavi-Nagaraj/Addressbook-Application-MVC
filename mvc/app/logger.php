<?php
class Logger
{
     /**
     * LogError for which the the error will be printed
     *
     * @param  $error
     * $error param passed inside as an arugument
     */
    public function logError($error)
    {
        
        $error_message = "This is an error message!".$error;
        $path="../app/my-errors.log";
        ini_set("log_errors", TRUE); 
        ini_set('error_log', $path);
        error_log($error_message);
    }
    /**
     * Logquery for which the the query will be printed
     * @return Response
     */
    public function logquery()
    {
        $log_file = "my-errors.log";
        $path="../app/my-errors.log";
        
        if(!file_exists($path)){
            $handle=fopen($path,'w+');
            fwrite($handle,"This is query");
            chmod($path, 777);
            fclose($handle);
            //redirect("hello");
           
        }else{
           $error_message = "This is Query Message!";
           ini_set("log_errors", TRUE); 
           ini_set('error_log', $path);
           error_log($error_message);
            //redirect("in else");
        }
    }
    }
?>