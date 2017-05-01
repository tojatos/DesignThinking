<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h1 class="p_rank">Kursy</h1>
<div class="container">
	<div class="row col-lg-offset-1 col-md-offset-1">
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-4 col-xs-offset-2 col-sm-offset-0 col-md-offset-1 col-lg-offset-0">
			<a href="<?= site_url('Kurs/1') ?>">
				<div class="frame_kurs frame1 transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 1.</span>
					<?= ($kurs_finish_states[1]) ? "<span class='status_t'>ukończony</span>":"<span class='status_f'>nieukończony</span>" ?></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-4 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<a href="<?= site_url('Kurs/2') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 2.</span>
					<?= ($kurs_finish_states[2]) ? "<span class='status_t'>ukończony</span>":"<span class='status_f'>nieukończony</span>" ?></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-4 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			
			<a href="<?= site_url('Kurs/3') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 3.</span>
					<?= ($kurs_finish_states[3]) ? "<span class='status_t'>ukończony</span>":"<span class='status_f'>nieukończony</span>" ?></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3 col-xs-offset-2 col-sm-offset-1 col-md-offset-2 col-lg-offset-2">
			<a href="<?= site_url('Kurs/4') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 4.</span>
					<?= ($kurs_finish_states[4]) ? "<span class='status_t'>ukończony</span>":"<span class='status_f'>nieukończony</span>" ?></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-3 col-xs-offset-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
			<a href="<?= site_url('Kurs/5') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 5.</span>
					<?= ($kurs_finish_states[5]) ? "<span class='status_t'>ukończony</span>":"<span class='status_f'>nieukończony</span>" ?></p>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="info">
		Fotografie: Sekcja ratownictwa medycznego SzK LOK
		</div>
	</div>
</div>
