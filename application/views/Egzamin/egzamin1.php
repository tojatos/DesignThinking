<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $pytania = $exam_content; dump($pytania); ?>
Egzamin 1
<form class="pytanie_form" action="" method="post">
<?php
	$first = true;
	foreach ($pytania as $pytanie): ?>
	<div class="pytanie" <?= ($first) ? : 'style="display:none"' ?>>
		<h2>Pytanie <?= $pytanie->id_pytanie ?></h2>
		<p><?= $pytanie->tresc ?></p>
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="A">
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="B">
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="C">
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="D">
	</div>
	<button type="button" class="next">Następne pytanie</button>
	<?php endforeach; ?>
	<input type="submit" value="Zakończ egzamin">
</form>
