<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container"><h1><b>Omdlenia</b></h1>
<p><i>Siedząc w autobusie pan siedzący obok Ciebie mówi Ci że ma zawroty głowy, a po chwili traci świadomość. Co zrobić? Powiedzieć kierowcy, a może samemu udzielić pierwszej pomocy? Ten materiał przybliży Ci podstawowe zasady udzielania pierwszej pomocy podczas omdleń.
</i></p>
<div class="kurs_inner">
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto1.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">1. Zadbaj o swoje bezpieczeństwo!</b></br>
			Jak zawsze musisz czućsię bezpieczny żeby zacząć udzielać pierwszej pomocy osobie poszkodowanej. W przypadku omdleń  raczej nie będzie występowaćżadne zagrożenie dla pomagającego ale zawsze lepiej to sprawdzić.
        </div>
</div>
</br>
<div class="row">
        <img class="img-responsive pull-right col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto12.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">2. Zapewnienie dostępu do powietrza!</b></br>
			Wynieś poszkodowanego z miejsca w którym omdlał. Jeśli jest to niemożliwe zapewnij mu dostęp do świeżego powietrza.
        </div>
</div>
</br>
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto13.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">3. Pozycja na wznak</b></br>
			Aby udzielenie pierwszej pomocy było łatwiejsze i wygodniejsze ułóż poszkodowanego na wznak – w pozycji leżącej na plecach.
        </div>
</div>
</br>
<div class="row">
        <img class="img-responsive pull-right col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto5.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">4. Ocena funkcji życiowych!</b></br>
			Udrożnij drogi oddechowe poszkodowanego i sprawdź czy prawidłowo oddycha (przez 10 sekund). Jeśli nie oddycha prawidłowo postępuj zgodnie z zasadami RKO, zaśjeśli oddycha przejdź do następnego kroku.
        </div>
</div>
</br>
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto14.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">5. Uniesienie nóg poszkodowanego</b></br>
			<p>Unieś nogi poszkodowanego do góry aby zapewnić mu lepsze krążenie krwi, a co za tym idzie, szybsze dostarczenie tlenu do komórek.</p>
        </div>
</div>
</br>
<div class="row">
        <img class="img-responsive pull-right col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto7.jpg" />
	<div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6">
                <p>Po chwili powinna odzyskać świadomość, jeśli tak się nie stanie masz do czynienia z utratą przytomności i bezwzględnie powinieneś sprawdzić ponownie oddech, ułożyć poszkodowanego w pozycji bezpiecznej oraz wezwać pogotowie ratunkowe  (numer 999 lub 112). Nie zapominaj o dalszej kontroli oddechu, aż do przyjazdu zespołu ratownictwa medycznego.</p>
        </div>
</div>
</br>

<?php if(!$has_finished_kurs):?>
<form class="finish_kurs_form" action="" method="post">
	<input type="hidden" name="kurs_id" value="3">
	<input type="submit" class="btn btn-success btn-lg" value="Zakończ kurs 3">
</form>
<?php else: ?>
  <a class="btn btn-primary btn-lg" href="<?= site_url('Egzamin/3') ?>">Rozpocznij egzamin z tego kursu</a>
  <a class="btn btn-success btn-lg" href="<?= site_url('Kurs/4') ?>">Następny kurs</a>
<?php endif; ?>
</div>
