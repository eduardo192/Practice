<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/categoria/create" method="post">
        <?= view("Categoria/_form",["op" => "Crear"]) ?>
    </form>
</body>
</html>