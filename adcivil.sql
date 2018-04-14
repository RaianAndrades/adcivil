-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2014 às 20:46
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adcivil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `value` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `access`
--

INSERT INTO `access` (`id`, `nome`, `value`) VALUES
(1, 'Administrador', 10),
(2, 'Normal', 1),
(3, 'Desenvolvedor', 99),
(6, 'Super Developer', 999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogados`
--

CREATE TABLE IF NOT EXISTS `advogados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `cpf` tinytext NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `advogados`
--

INSERT INTO `advogados` (`id`, `nome`, `cpf`, `endereco`) VALUES
(5, 'Fulano de tal editado', '092.181.903-81', 'Endereço tal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adsd` (`access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `nome`, `url`, `access`) VALUES
(13, 'AdCivil', '#', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenus`
--

CREATE TABLE IF NOT EXISTS `submenus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menus` int(2) NOT NULL,
  `access` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adsd` (`access`),
  KEY `menus` (`menus`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `submenus`
--

INSERT INTO `submenus` (`id`, `nome`, `url`, `menus`, `access`) VALUES
(22, 'Advogados', '#', 13, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsubmenus`
--

CREATE TABLE IF NOT EXISTS `subsubmenus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `submenus` int(2) NOT NULL,
  `access` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aaaaa` (`access`),
  KEY `haudh` (`submenus`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `subsubmenus`
--

INSERT INTO `subsubmenus` (`id`, `nome`, `url`, `submenus`, `access`) VALUES
(51, 'Criar', 'advogados/add', 22, 999),
(30, 'Gerenciar', 'advogados/list', 22, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subsubsubmenus`
--

CREATE TABLE IF NOT EXISTS `subsubsubmenus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `submenus` int(2) NOT NULL,
  `access` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `haudh` (`submenus`),
  KEY `aaaaa` (`access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `subsubsubmenus`
--

INSERT INTO `subsubsubmenus` (`id`, `nome`, `url`, `submenus`, `access`) VALUES
(20, 'Criar', 'menu/add', 6, 99),
(21, 'Gerenciar', 'menu/list', 6, 99),
(22, 'Criar', 'submenu/add', 7, 99),
(23, 'Gerenciar', 'submenu/list', 7, 99),
(24, 'Criar', 'subsubmenu/add', 19, 99),
(25, 'Gerenciar', 'subsubmenu/list', 19, 99),
(26, 'Criar', 'subsubsubmenu/add', 20, 99),
(27, 'Gerenciar', 'subsubsubmenu/list', 20, 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activated` int(1) DEFAULT NULL,
  `access` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `llll` (`access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `name`, `activated`, `access`) VALUES
(14, 'adcivil', '9f4cfc6316d7454998d27b0381ae102b04b69aa1', 'contato@adcivil.com.br', 'AdCivil', 1, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
