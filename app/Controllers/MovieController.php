<?php namespace App\Controllers;

class MovieController extends BaseController{
    public function index(){
        echo 'Hola mundo Codeigniter 4';
    }

    public function test(){
        return view("test");
    }
}