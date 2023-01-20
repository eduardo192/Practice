<?php 

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
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
        echo view("/Dashboard/Pelicula/show",[
            // Send varible to the view with a movie
            "pelicula" => $peliculaModel->asObject()->find($id)
        ]);
    }

    // This function show all movies in a view
    public function index(){
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();
 
        // Print view and send data 
        echo view("/Dashboard/Pelicula/index",[
            // it gets all movies
            "peliculas" => $peliculaModel->asObject()->findAll(),
        ]);
    }

    // Function to processes data sent from view show
    public function create()
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        // print the results from property of class basecontorller
        var_dump($this->request->getPost("title"));// this si the same that $_POST["title"]


        //validate data
        // this return boolean: "True" or "False"
        // set the group or rules defined in /app/Config/Validation
        if ($this->validate("peliculas")){

            // insert the data
            $peliculaModel->insert([
                // KEY => VALUE
                "title" => $this->request->getPost("title"), // This function gets the data from post request
                "description" => $this->request->getPost("description")
            ]);

        }else{
            // This return the errors in the validation
            // list all erros
            //var_dump($this->validator->listErrors());
            // in this case get the errors from specific input
            var_dump($this->validator->getErrors("title"));

            // send flash data to view with the errors
            session()->setFlashdata(["validation" => $this->validator]);

            return redirect()->back()->withInput();
        }

       

        //This redirect to index funccion in Pelicula Controller
        //We can send flash messages with the function "with". It needs 2 params, a key and the message
        return redirect()->to("/dashboard/pelicula")->with("mensaje", " Registro Creado Exitosamente");
    }

    // function to show data of the movoie to update
    public function edit($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        echo view("/Dashboard/Pelicula/edit",[
            // Send specific movie
            "pelicula" => $peliculaModel->asObject()->find($id)
        ]);
    }

    // This function updates the data sent from edit view
    public function update($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        //validate data
        // this return boolean: "True" or "False"
        // set the group or rules defined in /app/Config/Validation
        if ($this->validate("peliculas")){

            // send the data to update
            // The method needs an id and the data to update
            $peliculaModel->update($id,[
                "title" => $this->request->getPost("title"),
                "description" => $this->request->getPost("description")
            ]);

        }else{
            // This return the errors in the validation
            // list all erros
            //var_dump($this->validator->listErrors());
            // in this case get the errors from specific input
            var_dump($this->validator->getErrors("title"));

            // send flash data to view with the errors
            session()->setFlashdata(["validation" => $this->validator]);

            return redirect()->back()->withInput();
        }

        

        // This redirect to previous path
        //We can send flash messages with the function "with". It needs 2 params, a key and the message
        return redirect()->back()->with("mensaje", " Registro Actualizado Exitosamente");
        
        // This redirect to especific path
        //return redirect()->to("dashboard/pelicula");

        //We can use route's name in the redirect
        //return redirect()->route("pelicula.test");
    }

    public function delete($id)
    {
        //Create request form peliculaModel
        $peliculaModel = new PeliculaModel();

        // Delete an espesific movie
        $peliculaModel->delete($id);

        // This redirect to previous path
        //We can send flash messages with the function "with". It needs 2 params, a key and the message
        return redirect()->back()->with("mensaje", " Registro Eliminado Exitosamente");
    }

    // This function controls the view to create a new movie 
    public function new()
    {
        //pritn view
        echo view("/Dashboard/pelicula/new",[
            /**
             * The view break down because it waits for pelicula.
             * We send a pelicula
             */

             "pelicula" => new PeliculaModel()
        ]);
    }
} 