<!-- load the lyout -->
<?= $this->extend("Layouts/dashboard") ?>

<!-- Select the title like "header" to it can be render -->
<?= $this->section("header")  ?>
    <h1>Listado de Peliculas</h1>
<?= $this->endSection() ?>

<!-- we indicate what it will be show when we will render the sction "contenido"  -->
<?= $this->section("contenido")  ?>


    <!-- Link redirect to view create movie -->
    <a href="/dashboard/pelicula/new">Crear</a>
    <table>
        <tr>
            <th>id</th>
            <th>Titulo</th>
            <th>Description</th>
            <th colspan="4">Opciones</th>
        </tr>
        <!-- Imprir peliculas dentro del arrya mandado como paremtro desde el controlador peliculas, funcion index -->
        <?php foreach ($peliculas as $key => $p) : ?>
            <tr>
                <!-- Print each data in a table -->
                <td><?= $p->id?></td>
                <td><?= $p->title ?></td>
                <td><?= $p->description ?></td>
                <!-- Set id in the url that redirect to show funciton in Pelicula controller -->
                <td><a href="/dashboard/pelicula/show/<?= $p->id ?>">Show</a></td>
                <!-- Set ids in the url that redirect to edit funciton -->
                <td><a href="/dashboard/pelicula/edit/<?= $p->id ?>">Edit</a></td>
                <td>
                    <!-- Set ids in the url that redirect to remove funciton -->
                    <form action="/dashboard/pelicula/delete/<?= $p->id ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </td>                
                    
            </tr>
        <?php endforeach ?>

    </table>

<?= $this->endSection() ?>