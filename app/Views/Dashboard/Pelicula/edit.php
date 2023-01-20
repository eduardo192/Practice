<!-- load the lyout -->
<?= $this->extend("Layouts/dashboard") ?>

<!-- Select the title like "header" to it can be render -->
<?= $this->section("header") ?>
    <!-- Title of seccion -->
    <h1>Editar Pelicula</h1>

<?= $this->endSection() ?>

<!-- Select the content to load in the lyout -->
<?= $this->section("contenido") ?>

    <!-- load view with the validation errors -->
    <?= view("Partials/_fromError") ?>
    
    <!-- Form to update the data and send -->
    <!-- The Categoria Controller would send the categoty to update -->
    <form action="/dashboard/pelicula/update/<?= $pelicula->id ?>" method="post">
       <?= view("Dashboard/pelicula/_form",["op" => "Actualizar"]) ?>
    </form>

<?= $this->endSection() ?>
