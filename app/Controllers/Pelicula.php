<?php 

namespace App\Controllers;
use App\Models\PeliculaModel;
/*
no se necisita poner el BaseController ya que los archivos se encuentran en el mismo nivel.
Si el aechivo estuviese dentro de otra carpeta si se tiene que poner 


*/
class Pelicula extends BaseController{
    
    // This funciton controls the view to show detail of a movie
    public function show($id)
    {
        $peliculaModel = new PeliculaModel();

        // Print a view
        echo view("/Pelicula/show",[
            // Send varible to the view with a movie
            "pelicula" => $peliculaModel->find($id)
        ]);
    }

    // This function show all movies in a view
    public function index(){
        $peliculaModel = new PeliculaModel();
 
        // Print view and send data 
        echo view("Pelicula/index",[
            // it gets all movies
            "peliculas" => $peliculaModel->findAll(),
        ]);
    }

    // Function to processes data sent from view show
    public function create()
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        // print the results from property of class basecontorller
        var_dump($this->request->getPost("title"));// this si the same that $_POST["title"]

        // insert the data
        $peliculaModel->insert([
            // KEY => VALUE
            "title" => $this->request->getPost("title"), // This function gets the data from post request
            "description" => $this->request->getPost("description")
        ]);

        echo "Creado";
    }

    // function to show data of the movoie to update
    public function edit($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        echo view("Pelicula/edit",[
            // Send specific movie
            "pelicula" => $peliculaModel->find($id)
        ]);
    }

    // This function updates the data sent from edit view
    public function update($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        // send the data to update
        // The method needs an id and the data to update
        $peliculaModel->update($id,[
            "title" => $this->request->getPost("title"),
            "description" => $this->request->getPost("description")
        ]);

        echo "update";
    }

    public function delete($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        // Delete an espesific movie
        $peliculaModel->delete($id);

        echo "Delete";
    }

    // This function controls the view to create a new movie 
    public function new()
    {
        //pritn view
        echo view("pelicula/new",[
            /**
             * The view break down because it waits for pelicula.
             * We send a pelicula
             */

             "pelicula" => [
                "title" => "",
                "description" => ""
             ]
        ]);
    }
} 