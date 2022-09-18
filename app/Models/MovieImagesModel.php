<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieImagesModel extends Model
{
    protected $table = 'movie_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ["movieId","images"];

    

}