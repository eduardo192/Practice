<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaModel extends Model
{
    protected $table = "peliculas";
    protected $primaryKey = "id";
    protected $allowedFields = ["title","description","categoryId"];

    public function get($id = null)
    {
        if ($id === null) {
            return $this->asObject()->findAll();
        }

        return $this->asObject()->where(['id' => $id]);
    }

    function getAll(){
        return $this->asArray()
        ->select("movies.*, categories.title AS category")
        ->join("categories", "categories.id = movies.categoryId")
        ->first();
    }

}