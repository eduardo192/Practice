<?php namespace App\Controllers;

// este use se coloca para que podamos alcanzar el Base Controller desde la capreta en la que estamos.
use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Models\MovieImagesModel;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Movie extends BaseController{
   
    public function index(){
        echo session("message");
        $movie = new MovieModel();

        $data = [
            /* 
                paginate nos ayuda a hacer la paginacion.
                El primer parametro indica la cantidad de registros que queremos traer a la vez.
            */
            'movies' => $movie->asObject()->paginate(10),
            //instncia para poder usar el pager link
            'pager' => $movie->pager

        ];

        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        $this->_loadDefaulView('Listado de Peliculas',$data,'index');
    }

    public function new(){
        $category = new CategoryModel();

        //Para que la visualizacion de errores funcione es necesario instanciar a la funcion
        $validation = \Config\Services::validation();
        
        $this->_loadDefaulView('Crear una Pelicula', ['validation' => $validation, "movie" => new MovieModel(), "categories" => $category->asObject()->findAll()], 'new');
        
    }

    public function edit($id = null){
        $movie = new MovieModel();

        if ($movie->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        

        echo "Session: ";

        //Para que la visualizacion de errores funcione es necesario instanciar a la funcion
        $validation = \Config\Services::validation();
        
        $this->_loadDefaulView('Crear una Pelicula', ['validation' => $validation, "movie" => $movie->asObject()->find($id)], 'edit');
        
    }

    public function update($id = null){
        $movie = new MovieModel();

        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
        ])){
            $movie->update($id, [
                "title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description')
            ]);// Insserta los datos en la tabla

            $this->_upload($id);
            return redirect()->to("/movie")->with("message", "pelicula actualizada con exito");
        }
        return redirect()->back()->withInput();// redirecciona a la vista anterior mandado los datos que se teneian como mensaje tipo flash   
    }

    public function testPost(){
        $movie = new MovieModel();

        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
        ])){
            $id = $movie->insert([
                "title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
                "categoryId" => $this->request->getPost('categoryId')
            ]);// Insserta los datos en la tabla
            return redirect()->to("/movie/$id/edit")/*redirecciona a una url dada*/->with("message", "pelicula creada con exito");//manda un mensaje tipo flash mendiante la SECION el cual solo fucnciona por una peticion
        }
        return redirect()->back()->withInput();
               
    }
    

    public function show ($id = null){
        $movie = new MovieModel();

        if ($movie->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        var_dump($movie->find($id));
    }

    public function delete ($id = null){
        $movie = new MovieModel();

        if ($movie->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
      
        $movie->delete($id);
        return redirect()->to("/movie")->with("message", "pelicula eliminada con exito");        
    }


    private function _upload($movieId){
        $images = new MovieImagesModel();
        if ($imagefile = $this->request->getFile("image")) {
           
            if ($imagefile->isValid() && ! $imagefile->hasMoved()) {
                
                $newName = $imagefile->getRandomName();
                $imagefile->move(WRITEPATH . 'uploads/movies/'.$movieId, $newName);

                $images->save([
                    "movieId" => $movieId,
                    "images" => $newName
                ]);
            }
            
        }
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