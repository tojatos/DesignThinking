-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 09:26 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1-log
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design_thinking`
--

-- --------------------------------------------------------

--
-- Table structure for table `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`id_kurs`, `nazwa`) VALUES
(1, 'kurs1'),
(2, 'kurs2'),
(3, 'kurs3'),
(4, 'kurs4'),
(5, 'kurs5');

-- --------------------------------------------------------

--
-- Table structure for table `odpowiedz`
--

CREATE TABLE `odpowiedz` (
  `id_odpowiedz` int(11) NOT NULL,
  `litera` enum('A','B','C','D') NOT NULL,
  `tresc` varchar(45) NOT NULL,
  `pytanie_id_pytanie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odpowiedz`
--

INSERT INTO `odpowiedz` (`id_odpowiedz`, `litera`, `tresc`, `pytanie_id_pytanie`) VALUES
(1, 'A', 'zielonego', 1),
(2, 'B', 'czarnego', 1),
(3, 'C', 'pomarańczowego', 1),
(4, 'D', 'różowego', 1),
(5, 'A', 'Nie ta.', 2),
(6, 'B', 'Trochę niżej.', 2),
(7, 'C', 'Już prawie!', 2),
(8, 'D', '<<< To ta odpowiedź! :)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pytanie`
--

CREATE TABLE `pytanie` (
  `id_pytanie` int(11) NOT NULL,
  `tresc` varchar(45) NOT NULL,
  `prawidlowa_odpowiedz` varchar(45) NOT NULL,
  `kurs_id_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pytanie`
--

INSERT INTO `pytanie` (`id_pytanie`, `tresc`, `prawidlowa_odpowiedz`, `kurs_id_kurs`) VALUES
(1, 'Jaki kolor włosów ma Nami?', 'C', 1),
(2, 'Która odpowiedź jest prawiDłowa?', 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `verified`, `miejscowosc`) VALUES
(1, 'tojatos', 0x243279243130244a754c35324f313739416f6e2e57693269766e58424f684c4d4e7a55363550596d74357a3856495656753358706171726c6d724871, 'tojatos@gmail.com', 1, 'Opole'),
(2, 'te', 0x243279243130242e46514b736a466e56696f446151397a392e7062614f3531436a4530355333356b5a534e4b794634306c664a385335594943532f43, 'toj@ga.com', 0, 'op');

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownik_kurs`
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
-- Dumping data for table `uzytkownik_kurs`
--

INSERT INTO `uzytkownik_kurs` (`id_uzytkownik_kurs`, `data_obejrzenia_kurs`, `data_zdania_egzamin`, `egzamin_wynik`, `user_id_user`, `kurs_id_kurs`) VALUES
(1, '2017-04-04 16:45:34', '2017-04-06 20:32:37', '100%', 1, 1),
(2, '2017-04-06 19:35:19', NULL, NULL, 1, 2);

--
-- Indexes for dumped tables
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
-- AUTO_INCREMENT for table `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `odpowiedz`
--
ALTER TABLE `odpowiedz`
  MODIFY `id_odpowiedz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pytanie`
--
ALTER TABLE `pytanie`
  MODIFY `id_pytanie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uzytkownik_kurs`
--
ALTER TABLE `uzytkownik_kurs`
  MODIFY `id_uzytkownik_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD CONSTRAINT `fk_odpowiedz_pytanie1` FOREIGN KEY (`pytanie_id_pytanie`) REFERENCES `pytanie` (`id_pytanie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pytanie`
--
ALTER TABLE `pytanie`
  ADD CONSTRAINT `fk_pytanie_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzytkownik_kurs`
--
ALTER TABLE `uzytkownik_kurs`
  ADD CONSTRAINT `fk_uzytkownik_kurs_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uzytkownik_kurs_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
