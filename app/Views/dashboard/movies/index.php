<a href="/movie/new">Crear</a>


<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($movies as $key => $m):?>
            <tr>
                <td><?= $m->id ?></td>
                <td><?= $m->title ?></td>
                <td><?= $m->category ?></td>
                <td>
                    <form action="/movie/delete/<?= $m->id ?>" method="POST">
                        <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Borrar" />
                    </form>

                    <a class="mt-2 btn btn-danger btn-sm" href="/movie/<?= $m->id ?>/edit">Editar</a>
                </td>
            </tr>
        <?php endforeach ?>
        
    </tbody>
</table>

<?= $pager->links()//Crea los links de forma automatica para la paginacion ?>