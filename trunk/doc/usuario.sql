SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `sobrenome` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `nascimento` VARCHAR(45) NOT NULL ,
  `sexo` VARCHAR(45) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `cidade` VARCHAR(45) NOT NULL ,
  `ensinoMedio` VARCHAR(45) NULL DEFAULT NULL ,
  `ensinoSuperior` VARCHAR(45) NULL DEFAULT NULL ,
  `foto` VARCHAR(60) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`disciplina`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`disciplina` (
  `id_disciplina` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  PRIMARY KEY (`id_disciplina`) ,
  INDEX `fk_disciplina_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_disciplina_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COMMENT = 'Disciplinas à serem gerenciadas estudadas pelo usuário.' ;


-- -----------------------------------------------------
-- Table `mydb`.`professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`professor` (
  `id_professor` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  PRIMARY KEY (`id_professor`) ,
  INDEX `fk_professor_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_professor_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8, 
COMMENT = 'Professores(as) relacionados(as) às disciplinas' ;


-- -----------------------------------------------------
-- Table `mydb`.`disciplina_has_professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`disciplina_has_professor` (
  `id_disciplina` INT(11) NOT NULL ,
  `id_professor` INT(11) NOT NULL ,
  PRIMARY KEY (`id_disciplina`, `id_professor`) ,
  INDEX `fk_disciplina_has_professor_professor1_idx` (`id_professor` ASC) ,
  INDEX `fk_disciplina_has_professor_disciplina_idx` (`id_disciplina` ASC) ,
  CONSTRAINT `fk_disciplina_has_professor_disciplina`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `mydb`.`disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_has_professor_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `mydb`.`professor` (`id_professor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`fase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`fase` (
  `id_fase` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_fase`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`semana`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`semana` (
  `id_DiadaSemana` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id_DiadaSemana`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`horario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`horario` (
  `id_horario` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT(11) NOT NULL ,
  `id_DiadaSemana` INT(11) NOT NULL ,
  `hora_inicio` INT(11) NOT NULL ,
  `minuto_inicio` INT(11) NOT NULL ,
  `hora_fim` INT NOT NULL ,
  `minuto_fim` INT NOT NULL ,
  `id_disciplina` INT(11) NOT NULL ,
  `id_professor` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_horario`) ,
  INDEX `fk_horario_usuario1_idx` (`id_usuario` ASC) ,
  INDEX `fk_horario_semana1_idx` (`id_DiadaSemana` ASC) ,
  INDEX `fk_horario_disciplina1_idx` (`id_disciplina` ASC) ,
  INDEX `fk_horario_professor1_idx` (`id_professor` ASC) ,
  CONSTRAINT `fk_horario_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_semana1`
    FOREIGN KEY (`id_DiadaSemana` )
    REFERENCES `mydb`.`semana` (`id_DiadaSemana` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `mydb`.`disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_professor1`
    FOREIGN KEY (`id_professor` )
    REFERENCES `mydb`.`professor` (`id_professor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`instituicao_ensino`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`instituicao_ensino` (
  `id_instituicao_ensino` INT(11) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  PRIMARY KEY (`id_instituicao_ensino`) ,
  INDEX `fk_instituicao_ensino_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_instituicao_ensino_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`trabalho`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`trabalho` (
  `nome` VARCHAR(45) NOT NULL ,
  `id_trabalho` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_disciplina` INT(11) NOT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  `id_fase` INT(11) NOT NULL ,
  PRIMARY KEY (`id_trabalho`) ,
  INDEX `fk_trabalho_disciplina1_idx` (`id_disciplina` ASC) ,
  INDEX `fk_trabalho_usuario1_idx` (`id_usuario` ASC) ,
  INDEX `fk_trabalho_FaseDoTrabalho1_idx` (`id_fase` ASC) ,
  CONSTRAINT `fk_trabalho_disciplina1`
    FOREIGN KEY (`id_disciplina` )
    REFERENCES `mydb`.`disciplina` (`id_disciplina` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabalho_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabalho_FaseDoTrabalho1`
    FOREIGN KEY (`id_fase` )
    REFERENCES `mydb`.`fase` (`id_fase` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`tarefa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tarefa` (
  `id_tarefa` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `descricao_tarefa` VARCHAR(45) NULL DEFAULT NULL ,
  `id_trabalho` INT(11) NOT NULL ,
  `id_fase` INT(11) NOT NULL ,
  PRIMARY KEY (`id_tarefa`) ,
  INDEX `fk_tarefa_trabalho1_idx` (`id_trabalho` ASC) ,
  INDEX `fk_tarefa_FaseDoTrabalho1_idx` (`id_fase` ASC) ,
  CONSTRAINT `fk_tarefa_trabalho1`
    FOREIGN KEY (`id_trabalho` )
    REFERENCES `mydb`.`trabalho` (`id_trabalho` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefa_FaseDoTrabalho1`
    FOREIGN KEY (`id_fase` )
    REFERENCES `mydb`.`fase` (`id_fase` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8, 
COMMENT = 'Armazena as tarefas à serem realizadas pelo usuário no traba' /* comment truncated */ ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
