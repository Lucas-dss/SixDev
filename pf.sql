-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Set-2025 às 12:57
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
-- Banco de dados: `pf`
--
CREATE DATABASE IF NOT EXISTS `pf` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pf`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `canal`
--

DROP TABLE IF EXISTS `canal`;
CREATE TABLE IF NOT EXISTS `canal` (
  `id_canal` int NOT NULL AUTO_INCREMENT,
  `id_venda` int NOT NULL,
  `id_cliente` int NOT NULL,
  `proc_venda` int NOT NULL,
  PRIMARY KEY (`id_canal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel` int NOT NULL,
  `cpf` int NOT NULL,
  `end` int NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel` int NOT NULL,
  `end` varchar(100) NOT NULL,
  `cnpj` int NOT NULL,
  `custo_unitario` int NOT NULL,
  `prod_fornecido` varchar(60) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome_fornecedor`, `tel`, `end`, `cnpj`, `custo_unitario`, `prod_fornecido`) VALUES
(1, 'Lucas Tenis', 1234567890, 'Rua curio, 345', 98765432, 15, 'Neike Falls'),
(2, 'Maria Sandálias', 9854321, 'Rua Polvo,567', 987654321, 20, 'Vazziana'),
(3, 'Kaiser Imperior', 234567891, 'rua Alemanha, 10', 101182345, 30, 'Impact'),
(4, 'Haniko tenis', 364313321, 'rua Japão, 56', 23482131, 20, 'Abbidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int NOT NULL,
  `nome_produto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tamanho` int NOT NULL,
  `cor` varchar(30) NOT NULL,
  `preco` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_fornecedor`, `nome_produto`, `modelo`, `tamanho`, `cor`, `preco`, `quantidade`) VALUES
(1, 3, 'Impact niko lv', 'lv', 41, 'Preto', 75, 90),
(2, 2, 'Prainha', 'baby', 22, 'Rosa', 30, 40),
(3, 1, 'Neike UpDonw', 'UpDonw 30', 40, 'Preto', 40, 70),
(4, 4, 'Demon hunter', 'DH 309', 41, 'Vermelho', 55, 60),
(5, 3, 'Saccai Aiku lx', 'lx', 44, 'Branco', 49, 30),
(6, 3, 'Saccai Aiku lv', 'lv', 41, 'Branco', 49, 30),
(7, 3, 'Saccai Gagamaru lv', 'lv', 40, 'Azul', 47, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `id_venda` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `quantidade` int NOT NULL,
  `proc_venda` int NOT NULL DEFAULT '1',
  `nome_produto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_venda`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
