<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container"><h1><b>Oparzenia</b></h1>
<p><i>Oparzyłeś się gotując obiad. Co robisz? Zastanawiasz się co zrobić, a może nie robisz nic? Ten materiał przybliży Ci podstawowe zasady udzielania pierwszej pomocy podczas oparzeń .</i></p>
<div class="kurs_inner">
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto1.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">1. Zadbaj o swoje bezpieczeństwo!</b></br>
			Jak zawsze, musisz zadbać o swoje bezpieczeń stwo. W przypadku oparzeń  ale i nie tylko, wskazane jest używanie rękawiczek ochronnych
	</div>
</div>
</br>
<div class="row">
        <img class="img-responsive pull-right col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto16.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">2. Wyeliminuj źródło ciepła lub czynnik parzący!</b></br>
			<p>Pierwszym, ważnym etapem udzielania pierwszej pomocy jest odcięcie poszkodowanego od źródła ciepła – czynnika parzącego. Często zdarza się, że poszkodowany sam – odruchem naturalnym, byłw stanie odciąć czynnik parzący.</p>
			<p><b>Sklasyfikuj z jakim oparzeniem masz do czynienia:</b></p>
			<p style="margin-left:10px;"><b>I stopień :</b> bolesne zaczerwienienie naskórka,</p>
			<p style="margin-left:10px;"><b>II stopień :</b> miękkie pęcherze wypełnione płynem, skóra jest żółtawa, przebijają naczynia krwionośne,</p>
			<p style="margin-left:10px;"><b>III stopień :</b> skóra jest biaława lub pokryta czarnymi strupami, najczęściej bez pęcherzy i niebolesna (im głębsze oparzenie, tym mniej bolesne).</p>
	</div>
</div>
</br>
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto17.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">3. Chłodzenie poparzonego miejsca!</b></br>
			Teraz przychodzi czas na chłodzenie poparzonego miejsca czystą, zimną, najlepiej bieżącą wodąprzez około 15 minut dużą powierzchnię lub do ustąpienia bólu w przypadku małej powierzchni. Im szybciej zaczniemy chłodzić poparzone miejsce, tym lepiej ponieważchłodzenie skraca czas przegrzania – zmniejsza głębokość oparzenia. Podczas chłodzenia należy uważać by nie doprowadzić do nadmiernego ochłodzenia organizmu. Trzeba również zwracać uwagę na różnego rodzaju biżuterię– trzeba ją zdjąć.
	</div>
</div>
</br>
<div class="row">
        <img class="img-responsive pull-right col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto18.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">4. Opatrunek</b></br>
			<p>Kolejnym krokiem jest osłonięcie rany jałowym opatrunkiem. Najpierw należy ranę okryć gazikami lub gazą w zależności od rozległości oparzenia, następnie gazę mocujemy przy pomocy bandaża. Trzeba zwrócić uwagę na to, aby opatrunek nie uwierałzbyt mocno na oparzone miejsce.</p>
	</div>
</div>
</br>
<div class="row">
        <img class="img-responsive col-xs-12 col-sm-12 col-md-8 col-lg-6" src="<?= site_url() ?>public/images/foto16.jpg" />
        <div class="kurs_content col-xs-12 col-sm-12 col-md-4 col-lg-6"><b class="pdk">5. Co dalej?</b></br>
			<p>W przypadku gdy stwierdzimy że poszkodowany jest nieprzytomny – bezwzględnie przechodzimy do sprawdzenia oddechu, a w razie potrzeby dalszej kontynuacji procedury RKO. Resuscytacja krążeniowo-oddechowa jest zdecydowanie ważniejsza niż opatrunek na ranie po oparzeniu.</p>
			<p>Jeśli stwierdzimy objawy wstrząsu musimy ułożyć poszkodowanego na plecach, z podniesionymi nogami.</p>
			<p>Jeśli oparzenia są rozległe, II/III stopnia, twarzy, szyi, klatki piersiowej czy krocza konieczna jest konsultacja lekarska.</p>
	</div>
</div>
</br>

<?php if(!$has_finished_kurs):?>
<form class="finish_kurs_form" action="" method="post">
		<input type="hidden" name="kurs_id" value="2">
		<input type="submit" class="btn btn-success btn-lg" value="Zakończ kurs 2">
</form>
<?php else: ?>
  <a class="btn btn-primary btn-lg" href="<?= site_url('Egzamin/2') ?>">Rozpocznij egzamin z tego kursu</a>
  <a class="btn btn-success btn-lg" href="<?= site_url('Kurs/3') ?>">Następny kurs</a>
<?php endif; ?>
</div>
