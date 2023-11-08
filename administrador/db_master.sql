-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Ago-2023 às 20:17
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Banco de dados: `db_master`
--

CREATE DATABASE `db_master`;
USE `db_master`;
ALTER DATABASE `db_master` COLLATE = utf8_general_ci;

-- --------------------------------------------------------
--
-- Estrutura da tabela `cliente`
--
DROP TABLE IF EXISTS `cliente`;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `recuperar_senha` VARCHAR(220) DEFAULT NULL,
  `plano` enum('comum', 'turbinado', 'pendente') NOT NULL,
  `quantidadePontos` int DEFAULT NULL,
  `fotoPerfil` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `cartao`
--
DROP TABLE IF EXISTS `cartao`;

CREATE TABLE IF NOT EXISTS `cartao`(
  `numero_cartao` int NOT NULL,
  `cvv` int(3) NOT NULL,
  `validade` date NOT NULL,
  `id_titular` int NOT NULL,
  PRIMARY KEY (`numero_cartao`),
  FOREIGN KEY (`id_titular`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `funcionario`
--
DROP TABLE IF EXISTS `funcionario`;

CREATE TABLE IF NOT EXISTS `funcionario` (
  `rf` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nome` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`rf`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--
INSERT INTO
  `funcionario` (
    `rf`,
    `cpf`,
    `dataNasc`,
    `telefone`,
    `nome`,
    `email`,
    `senha`
  )
VALUES
  (
    1,
    '40144cb62e2b174ad50971b5e02d5fbc',
    '2000-01-01',
    '11911111111',
    'Nickolas',
    'nickolas@turn.com',
    'fe98774e68b811326a09e96d32f1ec1f'
  ),
  (
    2,
    '3d0e7719ae8997bca163fb342bfd1ec8',
    '2000-01-01',
    '11922222222',
    'Pedro',
    'pedro@turn.com',
    '4bd8464f5f26f84deec45adcf12b0df8'
  ),
  (
    3,
    '3241c1ec411f9da5bf9a68c88ce16d81',
    '2000-01-01',
    '11933333333',
    'Tiago',
    'tiagoAdm369@turn.com',
    'fec732a02e93c288cd82b59625946d04'
  ),
  (
    4,
    'dccd57ebd372b8017913648067f72be1',
    '2000-01-01',
    '11944444444',
    'Vinicius',
    'vinicius@turn.com',
    '5dafc75f39ba4799e82ea71cdf69ff86'
  );

-- --------------------------------------------------------
--
-- Estrutura da tabela `mecanico`
--
DROP TABLE IF EXISTS `mecanico`;

CREATE TABLE IF NOT EXISTS `mecanico` (
  `rf` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nome` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`rf`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Extraindo dados da tabela `mecanico`
--
INSERT INTO
  `mecanico` (
    `rf`,
    `cpf`,
    `dataNasc`,
    `telefone`,
    `nome`,
    `email`,
    `senha`
  )
VALUES
  (
    1,
    '8db28bc810a2b7e308f220fc80233521',
    '1999-01-01',
    '11988888888',
    'Jorge',
    'jorge@turn.com',
    'ecbd25ff1ba43a1987f11a7a797f9bdf'
  );

-- --------------------------------------------------------
--
-- Estrutura da tabela `produto`
--
DROP TABLE IF EXISTS `produto`;

CREATE TABLE IF NOT EXISTS `produto` (
  `codigoProduto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8_general_ci NOT NULL,
  `preco` float NOT NULL,
  `pontos` int NOT NULL,
  `marca` varchar(120) COLLATE utf8_general_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_general_ci NOT NULL,
  `caminho_imagem` varchar(100) NOT NULL,
  `TG_categoria` enum(
    'PC',
    'SME',
    'AA',
    'CA',
    'OF',
    'BA',
    'RT',
    'PEA',
    'EPI',
    'PNM',
    'APM',
    'FE',
    'MT',
    'VD'
  ) DEFAULT NULL,
  PRIMARY KEY (`codigoProduto`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `endereco`
--
DROP TABLE IF EXISTS `endereco`;

CREATE TABLE IF NOT EXISTS `endereco`(
  `rua` varchar(255) NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `id_morador` int NOT NULL,
  FOREIGN KEY (`id_morador`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `avaliacao`
--
DROP TABLE IF EXISTS `avaliacao`;

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_escritor` int NOT NULL,
  `id_produto` int NOT NULL,
  `texto` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_escritor`) REFERENCES `cliente`(`id`),
  FOREIGN KEY (`id_produto`) REFERENCES `produto`(`codigoProduto`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `pedido`
--
DROP TABLE IF EXISTS `pedido`;

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `tipo-pagamento` enum('pix', 'boleto', 'cartao') NOT NULL,
  `valorTotal` double NOT NULL,
  `dataCompra` date NOT NULL,
  `statusDaCompra` enum('aprovado', 'esperando-resposta', 'reprovado') NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da Tabela `carro`
--
DROP TABLE IF EXISTS `carro`;

CREATE TABLE IF NOT EXISTS `carro`(
  `idVeiculo` INT NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL UNIQUE,
  `id_dono` INT NOT NULL,
  `apelido` varchar(60) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `cor` varchar(100) NOT NULL,
  PRIMARY KEY(`idVeiculo`),
  FOREIGN KEY (`id_dono`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da Tabela `agendamento`
--
DROP TABLE IF EXISTS `agendamento`;

CREATE TABLE IF NOT EXISTS `agendamento`(
  `data_agendamento` date NOT NULL,
  `horario` enum('8', '10', '12', '14', '16', '18') NOT NULL,
  `id_cliente` INT NOT NULL,
  `placa_carro` varchar(8),
  `agendamento` varchar(150) NOT NULL,
  PRIMARY KEY(`data_agendamento`),
  FOREIGN KEY(`id_cliente`) REFERENCES `cliente`(`id`),
  FOREIGN KEY(`placa_carro`) REFERENCES `carro`(`placa`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `pedido_orcamento`
--
CREATE TABLE `pedido_orcamento`(
  `id_cliente` INT(4) NOT NULL,
  `data` DATE NOT NULL,
  `horario` INT(2) NOT NULL,
  `corCarro` VARCHAR(30) NOT NULL,
  `placaCarro` VARCHAR(8) NOT NULL,
  `personalizacao` ENUM(
    'rebaixamento-dropped',
    'rebaixamento-slammed',
    'rebaixamento-hellaFlush',
    'pintura-solida',
    'pintura-metalica',
    'pintura-perolizada',
    'pneu-solido',
    'pneu-personalizado',
    'pneu-duasCores',
    'adesivo-pequeno',
    'adesivo-medio',
    'adesivo-grande',
    'aerofolio',
    'insulfilm',
    'caixaDeSom',
    'banco',
    'tunagem-reformulada',
    'tunagem-remanufaturada',
    'pneu-carro',
    'som-multimidia-eletronicos',
    'acessorios-automoveis',
    'cuidados-automotivos',
    'oleo-fluidos',
    'baterias-acessorios',
    'reboque-transporte',
    'pecas-automoveis',
    'equipamentos-protecao',
    'pneu-moto',
    'acessorios-pecas-moto',
    'ferramentas-equipamentos'
  ) NOT NULL,
  `preco` DECIMAL,
  `status` varchar(50) NOT NULL,
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`)
);

--
-- Estrutura da tabela `favoritos`
--
DROP TABLE IF EXISTS `favoritos`;

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_produto` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`),
  FOREIGN KEY (`id_produto`) REFERENCES `produto`(`codigoProduto`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `produtosTroca`
--
DROP TABLE IF EXISTS `produtosTroca`;

CREATE TABLE IF NOT EXISTS `produtosTroca`(
  `idProduto` int not null AUTO_INCREMENT,
  `nome` varchar(120) not null,
  `preco_pontos` int not null,
  `descricao` varchar(180) not null,
  `categoria` ENUM(
    'capa-volante',
    'cheirinho-carro',
    'chaveiro',
    'limpador',
    'tapa-sol',
    'tapete-carro',
    'lavagem-simples',
    'lavagem-completa'
  ) NOT NULL,
  `caminho_img` varchar(120) not null,
  PRIMARY KEY (`idProduto`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

INSERT INTO
  `produtosTroca` (
    `nome`,
    `preco_pontos`,
    `descricao`,
    `categoria`,
    `caminho_img`
  )
VALUES
  (
    'Lavagem Simples',
    '1000',
    'Lavagem simples do seu veículo',
    'lavagem-simples',
    '../assets/img/motor369.svg'
  ),
  (
    'Lavagem Completa',
    '1800',
    'Lavagem completa do seu veículo',
    'lavagem-completa',
    '../assets/img/motor369.svg'
  ),
  (
    'Cheiro de Lavanda',
    '200',
    'Cheirinho de lavanda',
    'cheirinho-carro',
    '../assets/img/motor369.svg'
  ),
  (
    'Capa de Volante',
    '600',
    'Capa de Volante',
    'capa-volante',
    '../assets/img/motor369.svg'
  ),
  (
    'Tapete de carro',
    '750',
    'Tapete de carro',
    'tapete-carro',
    '../assets/img/motor369.svg'
  ),
  (
    'Cheiro de Morango',
    '200',
    'Cheirinho de Morango',
    'cheirinho-carro',
    '../assets/img/motor369.svg'
  ),
  (
    'Limpador de vidro',
    '120',
    'Limpador de vidro',
    'limpador',
    '../assets/img/motor369.svg'
  ),
  (
    'Chaveiro do Naruto',
    '300',
    'Chaveiro do Naruto',
    'chaveiro',
    '../assets/img/motor369.svg'
  ),
  (
    'Cheiro de Baunilha',
    '220',
    'Cheiro de Baunilha',
    'cheirinho-carro',
    '../assets/img/motor369.svg'
  ),
  (
    'Capa de volante de leão',
    '550',
    'Capa de volante de leão',
    'capa-volante',
    '../assets/img/motor369.svg'
  );

--
-- Estrutura da tabela `produtosComprados`
--
DROP TABLE IF EXISTS `produtosComprados`;

CREATE TABLE IF NOT EXISTS `produtosComprados`(
  `idCompra` int not null AUTO_INCREMENT,
  `idProdutos` varchar(150) not null,
  `nomeProdutos` varchar(200) not null,
  `preco_final` decimal not null,
  `id_comprador` int not null,
  PRIMARY KEY (`idCompra`),
  FOREIGN KEY (`id_comprador`) REFERENCES cliente (`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

--
-- Estrutura da tabela `experienciaUser`
--
DROP TABLE IF EXISTS `experienciaUser`;

CREATE TABLE IF NOT EXISTS `experienciaUser`(
  `idExperiencia` int not null AUTO_INCREMENT,
  `texto` text not null,
  `id_cliente` int not null,
  PRIMARY KEY (`idExperiencia`),
  FOREIGN KEY (`id_cliente`) REFERENCES cliente (`id`)
) ENGINE = InnoDB DEFAULT COLLATE = utf8_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;