<?= view("dashboard/partials/_form-error"); ?>
<form action="post" enctype="multipart/form-data" method="POST">
    <?= view("dashboard/movies/_form",["textButton" => "Guardar", "created" => TRUE ]); ?>
</form>