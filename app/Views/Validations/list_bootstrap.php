<?php if (! empty($errors)) : ?>
	<div class="errors" role="alert">
		<ul>
		<?php foreach ($errors as $error) : ?>
			<div class="alert alert-danger"><?= esc($error) ?></div>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
