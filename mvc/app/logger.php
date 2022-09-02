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
     * @param $query is passed inside from the Databse
     */

    public function logquery($query)
    {
        $log_file = "my-errors.log";
        $path="../app/my-errors.log";
        
        if (!file_exists($path)) {
            $handle=fopen($path,'w+');
            fwrite($handle,$query);
            chmod($path, 777);
            fclose($handle);
        } else {
           $error_message = $query;
           ini_set("log_errors", TRUE); 
           ini_set('error_log', $path);
           error_log($error_message);
        }
    }
    }
?>