-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Nov-2019 às 12:56
-- Versão do servidor: 5.7.26
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroverde`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_avaliado` int(11) NOT NULL,
  `id_user_avaliador` int(10) UNSIGNED NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user_avaliado`),
  KEY `id_user_avaliador` (`id_user_avaliador`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `id_user_avaliado`, `id_user_avaliador`, `pontuacao`, `created`) VALUES
(1, 10, 6, 4, '2019-11-19 09:36:35'),
(2, 11, 6, 3, '2019-11-19 09:43:50'),
(3, 7, 6, 1, '2019-11-19 09:54:53'),
(4, 8, 6, 2, '2019-11-19 09:54:56'),
(5, 9, 6, 5, '2019-11-19 09:54:58'),
(6, 17, 6, 1, '2019-11-19 09:55:04'),
(7, 15, 6, 2, '2019-11-19 09:55:06'),
(8, 16, 6, 2, '2019-11-19 09:55:07'),
(9, 12, 6, 4, '2019-11-19 09:55:09'),
(10, 13, 6, 1, '2019-11-19 09:55:10'),
(11, 14, 6, 2, '2019-11-19 09:55:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `de` int(11) DEFAULT '0',
  `para` int(11) DEFAULT '0',
  `msg` text COLLATE utf8_unicode_ci,
  `status` enum('V','NV') COLLATE utf8_unicode_ci DEFAULT 'NV',
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`de`),
  KEY `Index 3` (`para`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `de`, `para`, `msg`, `status`, `updated`, `created`) VALUES
(23, 6, 15, 'sdsd', 'NV', '2019-10-30 14:37:07', '2019-10-30 14:37:07'),
(24, 15, 6, 'sds', 'NV', '2019-10-30 16:58:37', '2019-10-30 14:37:11'),
(25, 15, 6, 'sds', 'NV', '2019-10-30 17:18:24', '2019-10-30 14:37:14'),
(26, 6, 9, 'jhgjhg', 'NV', '2019-10-30 16:32:18', '2019-10-30 16:32:18'),
(27, 6, 9, 'ghjhg', 'NV', '2019-10-30 16:32:21', '2019-10-30 16:32:21'),
(28, 6, 9, 'x', 'NV', '2019-10-30 16:32:24', '2019-10-30 16:32:24'),
(29, 6, 9, 'y', 'NV', '2019-10-30 16:32:29', '2019-10-30 16:32:29'),
(30, 6, 9, '', 'NV', '2019-10-30 16:32:38', '2019-10-30 16:32:38'),
(31, 6, 9, 'trtr', 'NV', '2019-10-30 16:32:40', '2019-10-30 16:32:40'),
(32, 6, 8, 'hgfhgfh', 'NV', '2019-10-30 16:34:40', '2019-10-30 16:34:40'),
(33, 6, 8, 'fhjhgj', 'NV', '2019-10-30 16:34:43', '2019-10-30 16:34:43'),
(34, 6, 8, 'jhgjhg', 'NV', '2019-10-30 16:34:45', '2019-10-30 16:34:45'),
(35, 6, 8, 'hfgfd\r\n', 'NV', '2019-10-30 16:34:50', '2019-10-30 16:34:50'),
(36, 6, 8, 'fgjhfg\r\n', 'NV', '2019-10-30 16:34:55', '2019-10-30 16:34:55'),
(37, 6, 15, 'ei', 'NV', '2019-10-30 17:06:24', '2019-10-30 17:06:24'),
(38, 6, 15, 'me responde', 'NV', '2019-10-30 17:18:38', '2019-10-30 17:18:38'),
(39, 6, 12, 'ola bom dia', 'NV', '2019-11-19 11:32:21', '2019-11-19 11:32:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text COLLATE utf8_unicode_ci,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_post`),
  KEY `Index 3` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `id_post`, `id_usuario`, `data_created`, `data_update`) VALUES
(106, 'sdsad', 31, 6, '2019-10-30 12:23:50', '2019-10-30 12:23:50'),
(107, 'dfgfdg', 31, 6, '2019-10-30 14:07:41', '2019-10-30 14:07:41'),
(108, 'teste', 31, 6, '2019-10-30 14:10:48', '2019-10-30 14:10:48'),
(109, 'hgjhgj', 31, 6, '2019-10-30 14:11:03', '2019-10-30 14:11:03'),
(110, 'hgjhg', 31, 6, '2019-10-30 14:11:08', '2019-10-30 14:11:08'),
(111, 'sdd', 31, 6, '2019-10-30 14:17:35', '2019-10-30 14:17:35'),
(112, 'sdsdsd', 31, 6, '2019-10-30 14:17:45', '2019-10-30 14:17:45'),
(113, 'dsds', 31, 6, '2019-10-30 14:20:11', '2019-10-30 14:20:11'),
(114, 'ok', 31, 6, '2019-10-30 14:25:05', '2019-10-30 14:25:05'),
(115, 'hgdhgfghfg', 31, 6, '2019-10-30 14:34:51', '2019-10-30 14:34:51'),
(116, 'dsds', 31, 6, '2019-10-30 15:48:16', '2019-10-30 15:48:16'),
(117, 'lindo', 31, 6, '2019-10-30 15:48:25', '2019-10-30 15:48:25'),
(118, '33', 31, 6, '2019-10-30 15:50:04', '2019-10-30 15:50:04'),
(119, 'linda', 33, 6, '2019-10-30 16:13:26', '2019-10-30 16:13:26'),
(120, 'duplicate', 32, 6, '2019-10-30 16:13:36', '2019-10-30 16:13:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT '0',
  `curtiu` enum('SIM','NAO') COLLATE utf8_unicode_ci DEFAULT 'NAO',
  `id_post` int(11) DEFAULT '0',
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_curtidas_post` (`id_usuario`,`id_post`),
  KEY `Index 2` (`id_usuario`,`id_post`),
  KEY `FK_curtidas_posts` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `id_usuario`, `curtiu`, `id_post`, `data_created`, `data_update`) VALUES
(18, 6, 'SIM', 31, '2019-10-29 17:26:35', '2019-10-30 15:48:12'),
(19, 6, 'NAO', 33, '2019-10-30 16:11:19', '2019-10-30 16:27:32'),
(20, 6, 'SIM', 32, '2019-10-30 16:11:28', '2019-10-30 16:13:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(250) COLLATE utf8_unicode_ci DEFAULT '0',
  `legenda` text COLLATE utf8_unicode_ci,
  `id_usuario` int(11) DEFAULT '0',
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `img`, `legenda`, `id_usuario`, `data_created`, `data_update`) VALUES
(31, 'Cloudinary_-_Official_logo.svg.png', 'fgfdghdfh', 6, '2019-10-29 17:26:27', '2019-10-29 17:26:27'),
(32, 'Dra. Aline Dantas.jpg', 'jkfdhgnlkfsfgjhfjhgjhg', 6, '2019-10-30 16:08:26', '2019-10-30 16:08:26'),
(33, 'Dra. Aline Dantas.jpg', 'jkfdhgnlkfsfgjhfjhgjhg', 6, '2019-10-30 16:08:47', '2019-10-30 16:08:47'),
(34, 'cats.jpg', 'Teste', 6, '2019-11-11 11:56:43', '2019-11-11 11:56:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidores`
--

DROP TABLE IF EXISTS `seguidores`;
CREATE TABLE IF NOT EXISTS `seguidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_seguindo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `seguidores`
--

INSERT INTO `seguidores` (`id`, `id_user`, `id_seguindo`) VALUES
(34, 6, 10),
(35, 6, 7),
(36, 6, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` enum('V','C') COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `sexo` enum('M','F') COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `avatar`, `telefone`, `email`, `senha`, `tipo`, `descricao`, `sexo`, `data_created`, `data_update`) VALUES
(6, 'Teste', 'Dr. Sidney Augusto.jpg', '84994302191', 'teste@gmail.com', 'MTIzbXVkYXI=', 'V', 'Alterei a minha foto do perfil ai                         ', 'M', '2019-10-29 17:24:33', '2019-11-11 12:54:09'),
(7, 'JHONY LUCAS CAVALCANTE DA SILVA', NULL, '84996878769', 'jhonyjl37@gmail.com', 'c2Rz', 'C', NULL, 'M', '2019-10-29 19:52:10', '2019-10-29 19:52:10'),
(8, 'JHONY LUCAS CAVALCANTE DA SILVA', NULL, '84996878769', 'jhonyjl37@gmail.com', 'ZHNkc2Q=', 'C', NULL, 'F', '2019-10-29 20:08:59', '2019-10-29 20:08:59'),
(9, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', NULL, 'M', '2019-10-29 20:09:32', '2019-10-29 20:09:32'),
(10, 'Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', NULL, 'F', '2019-10-29 20:12:02', '2019-10-29 20:12:02'),
(11, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', 'dsdsdsds', NULL, '2019-10-29 20:15:37', '2019-10-29 20:15:37'),
(12, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', NULL, 'M', '2019-10-29 20:22:09', '2019-10-29 20:22:09'),
(13, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', NULL, 'M', '2019-10-29 20:25:51', '2019-10-29 20:25:51'),
(14, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZHNkcw==', 'C', 'dsds', NULL, '2019-10-29 20:27:33', '2019-10-29 20:27:33'),
(15, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZmRzZmRz', 'C', 'sdfds', NULL, '2019-10-29 20:31:39', '2019-10-29 20:31:39'),
(16, 'Rilton Campos', NULL, '84994056962', 'camposrilton@gmail.com', 'ZXdld2U=', 'C', NULL, 'F', '2019-10-29 20:40:44', '2019-10-29 20:40:44'),
(17, 'JHONY LUCAS CAVALCANTE DA SILVA', NULL, '84996878769', 'vendedor@gmail.com', 'MTIzbXVkYXI=', 'C', 'Vendedor de batata', NULL, '2019-10-31 11:30:37', '2019-10-31 11:30:37');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliado` FOREIGN KEY (`id_user_avaliado`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_chat_usuarios` FOREIGN KEY (`de`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_chat_usuarios_2` FOREIGN KEY (`para`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_comentarios_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_comentarios_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_curtidas_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_curtidas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK__usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
