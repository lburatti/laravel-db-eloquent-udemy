-- MySQL Workbench Synchronization
-- Generated: 2020-03-30 11:09
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: laura

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `laravel_db_eloquent_udemy`.`db_telefones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;
ALTER TABLE `db_telefones` 
	ADD CONSTRAINT `fk_db_telefones_db_clientes` 
    FOREIGN KEY ( `id_cliente` ) 
    REFERENCES `db_clientes` ( `id` ) ;

CREATE TABLE IF NOT EXISTS `laravel_db_eloquent_udemy`.`db_clientes_has_db_tipos_clientes` (
  `id_cliente` INT(11) NOT NULL,
  `id_tipo_cliente` INT(11) NOT NULL,
  PRIMARY KEY (`id_cliente`, `id_tipo_cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;
ALTER TABLE `db_clientes_has_db_tipos_clientes` 
	ADD CONSTRAINT `fk_db_clientes_has_db_tipos_clientes_db_clientes1` 
    FOREIGN KEY ( `id_cliente` ) 
    REFERENCES `db_clientes` ( `id` );
ALTER TABLE `db_clientes_has_db_tipos_clientes` 
	ADD CONSTRAINT `fk_db_clientes_has_db_tipos_clientes_db_tipos_clientes1` 
    FOREIGN KEY ( `id_tipo_cliente` ) 
    REFERENCES `db_tipos_clientes` ( `id` );

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

use laravel_db_eloquent_udemy;

describe carros;
select * from carros;
ALTER TABLE carros DROP COLUMN id_marca;

/* DB_CLIENTES */
SELECT * FROM db_clientes;
INSERT INTO `laravel_db_eloquent_udemy`.`db_clientes` (`nome`, `descricao`) VALUES ('Maria', 'Descrição da Maria..');
INSERT INTO `laravel_db_eloquent_udemy`.`db_clientes` (`nome`, `descricao`) VALUES ('Pedro', 'Descrição do Pedro..');
INSERT INTO `laravel_db_eloquent_udemy`.`db_clientes` (`nome`, `descricao`) VALUES ('João', 'Descrição do João..');

/* DB_TELEFONES */
SELECT * FROM db_telefones;
INSERT INTO `laravel_db_eloquent_udemy`.`db_telefones` (`id_cliente`, `numero`) VALUES ('1', '11955559999');
INSERT INTO `laravel_db_eloquent_udemy`.`db_telefones` (`id_cliente`, `numero`) VALUES ('1', '1133443344');
INSERT INTO `laravel_db_eloquent_udemy`.`db_telefones` (`id_cliente`, `numero`) VALUES ('2', '11988998899');
INSERT INTO `laravel_db_eloquent_udemy`.`db_telefones` (`id_cliente`, `numero`) VALUES ('3', '11977887788');
INSERT INTO `laravel_db_eloquent_udemy`.`db_telefones` (`id_cliente`, `numero`) VALUES ('3', '1144554455');

/* DB_TIPOS_CLIENTE */
SELECT * FROM db_tipos_clientes;
INSERT INTO `laravel_db_eloquent_udemy`.`db_tipos_clientes` (`titulo`) VALUES ('Ativo');
INSERT INTO `laravel_db_eloquent_udemy`.`db_tipos_clientes` (`titulo`) VALUES ('Vip');
INSERT INTO `laravel_db_eloquent_udemy`.`db_tipos_clientes` (`titulo`) VALUES ('Brasil');
INSERT INTO `laravel_db_eloquent_udemy`.`db_tipos_clientes` (`titulo`) VALUES ('Exterior');
INSERT INTO `laravel_db_eloquent_udemy`.`db_tipos_clientes` (`titulo`) VALUES ('Inativo');

/* DB_CLIENTES_HAS_TIPOS_CLIENTES */
SELECT * FROM db_clientes_has_db_tipos_clientes;
INSERT INTO `laravel_db_eloquent_udemy`.`db_clientes_has_db_tipos_clientes` (`id_cliente`, `id_tipo_cliente`) VALUES ('2', '2');

/* SELEÇÕES */
SELECT * FROM db_clientes as cli
INNER JOIN db_telefones as tel ON tel.id_cliente = cli.id
INNER JOIN db_clientes_has_db_tipos_clientes as rel ON rel.id_cliente = cli.id
INNER JOIN db_tipos_clientes as tip ON tip.id = rel.id_tipo_cliente
WHERE cli.id = 1;	

