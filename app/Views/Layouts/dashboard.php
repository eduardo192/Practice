<!-- This is the lyout, here we can load our content -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulode Dashboard</title>
</head>
<body>

    <!-- load the title -->
    <?= $this->renderSection("header") ?>

    <!-- Shows the flash message -->
    <?= view("Partials/_session") ?>


    <!-- With this funciton load content with the key "contenido" -->
    <!-- some view must have a section named "contenido" -->
    <!-- In this case it is in the index view of categoria -->
    <?= $this->renderSection("contenido") ?>
</body>
</html>