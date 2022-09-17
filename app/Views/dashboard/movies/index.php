<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($movies as $key => $m):?>
            <tr>
                <td><?= $m->id ?></td>
                <td><?= $m->title ?></td>
                <td>
                    <form action="/movie/delete/<?= $m->id ?>" method="POST">
                        <input type="submit" name="submit" value="Borrar" />
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
        
    </tbody>
</table>

<?= $pager->links()//Crea los links de forma automatica para la paginacion ?>