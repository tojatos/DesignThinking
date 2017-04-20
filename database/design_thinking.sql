-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Kwi 2017, 01:12
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `design_thinking`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `letter` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `fk_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `answer`
--

INSERT INTO `answer` (`id_answer`, `letter`, `content`, `fk_question`) VALUES
(22, 'A', '2 wdechy, 15 uciśnięć klatki piersiowej', 1),
(23, 'B', '2 wdechy, 30 uciśnięć klatki piersiowej', 1),
(24, 'C', '30 uciśnięć klatki piersiowej, 2 wdechy', 1),
(25, 'A', '5 sekund', 2),
(26, 'B', '10 sekund', 2),
(27, 'C', '15 sekund', 2),
(28, 'A', 'po udrożnieniu dróg oddechowych', 3),
(29, 'B', 'gdy sprawdzisz czy poszkodowany reaguje', 3),
(30, 'C', 'po sprawdzeniu prawidłowości oddechu', 3),
(31, 'A', '4-6cm', 4),
(32, 'B', '8-9cm', 4),
(33, 'C', '2-3cm', 4),
(34, 'A', '80/min', 5),
(35, 'B', '100/min', 5),
(36, 'C', '150/min', 5),
(37, 'A', 'pozycji leżącej na plecach', 6),
(38, 'B', 'pozycji leżącej na boku', 6),
(39, 'C', 'pozycji wygodnej dla chorego', 6),
(40, 'A', 'Wzroku, słuchu, smaku', 7),
(41, 'B', 'Wzroku, słuchu, dotyku', 7),
(42, 'C', 'Dotyku, smaku, węchu', 7),
(43, 'A', 'na środku mostka', 8),
(44, 'B', 'na wysokości serca', 8),
(45, 'C', 'na dolnej części mostka', 8),
(46, 'A', 'Gdy ulegniesz wyczerpaniu', 9),
(47, 'B', 'Gdy poszkodowany zacznie prawidłowo oddychać', 9),
(48, 'C', 'Wszystkie odpowiedzi są prawidłowe', 9),
(49, 'A', 'Odłączysz źródło napięcia – będziesz bezpieczny', 10),
(50, 'B', 'Podejdziesz do poszkodowanego nie zważając na zagrożenie', 10),
(51, 'C', 'Wpadniesz w panikę i uciekniesz', 10),
(52, 'A', 'Schładzać obficie wodą i wezwać pomoc', 11),
(53, 'B', 'Okryć folią „życia” w celu ochrony przed wychłodzeniem', 11),
(54, 'C', 'Posmarować tłuszczem bo dobrze wchłania ciepło', 11),
(55, 'A', 'Zakładać opatrunku', 12),
(56, 'B', 'Chłodzić rany', 12),
(57, 'C', 'Przebijać pęcherzy', 12),
(58, 'A', 'I stopnia', 13),
(59, 'B', 'II stopnia', 13),
(60, 'C', 'III stopnia', 13),
(61, 'A', 'piekącym, swędzącym rumieniem na skórze, bólem przy dotyku', 14),
(62, 'B', 'pęcherzami wypełnionymi płynem', 14),
(63, 'C', 'brakiem czucia dotyku i bólu / zwęgleniem i martwicą tkanek', 14),
(64, 'A', 'piekącym, swędzącym rumieniem na skórze, bólem przy dotyku', 15),
(65, 'B', 'pęcherzami wypełnionymi płynem', 15),
(66, 'C', 'brakiem czucia dotyku i bólu / zwęgleniem i martwicą tkanek', 15),
(67, 'A', 'piekącym, swędzącym rumieniem na skórze, bólem przy dotyku', 16),
(68, 'B', 'pęcherzami wypełnionymi płynem', 16),
(69, 'C', 'brakiem czucia dotyku i bólu / zwęgleniem i martwicą tkanek', 16),
(70, 'A', 'Około 15 minut', 17),
(71, 'B', 'Około 30 minut', 17),
(72, 'C', 'Około 45 minut', 17),
(73, 'A', 'Uciskowy', 18),
(74, 'B', 'Jałowy', 18),
(75, 'C', 'Foliowy', 18),
(76, 'A', 'II oraz III', 19),
(77, 'B', 'II oraz I', 19),
(78, 'C', 'III oraz I', 19),
(79, 'A', 'Zdjęcie biżuterii', 20),
(80, 'B', 'Rękoczyn Heimlicha', 20),
(81, 'C', 'Opatrunek uciskowy', 20),
(82, 'A', 'Do gołej klatki piersiowej po usunięciu biżuterii', 21),
(83, 'B', 'Do gołej klatki piersiowej po jej ewentualnym wysuszeniu', 21),
(84, 'C', 'Do gołej klatki piersiowej po jej ewentualnym wysuszeniu i usunięciu zbyt obfitego owłosienia', 21),
(85, 'A', 'Tylko ratownik może dotykać poszkodowanego', 22),
(86, 'B', 'Nikt nie może dotykać poszkodowanego', 22),
(87, 'C', 'Nie ma znaczenia kto dotyka poszkodowanego', 22),
(88, 'A', 'Jedną pod prawym obojczykiem wzdłuż mostka, drugą nad koniuszkiem serca poszkodowanego', 23),
(89, 'B', 'Elektrody mogą pozostać na klatce piersiowej w dowolnych miejscach po obu stronach mostka poszkodowanego ', 23),
(90, 'C', 'W taki sposób, aby ich końce stykały się nad mostkiem poszkodowanego co ułatwi przepływ energii', 23),
(91, 'A', 'Dotykać elektrody, aby dobrze przylegały', 24),
(92, 'B', 'Słuchać i wykonywać polecenia AED', 24),
(93, 'C', 'Podtrzymywać odchyloną ku tyłowi głowę poszkodowanego, aby udrożnić drogi oddechowe', 24),
(94, 'A', 'Tylko lekarze', 25),
(95, 'B', 'Tylko ratownicy medyczni i strażacy', 25),
(96, 'C', 'Wszyscy ludzie', 25),
(97, 'A', 'U kobiety w ciąży', 26),
(98, 'B', 'U dziecka powyżej 1 roku życia', 26),
(99, 'C', 'U osoby leżącej w strugach deszczu', 26),
(100, 'A', 'Jak najszybsze użycie AED', 27),
(101, 'B', 'Przeczytanie instrukcji obsługi AED', 27),
(102, 'C', 'Uciskanie klatki piersiowej', 27),
(103, 'A', 'Gdy upewnisz się że nikt nie dotyka poszkodowanego', 28),
(104, 'B', 'Gdy AED o to poprosi', 28),
(105, 'C', 'Wpadniesz w panikę i będziesz się bał przycisnąć – poczekasz na karetkę pogotowia', 28),
(106, 'A', 'Zrobieniu zdjęcia', 29),
(107, 'B', 'zadbaniu o swoje bezpieczeństwo', 29),
(108, 'C', 'zaśpiewaniu piosenki', 29),
(109, 'A', 'każdy, gdyż nawet w przypadku obecności zagrożeń można wykonać część działań ratowniczych', 30),
(110, 'B', 'wyłącznie sprawca wypadku, gdyż za ewentualne popełnione błędy zawsze grozi odpowiedzialność karna', 30),
(111, 'C', 'wyłącznie lekarz pogotowia, gdyż udzielać pomocy mogą jedynie osoby z wykształceniem medycznym', 30),
(112, 'A', 'Leży na plecach z uniesionymi nogami i rękami', 31),
(113, 'B', 'Leży na lewym boku', 31),
(114, 'C', 'Znajduje się w pozycji bocznej bezpiecznej', 31),
(115, 'A', 'Wykonasz 2 wdechy ratownicze', 32),
(116, 'B', 'Posadzisz poszkodowanego przy oknie i je otworzysz', 32),
(117, 'C', 'Otworzysz drzwi do pokoju', 32),
(118, 'A', 'Uniesieniu rąk i nóg poszkodowanego', 33),
(119, 'B', 'Położeniu poszkodowanego na brzuchu', 33),
(120, 'C', 'Położeniu poszkodowanego na plecach', 33),
(121, 'A', 'Położysz poszkodowanego na plecach oraz uniesiesz jego ręce i nogi', 34),
(122, 'B', 'Położysz poszkodowanego na brzuchu', 34),
(123, 'C', 'Zastosujesz pozycję na wznak', 34),
(124, 'A', 'Rozpoczęcie uciskania w schemacie 30:2', 35),
(125, 'B', 'Sprawdzenie oddechu', 35),
(126, 'C', 'Dwukrotny wdech ratowniczy', 35),
(127, 'A', '997', 36),
(128, 'B', '998', 36),
(129, 'C', '999', 36),
(130, 'A', 'zadzwonisz do mamy', 37),
(131, 'B', 'zadzwonisz na pogotowie', 37),
(132, 'C', 'pójdziesz do domu i opowiem mamie co widziałam', 37),
(133, 'A', '5 sekund', 38),
(134, 'B', '10 sekund', 38),
(135, 'C', '15 sekund', 38),
(136, 'A', 'Rozluźnisz kołnierzyk u koszuli', 39),
(137, 'B', 'Położysz go na brzuchu', 39),
(138, 'C', 'Zapiszesz godzinę ułożenia', 39),
(139, 'A', 'Poprawić drożność dróg oddechowych i sprawdzać oddech', 40),
(140, 'B', 'Rozpocząć uciskanie klatki piersiowej', 40),
(141, 'C', 'Wykonać 2 wdechy ratownicze', 40),
(142, 'A', 'Niedrożnością całkowitą dróg oddechowych', 41),
(143, 'B', 'Niedrożnością częściową dróg oddechowych', 41),
(144, 'C', 'Niedrożnością połówkową dróg oddechowych', 41),
(145, 'A', 'Niedrożnością całkowitą dróg oddechowych', 42),
(146, 'B', 'Niedrożnością częściową dróg oddechowych', 42),
(147, 'C', 'Niedrożnością połówkową dróg oddechowych', 42),
(148, 'A', 'Uderzenia w okolicę międzyłopatkową', 43),
(149, 'B', 'Rękoczyn Heimlicha', 43),
(150, 'C', 'Resuscytację krążeniowo oddechową', 43),
(151, 'A', 'W momencie przybycia do szpitala', 44),
(152, 'B', 'W obecności rodziny', 44),
(153, 'C', 'Jak najwcześniej', 44),
(154, 'A', '5', 45),
(155, 'B', '10', 45),
(156, 'C', '7', 45),
(157, 'A', '5', 46),
(158, 'B', '10', 46),
(159, 'C', '7', 46),
(160, 'A', 'Wzywasz pogotowie i rozpoczynasz RKO', 47),
(161, 'B', 'Wzywasz pogotowie i układasz poszkodowanego w pozycji bocznej ustalonej', 47),
(162, 'C', 'Kontynuujesz uciśnięcia nadbrzusza', 47),
(163, 'A', 'Nie, od razu przechodzę do uciśnięć i wdechów', 48),
(164, 'B', 'Nie, układam poszkodowanego w pozycji bocznej ustalonej', 48),
(165, 'C', 'Tak, a następnie rozpoczynam uciskanie i wdechy ratownicze', 48),
(166, 'A', 'Zajrzeć do jamy ustnej i sprawdzić czy ciało obce nie przesunęło się do niej', 49),
(167, 'B', 'Wykonać dodatkowe 3 wdechy', 49),
(168, 'C', 'Nie wykonujesz wdechów mając do czynienia z zadławieniem', 49),
(169, 'A', 'Tak, 2 wdechy', 50),
(170, 'B', 'Nie', 50),
(171, 'C', 'Tak, 5 wdechów', 50);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`id_kurs`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_change_requests`
--

CREATE TABLE `password_change_requests` (
  `id_password_change_requests` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `password_change_requests`
--

INSERT INTO `password_change_requests` (`id_password_change_requests`, `email`, `code`) VALUES
(5, 'h@l.pl', 'e76d6032602b5e24ac6892a19'),
(6, 'w@d.pl', '53b3f78de478f4d94a390e0ca');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `correct_answer_letter` varchar(1) NOT NULL,
  `fk_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `question`
--

INSERT INTO `question` (`id_question`, `content`, `correct_answer_letter`, `fk_kurs`) VALUES
(1, 'Brak oddechu u nieprzytomnego stanowi podstawę do podjęcia reanimacji w schemacie:', 'C', 1),
(2, 'Sprawdzenie prawidłowego oddechu powinno trwać:', 'B', 1),
(3, 'W którym etapie procesu reanimacji wezwiesz pomoc:', 'C', 1),
(4, 'Głębokość uciśnięć klatki piersiowej u osoby dorosłej wynosi:', 'A', 1),
(5, 'Częstotliwość uciśnięć klatki piersiowej u osoby dorosłej wynosi:', 'B', 1),
(6, 'Przytomnego pacjenta, z podejrzeniem zawału mięśnia sercowego, oczekując na karetkę pogotowia ułożyć należy w:', 'C', 1),
(7, 'Ocena oddechów u osoby nieprzytomnej wymaga użycia zmysłów:', 'B', 1),
(8, 'W którym miejscu będziesz uciskał klatkę piersiową poszkodowanego?:', 'A', 1),
(9, 'Kiedy przerwiesz resuscytację krążeniowo – oddechową?:', 'C', 1),
(10, 'Co zrobisz w pierwszej kolejności jeśli poszkodowany najprawdopodobniej nie oddycha i musisz rozpocząć RKO, a obok niego leży iskrzący kabel pod napięciem?:', 'A', 1),
(11, 'Po oparzeniu obu rąk należy:', 'A', 2),
(12, 'W przypadku oparzenia nie należy:', 'C', 2),
(13, 'Brak czucia bólu stwierdzisz przy oparzeniu:', 'C', 2),
(14, 'Oparzenie I stopnia charakteryzuje się:', 'A', 2),
(15, 'Oparzenie II stopnia charakteryzuje się:', 'B', 2),
(16, 'Oparzenie III stopnia charakteryzuje się:', 'C', 2),
(17, 'Przez jaki czas będziesz schładzać miejsce oparzenia', 'A', 2),
(18, 'Przy oparzeniach zastosujesz opatrunek:', 'B', 2),
(19, 'Mając do czynienia z oparzeniami którego stopnia musisz skontaktować się z lekarzem?', 'A', 2),
(20, 'Przy oparzeniach, oprócz chłodzenia rany, wykonasz:', 'A', 2),
(21, 'Elektrody AED przyklejamy:', 'C', 4),
(22, 'Podczas wykonywania defibrylacji:', 'B', 4),
(23, 'Elektrody AED umieszczamy:', 'A', 4),
(24, 'Podczas dokonywania defibrylacji należy:', 'B', 4),
(25, 'Kto może użyć AED?:', 'C', 4),
(26, 'U kogo nie można używać AED?:', 'C', 4),
(27, 'Priorytetem w procesie resuscytacji jest:', 'A', 4),
(28, 'Po prośbie AED naciśniesz przycisk uruchamiający wyładowanie - kiedy?:', 'A', 4),
(29, 'Zanim zaczniesz udzielać pierwszej pomocy musisz pamiętać o:', 'B', 4),
(30, 'Obowiązek udzielania pierwszej pomocy ofiarom wypadku ma:', 'A', 4),
(31, 'Omdlenie mija najszybciej gdy poszkodowany:', 'A', 3),
(32, 'W jaki sposób zapewnisz poszkodowanemu dostęp do świeżego powietrza?:', 'B', 3),
(33, 'Pozycja na wznak polega na:', 'C', 3),
(34, 'Jak zapewnisz poszkodowanemu lepsze krążenie krwi:', 'A', 3),
(35, 'Jeśli poszkodowany straci przytomność i konieczna będzie reanimacja pierwszym krokiem który zastosujesz będzie:', 'A', 3),
(36, 'Aby wezwać pogotowie ratunkowe zadzwonisz na numer:', 'C', 3),
(37, 'Jeśli jesteś świadkiem wypadku samochodowego to w pierwszej kolejności:', 'B', 3),
(38, 'Sprawdzenie prawidłowego oddechu powinno trwać:', 'B', 3),
(39, 'Układając poszkodowanego w pozycji bezpiecznej:', 'A', 3),
(40, 'Co należy zrobić w ostatnim etapie układania poszkodowanego w pozycji bocznej bezpiecznej', 'A', 3),
(41, 'Jeśli poszkodowany nie jest w stanie oddychać, mówić i kaszleć, masz do czynienia z:', 'A', 5),
(42, 'Jeśli poszkodowany nie jest w stanie oddychać, mówić i kaszleć, masz do czynienia z:', 'A', 5),
(43, 'Co zastosujesz wcześniej?', 'A', 5),
(44, 'Wsparcie psychiczne poszkodowanego powinno być zastosowane:', 'C', 5),
(45, 'Ile uderzeń w okolicę międzyłopatkową wykonasz maksymalnie w jednym cyklu?', 'A', 5),
(46, 'Ile uciśnięć nadbrzusza (rękoczyn Heimlicha) wykonasz maksymalnie w jednym cyklu?', 'A', 5),
(47, 'Poszkodowany traci przytomność podczas uciśnięć nadbrzusza, co robisz?', 'A', 5),
(48, 'Poszkodowany traci przytomność podczas uderzeń w okolicę międzyłopatkową, czy sprawdzasz oddech?', 'A', 5),
(49, 'Zanim wykonasz wdech ratowniczy mając do czynienia z zadławieniem powinieneś:', 'A', 5),
(50, 'Mając do czynienia z zadławieniem wykonasz wdechy ratownicze podczas RKO?', 'A', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `verified`, `city`) VALUES
(1, 'tojatos', 0x243279243130245a396d532e6a41774b66593077625059704b3853754f414848744a51546b73717037567970654e673737566e593653302e79796175, 'tojatos@gmail.com', 1, 'Opole'),
(2, 'tojato', 0x243279243130243671667239513863656f634b3667326d6345514e744f69475a35503262416949545262326e76682f7a565462725675744d4b345575, 'kontakt@krzysztofruczkowski.pl', 1, 'Oppeln');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_has_kurs`
--

CREATE TABLE `user_has_kurs` (
  `id_user_has_kurs` int(11) NOT NULL,
  `date_finish_kurs` date NOT NULL,
  `date_finish_exam` date DEFAULT NULL,
  `exam_result` int(11) DEFAULT NULL,
  `fk_kurs` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user_has_kurs`
--

INSERT INTO `user_has_kurs` (`id_user_has_kurs`, `date_finish_kurs`, `date_finish_exam`, `exam_result`, `fk_kurs`, `fk_user`) VALUES
(1, '2017-04-10', '2017-04-10', 88, 1, 1),
(2, '2017-04-15', '2017-04-19', 0, 4, 1),
(3, '2017-04-16', '2017-04-16', 50, 2, 1),
(4, '2017-04-16', '2017-04-16', 100, 3, 1),
(5, '2017-04-16', '2017-04-16', 100, 5, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `fk_answer_question1_idx` (`fk_question`);

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Indexes for table `password_change_requests`
--
ALTER TABLE `password_change_requests`
  ADD PRIMARY KEY (`id_password_change_requests`,`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_question_kurs1_idx` (`fk_kurs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_has_kurs`
--
ALTER TABLE `user_has_kurs`
  ADD PRIMARY KEY (`id_user_has_kurs`),
  ADD KEY `fk_user_has_kurs_kurs1_idx` (`fk_kurs`),
  ADD KEY `fk_user_has_kurs_user1_idx` (`fk_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `password_change_requests`
--
ALTER TABLE `password_change_requests`
  MODIFY `id_password_change_requests` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`fk_question`) REFERENCES `question` (`id_question`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_kurs1` FOREIGN KEY (`fk_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `user_has_kurs`
--
ALTER TABLE `user_has_kurs`
  ADD CONSTRAINT `fk_user_has_kurs_kurs1` FOREIGN KEY (`fk_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_kurs_user1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
