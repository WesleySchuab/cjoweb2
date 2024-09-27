-- -----------------------------------------------------
-- Criando DATABASE `banco_web2`
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BANCO_WEB2` DEFAULT CHARACTER SET UTF8MB4;
USE `BANCO_WEB2`;
/* DROP SCHEMA banco_web2 */

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

INSERT INTO clientes (codigo, nome_completo, sexo, dt_nasc, email, telefone) VALUES
('DRTWR-34XT-D2GT5', 'Alice Silva', 'feminino', '1990-05-22', 'alice@acme.com', '123456789'),
('QWEAS-12ZX-C3FG5', 'Bruno Oliveira', 'masculino', '1985-07-15', 'bruno@acme.com', '987654321'),
('ASDFG-67HJ-K9LO8', 'Clara Pereira', 'feminino', '1992-11-03', 'clara@acme.com', '456123789'),
('ZXCVB-89NM-F3TR2', 'Daniela Santos', 'feminino', '1988-09-26', 'daniela@acme.com', '321654987'),
('RYUJH-12KL-A7BF6', 'Eduardo Lima', 'masculino', '1995-02-17', 'eduardo@acme.com', '654123789'),
('OPMNB-34XY-C4DE1', 'Fernanda Costa', 'feminino', '1991-03-14', 'fernanda@acme.com', '159753468'),
('TGBVC-56PO-L5YH9', 'Gabriel Martins', 'masculino', '1993-10-30', 'gabriel@acme.com', '753951258'),
('VBNMK-78CQ-K8RQ3', 'Heloísa Ramos', 'feminino', '1989-08-12', 'heloisa@acme.com', '258963147'),
('FDERT-90PL-J6IK4', 'Igor Santos', 'masculino', '1996-04-05', 'igor@acme.com', '147852369'),
('QAZWS-54OP-L3UJ7', 'Julia Almeida', 'feminino', '1987-12-20', 'julia@acme.com', '852963741'),
('MKJHG-12ZZ-DF4GH', 'Lucas Ferreira', 'masculino', '1994-01-11', 'lucas@acme.com', '963852741'),
('RTYUI-34TR-FOLM2', 'Mariana Sousa', 'feminino', '1990-02-22', 'mariana@acme.com', '159851753'),
('ASDFG-56HJ-K9NM8', 'Nicolas Pinto', 'masculino', '1995-03-07', 'nicolas@acme.com', '258147369'),
('ZXCVB-78VW-E6YT5', 'Olivia Ribeiro', 'feminino', '1992-10-18', 'olivia@acme.com', '321987654'),
('POIUY-67ML-L5QR3', 'Pablo Andrade', 'masculino', '1986-09-09', 'pablo@acme.com', '654789321'),
('UREWT-56YH-OP4XZ', 'Quíria Mendes', 'feminino', '1988-06-11', 'quirira@acme.com', '789456123'),
('TREWY-90OP-J3IK1', 'Rafael Costa', 'masculino', '1993-07-28', 'rafael@acme.com', '321789654'),
('MNBCX-54XZ-C1RT5', 'Sofia Lima', 'feminino', '1991-04-19', 'sofia@acme.com', '654312789'),
('HGFDS-12LK-J2UI9', 'Tiago Nascimento', 'masculino', '1994-11-30', 'tiago@acme.com', '987321654'),
('PLMKJ-89YT-K5JW3', 'Ursula Araújo', 'feminino', '1990-07-22', 'ursula@acme.com', '951753486');

SELECT * FROM CLIENTES;

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

SELECT * FROM usuarios;





