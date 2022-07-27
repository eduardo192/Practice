<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function contacto($name = "Pepe")
    {
         //array que contine los valores que se van a madra por parametro a las vistas
         $dataHeader = [
            //este dato se pude acceder desde la vista usando la clave del array como una variable php
            'title' => 'Contacto '.$name
        ];


        //los datos que se quieren mandar hacia las vistas se ponen como segundo paramatro en la vista y debe ser un array 
        echo view("dashboard/templates/header",$dataHeader);
        echo view('welcome_message');
        echo view("dashboard/templates/footer");
    }
}
