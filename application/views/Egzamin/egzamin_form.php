<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $questions = $exam_content['questions']; ?>
<?php $id_egzamin = $exam_content['exam_id']; ?>
<?php shuffle($questions); ?>
<div class="container">
<form class="egzamin_form col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1
				col-sm-10 col-sm-offset-1 col-sx-10 col-sx-offset-1" action="" method="post">
<input type="hidden" name="kurs_id" value="<?= $id_egzamin ?>">
<?php $last = count($questions)-1; ?>
<?php $number_questions = 0; ?>
<?php	foreach ($questions as $key=>$question): ?>
<?php	shuffle_assoc($question->answers) ?>
<?php	$number_questions++ ?>
	<div class="question<?= ($key==0) ? '' : ' hidden' ?>">
		<h2 class="p_rank">Pytanie <?= $number_questions ?></h2>
		<p class="question_content"><?= $question->content ?></p>
		<?php foreach ($question->answers as $letter => $answer): ?>
			<div class="option"><label><input type="radio" name="question_<?= $question->id_question ?>" value="<?= $letter ?>"><?= $answer ?><div class="border"></div></label></div>
		<?php endforeach; ?>
		<?php if($key!=0): ?>
			<button type="button" class="prev btn btn-primary">Poprzednie pytanie</button>
		<?php endif; ?>
		<?php if($key!=$last): ?>
			<button type="button" class="next btn btn-primary">Następne pytanie</button>
		<?php else: ?>
			<input type="submit" class="btn btn-success" value="Zakończ egzamin">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
</form>
</div>
