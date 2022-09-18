
<?= $validation->listErrors() ?>
<form action="/movie/update/<?= $movie->id ?>" method="POST">

    <?= view("dashboard/movies/_form",["movie" => $movie]); ?>
    
</form> 