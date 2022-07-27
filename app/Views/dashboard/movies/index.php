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
                <td><?= $m ?></td>
                <td>Superman</td>
                <td></td>
            </tr>
        <?php endforeach ?>
        
    </tbody>
</table>