<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $allowedFields = ["title","description"];

    public function get($id = null)
    {
        if ($id === null) {
            return $this->asObject()->findAll();
        }

        return $this->asObject()->where(['id' => $id]);
    }

}