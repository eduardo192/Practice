<!-- load the lyout -->
<?= $this->extend("Layouts/dashboard") ?>

<!-- Select the title like "header" to it can be render -->
<?= $this->section("header") ?>
    <!-- Title of seccion -->
    <h1>Crear Categoria</h1>

<?= $this->endSection() ?>

<!-- Select the content like "header" to it can be render -->
<?= $this->section("contenido") ?>
    
    <form action="/dashboard/categoria/create" method="post">
        <?= view("Dashboard/Categoria/_form",["op" => "Crear"]) ?>
    </form>

<?= $this->endSection() ?>
    
    