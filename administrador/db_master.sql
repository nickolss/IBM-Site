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
  `customizacoes` enum(
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
    'ferramentas-equipamentos',
    'vidro'
  ) COLLATE utf8_general_ci DEFAULT NULL,
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
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigoProduto`, `nome`, `preco`, `pontos`, `marca`, `descricao`, `caminho_imagem`, `customizacoes`, `TG_categoria`) VALUES
(1, 'Pneu 245/70R16', 700, 700, 'ROADCRUZA', 'Tamanho do aro	16 Polegadas\r\nÍndice de carga	111.00', '../assets/img/produtos/pn-245-70R16.png', NULL, 'PC'),
(2, 'Pneu 175/75R13', 220, 220, 'WESTLAKE', 'Tamanho	175/75R13\r\nTamanho do aro	13 Polegadas\r\nÍndice de carga	85.00', '../assets/img/produtos/pneu-175-70R13.png', NULL, 'PC'),
(3, 'Pneu 185R14C', 330, 330, 'XBRI', 'Tamanho	tamanho único\r\nDimensões do item C x L x A	18 x 65 x 65 centímetros', '../assets/img/produtos/pneu-185R14C.png', NULL, 'PC'),
(4, 'Pneu 205/40R17', 280, 280, 'Forceland', 'Economia de Combustível: D\r\nAderência em pista molhada: B\r\nRuído: 72', '../assets/img/produtos/pneu-205-40R17.png', NULL, 'PC'),
(5, 'Pneu 205/55 R16 91H', 470, 470, 'HANKOOK', 'Tamanho do aro	16 Polegadas\r\nLargura da seção	205 Milímetros\r\n', '../assets/img/produtos/pneu-205-55-R16.png', NULL, 'PC'),
(6, 'Pneu 215/55R17', 700, 700, 'Goodyear', 'Tamanho	tamanho único\r\nPeso do produto	11,89 Quilogramas', '../assets/img/produtos/pneu-215-55R17.png', NULL, 'PC'),
(7, 'Pneu Aro 13', 220, 220, 'COMPASAL', 'Tamanho do aro	13 Polegadas\r\nLargura da seção	175 Milímetros', '../assets/img/produtos/pneu-aro-13-compasal.png', NULL, 'PC'),
(8, 'Pneu Aro 14 175/75r14', 230, 230, 'Royal Black', 'Tamanho do aro	14 Polegadas\r\nLargura da seção	175 Milímetros', '../assets/img/produtos/pneu-aro-14.png', NULL, 'PC'),
(9, 'Pneu Aro 17', 780, 780, 'Pirelli', 'Largura da seção	215 Milímetros\r\nProporções do pneu 55 Milímetros\r\n', '../assets/img/produtos/pneu-aro-17-pirelli.png', NULL, 'PC'),
(10, 'Pneu Aro 14', 330, 330, 'Hankook ', 'Economia de Combustível: E\r\nAderência em pista molhada: E\r\nRuído: 75', '../assets/img/produtos/pneu-hankook-aro-14.png', NULL, 'PC'),
(11, 'Câmera para Carro', 730, 730, 'Xiaomi', 'Visão Noturna, Ângulo de Visão 140°, Gravação em loop, Detecção de Movimento', '../assets/img/produtos/camera-carro.png', NULL, 'SME'),
(12, 'Aparelho de som portátil', 520, 520, 'Sanpyl', ' Touch-screen de 7 polegadas, receptor de rádio automotivo com navegação GPS ', '../assets/img/produtos/aparelho-som-portatil-carro.png', NULL, 'SME'),
(13, 'Rádio estéreo', 430, 430, 'Luqeeg', '10\" IPS touch-screen, Bluetooth viva-voz, controle de volante de navegação GPS', '../assets/img/produtos/radio-estereo-carro.png', NULL, 'SME'),
(14, 'Carregador Veicular', 40, 40, 'Genérico', 'Carregador Veicular Universal 38w Turbo Com 2 Entradas 1 Usb e 1 Tipo C', '../assets/img/produtos/carregador-veicular-universal.png', NULL, 'SME'),
(15, 'Adaptador sem fio ', 150, 150, 'YEOODOP', 'Converte com fio para sem fio, suporta atualização on-line, plug&play', '../assets/img/produtos/adaptador-sem-fio-carplay.png', NULL, 'SME'),
(16, 'Adaptador Receptor Bluetooth p/ Radio', 50, 50, 'Kanup', 'Adaptador Receptor\r\nP2 Bluetooth\r\n', '../assets/img/produtos/adaptador-receptor-p2-bluetooth.png', NULL, 'SME'),
(17, 'Rádio Automotivo', 210, 210, 'JBL', 'JBL, Rádio Automotivo, MP3 Player, Celebrity 100, Bluetooth / USB / SD Card / Aux / FM ', '../assets/img/produtos/radio-automotivo.png', NULL, 'SME'),
(18, 'Central Multimidia', 2500, 2500, 'Pioneer', 'Central Multimídia, 8 pol Bt Dvd Touch Weblink Android Iphone Tv Digital', '../assets/img/produtos/central-multimidia.png', NULL, 'SME'),
(19, 'Suporte Magnético', 45, 45, 'Geonav', 'Suporte Veicular Magnético para Smartphones 4 imãs', '../assets/img/produtos/suporte-veicular-magnetico-universal.png', NULL, 'AA'),
(20, 'Suporte p/ Smartphones', 70, 70, 'ELG', 'Suporte Veicular Para Smartphones Tipo Garra, ELG', '../assets/img/produtos/suporte-veicular-para-smarthphones.png', NULL, 'AA'),
(21, 'Cadeira Reclinável ', 340, 340, 'Burigotto Import', 'Cadeira Reclinável  para Auto, Mesclado Preto, 15-36 kg ', '../assets/img/produtos/cadeira-reclinavel.png', NULL, 'AA'),
(22, 'Booster Teen', 70, 70, 'Dorel', 'Cinto de segurança\r\nMaterial: Plástico, Poliéster, Metal', '../assets/img/produtos/booster-teen.png', NULL, 'AA'),
(23, 'Almofada apoio cabeça', 50, 50, 'PUCHEN', 'Almofada de cor rosa para o apoio da cabeça no automóvel', '../assets/img/produtos/almofada-apoio-cabeca.png', NULL, 'AA'),
(24, 'Protetor Solar Parabrisa', 30, 30, 'UTILEIRA', 'Proteção Térmica Uv Painél Dobrável Completo 130x60cm', '../assets/img/produtos/protetor-solar-parabrisa.png', NULL, 'AA'),
(25, 'Capa proteção', 90, 90, 'Bezzter', 'Capa para proteção do automóvel, 100% impermeável', '../assets/img/produtos/capa-cobrir-carro.png', NULL, 'AA'),
(26, 'Carpete ', 170, 170, 'Genérico', 'Dimensões do produto	70L x 55W x 0,5Th centímetros', '../assets/img/produtos/carpete.png', NULL, 'AA'),
(27, 'Condicionador de metais', 80, 80, 'MILITEC', 'Protege as peças no caso de contaminação do óleo por outros elementos ', '../assets/img/produtos/condicionador-de-metais.png', NULL, 'CA'),
(28, 'Produto Limpador', 30, 30, 'VONIXX', 'Produto automotivo para um brilho intenso e duradouro, 500ML', '../assets/img/produtos/produto-brilho.png', NULL, 'CA'),
(29, 'V-FLOC', 20, 20, 'VONIXX', 'Lava autos de alta performance e de pH neutro com alto grau de lubrificação', '../assets/img/produtos/vonix.png', NULL, 'CA'),
(30, 'DELET ', 30, 30, 'VONIXX', 'Limpador de alta performance para remover sujidade severa em pneus e borrachas', '../assets/img/produtos/delet.png', NULL, 'CA'),
(31, 'BLEND', 30, 30, 'VONIXX', 'Cera híbrida que protege a superfície veicular por até quatro meses', '../assets/img/produtos/blend.png', NULL, 'CA'),
(32, 'TF7 Convertedor De Ferrugem', 15, 15, 'VONIXX', 'Apropriado para uso doméstico e industrial, limpa ferrugens', '../assets/img/produtos/convertedor-de-ferrugem.png', NULL, 'CA'),
(33, 'Limpador Bactericida', 40, 40, 'VONIXX', 'pH balanceado e ultra concentrado, indicado para limpeza interna', '../assets/img/produtos/limpador-bactericida.png', NULL, 'CA'),
(34, 'Hidratante de Couro', 35, 35, 'VONIXX', 'Produto que hidrata e protege bancos de couro e evita o ressecamento', '../assets/img/produtos/hidratante-couro.png', NULL, 'CA'),
(35, 'Spray Desengripante', 10, 10, 'LUB-40', 'Protege as superfícies metálicas\r\nElimina unidade protegendo contra ferrugem', '../assets/img/produtos/desegripante-lubrificante.png', NULL, 'OF'),
(36, 'Oleo de Moto', 35, 35, 'Mobil', 'Oleo de Moto\r\n20w50 Mineral 4t 1lt\r\nDimensões do produto: 12 x 6 x 25 cm; 940 g', '../assets/img/produtos/oleo-de-moto-mobil.png', NULL, 'OF'),
(37, 'Cera Tec', 360, 360, 'Liqui Moly', 'Misturável com todos os óleos de motor\r\nEstável sob altas cargas térmicas e dinâmicas', '../assets/img/produtos/liqui-moly-cera.png', NULL, 'OF'),
(38, 'Kit 6 Oleos', 350, 350, 'Castrol', 'Kit 6 Oleo Castrol Magnatec 5w40 A3/B4 Sintético 502 00\r\nOleo para automóveis', '../assets/img/produtos/kit6-oleo-castrol.png', NULL, 'OF'),
(39, 'Aditivo p/ Radiador', 100, 100, 'Fuchs', 'Fuchs Maintain Fricofin DP 1L - aditivo p/radiador concentrado c/monoetilenoglicol', '../assets/img/produtos/fuchs-maintain-fricofin.png', NULL, 'OF'),
(40, 'Óleo Lubrificante', 215, 215, 'Lubrax', 'Excelente Proteção contra o Desgaste, proteção resistente, reduz o atrito entre as peças.', '../assets/img/produtos/oleo-lubrificante-lubrax.png', NULL, 'OF'),
(41, 'Lubrificante Corrente Moto', 115, 115, 'Motul', '400 ML \r\nDesenvolvido para lubrificar as correntes das motos', '../assets/img/produtos/motul-c4-factory.png', NULL, 'OF'),
(42, 'Descarbonizador', 80, 80, 'STP', 'Limpeza Completa Para O Sistema De Injeção (Concessionária) Stp 0.45L', '../assets/img/produtos/limpeza-completa.png', NULL, 'OF'),
(43, 'Bateria 20V MAX', 215, 215, 'Dewalt', 'DEWALT Bateria 20V MAX* Litio-Ion Premium 3.0Ah DCB200', '../assets/img/produtos/bateria-automotiva-dewalt.png', NULL, 'BA'),
(44, 'Bateria M60GD', 610, 610, 'Moura ', 'Bateria Moura M60GD MFA 12V / 60Ah / 90 min / 440 A\r\nMaterial em Prolipropileno', '../assets/img/produtos/bateria-automotiva-moura.png', NULL, 'BA'),
(45, 'Bateria 60Ah', 600, 600, 'Heliar', 'Bateria Automotiva 60Ah Ac.El.Uc. Heliar Org Hgr60Dd 18M', '../assets/img/produtos/bateria-automotiva-heliar.png', NULL, 'BA'),
(46, 'Carregador de Bateria', 215, 215, 'VONDER', 'Carregador Inteligente De Bateria, 220 V~ - 240 V~, Cib 110 Vonder.', '../assets/img/produtos/carregador-inteligente-bateria.png', NULL, 'BA'),
(47, 'Testador de baterias', 230, 230, 'VONDER', 'Testador de baterias TBV 1000 Vonder\r\nTipo de bateria: 6 V - 12 V', '../assets/img/produtos/testador-baterias.png', NULL, 'BA'),
(48, 'Cabo Para Bateria', 30, 30, 'Black Jack', 'Black Jack Cabo Para Bateria 200A 2 5M\r\nTransferência de carga em baterias de veículos', '../assets/img/produtos/cabo-bateria.png', NULL, 'BA'),
(49, 'Conectores de terminal', 50, 50, 'Fydun', 'Conectores de terminal de bateria positiva e negativa\r\nTerminais de bateria braçadeiras', '../assets/img/produtos/conectores-terminal-bateria.png', NULL, 'BA'),
(50, 'Bateria Powertek 12V', 820, 820, 'Multilaser', '12 Volts\r\nCapacidade: 100 AH\r\nCorrente Inicial: 13.5A\r\nUso em Standby: 13.5~13.8 V', '../assets/img/produtos/bateria-automotiva-powertel.png', NULL, 'BA'),
(51, 'Cabo para Reboque', 50, 50, 'Western', 'Cor: laranja\r\nProduto para ser usado em automóveis\r\nAjuste universal', '../assets/img/produtos/cabo-reboque.png', NULL, 'RT'),
(52, 'Engate Munheca', 165, 165, 'Genérico', 'Engate Munheca 3.500kg Carretinha Reboque Trava Segurança ', '../assets/img/produtos/engate-munheca.png', NULL, 'RT'),
(53, 'Bagageiro 360L', 1160, 1160, 'Rackbox', 'Material Acrilonitrila butadieno estireno\r\nDimensões do item C x L x A	135 x 87 x 38 cm\r\n', '../assets/img/produtos/bagaceiro-rackbox.png', NULL, 'RT'),
(54, 'Rack New Wave GM', 550, 550, 'EQMAX', 'Rack Eqmax New Wave GM Cruze Sedan 2017 2018 2019 2020 2021 2022 2023 Cinza', '../assets/img/produtos/rack-eqmax-new-wave-gm.png', NULL, 'RT'),
(55, 'Rack New Wave Fit', 560, 560, 'Eqmax ', 'Rack Eqmax New Wave Fit 2015 2016 2017 2018 2019 Cinza', '../assets/img/produtos/rack-eqmax-new-wave-fit.png', NULL, 'RT'),
(56, 'Bola de engate de reboque', 55, 55, 'BIG RED', '5 cm de diâmetro, capacidade de 1,75 toneladas (1,6 kg)', '../assets/img/produtos/bola-engate-reboque.png', NULL, 'RT'),
(57, 'Adaptador receptor de engate', 310, 310, 'Mopar', '2 polegadas adaptador receptor de engate Oem Mopar', '../assets/img/produtos/adaptador-receptor-engate.png', NULL, 'RT'),
(58, 'Tiras de amarração de catraca', 160, 160, 'Stalwart', '680 kg\r\nTiras de carga resistentes à ruptura\r\n', '../assets/img/produtos/tiras-amarracao-catraca.png', NULL, 'RT'),
(59, 'Lâmpada Farol', 10, 10, ' PHILIPS', 'Compatibilidade Universal\r\nFarol\r\nH4 12V 60/55W', '../assets/img/produtos/lampada-farol.png', NULL, 'PEA'),
(60, 'Par Amortecedor', 70, 70, 'bësser AMORTECEDORES', 'Par Amortecedor a Gás Tampa Traseira  Hatch 2012 À 2022', '../assets/img/produtos/par-amortecedor.png', NULL, 'PEA'),
(61, 'Prendedor Cinto', 15, 15, 'Genérico', 'Prendedor Cinto De Segurança Universal', '../assets/img/produtos/prendedor-cinto-seguranca.png', NULL, 'PEA'),
(62, 'Farol Completo', 35, 35, 'Genérico', 'Farol Completo 25 2000 A 2004 Fan 125', '../assets/img/produtos/farol.png', NULL, 'PEA'),
(63, 'Interruptor guiador moto', 55, 55, 'UGPLM', 'Interruptor do guiador da motocicleta', '../assets/img/produtos/interruptor-guiador.png', NULL, 'PEA'),
(64, 'Kit Cabos Velas Ignição', 180, 180, 'Magneti Marelli', 'Kit Cabos E Velas De Ignição G4 G5 1.6 8v', '../assets/img/produtos/kit-cabos-velas-ignicao.png', NULL, 'PEA'),
(65, 'Kit 3 Palheta Parabrisa', 85, 85, 'Shop-Vision', 'Kit 3 Palheta Limpador Parabrisa Silicone Durável', '../assets/img/produtos/kit3-palheta-limpador-parabrisa.png', NULL, 'PEA'),
(66, 'Bola Cambio', 45, 45, 'Nat', 'Bola Cambio 5 Marchas Ré para Trás', '../assets/img/produtos/bola-cambio.png', NULL, 'PEA'),
(67, 'Luva X11', 85, 85, 'Genérico', 'Luva X11 Blackout Motoqueiro Moto Motociclista Proteção', '../assets/img/produtos/luxa-x11.png', NULL, 'EPI'),
(68, 'Luvas antiderrapantes', 55, 55, 'KKcare', 'Articulações respiráveis e proteção anticolisão\r\n', '../assets/img/produtos/luvas-antiderrapante.png', NULL, 'EPI'),
(69, 'Capacete Moto R8', 120, 120, 'Pro Tork', 'Capacete Pro Tork Fechado 58 Preto/Vermelho Viseira Fumê', '../assets/img/produtos/capacete-moto-r8.png', NULL, 'EPI'),
(70, 'Capacete Moto Mixs', 295, 295, 'Mixs', 'Capacete Gladiator Delta Fosco Articulado Escamoteável', '../assets/img/produtos/capacete-moto-mixs.png', NULL, 'EPI'),
(71, 'Capacete Moto Pro', 65, 65, 'Pro Tork', 'Capacete Pro Tork Semiautomático Preto e Branco', '../assets/img/produtos/capacete-moto-pro-tork.png', NULL, 'EPI'),
(72, 'Anulador Odor Capacete', 7, 7, 'Baston', 'Neutralizador De Odores para Capacete Super Prime', '../assets/img/produtos/neutralizador-odores-capacete.png', NULL, 'EPI'),
(73, 'Para Barro Moto', 10, 10, 'Genérico', 'Lameira LANDER 250 XTZ A Para Barro Moto', '../assets/img/produtos/para-barro-moto.png', NULL, 'EPI'),
(74, 'Manga de Proteção Solar', 25, 25, 'Weemsbox', 'Proteção contra Raios UVA, leve, resistente e flexível.\r\n', '../assets/img/produtos/manga-protecao-solar.png', NULL, 'EPI'),
(75, 'Pneu Traseiro Maggion', 285, 285, 'Maggion', 'Pneu Traseiro Maggion 110/90-17 Viper Nxr Bros Xtz', '../assets/img/produtos/pneu-traseiro-maggion.png', NULL, 'PNM'),
(76, 'Pneu Dianteiro Maggion', 230, 230, 'Maggion', 'Pneu 90/90-19 Maggion Viper MT35 52T Moto (Dianteiro)', '../assets/img/produtos/pneu-dianteiro-maggion.png', NULL, 'PNM'),
(77, 'Pneu Moto Winner', 140, 140, 'Maggion', 'PNEU DE MOTO 60/100-17 MAGGION WINNER 33L TT', '../assets/img/produtos/pneu-maggion-winner.png', NULL, 'PNM'),
(78, 'Pneu Pirelli', 475, 475, 'Pirelli', 'Pneu Pirelli 110/90-17 Mt60 (Tt) 60P (T) Orig. Nxr Bros 160', '../assets/img/produtos/pneu-pirelli2.png', NULL, 'PNM'),
(79, 'Pneu Black', 170, 170, 'Maggion', 'PNEU DE MOTO 2.75-18 MAGGION BLACK 48P TT ', '../assets/img/produtos/pneu-maggion-winner2.png', NULL, 'PNM'),
(80, 'Pneu Traseiro Rinaldi', 220, 220, 'Rinaldi', 'Pneu Moto Traseiro Rinaldi R34 90/90 Aro 18 Honda Cg 125 Fan', '../assets/img/produtos/pneu-traseiro-rinaldi.png', NULL, 'PNM'),
(81, 'Pneu Dianteiro Rinaldi', 260, 260, 'Rinaldi', 'Pneu Moto Dianteiro Rinaldi R34 2.75 Aro 18 Honda Cg Today', '../assets/img/produtos/pneu-dianteiro-rinaldi.png', NULL, 'PNM'),
(82, 'Pneu Pirelli V2', 535, 535, 'Pirelli ', 'Pneu Pirelli 140/70-17 Sport Demon (Tl) 66H (T) Orig. Cb 300', '../assets/img/produtos/pneu-pirelli.png', NULL, 'PNM'),
(83, 'Filtro de ar esportivo', 75, 75, 'Plasmoto', 'Lavável CG125 Fan CG150 Fan Titan CG160 Fan Titan Start filtro com tampa e parafusos ', '../assets/img/produtos/filtro-ar-esportivo.png', NULL, 'APM'),
(84, 'Sistema Comunicação Capacete', 310, 310, 'EJEAS', 'Fone de ouvido intercomunicador Bluetooth\r\n', '../assets/img/produtos/sistema-comunicacao-capacete.png', NULL, 'APM'),
(85, 'Antena Corta Pipa', 45, 45, 'JOJAFER', 'Antena Corta Pipa Pra Moto Suporte De Guidão 6 Estágios\r\nDimensões do item 21x3x2cm', '../assets/img/produtos/antena-corta-pipa.png', NULL, 'APM'),
(86, 'Protetor Motor e Carenagem', 325, 325, 'COYOTE RS', 'Protetor de Motor e Carenagem Modelo Style Coyote', '../assets/img/produtos/protetor-motor-carenagem.png', NULL, 'APM'),
(87, 'Capa Proteção Moto', 60, 60, 'Etacart', 'Capa Forrada Impermeável Térmica Protege Contra Sol Chuva Riscos', '../assets/img/produtos/capa-moto.png', NULL, 'APM'),
(88, 'Bauleto 45L', 160, 160, 'Pro Tork', 'Parafusos e base para fixação;\r\nFechadura com chave;\r\nAdquirir o bagageiro de aço específico.', '../assets/img/produtos/bauleto-45l.png', NULL, 'APM'),
(89, 'Bolsa Sela p/ Moto', 120, 120, 'ZEYUAN', 'Bolsa de sela a prova dágua.\r\nAlforjes Caixa de ferramentas laterais bolsa para motos.', '../assets/img/produtos/bolsa-sela-moto.png', NULL, 'APM'),
(90, 'Kit Completo Transmissão', 215, 215, 'Genérico', 'Kit de transmissão para motos.\r\nInclui corrente, coroa e pinhão.', '../assets/img/produtos/kit-completo-transmissao.png', NULL, 'APM'),
(91, 'Termômetro sem contato', 50, 50, 'Gonel', 'IR infravermelho Sensor portátil\r\nMedição de temperatura LED Display digital', '../assets/img/produtos/termometro-sem-contatoi.png', NULL, 'FE'),
(92, 'Motocompressor De Ar', 630, 630, 'Chiaperini', 'Tensão 110\r\nFonte de alimentação Elétrico com fio\r\nPulverizar, Pintar', '../assets/img/produtos/motocompressor-ar.png', NULL, 'FE'),
(93, 'Acionador de Partida', 280, 280, 'Generic', 'Carregador Externo Portátil de 24000mAh 100-240V para o Automóvel', '../assets/img/produtos/acionador-partida.png', NULL, 'FE'),
(94, 'Carregador de bateria', 150, 150, 'Lúmu', 'Dimensões do item15D x 8,5W x 6,2Hcm\r\nClassificação de corrente 6A', '../assets/img/produtos/carregador-bateria.png', NULL, 'FE'),
(95, 'Compressor de ar', 1140, 1140, 'TUXING', 'Tensão 110 Volts CA\r\nFonte de alimentação AC\r\nNível de ruído	80 dB', '../assets/img/produtos/compressor-ar.png', NULL, 'FE'),
(96, 'Cabo Bateria Chupeta', 69, 69, 'EMLI', 'Alta Capacidade, Versatilidade, Conexões Seguras, Uso Emergencial', '../assets/img/produtos/cabo-bateria-chupeta.png', NULL, 'FE'),
(97, 'Scanner Automotivo', 490, 490, 'FOXWELL', 'Fonte de alimentação plug&play\r\nDimensões do item 22x8x17cm\r\n2,8 Polegadas', '../assets/img/produtos/scanner-automotivo.png', NULL, 'FE'),
(98, 'Rebitador Manual', 25, 25, 'Vonder', 'Aço estampado\r\n4 bicos\r\nDiâmetro max de rebite: 4 mm\r\nTipo Alicate', '../assets/img/produtos/rebotador-manual.png', NULL, 'FE');

-- --------------------------------------------------------

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

INSERT INTO `produtosTroca` (`nome`, `preco_pontos`, `descricao`, `categoria`, `caminho_img`) VALUES
('Lavagem Simples', 1000, 'Lavagem simples do seu veículo', 'lavagem-simples', '../assets/img/motor369.svg'),
('Lavagem Completa', 1800, 'Lavagem completa do seu veículo', 'lavagem-completa', '../assets/img/motor369.svg'),
('Cheiro de Lavanda', 200, 'Um aroma calmante e relaxante, que ajuda a reduzir o estresse e a ansiedade.', 'cheirinho-carro', '../assets/img/cheirinho1.png'),
('Capa de volante dente-de-leão elástico.', 600, 'Diâmetro de 37-38 cm/14,5-15 polegadas.\r\nUniversal para volantes redondos.', 'capa-volante', '../assets/img/capa-volante1.png'),
('Cheiro de Morango', 200, 'Um aroma doce e frutado, que remete à infância, verão e relaxamento.', 'cheirinho-carro', '../assets/img/cheirinho2.png'),
('Palheta Limpador Jeep', 120, 'Kit palhetas bosch jeep renegade 01.', 'limpador', '../assets/img/limpador-parabrisa1.png'),
('Chaveiro De Metal.', 50, 'Chaveiro metálico com formato de um carro 2D.', 'chaveiro', '../assets/img/chaveiro1.png'),
('Cheiro de Baunilha', 220, 'O aroma da baunilha é calmante e relaxante, ajudando a reduzir o estresse e a ansiedade.', 'cheirinho-carro', '../assets/img/cheirinho3.png'),
('Olho de leão preto genuíno para costura manual.', 550, 'Capa para volante de carro para hyundai solaris.', 'capa-volante', '../assets/img/capa-volante2.png'),
('Capa De Volante Costurada Astra', 369, 'Material : camurça.\r\nCor: preto.\r\nTipo de veículo:\r\nCarro/Caminhonete.', 'capa-volante', '../assets/img/capa-volante3.png'),
('Capa Para Volante Esportiva Type-r', 963, '• Ultra confortaveis.\r\n• Compatível : Volantes de 37.5 a 38.5cm de circuferencia.', 'capa-volante', '../assets/img/capa-volante4.png'),
('Capa De Volante Ducato/ Boxer', 400, 'Capa de volante costurada em material sintético de alta qualidade.\r\nGarantia: 3 meses.', 'capa-volante', '../assets/img/capa-volante5.png'),
('Cheiro de Flores', 220, 'Um aroma feminino e romântico, que deixa o carro com um toque de sofisticação.', 'cheirinho-carro', '../assets/img/cheirinho4.png'),
('Chaveiro BMW', 30, 'Chaveiro estampa BMW, metálico. Cor: preto', 'chaveiro', '../assets/img/chaveiro2.png'),
('Chaveiro Fusca ', 35, 'Chaveiro estampa de fusca, metálico. Cor: preto', 'chaveiro', '../assets/img/chaveiro3.png'),
('Chaveiro Formato Carro', 75, 'Material: liga de zinco + couro.\r\n100% novo.', 'chaveiro', '../assets/img/chaveiro4.png'),
('Palheta Limpador Audi', 100, '02 (Duas) Palhetas dianteiras;\n01 (Uma) Palheta traseira;', 'limpador', '../assets/img/limpador-parabrisa2.png'),
('Palheta de Wolksvagem', 90, 'Limpadores do para-brisa dianteiro ', 'limpador', '../assets/img/limpador-parabrisa3.png'),
('Palheta Fiat', 85, '02 (Duas) Palhetas dianteiras;\n01 (Uma) Palheta traseira;', 'limpador', '../assets/img/limpador-parabrisa4.png'),
('Tapa Sol Iveco Stralis', 230, 'Alta resistência e durabilidade.\r\nProduto de qualidade com garantia.', 'tapa-sol', '../assets/img/tapa-sol2.png'),
('Para-brisa Solar Uv Automotivo', 200, 'Protetor para-brisa solar carro retrátil com UV.', 'tapa-sol', '../assets/img/tapa-sol1.png'),
('Tapetes De estrada', 310, '[Chuan] 5Pcs/contravés de cor café universal carro auto piso tapete em couro forro assoalho carpete de couro.', 'tapete-carro', '../assets/img/tapete-de-carro-estrada.png'),
('Tapete De Montanha', 270, 'Composição do Tapete Eco Line: 100% PVC (Borracha Injetada)', 'tapete-carro', '../assets/img/tapete-de-carro-montanha.png'),
('Tapetes Hightech', 320, 'PVC Borracha PP Couro sintético Couro EVA.', 'tapete-carro', '../assets/img/tapete-de-carro-hightech.png'),
('Tapete De Oficina', 370, 'Tecido Superior Poliéster Impermeável. Base Pvc Emborrachado.', 'tapete-carro', '../assets/img/tapete-de-carro-oficina.png');

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