<?php 

namespace App\Controllers;
use App\Models\CategoriaModel;
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
        $categotias = $categoriaModel->findAll();

        // Return a view and send categorias
        return view("Categoria/index",["categorias" => $categotias]);
        
    }

    // Function print view new
    public function new()
    {
        // return the view
        return view("Categoria/new", [
            "categoria" => [
                "title" => ""
            ]
        ]);
    }

    // Function processes data sent form view new
    public function create()
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // insert data in Categoria table
        // the method return the id of record
        $result =  $categoriaModel->insert([
            "title" => $this->request->getPost("title") // get the data
        ]);

        // check result
        if (gettype($result) == "integer"){
            // if it is an integer, the insert worked.
            return "Success";
        }else{
            // if it aren't integer, the insert didn´t work
            return "erro al insertar data";
        }
    }

    // function to show detail of category
    public function show($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // Select categoria with the id
        $categoria = $categoriaModel->find($id);

        // return view and sends the categry
        return view("Categoria/show",[
            "categoria" => $categoria
        ]);
        
    }

    public function edit($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // Select categoria with the id
        $categoria = $categoriaModel->find($id);

        // return view and sends the categry
        return view("Categoria/edit",[
            "categoria" => $categoria
        ]);
    }

    // finction update the data sent from edit view 
    //it gets an id
    public function update($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // the method Updaate the record
        // it return nothing
        $resultUpdate = $categoriaModel->update($id,[
            "title" => $this->request->getPost("title")
        ]);

        return $resultUpdate;
    }


    // This function delete a record
    // it gets an id
    public function delete($id)
    {
        // request of CategoriaModel
        $categoriaModel = new CategoriaModel();

        // It delete a record
        $delete = $categoriaModel->delete($id);

        return $delete;
        
    }

    
}