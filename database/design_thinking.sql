-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 07:57 PM
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
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `letter` varchar(45) NOT NULL,
  `content` varchar(45) NOT NULL,
  `fk_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `letter`, `content`, `fk_question`) VALUES
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
-- Table structure for table `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`id_kurs`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `content` varchar(45) NOT NULL,
  `correct_answer_letter` varchar(1) NOT NULL,
  `fk_kurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `content`, `correct_answer_letter`, `fk_kurs`) VALUES
(1, 'Jaki kolor włosów ma Nami?', 'C', 1),
(2, 'Która odpowiedź jest prawiDłowa?', 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `verified`, `city`) VALUES
(1, 'tojatos', 0x243279243130245a396d532e6a41774b66593077625059704b3853754f414848744a51546b73717037567970654e673737566e593653302e79796175, 'tojatos@gmail.com', 1, 'Opole');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_kurs`
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
-- Dumping data for table `user_has_kurs`
--

INSERT INTO `user_has_kurs` (`id_user_has_kurs`, `date_finish_kurs`, `date_finish_exam`, `exam_result`, `fk_kurs`, `fk_user`) VALUES
(1, '2017-04-10', '2017-04-10', 50, 1, 1);

--
-- Indexes for dumped tables
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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`fk_question`) REFERENCES `question` (`id_question`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_kurs1` FOREIGN KEY (`fk_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_kurs`
--
ALTER TABLE `user_has_kurs`
  ADD CONSTRAINT `fk_user_has_kurs_kurs1` FOREIGN KEY (`fk_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_kurs_user1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
