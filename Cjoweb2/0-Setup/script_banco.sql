-- -----------------------------------------------------
-- Criando DATABASE `banco_web2`
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BANCO_WEB2` DEFAULT CHARACTER SET UTF8MB4;
USE `BANCO_WEB2`;

CREATE TABLE IF NOT EXISTS usuarios (
  idu INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nome VARCHAR(255) NULL,
  email NULL,
  sexo NUM('masculino', 'feminino'),
  senha tinytext DEFAULT NULL,
  status NUM('1', '0')
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;
/* drop table usuarios */
/* DROP SCHEMA banco_web2 /*

-- -----------------------------------------------------
-- Table clientes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  codigo VARCHAR(50) DEFAULT NULL,
  nome_completo VARCHAR(255) NULL,
  sexo ENUM('masculino', 'feminino'),
  dt_nasc date DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  telefone VARCHAR(15) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;
/* drop table clientes */

/*
INSERT INTO `banco_web2`.`clientes`
(`codigo`,   `nome_completo`, `dt_nasc`, `email`,  `telefone`) VALUES
('codigo',   'nome_completo', 'dt_nasc', 'email' , 'telefone');
*/

INSERT INTO `banco_web2`.`clientes`
(`codigo`,        `nome_completo`, `sexo`,       `dt_nasc`,    `email`,             `telefone`) VALUES
('AWDRG-12QWXT',  'João Trakinas', 'Masculino', '2002-08-15' 'jt@acme.com' ,     '1255555555');

SELECT * FROM CLIENTES;





