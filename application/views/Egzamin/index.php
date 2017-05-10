<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h1 class="p_rank">Egzaminy</h1>
<div class="container">
	<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-0 col-md-offset-2 col-lg-offset-0">
				<a href="<?= site_url('Egzamin/1') ?>">
					<div class="frame_kurs transition_kurs">
						<p class="name_kurs success new-label"><span class="align">1. Resuscytacja krążeniowo-oddechowa</span></br>
						<?= ($exam_results[1] != null && $exam_results[1] >= TRESHOLD) ? 
						"<span class='status_t'>zdany":"<span class='status_f'>nie zdany" ?>
						<?= ($exam_results[1] != null) ? $exam_results[1].'%</span>' : '</span>'  ?></p>
					</div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
				<a href="<?= site_url('Egzamin/2') ?>">
					<div class="frame_kurs transition_kurs">
						<p class="name_kurs success new-label"><span class="align">2. Oparzenia</span></br>
						<?= ($exam_results[2] != null && $exam_results[2] >= TRESHOLD) ? 
						"<span class='status_t'>zdany":"<span class='status_f'>nie zdany" ?>
						<?= ($exam_results[2] != null) ? $exam_results[2].'%</span>' : '</span>'  ?></p>
					</div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-0 col-md-offset-4 col-lg-offset-0">
				<a href="<?= site_url('Egzamin/3') ?>">
					<div class="frame_kurs transition_kurs">
						<p class="name_kurs success new-label"><span class="align">3. Omdlenia</span></br>
						<?= ($exam_results[3] != null && $exam_results[3] >= TRESHOLD) ? 
						"<span class='status_t'>zdany":"<span class='status_f'>nie zdany" ?>
						<?= ($exam_results[3] != null) ? $exam_results[3].'%</span>' : '</span>'  ?></p>
					</div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-2 col-lg-offset-2">
				<a href="<?= site_url('Egzamin/4') ?>">
					<div class="frame_kurs transition_kurs">
						<p class="name_kurs success new-label"><span class="align">4. Postępowanie z AED</span></br>
						<?= ($exam_results[4] != null && $exam_results[4] >= TRESHOLD) ? 
						"<span class='status_t'>zdany":"<span class='status_f'>nie zdany" ?>
						<?= ($exam_results[4] != null) ? $exam_results[4].'%</span>' : '</span>'  ?></p>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-3 col-md-offset-1 col-lg-offset-1">
				<a href="<?= site_url('Egzamin/5') ?>">
					<div class="frame_kurs transition_kurs">
						<p class="name_kurs success new-label"><span class="align">5. Zadławienia</span></br>
						<?= ($exam_results[5] != null && $exam_results[5] >= TRESHOLD) ? 
						"<span class='status_t'>zdany":"<span class='status_f'>nie zdany" ?>
						<?= ($exam_results[5] != null) ? $exam_results[5].'%</span>' : '</span>'  ?></p>
					</div>
				</a>
			</div>
		</div>
	</div>
