-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Ago-2023 às 20:17
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `nomeCompleto` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `recuperar_senha` VARCHAR(220) NULL;
  `plano` enum('comum','turbinado') COLLATE utf8mb4_general_ci NOT NULL,
  `quantidadePontos` int DEFAULT NULL,
  `fotoPerfil` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rf` int NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
  `customizações` enum('rebaixamento-dropped','rebaixamento-slammed','rebaixamento-hellaFlush','pintura-solida','pintura-metalica','pintura-perolizada','pneu-solido','pneu-personalizado','pneu-duasCores','adesivo-pequeno','adesivo-medio','adesivo-grande','aerofolio','insulfilm','caixaDeSom','banco','tunagem-reformulada','tunagem-remanufaturada', 'pneu-carro', 'som-multimidia-eletronicos', 'acessorios-automoveis', 'cuidados-automotivos', 'oleo-fluidos', 'baterias-acessorios', 'reboque-transporte', 'pecas-automoveis', 'equipamentos-protecao', 'pneu-moto', 'acessorios-pecas-moto', 'ferramentas-equipamentos') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caminho_imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`codigoProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `tipo-pagamento` enum('pix','boleto','cartao') NOT NULL,
  `valorTotal` double NOT NULL,
  `dataCompra` date NOT NULL,
  `statusDaCompra` enum('aprovado','esperando-resposta','reprovado') NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_cliente`) REFERENCES `cliente`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estrutura da Tabela `agendamento`
--
DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento`(
  `data_agendamento` date NOT NULL,
  `horario` enum('8h','10h','12h','14h','16h','18h') NOT NULL,
  `id_cliente` INT NOT NULL,
  `placa_carro` varchar(7),
  `agendamento` enum('rebaixamento-dropped','rebaixamento-slammed','rebaixamento-hellaFlush','pintura-solida','pintura-metalica','pintura-perolizada','pneu-solido','pneu-personalizado','pneu-duasCores','adesivo-pequeno','adesivo-medio','adesivo-grande','aerofolio','insulfilm','caixaDeSom','banco','tunagem-reformulada','tunagem-remanufaturada', 'pneu-carro', 'som-multimidia-eletronicos', 'acessorios-automoveis', 'cuidados-automotivos', 'oleo-fluidos', 'baterias-acessorios', 'reboque-transporte', 'pecas-automoveis', 'equipamentos-protecao', 'pneu-moto', 'acessorios-pecas-moto', 'ferramentas-equipamentos') NOT NULL,

  PRIMARY KEY(`data_agendamento`),
  FOREIGN KEY(`id_cliente`) REFERENCES `cliente`(`id`),
  FOREIGN KEY(`placa_carro`) REFERENCES `carro`(`placa`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;