<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $pytania = $exam_content['pytania']; ?>
<?php $id_egzamin = $exam_content['id_egzamin']; ?>
Egzamin <?= $id_egzamin ?>
<form class="egzamin_form" action="" method="post">
<input type="hidden" name="kurs_id" value="<?= $id_egzamin ?>">
<?php
	$last = count($pytania)-1;
	foreach ($pytania as $key=>$pytanie): ?>
	<div class="pytanie<?= ($key==0) ? : ' hidden"' ?>">
		<h2>Pytanie <?= $pytanie->id_pytanie ?></h2>
		<p><?= $pytanie->tresc ?></p>
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="A"><label><?= $pytanie->odpowiedzi['A'] ?></label>
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="B"><label><?= $pytanie->odpowiedzi['B'] ?></label>
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="C"><label><?= $pytanie->odpowiedzi['C'] ?></label>
		<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="D"><label><?= $pytanie->odpowiedzi['D'] ?></label>
		<?php if($key!=$last): ?>
			<button type="button" class="next">Następne pytanie</button>
		<?php else: ?>
			<input type="submit" value="Zakończ egzamin">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
