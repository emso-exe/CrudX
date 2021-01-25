-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_crudx
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_crudx
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_crudx` DEFAULT CHARACTER SET utf8 ;
USE `db_crudx` ;

-- -----------------------------------------------------
-- Table `db_crudx`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`setor` (
  `id_setor` INT NOT NULL AUTO_INCREMENT,
  `nm_setor` VARCHAR(40) NOT NULL,
  `dt_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_setor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_crudx`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `ds_perfil` VARCHAR(35) NOT NULL,
  `dt_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_perfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_crudx`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`cargo` (
  `id_cargo` INT NOT NULL AUTO_INCREMENT,
  `nm_cargo` VARCHAR(40) NOT NULL,
  `id_setor` INT NOT NULL,
  `id_perfil` INT NOT NULL,
  `dt_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_cargo`),
  INDEX `fk_cargo_perfil_id_perfil_idx` (`id_perfil` ASC) VISIBLE,
  CONSTRAINT `fk_cargo_setor_id_setor`
    FOREIGN KEY (`id_setor`)
    REFERENCES `db_crudx`.`setor` (`id_setor`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cargo_perfil_id_perfil`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `db_crudx`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_crudx`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`status` (
  `id_status` INT NOT NULL AUTO_INCREMENT,
  `ds_status` VARCHAR(25) NOT NULL,
  `dt_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_status`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_crudx`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`usuario` (
  `id_matricula` INT NOT NULL,
  `nm_usuario` VARCHAR(50) NOT NULL,
  `id_status` INT NOT NULL,
  `id_cargo` INT NOT NULL,
  `dt_create` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_matricula`),
  INDEX `fk_usuario_cargo_idx` (`id_cargo` ASC) VISIBLE,
  INDEX `fk_usuario_status_idx` (`id_status` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_cargo_id_cargo`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `db_crudx`.`cargo` (`id_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_status_id_status`
    FOREIGN KEY (`id_status`)
    REFERENCES `db_crudx`.`status` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_crudx`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_crudx`.`login` (
  `id_matricula` INT NOT NULL,
  `ds_login` VARCHAR(35) NOT NULL,
  `ps_senha` VARCHAR(40) NOT NULL,
  `dt_update` TIMESTAMP NULL,
  PRIMARY KEY (`id_matricula`),
  CONSTRAINT `fk_login_usuario_id_matricula`
    FOREIGN KEY (`id_matricula`)
    REFERENCES `db_crudx`.`usuario` (`id_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
