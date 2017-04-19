<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $exam_results = $user["exam_results"]; ?>
<div class="container">
<h1 class="jumbotron p_rank">Wyniki egzaminów</h1>
<table class='table table-hover'>
	<thead>
		<th>Nazwa</th>
		<th>Wynik</th>
		<th>Zdany</th>
	</thead>
	<tbody>
		<?php foreach ($exam_results as $key => $value): ?>
			<tr>
				<td><a href="<?= site_url('Egzamin/'.$key) ?>">Egzamin <?= $key ?></a></td>
				<td><?= ($value!=null) ? $value."%" : "Nie ukończony"  ?></td>
				<td><?= ($value!=null&&$value>=TRESHOLD) ? "Tak" : "Nie" ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>
</div>