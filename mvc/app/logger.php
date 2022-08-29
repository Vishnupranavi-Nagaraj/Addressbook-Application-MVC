<?php
class Logger
{
    // error message to be logged
    public function logError($error)
    {
        $error_message = "This is an error message!";
        $log_file = "/my-errors.log";
        ini_set("log_errors", TRUE); 
        ini_set('error_log', $log_file);
        error_log($error_message);
    }
    /**
   * @param string String identifier of the value to debug.
   * @param mixed  Supported data types as value parameters are:
   *               string, numeric and array.
   */
    public function logquery()
    {
        //redirect("hello");
        $log_file = "http://localhost/mvc/public/app/my-errors.log";
        //redirect($log_file);
        $path=$log_file;
        //redirect($path);
        if(!file_exists($path)){
            $handle=fopen($path,'This is query mssg');
            redirect($handle);
            chmod($path, 777);
        }else{
            echo "Can't open the file";
        }
        $error_message = "This is query message!";
        error_log($error_message, 3,$path);
        // ini_set("log_errors", TRUE); 
        // ini_set('error_log', $log_file);
        //error_log($error_message);
        //fopen('Addressmodel','r');
        
    }
    }
    // $data=new Logger();
    // $data->logquery();

   //     $path = BASEURL.$log_file;
   // if file not exists??
   //      $handle = fopen($path, 'w+') or          die("Unable to open file!");
   //        chmod($path, 0777);
   // }
   // $message = "$query."\r\n"; 
   // error_log($message, 3, $path);
?>