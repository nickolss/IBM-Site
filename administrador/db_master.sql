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
  `plano` enum('comum', 'turbinado') NOT NULL,
  `quantidadePontos` int DEFAULT NULL,
  `fotoPerfil` blob DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Estrutura da tabela `curriculo`
--
DROP TABLE IF EXISTS `curriculo`;

CREATE TABLE IF NOT EXISTS `curriculo`(
  id_cliente INT NOT NULL,
  caminho_documento VARCHAR(100) NOT NULL,
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Estrutura da tabela `funcionario`
--
DROP TABLE IF EXISTS `funcionario`;

CREATE TABLE IF NOT EXISTS `funcionario` (
  `rf` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rf`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
  `nome` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rf`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
  `nome` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `preco` float NOT NULL,
  `marca` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `customizações` enum(
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
  ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caminho_imagem` varchar(100) NOT NULL,
  `TG_categoria` enum('PC','SME','AA','CA','OF','BA','RT','PA','EP','PM','APM','FE') DEFAULT NULL,

  PRIMARY KEY (`codigoProduto`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigoProduto`, `nome`, `preco`, `marca`, `descricao`, `customizações`, `caminho_imagem`, `TG_categoria`) VALUES
(1, 'Roda Vermelha Sólida', 89, 'Marca 1', 'Pneu Vermelho', 'pneu-solido', '../assets/img/personalizacao-roda-solida-vermelho.png', 'PC'),
(2, 'Adesivo de Garras', 15, 'Adesivo', 'Adesivo de garras na cor preta.', 'adesivo-medio', '../assets/img/personalizacao-adesivo-medio.png', 'AA'),
(3, 'Motor', 899, 'motor', 'Motor de Carro', 'pecas-automoveis', '../assets/img/personalizacao-motor2.png', 'PA'),
(4, 'Roda Cinza', 55, 'Marca 1', 'Roda cinza sólida de qualidade.', 'pneu-solido', '../assets/img/personalizacao-roda-solida-cinza.png', 'PC'),
(5, 'Roda preta e vermelha', 169, 'Marca 2', 'Roda de duas cores preta e vermelha.', 'pneu-duasCores', '../assets/img/personalizacao-roda-duas-pretored.png', 'PM'),
(6, 'Caixa de Som', 899, 'Marca 2', 'Caixa de som para carros', 'caixaDeSom', '../assets/img/personalizacao-modificacao-caixasom.png', 'SME'),
(7, 'Produto 1', 1000, 'Marca A', 'Descrição do Produto 1', 'rebaixamento-dropped', '../assets/img/personalizacao-motor2.png', 'PC'),
(8, 'Produto 2', 1500, 'Marca B', 'Descrição do Produto 2', 'rebaixamento-slammed', '../assets/img/personalizacao-motor2.png', 'SME'),
(9, 'Produto 3', 800, 'Marca A', 'Descrição do Produto 3', 'pintura-solida', '../assets/img/personalizacao-motor2.png', 'AA'),
(10, 'Produto 4', 1200, 'Marca C', 'Descrição do Produto 4', 'pintura-metalica', '../assets/img/personalizacao-motor2.png', 'CA'),
(11, 'Produto 5', 900, 'Marca D', 'Descrição do Produto 5', 'pneu-solido', '../assets/img/personalizacao-motor2.png', 'OF'),
(12, 'Produto 6', 1100, 'Marca B', 'Descrição do Produto 6', 'pneu-personalizado', '../assets/img/personalizacao-motor2.png', 'BA'),
(13, 'Produto 7', 750, 'Marca E', 'Descrição do Produto 7', 'adesivo-pequeno', '../assets/img/personalizacao-motor2.png', 'RT'),
(14, 'Produto 8', 1300, 'Marca F', 'Descrição do Produto 8', 'adesivo-medio', '../assets/img/personalizacao-motor2.png', 'PA'),
(15, 'Produto 9', 950, 'Marca A', 'Descrição do Produto 9', 'adesivo-grande', '../assets/img/personalizacao-motor2.png', 'EP'),
(16, 'Produto 10', 1400, 'Marca G', 'Descrição do Produto 10', 'aerofolio', '../assets/img/personalizacao-motor2.png', 'PM'),
(17, 'Produto 11', 950, 'Marca D', 'Descrição do Produto 11', 'rebaixamento-dropped', '../assets/img/personalizacao-motor2.png', 'PC'),
(18, 'Produto 12', 1200, 'Marca E', 'Descrição do Produto 12', 'rebaixamento-slammed', '../assets/img/personalizacao-motor2.png', 'SME'),
(19, 'Produto 13', 850, 'Marca F', 'Descrição do Produto 13', 'pintura-perolizada', '../assets/img/personalizacao-motor2.png', 'AA'),
(20, 'Produto 14', 1100, 'Marca B', 'Descrição do Produto 14', 'pintura-solida', '../assets/img/personalizacao-motor2.png', 'CA'),
(21, 'Produto 15', 1050, 'Marca G', 'Descrição do Produto 15', 'pneu-duasCores', '../assets/img/personalizacao-motor2.png', 'OF'),
(22, 'Produto 16', 1250, 'Marca H', 'Descrição do Produto 16', 'adesivo-medio', '../assets/img/personalizacao-motor2.png', 'BA'),
(23, 'Produto 17', 900, 'Marca D', 'Descrição do Produto 17', 'pneu-solido', '../assets/img/personalizacao-motor2.png', 'RT'),
(24, 'Produto 18', 1350, 'Marca I', 'Descrição do Produto 18', 'pneu-personalizado', '../assets/img/personalizacao-motor2.png', 'PA'),
(25, 'Produto 19', 950, 'Marca E', 'Descrição do Produto 19', 'adesivo-pequeno', '../assets/img/personalizacao-motor2.png', 'EP'),
(26, 'Produto 20', 1400, 'Marca J', 'Descrição do Produto 20', 'adesivo-grande', '../assets/img/personalizacao-motor2.png', 'PM'),
(27, 'Produto 21', 950, 'Marca C', 'Descrição do Produto 21', 'aerofolio', '../assets/img/personalizacao-motor2.png', 'APM'),
(28, 'Produto 22', 1200, 'Marca D', 'Descrição do Produto 22', 'insulfilm', '../assets/img/personalizacao-motor2.png', 'FE'),
(29, 'Produto 23', 850, 'Marca E', 'Descrição do Produto 23', 'caixaDeSom', '../assets/img/personalizacao-motor2.png', 'PC'),
(30, 'Produto 24', 1100, 'Marca F', 'Descrição do Produto 24', 'banco', '../assets/img/personalizacao-motor2.png', 'SME'),
(31, 'Produto 25', 1050, 'Marca G', 'Descrição do Produto 25', 'tunagem-reformulada', '../assets/img/personalizacao-motor2.png', 'AA'),
(32, 'Produto 26', 1250, 'Marca H', 'Descrição do Produto 26', 'tunagem-remanufaturada', '../assets/img/personalizacao-motor2.png', 'CA'),
(33, 'Produto 27', 900, 'Marca I', 'Descrição do Produto 27', 'pneu-carro', '../assets/img/personalizacao-motor2.png', 'OF'),
(34, 'Produto 28', 1350, 'Marca J', 'Descrição do Produto 28', 'som-multimidia-eletronicos', '../assets/img/personalizacao-motor2.png', 'BA'),
(35, 'Produto 29', 950, 'Marca A', 'Descrição do Produto 29', 'acessorios-automoveis', '../assets/img/personalizacao-motor2.png', 'RT'),
(36, 'Produto 30', 1400, 'Marca B', 'Descrição do Produto 30', 'cuidados-automotivos', '../assets/img/personalizacao-motor2.png', 'PA');

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
  `cep` int(8) NOT NULL,
  `id_morador` int NOT NULL,
  FOREIGN KEY (`id_morador`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Estrutura da tabela `avaliacao`
--
DROP TABLE IF EXISTS `avaliacao`;

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_escritor` int NOT NULL,
  `id_produto` int NOT NULL,
  `estrelas` int NOT NULL,
  `texto` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_escritor`) REFERENCES `cliente`(`id`),
  FOREIGN KEY (`id_produto`) REFERENCES `produto`(`codigoProduto`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Estrutura da Tabela `carro`
--
DROP TABLE IF EXISTS `carro`;

CREATE TABLE IF NOT EXISTS `carro`(
  `placa` varchar(8) NOT NULL,
  `id_dono` INT NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `cor` varchar(100) NOT NULL,
  PRIMARY KEY(`placa`),
  FOREIGN KEY (`id_dono`) REFERENCES `cliente`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Estrutura da Tabela `agendamento`
--
DROP TABLE IF EXISTS `agendamento`;

CREATE TABLE IF NOT EXISTS `agendamento`(
  `data_agendamento` date NOT NULL,
  `horario` enum('8h', '10h', '12h', '14h', '16h', '18h') NOT NULL,
  `id_cliente` INT NOT NULL,
  `placa_carro` varchar(7),
  `agendamento` enum(
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
  PRIMARY KEY(`data_agendamento`),
  FOREIGN KEY(`id_cliente`) REFERENCES `cliente`(`id`),
  FOREIGN KEY(`placa_carro`) REFERENCES `carro`(`placa`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
  `status` ENUM(
    'em avaliação',
    'mecânico confirmado',
    'mecanico cancelado',
    'cliente confirmado',
    'cliente cancelado',
    'agendamento confirmado'
  ) NOT NULL,

  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`)
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;