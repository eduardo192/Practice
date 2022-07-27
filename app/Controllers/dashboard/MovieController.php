<?php namespace App\Controllers\dashboard;

// este use se coloca para que podamos alcanzar el Base Controller desde la capreta en la que estamos.
use App\Controllers\BaseController;

class MovieController extends BaseController{
    public function index(){
        
        //array que contine los valores que se van a madra por parametro a las vistas
        $dataHeader = [
            //este dato se pude acceder desde la vista usando la clave del array como una variable php
            'title' => 'Listado de Peliculas',
            'title2' => 'Listado de pelicuals 2'
        ];

        $data = [
            'movies' => array(0,1,2,3,4)

        ];

        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        echo view("dashboard/templates/header",$dataHeader);
        echo view("dashboard/movies/index",$data);
        echo view("dashboard/templates/footer");
    }

    public function test(){
        echo "Hola mundo";
    }
}