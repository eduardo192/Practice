<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
</head>
<body>

    <h1>Editar Categoria</h1>
    <!-- Form to update the data and send -->
    <!-- The Categoria Controller would send the categoty to update -->
    <form action="/categoria/update/<?= $categoria["id"] ?>" method="post">
       <?= view("Categoria/_form",["op" => "Actualizar"]) ?>
    </form>
</body>
</html>