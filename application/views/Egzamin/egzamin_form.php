<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $pytania = $exam_content['pytania']; ?>
<?php $id_egzamin = $exam_content['id_egzamin']; ?>
<?php shuffle($pytania); ?>
Egzamin <?= $id_egzamin ?>
<form class="egzamin_form" action="" method="post">
<input type="hidden" name="kurs_id" value="<?= $id_egzamin ?>">
<?php $last = count($pytania)-1; ?>
<?php $numer_pytania = 0; ?>
<?php	foreach ($pytania as $key=>$pytanie): ?>
<?php	shuffle ($pytanie->odpowiedzi) ?>
<?php	$numer_pytania++ ?>
	<div class="pytanie<?= ($key==0) ? : ' hidden"' ?>">
		<h2>Pytanie <?= $numer_pytania ?></h2>
		<p><?= $pytanie->tresc ?></p>
		<?php foreach ($pytanie->odpowiedzi as $litera => $odpowiedz): ?>
			<input type="radio" name="pytanie_<?= $pytanie->id_pytanie ?>" value="<?= $litera ?>"><label><?= $odpowiedz ?></label>
		<?php endforeach; ?>
		<?php if($key!=$last): ?>
			<button type="button" class="next">Następne pytanie</button>
		<?php else: ?>
			<input type="submit" value="Zakończ egzamin">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
