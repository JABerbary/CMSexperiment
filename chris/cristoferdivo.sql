-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2017 at 10:03 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cristoferdivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `tumb` varchar(255) COLLATE utf8_bin NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pagina`
--

CREATE TABLE `tb_pagina` (
  `pagina_id` int(11) NOT NULL,
  `pagina_nome` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_pagina`
--

INSERT INTO `tb_pagina` (`pagina_id`, `pagina_nome`) VALUES
(3, 'cooking'),
(5, 'fashion'),
(2, 'music'),
(4, 'pooshlife'),
(1, 'sobre');

-- --------------------------------------------------------

--
-- Table structure for table `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `Id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_bin NOT NULL,
  `data` varchar(12) COLLATE utf8_bin NOT NULL,
  `imagem` varchar(255) COLLATE utf8_bin NOT NULL,
  `exibir` int(11) NOT NULL,
  `descricao` longtext COLLATE utf8_bin NOT NULL,
  `pagina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pagina`
--
ALTER TABLE `tb_pagina`
  ADD PRIMARY KEY (`pagina_id`),
  ADD UNIQUE KEY `pagina_nome` (`pagina_nome`);

--
-- Indexes for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pagina_id_fk` (`pagina_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pagina`
--
ALTER TABLE `tb_pagina`
  MODIFY `pagina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD CONSTRAINT `pagina_id_fk` FOREIGN KEY (`pagina_id`) REFERENCES `tb_pagina` (`pagina_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
