<!-- load the lyout -->
<?= $this->extend("Layouts/dashboard") ?>

<!-- Select the title like "header" to it can be render -->
<?= $this->section("header") ?>
    <!-- Title of seccion -->
    <h1>Listado de Categorias</h1>
<?= $this->endSection() ?>

<!-- we indicate what it will be show when we will render the sction "contenido"  -->
<?= $this->section("contenido") ?>

    
        
    <!-- Link to view to create a new category -->
    <a href="/dashboard/categoria/new">Crear</a>

    <!-- Table by show categories -->
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th colspan="4">Opcion</th>
            </tr>
        </thead>
        <tbody>

            <!-- php code to print the data-->
            <?php foreach ($categorias as $key => $categoria): ?>
                <tr>

                    <!-- categoria has each record -->
                    <td><?= $categoria->id ?></td>
                    <td><?= $categoria->title ?></td>

                    <td>
                        <!-- link redirect to function show in the categoria Controller -->
                        <td><a href="/dashboard/categoria/show/<?= $categoria->id ?>">Show</a></td>
                        <!-- link redirect to function edit in the categoria Controller -->
                        <td><a href="/dashboard/categoria/edit/<?= $categoria->id ?>">Edit</a></td>
                        <td>
                            <!-- Thsi sends post request to function remove in the Categoria Controller and deletes the recod -->
                            <form action="/dashboard/categoria/delete/<?= $categoria->id ?>" method="post">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </td>
                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
<?= $this->endSection() ?>

