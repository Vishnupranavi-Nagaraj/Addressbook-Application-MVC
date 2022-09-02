<?php 

Class Controller
{
	/**
     * View function can help to check the file exists or not
     */
	protected function view($view,$data= [])
	{
		if (file_exists("../app/views/". $view .".php"))
 		{
 			include "../app/views/". $view .".php";
 		}else{
 			include "../app/views/404.php";
 		}
	}
    
	/**
     * model function can help to check the file exists or not
     */
	protected function model($model)
    {
        if (file_exists("../app/models/". $model .".php"))
        {
            include "../app/models/". $model .".php";
            return $model = new $model();
        }
        return false;
    }
}
?>