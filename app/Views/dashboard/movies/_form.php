

<label for="title">Title</label>
<input type="input" id="title" name="title" value="<?= old("title", $movie->title) ?>"/><br />

<label for="description">Text</label>
<textarea name="description" id="description" cols="45" rows="4"><?= old("description", $movie->description) ?></textarea><br />

<?php if(!$created): ?>
    <label for="image">Imagen</label>
    <input type="file" name="image" />
<?php endif ?>
<label for="categoryId">Categoria</label>
<select name="categoryId" id="">
    <?php foreach($categories as $c): ?>
        <option value="<?= $c->id ?>"><?= $c->title ?></option>
    <?php endforeach ?>
</select>
<input type="submit" name="submit" value="<?= $textButton ?>" />