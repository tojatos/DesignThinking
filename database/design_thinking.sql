-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 18 Kwi 2017, 20:22
-- Wersja serwera: 5.6.34
-- Wersja PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tojatos_DesignThinking`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(11) NOT NULL,
  `letter` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `fk_question` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `answer`
--

INSERT INTO `answer` (`id_answer`, `letter`, `content`, `fk_question`) VALUES
(1, 'A', '2 wdechy, 15 uciśnięć klatki piersiowej', 1),
(2, 'B', '2 wdechy, 30 uciśnięć klatki piersiowej ', 1),
(3, 'C', '30 uciśnięć  klatki piersiowej, 2 wdechy', 1),
(4, 'A', 'Okryć folią„życia” w celu ochrony przed wychł', 2),
(5, 'B', 'Schładzać  obficie wodą i wezwać  pomoc', 2),
(6, 'C', 'Posmarować tłuszczem lub alkoholem miejsce op', 2),
(7, 'A', 'Schładzanie bieżącą wodą do 15-20 minut lub u', 3),
(8, 'B', 'Zdjęcie biżuterii z palców i okrycie rany opa', 3),
(9, 'C', 'Wszystkie odpowiedzi są poprawne', 3),
(10, 'A', 'Do gołej klatki piersiowej po usunięciu biżut', 4),
(11, 'B', 'Do gołej klatki piersiowej po jej ewentualnym', 4),
(12, 'C', 'Do gołej klatki piersiowej po jej ewentualnym', 4),
(13, 'A', 'Tylko ratownik może dotykać poszkodowanego', 5),
(14, 'B', 'Nikt nie może dotykać poszkodowanego', 5),
(15, 'C', 'Nie ma znaczenia kto dotyka poszkodowanego', 5),
(16, 'A', 'Jedną pod prawym obojczykiem wzdłuż mostka, d', 6),
(17, 'B', 'Elektrody mogą pozostać na klatce piersiowej ', 6),
(18, 'C', 'W taki sposób, aby ich końce stykały się nad ', 6),
(19, 'A', 'Dotykać elektrody, aby dobrze przylegały', 7),
(20, 'B', 'Słuchać i wykonywać polecenia AED', 7),
(21, 'C', 'Podtrzymywać odchyloną ku tyłowi głowę poszko', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `id_kurs` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `password_change_requests` (
  `id_password_change_requests` int(10) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `correct_answer_letter` varchar(1) NOT NULL,
  `fk_kurs` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `question`
--

INSERT INTO `question` (`id_question`, `content`, `correct_answer_letter`, `fk_kurs`) VALUES
(1, 'Brak oddechu u nieprzytomnego stanowi podstawę do podjęcia reanimacji w schemacie: ', 'C', 1),
(2, 'Przy oparzeniu obu rąk parą wodną należy:', 'B', 2),
(3, 'Przy oparzeniu termicznym dłoni istotnymi elementami pierwszej pomocy są:', 'C', 2),
(4, 'Elektrody AED przyklejamy:', 'A', 4),
(5, 'Podczas wykonywania defibrylacji:', 'B', 4),
(6, 'Elektrody AED umieszczamy:', 'A', 4),
(7, 'Podczas dokonywania defibrylacji należy:', 'B', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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

CREATE TABLE IF NOT EXISTS `user_has_kurs` (
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
(2, '2017-04-15', NULL, NULL, 4, 1),
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
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `password_change_requests`
--
ALTER TABLE `password_change_requests`
  MODIFY `id_password_change_requests` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
