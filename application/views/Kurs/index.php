<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h1 class="p_rank">Kursy</h1>
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-1">
			<a href="<?= site_url('Kurs/1') ?>">
				<div class="frame_kurs frame1 transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 1.</span></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<a href="<?= site_url('Kurs/2') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 2.</span></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<a href="<?= site_url('Kurs/3') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 3.</span></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-5 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-1 col-md-offset-0 col-lg-offset-0">
			<a href="<?= site_url('Kurs/4') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 4.</span></p>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-5 col-md-6 col-lg-2 col-xs-offset-2 col-sm-offset-1 col-md-offset-0 col-lg-offset-0">
			<a href="<?= site_url('Kurs/5') ?>">
				<div class="frame_kurs transition_kurs">
					<p class="name_kurs success new-label"><span class="align">Kurs 5.</span></p>
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

<!--$color = zielone lub czerwone z zależności czy zdane czy nie-->
<!--$info = informacja czy zdane czy nie (w egzaminach dodatkowo %)-->
<script> 
$('.frame1').mouseenter(function(){  stare = $(this).html();  
  $(this).html("<p style='background-color:$color;' class='name_kurs success new-label'><span class='align'> $info</span></p>");   }) 
 
$('.frame1').mouseleave(function(){  $(this).html(stare);   }) 
</script>