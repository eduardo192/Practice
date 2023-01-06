<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Variable sent by movie controller in the function show -->
    <!-- It contents a movie -->
    <title><?= $pelicula["title"] ?></title>
</head>
<body>
    
    <h1>Titulo: <?= $pelicula["title"] ?></h1>
    <p>Descripcion: <?= $pelicula["description"] ?></p>
</body>
</html>