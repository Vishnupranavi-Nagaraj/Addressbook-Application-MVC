<?php
class controller
{
    // public function view($view)
    // {
    //     if(file_exists("../ap"))
    // }
    // public function model($model)
    // {
    //     require_once '../app/models/' .$model. '.php';
    //     return new $model();
    // }
    // protected function view($view)
    // {
    //     if(file_exists("../app/views/". $view .".php"))
    //     {
    //         include "../app/views/". $view .".php";
    //     }
    //     else{
    //         include "../app/views/404.php";
    //     }
    // }
    protected function view($view)
    {
        if(file_exists("../app/views/". $view .".php"))
        {
            include "../app/views/". $view .".php";
            return $view=new $view();
        }
        return false;
    }

    protected function model($model)
    {
        if(file_exists("../app/models/". $model .".php"))
        {
            include "../app/models/". $model .".php";

            return $model = new $model();
        }
        return false;
    }


}
?>
