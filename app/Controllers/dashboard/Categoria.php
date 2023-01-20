<?php 

namespace App\Controllers\Dashboard;
use App\Models\CategoriaModel;
use App\Controllers\BaseController;
/*
no se necisita poner el BaseController ya que los archivos se encuentran en el mismo nivel.
Si el aechivo estuviese dentro de otra carpeta si se tiene que poner 


*/
class Categoria extends BaseController{

    // Function sends all categorias to view
    public function index()
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // Get all Categories
        $categotias = $categoriaModel->asObject()->findAll();

        // Return a view and send categorias
        return view("/Dashboard/Categoria/index",["categorias" => $categotias]);
        
    }

    // Function print view new
    public function new()
    {
        // return the view
        return view("/Dashboard/Categoria/new", [
            "categoria" => new CategoriaModel()
        ]);
    }

    // Function processes data sent form view new
    public function create()
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        //validate data
        // this return boolean: "True" or "False"
        // set the group or rules defined in /app/Config/Validation
        if ($this->validate("categorias")){

            // insert data in Categoria table
            // the method return the id of record
            $result =  $categoriaModel->insert([
                "title" => $this->request->getPost("title") // get the data
            ]);

            // check result
            if (gettype($result) == "integer"){
                // if result is an integer, the insert worked and redirect.
                //This redirect to index funccion in Pelicula Controller
                //We can send flash messages with the function "with". It needs 2 params, a key and the message
                return redirect()->to("/dashboard/categoria")->with("mensaje", " Registro Creado Exitosamente");
            }else{
                // if it aren't integer, the insert didn´t work
                return "erro al insertar data";
            }
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
    }

    // function to show detail of category
    public function show($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // Select categoria with the id
        $categoria = $categoriaModel->asObject()->find($id);

        // return view and sends the categry
        return view("/Dashboard/Categoria/show",[
            "categoria" => $categoria
        ]);
        
    }

    public function edit($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // Select categoria with the id
        $categoria = $categoriaModel->asObject()->find($id);

        // return view and sends the categry
        return view("/Dashboard/Categoria/edit",[
            "categoria" => $categoria
        ]);
    }

    // finction update the data sent from edit view 
    //it gets an id
    public function update($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        //validate data
        // this return boolean: "True" or "False"
        // set the group or rules defined in /app/Config/Validation
        if ($this->validate("categorias")){

            // the method Updaate the record
            // it return nothing
            $resultUpdate = $categoriaModel->update($id,[
                "title" => $this->request->getPost("title")
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
    }


    // This function delete a record
    // it gets an id
    public function delete($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // It delete a record
        $delete = $categoriaModel->delete($id);

        // This redirect to previous path
        //We can send flash messages with the function "with". It needs 2 params, a key and the message
        //return redirect()->back()->with("mensaje", " Registro Eliminado Exitosamente");
        
        //We have another way to send flash message
        session()->setFlashdata("mensaje", " Registro Eliminado Exitosamente");//The params are the same that the other way.
        
        return redirect()->back();
        
    }

    
}