<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $questions = $exam_content['questions']; ?>
<?php $id_egzamin = $exam_content['exam_id']; ?>
<?php shuffle($questions); ?>
Egzamin <?= $id_egzamin ?>
<form class="egzamin_form" action="" method="post">
<input type="hidden" name="kurs_id" value="<?= $id_egzamin ?>">
<?php $last = count($questions)-1; ?>
<?php $number_questions = 0; ?>
<?php	foreach ($questions as $key=>$question): ?>
<?php	shuffle_assoc($question->answers) ?>
<?php	$number_questions++ ?>
	<div class="question<?= ($key==0) ? : ' hidden"' ?>">
		<h2>Pytanie <?= $number_questions ?></h2>
		<p><?= $question->content ?></p>
		<?php foreach ($question->answers as $letter => $answer): ?>
			<input type="radio" name="question_<?= $question->id_question ?>" value="<?= $letter ?>"><label><?= $answer ?></label>
		<?php endforeach; ?>
		<?php if($key!=$last): ?>
			<button type="button" class="next">Następne pytanie</button>
		<?php else: ?>
			<input type="submit" value="Zakończ egzamin">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
