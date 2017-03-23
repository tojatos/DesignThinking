-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema design_thinking
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema design_thinking
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `design_thinking` DEFAULT CHARACTER SET utf8 ;
USE `design_thinking` ;

-- -----------------------------------------------------
-- Table `design_thinking`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `design_thinking`.`user` (
  `id_user` INT(50) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) NOT NULL,
  `password` BINARY(60) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `verified` TINYINT(1) NOT NULL,
  `miejscowosc` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_users`))
ENGINE = InnoDB
AUTO_INCREMENT = 16;


-- -----------------------------------------------------
-- Table `design_thinking`.`kurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `design_thinking`.`kurs` (
  `id_kurs` INT NOT NULL AUTO_INCREMENT,
  `nazwa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_kurs`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `design_thinking`.`uzytkownik_kurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `design_thinking`.`uzytkownik_kurs` (
  `id_uzytkownik_kurs` INT NOT NULL AUTO_INCREMENT,
  `data_obejrzenia_kurs` VARCHAR(45) NOT NULL,
  `data_zdania_egzamin` VARCHAR(45) NULL,
  `egzamin_wynik` VARCHAR(45) NULL,
  `user_id_users` INT(50) NOT NULL,
  `kurs_id_kurs` INT NOT NULL,
  PRIMARY KEY (`id_uzytkownik_kurs`, `user_id_users`, `kurs_id_kurs`),
  INDEX `fk_uzytkownik_kurs_user_idx` (`user_id_users` ASC),
  INDEX `fk_uzytkownik_kurs_kurs1_idx` (`kurs_id_kurs` ASC),
  CONSTRAINT `fk_uzytkownik_kurs_user`
    FOREIGN KEY (`user_id_users`)
    REFERENCES `design_thinking`.`user` (`id_users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_uzytkownik_kurs_kurs1`
    FOREIGN KEY (`kurs_id_kurs`)
    REFERENCES `design_thinking`.`kurs` (`id_kurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `design_thinking`.`pytanie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `design_thinking`.`pytanie` (
  `id_pytanie` INT NOT NULL AUTO_INCREMENT,
  `tresc` VARCHAR(45) NOT NULL,
  `prawidlowa_odpowiedz` VARCHAR(45) NOT NULL,
  `kurs_id_kurs` INT NOT NULL,
  PRIMARY KEY (`id_pytanie`, `kurs_id_kurs`),
  INDEX `fk_pytanie_kurs1_idx` (`kurs_id_kurs` ASC),
  CONSTRAINT `fk_pytanie_kurs1`
    FOREIGN KEY (`kurs_id_kurs`)
    REFERENCES `design_thinking`.`kurs` (`id_kurs`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `design_thinking`.`odpowiedz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `design_thinking`.`odpowiedz` (
  `id_odpowiedz` INT NOT NULL AUTO_INCREMENT,
  `litera` ENUM('A', 'B', 'C', 'D') NOT NULL,
  `tresc` VARCHAR(45) NOT NULL,
  `pytanie_id_pytanie` INT NOT NULL,
  PRIMARY KEY (`id_odpowiedz`, `pytanie_id_pytanie`),
  INDEX `fk_odpowiedz_pytanie1_idx` (`pytanie_id_pytanie` ASC),
  CONSTRAINT `fk_odpowiedz_pytanie1`
    FOREIGN KEY (`pytanie_id_pytanie`)
    REFERENCES `design_thinking`.`pytanie` (`id_pytanie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
