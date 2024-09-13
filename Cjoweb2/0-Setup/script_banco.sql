-- -----------------------------------------------------
-- Criando DATABASE `banco_web2`
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BANCO_WEB2` DEFAULT CHARACTER SET UTF8MB4;
USE `BANCO_WEB2`;

CREATE TABLE IF NOT EXISTS usuarios (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  codigo VARCHAR(50) DEFAULT NULL,
  email VARCHAR(255) NULL,
  senha tinytext DEFAULT NULL,
  status ENUM('0', '1'),
  dt_reg DATETIME NULL,
  dt_alt DATETIME NULL
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

INSERT INTO usuarios (codigo, email, senha, status, dt_reg, dt_alt)
VALUES (
  'USRWDR-WE77TD',        -- Código do usuário
  'trakinas@acme.com',    -- Email
  'abc@1234',             -- Senha simples
  '1',                    -- Status (1 = ativo, 0 = inativo)
  NOW(),                  -- Data de registro atual
  NOW()                   -- Data de alteração atual
);





