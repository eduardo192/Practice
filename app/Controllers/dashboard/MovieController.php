<?php namespace App\Controllers\dashboard;

// este use se coloca para que podamos alcanzar el Base Controller desde la capreta en la que estamos.
use App\Models\MovieModel;
use App\Controllers\BaseController;

class MovieController extends BaseController{
    public function index(){

        $movie = new MovieModel();
        
        //array que contine los valores que se van a madra por parametro a las vistas
        $dataHeader = [
            //este dato se pude acceder desde la vista usando la clave del array como una variable php
            'title' => 'Listado de Peliculas',
            'title2' => 'Listado de pelicuals 2'
        ];

        $data = [
            /* 
                paginate nos ayuda a hacer la paginacion.
                El primer parametro indica la cantidad de registros que queremos traer a la vez.
            */
            'movies' => $movie->asObject()->paginate(5),
            'pager' => $movie->pager

        ];

        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        echo view("dashboard/templates/header",$dataHeader);
        echo view("dashboard/movies/index",$data);
        echo view("dashboard/templates/footer");
    }

    public function test($name = "andres"){
        //array que contine los valores que se van a madra por parametro a las vistas
        $dataHeader = [
            //este dato se pude acceder desde la vista usando la clave del array como una variable php
            'title' => 'Listado de Peliculas '.$name
           
        ];

        $data = [
            'movies' => array(0,1,2,3,4)

        ];

        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        echo view("dashboard/templates/header",$dataHeader);
        echo view("dashboard/movies/index",$data);
        echo view("dashboard/templates/footer");
    }

    public function show (){
        $movie = new MovieModel();

        var_dump($movie->get(1)['title']);
    }
}