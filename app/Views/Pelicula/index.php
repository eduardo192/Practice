<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h1>Listado de Peliculas</h1>
    <!-- Link redirect to view create movie -->
    <a href="/pelicula/new">Crear</a>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Description</th>
            <th>Opciones</th>
        </tr>
        <!-- Imprir peliculas dentro del arrya mandado como paremtro desde el controlador peliculas, funcion index -->
        <?php foreach ($peliculas as $key => $p) : ?>
            <tr>
                <!-- Print each data in a table -->
                <td><?= $p["id"] ?></td>
                <td><?= $p["title"] ?></td>
                <td><?= $p["description"] ?></td>
                <td>
                    <!-- Set id in the url that redirect to show funciton in Pelicula controller -->
                    <a href="/pelicula/show/<?= $p["id"] ?>">Show</a>
                    <!-- Set ids in the url that redirect to edit funciton -->
                    <a href="/pelicula/edit/<?= $p["id"] ?>">Edit</a>
                    <!-- Set ids in the url that redirect to remove funciton -->
                    <form action="/pelicula/delete/<?= $p["id"] ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</body>
</html>