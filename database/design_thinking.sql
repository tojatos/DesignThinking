-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: design_thinking
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kurs`
--

DROP TABLE IF EXISTS `kurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(45) NOT NULL,
  PRIMARY KEY (`id_kurs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kurs`
--

LOCK TABLES `kurs` WRITE;
/*!40000 ALTER TABLE `kurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `kurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odpowiedz`
--

DROP TABLE IF EXISTS `odpowiedz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odpowiedz` (
  `id_odpowiedz` int(11) NOT NULL AUTO_INCREMENT,
  `litera` enum('A','B','C','D') NOT NULL,
  `tresc` varchar(45) NOT NULL,
  `pytanie_id_pytanie` int(11) NOT NULL,
  PRIMARY KEY (`id_odpowiedz`,`pytanie_id_pytanie`),
  KEY `fk_odpowiedz_pytanie1_idx` (`pytanie_id_pytanie`),
  CONSTRAINT `fk_odpowiedz_pytanie1` FOREIGN KEY (`pytanie_id_pytanie`) REFERENCES `pytanie` (`id_pytanie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odpowiedz`
--

LOCK TABLES `odpowiedz` WRITE;
/*!40000 ALTER TABLE `odpowiedz` DISABLE KEYS */;
/*!40000 ALTER TABLE `odpowiedz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pytanie`
--

DROP TABLE IF EXISTS `pytanie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pytanie` (
  `id_pytanie` int(11) NOT NULL AUTO_INCREMENT,
  `tresc` varchar(45) NOT NULL,
  `prawidlowa_odpowiedz` varchar(45) NOT NULL,
  `kurs_id_kurs` int(11) NOT NULL,
  PRIMARY KEY (`id_pytanie`,`kurs_id_kurs`),
  KEY `fk_pytanie_kurs1_idx` (`kurs_id_kurs`),
  CONSTRAINT `fk_pytanie_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pytanie`
--

LOCK TABLES `pytanie` WRITE;
/*!40000 ALTER TABLE `pytanie` DISABLE KEYS */;
/*!40000 ALTER TABLE `pytanie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `miejscowosc` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tojatos','$2y$10$JuL52O179Aon.Wi2ivnXBOhLMNzU65PYmt5z8VIVVu3XpaqrlmrHq','tojatos@gmail.com',1,'Opole'),(2,'te','$2y$10$.FQKsjFnVioDaQ9z9.pbaO51CjE05S35kZSNKyF40lfJ8S5YICS/C','toj@ga.com',0,'op');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzytkownik_kurs`
--

DROP TABLE IF EXISTS `uzytkownik_kurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uzytkownik_kurs` (
  `id_uzytkownik_kurs` int(11) NOT NULL AUTO_INCREMENT,
  `data_obejrzenia_kurs` varchar(45) NOT NULL,
  `data_zdania_egzamin` varchar(45) DEFAULT NULL,
  `egzamin_wynik` varchar(45) DEFAULT NULL,
  `user_id_users` int(50) NOT NULL,
  `kurs_id_kurs` int(11) NOT NULL,
  PRIMARY KEY (`id_uzytkownik_kurs`,`user_id_users`,`kurs_id_kurs`),
  KEY `fk_uzytkownik_kurs_user_idx` (`user_id_users`),
  KEY `fk_uzytkownik_kurs_kurs1_idx` (`kurs_id_kurs`),
  CONSTRAINT `fk_uzytkownik_kurs_kurs1` FOREIGN KEY (`kurs_id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_uzytkownik_kurs_user` FOREIGN KEY (`user_id_users`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzytkownik_kurs`
--

LOCK TABLES `uzytkownik_kurs` WRITE;
/*!40000 ALTER TABLE `uzytkownik_kurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `uzytkownik_kurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-23 18:14:18
