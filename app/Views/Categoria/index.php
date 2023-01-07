<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <!-- Title of seccion -->
    <h1>Listado de Categorias</h1>
    <!-- Link to view to create a new category -->
    <a href="/dashboard/categoria/new">Crear</a>

    <!-- Table by show categories -->
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>

            <!-- php code to print the data-->
            <?php foreach ($categorias as $key => $categoria): ?>
                <tr>
                    <!-- categoria has each record -->
                    <td><?= $categoria["id"] ?></td>
                    <td><?= $categoria["title"] ?></td>

                    <!-- link redirect to function show in the categoria Controller -->
                    <td><a href="/dashboard/categoria/show/<?= $categoria["id"] ?>">Show</a></td>
                    <!-- link redirect to function edit in the categoria Controller -->
                    <td><a href="/dashboard/categoria/edit/<?= $categoria["id"] ?>">Edit</a></td>
                    <td>
                        <!-- Thsi sends post request to function remove in the Categoria Controller and deletes the recod -->
                        <form action="/dashboard/categoria/delete/<?= $categoria["id"] ?>" method="post">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>