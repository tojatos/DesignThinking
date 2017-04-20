<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h1 class="p_rank">Kursy</h1>
<div class="container col-xs-12 col-sm-10 col-md-8 col-lg-8
				 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 ">
	 <a href="<?= site_url('Kurs/1') ?>">
		<div class="frame_kurs1 transition_kurs">
				<p class="name_kurs success new-label"><span class="align">Resuscytacja krążeniowo-oddechowa</span></p>
		</div>
	</a>
	<a href="<?= site_url('Kurs/2') ?>">
		<div class="frame_kurs2 transition_kurs">
				<p class="name_kurs success new-label"><span class="align">Oparzenia</span></p>
		</div>
	</a>
	<a href="<?= site_url('Kurs/3') ?>">
		<div class="frame_kurs3 transition_kurs">
				<p class="name_kurs success new-label"><span class="align">Omdlenia</span></p>
		</div>
	</a>
	<a href="<?= site_url('Kurs/4') ?>">
		<div class="frame_kurs4 transition_kurs">
				<p class="name_kurs success new-label"><span class="align">Postępowanie z AED</span></p>
		</div>
	</a>
	<a href="<?= site_url('Kurs/5') ?>">
		<div class="frame_kurs5 transition_kurs">
				<p class="name_kurs success new-label"><span class="align">Zadławienia</span></p>
		</div>
	</a>
</div>







<script>
$('.frame_kurs1').mouseenter(function(){  stare = $(this).html(); 
	$(this).html("Zobaczyłeś leżącego na ulicy mężczyznę. Co robisz? Uciekasz, pomagasz, a może nie wiesz co zrobić? Ten materiał przybliży Ci podstawowe zasady udzielania pierwszej pomocy podczas nagłego zatrzymania krążenia.");   })

$('.frame_kurs1').mouseleave(function(){  $(this).html(stare);   })

$('.frame_kurs2').mouseenter(function(){  stare = $(this).html(); 
	$(this).html("Oparzyłeś się gotując obiad. Co robisz? Zastanawiasz się co zrobić, a może nie robisz nic? Ten materiał przybliży Ci podstawowe zasady udzielania pierwszej pomocy podczas oparzeń.");   })

$('.frame_kurs2').mouseleave(function(){  $(this).html(stare);   })

$('.frame_kurs3').mouseenter(function(){  stare = $(this).html(); 
	$(this).html("Siedząc w autobusie pan siedzący obok Ciebie mówi ci że ma zawroty głowy, a po chwili traci świadomość. Co zrobić? Powiedzieć kierowcy, a może samemu udzielić pierwszej pomocy? Ten materiał przybliży Ci podstawowe zasady udzielania pierwszej pomocy podczas omdleń.");   })

$('.frame_kurs3').mouseleave(function(){  $(this).html(stare);   })

$('.frame_kurs4').mouseenter(function(){  stare = $(this).html(); 
	$(this).html("Dziś– kiedy AED (automatyczny elektryczny defibrylator) jest dostępny dosyć często postanowiliśmy przybliżyć Ci zasadę jego użycia, tak naprawdę bardzo prostą zasadę - znajdź i uruchom.");   })

$('.frame_kurs4').mouseleave(function(){  $(this).html(stare);   })

$('.frame_kurs5').mouseenter(function(){  stare = $(this).html(); 
	$(this).html("Razem z rodziną spożywasz posiłek. Nagle jeden z twoich bliskich zaczyna się zaczyna się dusić - okazuje się iż masz do czynienia z zadławieniem. Co robisz ? Pomagasz, zastanawiasz się co zrobić, a może zaczynasz działać? Ten kurs nauczy Cię jak postępować w takiej sytuacji!");   })

$('.frame_kurs5').mouseleave(function(){  $(this).html(stare);   })
</script>