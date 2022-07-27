<?php namespace App\Controllers\dashboard;

// este use se coloca para que podamos alcanzar el Base Controller desde la capreta en la que estamos.
use App\Controllers\BaseController;

class CategoryController extends BaseController{
    public function index(){
        echo 'Hola mundo ';
    }

    
}