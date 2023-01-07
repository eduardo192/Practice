<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "id";
    protected $allowedFields = ["title"];
    protected $useAutoIncrement = true;

    public function get($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id' => $id])->first();
    }

}