<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'id';

    public function get($id = null)
    {
        if ($id === null) {
            return $this->asObject()->findAll(10,10);
        }

        return $this->asObjact()->where(['id' => $id])->first();
    }

}