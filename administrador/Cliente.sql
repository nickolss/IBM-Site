-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/07/2023 às 04:11
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE `db_master`;
USE `db_master`;
--
-- Banco de dados: `db_master`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Cliente`
--

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `plano` enum('turbinado','comum') NOT NULL,
  `dataCriacaoConta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Cliente`
--

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
