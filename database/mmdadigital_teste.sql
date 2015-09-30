-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2015 at 10:04 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmdadigital_teste`
--

-- --------------------------------------------------------

--
-- Table structure for table `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `contatos`
--

INSERT INTO `contatos` (`id`, `responsavel`) VALUES
(46, 'RODRIGO SILVEIRA,'),
(47, 'CAROLINA,'),
(48, 'MARIO JORGE,'),
(49, 'FERNANDA DE OLIVEIRA,'),
(50, 'JOÃO PEDRO,');

-- --------------------------------------------------------

--
-- Table structure for table `contatosimoveis`
--

CREATE TABLE IF NOT EXISTS `contatosimoveis` (
  `id` int(11) NOT NULL,
  `contato` int(11) NOT NULL,
  `imovel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `contatosimoveis`
--

INSERT INTO `contatosimoveis` (`id`, `contato`, `imovel`) VALUES
(115, 46, 111),
(116, 47, 111),
(117, 47, 112),
(118, 47, 113),
(119, 50, 114),
(120, 50, 115),
(121, 46, 115),
(122, 47, 115);

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `sigla`, `descricao`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins'),
(28, 'AC', 'AC'),
(29, 'AL', 'AL'),
(30, 'AP', 'AP'),
(31, 'AM', 'AM'),
(32, 'BA', 'BA'),
(33, 'CE', 'CE'),
(34, 'DF', 'DF'),
(35, 'ES', 'ES'),
(36, 'GO', 'GO'),
(37, 'MA', 'MA'),
(38, 'MT', 'MG'),
(39, 'MS', 'MS'),
(40, 'MG', 'MG'),
(41, 'PA', 'PA'),
(42, 'PB', 'PB'),
(43, 'PR', 'PR'),
(44, 'PE', 'PE'),
(45, 'PI', 'PI'),
(46, 'RJ', 'RJ'),
(47, 'RN', 'RN'),
(48, 'RS', 'RS'),
(49, 'RO', 'RO'),
(50, 'RR', 'RR'),
(51, 'SC', 'SC'),
(52, 'SP', 'SP'),
(53, 'SE', 'SE'),
(54, 'TO', 'TO');

-- --------------------------------------------------------

--
-- Table structure for table `formascontatos`
--

CREATE TABLE IF NOT EXISTS `formascontatos` (
  `id` int(11) NOT NULL,
  `contatoid` int(11) NOT NULL,
  `tipo` int(11) NOT NULL COMMENT '1= email 2 = telefone',
  `contato` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `formascontatos`
--

INSERT INTO `formascontatos` (`id`, `contatoid`, `tipo`, `contato`) VALUES
(31, 46, 1, 'rodrigo@terra.com.br'),
(32, 46, 2, '(51)3328-3434'),
(33, 47, 1, 'CAROLINA@TERRA.COM.BR'),
(34, 47, 2, '9988.3333'),
(35, 48, 1, 'mario@ig.com.br'),
(36, 48, 2, '3334.4444'),
(37, 49, 1, 'fernanda@gmail.com'),
(38, 49, 2, '3223.4343'),
(39, 47, 2, '1111.1111'),
(40, 50, 1, 'joaopedro@empresa.com.br'),
(41, 50, 2, '44-3399.3344');

-- --------------------------------------------------------

--
-- Table structure for table `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(11) NOT NULL,
  `imovel` int(11) NOT NULL,
  `imagem` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `imagens`
--

INSERT INTO `imagens` (`id`, `imovel`, `imagem`) VALUES
(59, 111, '747029301136a27c1cc4b90ee9091249.jpg'),
(60, 111, '211b2ef058b55edc0625b72a569074da.jpg'),
(61, 111, 'd6382758560792474e4ed09da7d81f62.jpg'),
(62, 112, '669cdbfda1c12414650aeeafd3743241.jpg'),
(63, 112, '09e7b33609502b22c1e483193b04067d.jpg'),
(64, 112, '37021e5d0fbd972c27051f25081a6ebf.jpg'),
(65, 113, '347cfde39ebcbcaa3ddf9c6f39da8374.jpg'),
(66, 114, '93ee0cb93440f52af0ef3ac6c78bf7c1.jpg'),
(67, 115, '6126a41602d189b9d88251c81a038fe0.jpg'),
(68, 115, '9f2aa65fdd15f34d0578f684bc8e29e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL,
  `tipoimovel` int(11) NOT NULL,
  `rua` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `numero` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cidade` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `bairro` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `descricao` text COLLATE latin1_general_ci NOT NULL,
  `tipoanuncio` int(11) NOT NULL COMMENT '1 =  aluguel 2= venda'
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `imoveis`
--

INSERT INTO `imoveis` (`id`, `tipoimovel`, `rua`, `numero`, `cidade`, `bairro`, `estado`, `descricao`, `tipoanuncio`) VALUES
(111, 21, 'AV. DAS ARARAS', '3393', 'PORTO ALEGRE', 'ANDAR DE CIMA', 21, 'AMPLO TERRENO DE 10X38 DE ESQUINA', 2),
(112, 17, 'RUA ATANAZIO BELMONT', '158', 'PORTO ALEGRE', 'CENTRO', 21, 'APARTAMENTO PADRAO 100M2', 1),
(113, 22, 'AV. LOUREIRO DA SILVA', '2983', 'PORTO ALEGRE', 'HIGENOPOLIS', 21, 'COBERTURA DUPLEX 200M2 COM PISCINA', 2),
(114, 19, 'RUA TUPINAMBÁ', '32', 'PORTO ALEGRE', 'VISTA ALEGRE', 21, 'LINDO LOFT 39M2 COM VARANDA', 2),
(115, 18, 'RUA ITAJAÍ ', '10', 'PORTO ALEGRE', 'HUMAITÁ', 21, 'CASA AMPLA COM 4 QUARTOS E 2 VAGAS NA GARAGEM, ÁREA PRIVATIVA DE 200M2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiposimoveis`
--

CREATE TABLE IF NOT EXISTS `tiposimoveis` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tiposimoveis`
--

INSERT INTO `tiposimoveis` (`id`, `tipo`) VALUES
(17, 'APARTAMENTO 1'),
(18, 'CASA'),
(19, 'LOFT'),
(20, 'ESTÚDIO'),
(21, 'TERRENO'),
(22, 'COBERTURA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contatosimoveis`
--
ALTER TABLE `contatosimoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contato` (`contato`),
  ADD KEY `imovel` (`imovel`),
  ADD KEY `imovel_2` (`imovel`),
  ADD KEY `contato_2` (`contato`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formascontatos`
--
ALTER TABLE `formascontatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contatoid` (`contatoid`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imovel` (`imovel`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoimovel` (`tipoimovel`);

--
-- Indexes for table `tiposimoveis`
--
ALTER TABLE `tiposimoveis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `contatosimoveis`
--
ALTER TABLE `contatosimoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `formascontatos`
--
ALTER TABLE `formascontatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `tiposimoveis`
--
ALTER TABLE `tiposimoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contatosimoveis`
--
ALTER TABLE `contatosimoveis`
  ADD CONSTRAINT `FK_CONTATOIMOVEIS_CONTATO` FOREIGN KEY (`contato`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CONTATOIMOVEIS_IMOVEIS` FOREIGN KEY (`imovel`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `formascontatos`
--
ALTER TABLE `formascontatos`
  ADD CONSTRAINT `FK_FORMASCONTATOS_CONTATO` FOREIGN KEY (`contatoid`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `FK_IMAGENS_IMOVEIS` FOREIGN KEY (`imovel`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `FK_IMOVEIS_TIPOSIMOVEIS` FOREIGN KEY (`tipoimovel`) REFERENCES `tiposimoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
