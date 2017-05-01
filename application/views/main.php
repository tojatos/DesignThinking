<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
		<div class="jumbotron">
				<h1>Witaj młody ratowniku</h1>
				<p>Dzięki tej stronie możesz dowiedzieć się więcej na temat ratowania ludzkiego życia</p>
				<p>Możesz ukończyć kursy, a następnie sprawdzić się w egzaminach</p>
				<p>Aby zdać egzamin, musisz go zdać na minimum <?= TRESHOLD ?>%. Powodzenia!</p>
				<p><a class="btn btn-primary btn-lg" href="<?= site_url('Kurs') ?>" role="button">Przejdź do kursów</a></p>
		</div>
		<div class="jumbotron">
				<h1>Karta młodego ratownika</h1>
		<?php if(!$this->session->is_logged): ?>
					<p>W nagrodę po zdaniu wszystkich egzaminów można zdobyć kartę młodego ratownika:</p>
					<img src="<?= site_url() ?>public/images/pdf.jpg" alt="Zdjęcie karty młodego ratownika">
		<?php else: ?>
			<?php if($finished_exams_number<5): ?>
				<p>Ukończono <?= $finished_exams_number ?> / 5 egzaminów. Ukończ je wszystkie aby zdobyć kartę młodego ratownika!</p>
			<?php else: ?>
						<form class="PDF_form" method="post">
									<input type="submit" class="btn btn-primary btn-lg" value="Pobierz kartę młodego ratownika">
						</form>
			<?php endif; ?>
		<?php endif; ?>
		</div>
</div>
