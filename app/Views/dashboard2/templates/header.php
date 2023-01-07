<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?=base_url()?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url()?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CRUD
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url()?>/movie">Peliculas</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!--el valor en la etiqeta ref lo que hace es cambier el ultimo valor de la url-->
    <!-- 
        el metodo route_to(nombre,parametros) que trae la url asociado con el nombre pasado como primero parametro, 
        despues se indican los parametros que se tengan que enviar por la url si es el caso 
    -->
    <a href="<?= route_to('contacto','Jusan')?>">Contacto</a>
    <h1><?= $title//clave del array usado como variable en la vista ?></h1>
    
<div class="container">
    <?= view("dashboard/partials/_session"); ?>