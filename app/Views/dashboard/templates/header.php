<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--el valor en la etiqeta ref lo que hace es cambier el ultimo valor de la url-->
    <!-- 
        el metodo route_to(nombre,parametros) que trae la url asociado con el nombre pasado como primero parametro, 
        despues se indican los parametros que se tengan que enviar por la url si es el caso 
    -->
    <a href="<?= route_to('contacto','Jusan')?>">Contacto</a>
    <h1><?= $title//clave del array usado como variable en la vista ?></h1>
    <?= view("dashboard/partials/_session"); ?>
