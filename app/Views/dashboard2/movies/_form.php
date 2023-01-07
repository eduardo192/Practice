
<div class="form-group">
    <label for="title">Title</label>
    <input type="input" class="form-control" id="title" name="title" value="<?= old("title", $movie->title) ?>"/><br />
</div>
<div class="form-group">
    <label for="description">Descripcion</label>
    <textarea name="description" class="form-control" id="description" cols="45" rows="4"><?= old("description", $movie->description) ?></textarea><br />
</div>

<?php if(!$created): ?>
    <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" class="form-control" name="image" />
    </div>
<?php endif ?>
<div class="form-group">

    <label for="categoryId">Categoria</label>
    <select name="categoryId" class="form-control" id="">
        <?php foreach($categories as $c): ?>
            <option <?= $movie->categoryId !== $c->id ?: "selected" ?> value="<?= $c->id ?>"><?= $c->title ?><?= $movie->categoryId !== $c->id ?: "- selected" ?></option>
        <?php endforeach ?>
    </select>
</div>

<input type="submit" class="btn btn-success" name="submit" value="<?= $textButton ?>" />