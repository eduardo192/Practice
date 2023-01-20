<label for="inpTitle">Titulo: </label>
<input type="text" name="title" id="inpTitle" placeholder="Titulo" value="<?= old("title", $categoria["title"]) ?>">
<button type="submit"><?= $op ?></button>