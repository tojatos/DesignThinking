-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Kwi 2017, 23:05
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.19

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
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`id_kurs`, `nazwa`) VALUES
(1, 'kurs1'),
(2, 'kurs2'),
(3, 'kurs3'),
(4, 'kurs4'),
(5, 'kurs5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedz`
--

CREATE TABLE `odpowiedz` (
  `id_odpowiedz` int(11) NOT NULL,
  `litera` enum('A','B','C','D') NOT NULL,
  `tresc` varchar(45) NOT NULL,
  `pytanie_id_pytanie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytanie`
--

CREATE TABLE `pytanie` (
  `id_pytanie` int(11) NOT NULL,
  `tresc` varchar(45) NOT NULL,
  `prawidlowa_odpowiedz` varchar(45) NOT NULL,
  `kurs_id_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `miejscowosc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `verified`, `miejscowosc`) VALUES
(1, 'tojatos', 0x243279243130244a754c35324f313739416f6e2e57693269766e58424f684c4d4e7a55363550596d74357a3856495656753358706171726c6d724871, 'tojatos@gmail.com', 1, 'Opole'),
(2, 'te', 0x243279243130242e46514b736a466e56696f446151397a392e7062614f3531436a4530355333356b5a534e4b794634306c664a385335594943532f43, 'toj@ga.com', 0, 'op');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik_kurs`
--

CREATE TABLE `uzytkownik_kurs` (
  `id_uzytkownik_kurs` int(11) NOT NULL,
  `data_obejrzenia_kurs` varchar(45) NOT NULL,
  `data_zdania_egzamin` varchar(45) DEFAULT NULL,
  `egzamin_wynik` varchar(45) DEFAULT NULL,
  `user_id_user` int(50) NOT NULL,
  `kurs_id_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownik_kurs`
--

INSERT INTO `uzytkownik_kurs` (`id_uzytkownik_kurs`, `data_obejrzenia_kurs`, `data_zdania_egzamin`, `egzamin_wynik`, `user_id_user`, `kurs_id_kurs`) VALUES
(1, '2017-04-04 16:45:34', NULL, NULL, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Indexes for table `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD PRIMARY KEY (`id_odpowiedz`,`pytanie_id_pytanie`),
  ADD KEY `fk_odpowiedz_pytanie1_idx` (`pytanie_id_pytanie`);

--
-- Indexes for table `pytanie`
--
ALTER TABLE `pytanie`
  ADD PRIMARY KEY (`id_pytanie`,`kurs_id_kurs`),
  ADD KEY `fk_pytanie_kurs1_idx` (`kurs_id_kurs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `uzytkownik_kurs`
--
ALTER TABLE `uzytkownik_kurs`
  ADD PRIMARY KEY (`id_uzytkownik_kurs`,`user_id_user`,`kurs_id_kurs`),
  ADD KEY `fk_uzytkownik_kurs_user_idx` (`user_id_user`),
  ADD KEY `fk_uzytkownik_kurs_kurs1_idx` (`kurs_id_kurs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  MODIFY `id_odpowiedz` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  MODIFY `id_pytanie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `uzytkownik_kurs`
--
ALTER TABLE `uzytkownik_kurs`
  MODIFY `id_uzytkownik_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD CONSTRAINT `fk_odpowiedz_pytanie1` FOREIGN KEY (`pytanie_id_pytanie`) REFERENCES `pytanie` (`id_pytanie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  ADD CONSTRAINT `fk_pytanie_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `uzytkownik_kurs`
--
ALTER TABLE `uzytkownik_kurs`
  ADD CONSTRAINT `fk_uzytkownik_kurs_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uzytkownik_kurs_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
