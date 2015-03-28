<?php


namespace App\Controllers;


abstract class BaseController {

    public function loadView($view , $data){
            $views = explode(".",$view);
            $path = "";

            foreach($views as $view){
                $path .= "/{$view}";
            }
            extract($data,EXTR_PREFIX_SAME,"args");

            include(__DIR__."/../Views/{$path}.php");
    }
}



