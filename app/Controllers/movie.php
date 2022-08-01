<?php namespace App\Controllers;

// este use se coloca para que podamos alcanzar el Base Controller desde la capreta en la que estamos.
use App\Models\MovieModel;

class Movie extends BaseController{
    public function index(){

        $movie = new MovieModel();

        $data = [
            /* 
                paginate nos ayuda a hacer la paginacion.
                El primer parametro indica la cantidad de registros que queremos traer a la vez.
            */
            'movies' => $movie->asObject()->paginate(5),
            //instncia para poder usar el pager link
            'pager' => $movie->pager

        ];

        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        $this->_loadDefaulView('Listado de Peliculas',$data,'index');
    }

    public function new(){
        $movie = new MovieModel();
        
        $this->_loadDefaulView('Crear una Pelicula', [], 'new');
        
    }

    public function create(){
        echo "create";        
    }

    public function testPost(){
        echo "Datos: ";
        echo $this->request->getPost('title');
        echo " ";
        echo $this->request->getPost('description');
               
    }

    public function show ($id = null){
        $movie = new MovieModel();

        var_dump($movie->get($id));
    }

    private function _loadDefaulView($title,$data,$view){
        $dataHeader = [
            //este dato se pude acceder desde la vista usando la clave del array como una variable php
            'title' => $title
        ];

        echo view("dashboard/templates/header",$dataHeader);
        echo view("dashboard/movies/$view",$data);
        echo view("dashboard/templates/footer");
    }
}