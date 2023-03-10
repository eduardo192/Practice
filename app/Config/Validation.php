<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public $movies = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'min_length[3]|max_length[5000]'
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        //'list'   => 'CodeIgniter\Validation\Views\list',
        "list"   => 'App\Views\Validations\list_bootstrap',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    //define validation rules to categories
    public $categorias = [
        // the key will be appropriate for name of item in the form
        "title" => "required|min_length[3]|max_length[255]"
    ];

    // define validation rules to movies
    public $peliculas = [
        "title" => "required|min_length[3]|max_length[255]",
        "description" => "required|min_length[3]|max_length[2000]",
    ];
}
