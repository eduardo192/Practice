<!-- Pice of code to optimizes -->

<label for="inpTitulo">Titulo</label>
<input type="text" name="title" placeholder="titulo" id="inpTitulo" value="<?= old("title",$pelicula->title)  ?>">
<label for="inpDescripcion">Descripción</label>
<textarea name="description" placeholder="Descripcion" id="inpDescripcion" ><?= old("description",$pelicula->description) ?></textarea>

<button type="submit"><?= $op //This variable contents a string to button ?></button>