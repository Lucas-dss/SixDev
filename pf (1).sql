-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11/08/2025 às 13:31
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

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
-- Estrutura para tabela `canal`
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
-- Estrutura para tabela `cliente`
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
-- Estrutura para tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel` int NOT NULL,
  `end` int NOT NULL,
  `cnpj` int NOT NULL,
  `custo_unitario` int NOT NULL,
  `prod_fornecido` varchar(60) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int NOT NULL,
  `nome_fornecedor` varchar(100) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tamanho` int NOT NULL,
  `cor` varchar(30) NOT NULL,
  `preco` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
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
