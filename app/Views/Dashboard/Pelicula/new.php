<!-- load the lyout -->
<?= $this->extend("Layouts/dashboard") ?>

<!-- Select the title like "header" to it can be render -->
<?= $this->section("header")  ?>
    <h1>Crear Pelicula</h1>
<?= $this->endSection() ?>

<!-- we indicate what it will be show when we will render the sction "contenido"  -->
<?= $this->section("contenido")  ?>
    
    
    <!-- Shows the flash message -->
    <?= view("Partials/_session") ?>

    <!-- Make form to send data -->
    <form action="/dashboard/pelicula/create" method="post">
        <!-- The data is processes by Pelicula controller though create fucntion-->
        <!-- Load the inputs of form from view _form, you need set a value of the button by "op" -->
        <?= view("/Dashboard/Pelicula/_form",["op" => "Crear"])//op must contents the value fo the button   ?>
    </form>

<?= $this->endSection() ?>