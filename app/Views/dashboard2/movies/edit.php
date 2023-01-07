
<?= view("dashboard/partials/_form-error"); ?>
<form action="/movie/update/<?= $movie->id ?>" enctype="multipart/form-data" method="POST">

    <?= view("dashboard/movies/_form",["textButton" => "Actualizar", "created" => false ]); ?>
    
</form> 

<?= view("dashboard/movies/_images"); ?>