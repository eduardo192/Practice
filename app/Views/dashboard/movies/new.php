
<?= $validation->listErrors() ?>
<form action="post" method="POST">
    <?= view("dashboard/movies/_form",["movie" => $movie]); ?>
</form>