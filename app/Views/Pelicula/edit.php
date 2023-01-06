<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Pelicula</title>
</head>
<body>

    <!-- Make form to update data -->
    <form action="/pelicula/update/<?= $pelicula["id"] ?>" method="post">
        <!-- The data is processes by Pelicula controller though create fucntion-->
        <!-- Load the inputs of form from view _form, you need set a value of the button by "op" -->
        <?= view("Pelicula/_form",["op" => "Actualizar"])//op must contents the name fo the button   ?>
    </form>
</body>
</html>