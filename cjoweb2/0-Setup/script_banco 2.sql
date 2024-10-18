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
  id INT AUTO_INCREMENT PRIMARY KEY DEFAULT NULL,
  codigo VARCHAR(50) DEFAULT NULL,
  nome_completo VARCHAR(255) NULL,
  sexo ENUM('masculino', 'feminino'),
  dt_nasc date DEFAULT NULL,
  email VARCHAR(255) DEFAULT NULL,
  telefone VARCHAR(15) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;
/* drop table clientes */

CREATE TABLE IF NOT EXISTS fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) DEFAULT NULL,
    cnpj VARCHAR(18) DEFAULT NULL,
    email VARCHAR(100),
    telefone VARCHAR(15),
    endereco TEXT,
    descricao TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;
/* drop table fornecedores */

CREATE TABLE IF NOT EXISTS financas_contas_bancarias (
    id_conta INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_fornecedor INT,
    banco VARCHAR(100) DEFAULT NULL,
    agencia VARCHAR(10) DEFAULT NULL,
    numero_conta VARCHAR(20) DEFAULT NULL,
    tipo_conta ENUM('Corrente', 'Poupança') DEFAULT NULL,
    saldo DECIMAL(15, 2) DEFAULT 0.00,
    data_abertura DATE DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE financas_tipos_pagamentos (
    id_tipo_pagamento INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) DEFAULT NULL,  -- Nome do tipo de pagamento (ex: Cartão de Crédito, Boleto)
    taxa_percentual DECIMAL(5, 2) DEFAULT 0.00,  -- Taxa percentual cobrada para o método de pagamento, se aplicável
    status ENUM('0', '1') DEFAULT '1' 
);

CREATE TABLE IF NOT EXISTS  financas_operacoes (
    id_transacao INT AUTO_INCREMENT PRIMARY KEY,
    tipo_transacao ENUM('Pagar', 'Receber') DEFAULT NULL,  -- Define se é uma conta a pagar ou receber
    id_tipo_pagamento INT DEFAULT NULL,
    id_cliente INT DEFAULT NULL,
	id_conta INT DEFAULT NULL,
    id_fornecedor INT DEFAULT NULL,
    id_fatura INT DEFAULT NULL,
    descricao VARCHAR(255),
    valor_fatura DECIMAL(10,2) DEFAULT NULL,
	tx_juros DECIMAL(3,2) DEFAULT NULL,
    valor_final DECIMAL(10,2) DEFAULT NULL,
    data_venc DATE DEFAULT NULL,
    data_pagto_recebimento DATE,
    status ENUM('Pendente', 'Pago', 'Recebido') DEFAULT 'Pendente'    
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE IF NOT EXISTS produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    id_fornecedor INT DEFAULT NULL,
    id_usuario INT DEFAULT NULL,
    codigo_barras VARCHAR(13) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT DEFAULT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    status ENUM('ativo', 'inativo') DEFAULT 'ativo', 
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;


CREATE TABLE IF NOT EXISTS estoques (
    id_estoque INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE IF NOT EXISTS compras (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_fatura INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    data_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET=UTF8MB4;

