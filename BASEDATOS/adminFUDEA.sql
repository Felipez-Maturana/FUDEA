-- MySQL Script generated by MySQL Workbench
-- Tue May  9 03:35:01 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema fudeaAdmin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fudeaAdmin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fudeaAdmin` DEFAULT CHARACTER SET utf8 ;
USE `fudeaAdmin` ;

-- -----------------------------------------------------
-- Table `fudeaAdmin`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fudeaAdmin`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `tipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `password_UNIQUE` (`password` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fudeaAdmin`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fudeaAdmin`.`Carrera` (
  `idCarrera` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCarrera`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fudeaAdmin`.`ModalidadPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fudeaAdmin`.`ModalidadPago` (
  `idModalidadPago` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idModalidadPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fudeaAdmin`.`Socios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fudeaAdmin`.`Socios` (
  `idSocios` INT NOT NULL AUTO_INCREMENT,
  `idCarrera` INT NOT NULL,
  `idModalidadPago` INT NOT NULL,
  `User_idUser` INT NULL,
  `egreso` YEAR NOT NULL,
  `estadoSuscripcion` TINYINT NOT NULL,
  `vencimientoSuscripcion` DATE NOT NULL,
  PRIMARY KEY (`idSocios`),
  INDEX `fk_Socios_Carrera_idx` (`idCarrera` ASC),
  INDEX `fk_Socios_ModalidadPago1_idx` (`idModalidadPago` ASC),
  INDEX `fk_Socios_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Socios_Carrera`
    FOREIGN KEY (`idCarrera`)
    REFERENCES `fudeaAdmin`.`Carrera` (`idCarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Socios_ModalidadPago1`
    FOREIGN KEY (`idModalidadPago`)
    REFERENCES `fudeaAdmin`.`ModalidadPago` (`idModalidadPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Socios_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `fudeaAdmin`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- UPDATE socios SET estadoSuscripcion = 0 WHERE (SELECT DATEDIFF( socios.vencimientoSuscripcion, (SELECT CURDATE() ) ) ) <0