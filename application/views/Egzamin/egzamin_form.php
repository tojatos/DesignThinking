<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $questions = $exam_content['questions']; ?>
<?php $id_egzamin = $exam_content['exam_id']; ?>
<?php shuffle($questions); ?>
<form class="egzamin_form col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2
							col-sm-8 col-sm-offset-2 col-sx-8 col-sx-offset-1" action="" method="post">
<input type="hidden" name="kurs_id" value="<?= $id_egzamin ?>">
<?php $last = count($questions)-1; ?>
<?php $number_questions = 0; ?>
<?php	foreach ($questions as $key=>$question): ?>
<?php	shuffle_assoc($question->answers) ?>
<?php	$number_questions++ ?>
	<div class="question<?= ($key==0) ? '' : ' hidden' ?>">
		<h2 class="p_rank">Pytanie <?= $number_questions ?></h2>
		<p class="question"><?= $question->content ?></p>
		<?php foreach ($question->answers as $letter => $answer): ?>
			<div class="option"><label class="option"><input type="radio" name="question_<?= $question->id_question ?>" value="<?= $letter ?>"><?= $answer ?></label></div>
		<?php endforeach; ?>
		<?php if($key!=0): ?>
			<button type="button" class="prev">Poprzednie pytanie</button>
		<?php endif; ?>
		<?php if($key!=$last): ?>
			<button type="button" class="next">Następne pytanie</button>
		<?php else: ?>
			<input type="submit" value="Zakończ egzamin">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
