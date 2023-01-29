-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jan-2023 às 16:57
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd-work-well`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `importance`
--

DROP TABLE IF EXISTS `importance`;
CREATE TABLE IF NOT EXISTS `importance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `import` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `importance`
--

INSERT INTO `importance` (`id`, `import`) VALUES
(1, 'pouca'),
(2, 'media'),
(3, 'muita');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `idImportance` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_projects_category1_idx` (`idImportance`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `time`, `idImportance`, `created_at`, `updated_at`) VALUES
(18, 'Reunião do trabalho', 16, 3, '2022-09-15 17:32:50', NULL),
(19, 'Estudar para prova', 21, 2, '2022-09-15 17:34:23', NULL),
(20, 'Tomar café', 17, 1, '2022-09-15 17:35:05', NULL),
(21, 'ir ao cinema', 0, 1, '2022-09-20 00:06:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `checked` varchar(255) NOT NULL,
  `idImportance` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_projects_category1_idx` (`idImportance`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `text`, `checked`, `idImportance`, `created_at`, `updated_at`) VALUES
(18, 'Estudar Matemática', 'False\r\n', 2, '2022-09-15 17:26:03', NULL),
(19, 'Ler um livro', 'True', 1, '2022-09-15 17:26:29', NULL),
(20, 'Entrevista de Emprego', 'True', 3, '2022-09-15 17:35:41', NULL),
(22, 'tomar café da manhã', 'true', 2, '2022-09-20 00:05:31', NULL),
(23, 'tocar violão', 'true', 3, '2022-09-20 00:10:22', NULL),
(24, 'asdfasdfa', '', 1, '2022-11-25 16:52:04', NULL),
(25, 'teste', '', 2, '2022-12-14 17:39:25', NULL),
(26, 'testando', '', 1, '2022-12-22 18:43:36', NULL),
(27, 'oi', '', 1, '2022-12-22 18:43:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `document` varchar(45) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `document`, `create_at`, `update_at`, `photo`) VALUES
(7, 'Pedro', 'pedrosouza.ch453@academico.ifsul.edu.br', '$2y$10$lS.26XZ3T6izbutihjIkdeaHVyIlwFLe4XVJJ8kjDDumVti8IfsAm', NULL, '2022-08-25 17:17:27', '2022-11-25 16:55:39', 'storage/images/2022/11/cac778d242275f4f5c9dda9507079c8d.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_task`
--

DROP TABLE IF EXISTS `user_task`;
CREATE TABLE IF NOT EXISTS `user_task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idTasks` int NOT NULL,
  `idUsers` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_users_idx` (`idTasks`),
  KEY `fk_project_images_projects1_idx` (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_task`
--

INSERT INTO `user_task` (`id`, `idTasks`, `idUsers`) VALUES
(1, 22, 7),
(2, 22, 7),
(3, 25, 7);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`idImportance`) REFERENCES `importance` (`id`);

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_projects_category1` FOREIGN KEY (`idImportance`) REFERENCES `importance` (`id`);

--
-- Limitadores para a tabela `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `fk_project_images_projects1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`idTasks`) REFERENCES `tasks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
