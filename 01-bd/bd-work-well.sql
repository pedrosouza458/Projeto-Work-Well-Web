-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17/01/2023 às 01:32
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

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
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `document` varchar(45) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `document`, `create_at`, `update_at`) VALUES
(8, 'admin', 'admin@gmail.com', '123454321', NULL, '2023-01-04 17:25:38', NULL),
(9, 'adm', 'adm@gmail.com', '$2y$10$C5otIwiME/g5EYtBy9G.Yeh4ddX0kQHaQ1aDheiL/eijCcotmCs9K', NULL, '2023-01-13 17:11:50', NULL),
(10, 'adm2', 'adm2@gmail.com', '$2y$10$A4.eJL8hHPlcPg0H0IFfLeJfofuxXk9Zv/U/Pbo/ClVhc2CRMebAS', NULL, '2023-01-13 17:13:28', NULL),
(11, 'teste', 'teste@gmail.com', '$2y$10$qqE9lQ41erTwrQ07FsAL0eHRXAA49wMzPFICqKInt3zE4OLwneLTi', NULL, '2023-01-13 17:14:44', NULL),
(12, 'teste2', 'teste2@gmail.com', '$2y$10$mmDeh9SPvTHgzmgw98mq6O7xvu2DDej4wv/PzYl2lVhn/YUlE6y5y', NULL, '2023-01-13 17:16:40', NULL),
(13, 'agoravai', 'agoravai@gmail.com', '$2y$10$8nd7hfwbSqpy8X8/Zlw8L..rdvfmqh8oKyoG8FMe7mYY.kpU3Zn02', NULL, '2023-01-13 17:17:19', NULL),
(14, 'Helder', 'helder@gmail.com', '$2y$10$S17UVlLb0DchZFZempkHBujC7EZ1QeXC3CokW8MCvERMGzGV7gNZG', NULL, '2023-01-15 00:09:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `importance`
--

CREATE TABLE `importance` (
  `id` int(11) NOT NULL,
  `import` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `importance`
--

INSERT INTO `importance` (`id`, `import`) VALUES
(1, 'pouca'),
(2, 'media'),
(3, 'muita');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `idImportance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `time`, `idImportance`, `created_at`, `updated_at`) VALUES
(18, 'Reunião do trabalho', 16, 3, '2022-09-15 17:32:50', NULL),
(19, 'Estudar para prova', 21, 2, '2022-09-15 17:34:23', NULL),
(20, 'Tomar café', 17, 1, '2022-09-15 17:35:05', NULL),
(21, 'ir ao cinema', 0, 1, '2022-09-20 00:06:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `checked` varchar(255) NOT NULL,
  `idImportance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tasks`
--

INSERT INTO `tasks` (`id`, `text`, `checked`, `idImportance`, `created_at`, `updated_at`) VALUES
(18, 'Estudar Matemática', 'False\r\n', 2, '2022-09-15 17:26:03', NULL),
(20, 'Entrevista de Emprego', 'True', 3, '2022-09-15 17:35:41', NULL),
(22, 'tomar café da manhã', 'true', 2, '2022-09-20 00:05:31', NULL),
(23, 'tocar violão', 'true', 3, '2022-09-20 00:10:22', NULL),
(25, 'Estudar ', '', 3, '2022-12-14 17:39:25', NULL),
(29, 'Ler um Livro', 'True', 3, '2023-01-14 19:11:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `document` varchar(45) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `document`, `create_at`, `update_at`, `photo`) VALUES
(7, 'Pedro', 'pedrosouza.ch453@academico.ifsul.edu.br', '$2y$10$lS.26XZ3T6izbutihjIkdeaHVyIlwFLe4XVJJ8kjDDumVti8IfsAm', NULL, '2022-08-25 17:17:27', '2022-11-25 16:55:39', 'storage/images/2022/11/cac778d242275f4f5c9dda9507079c8d.png'),
(8, 'Fábio', 'fabio@gmail.com', '12345', NULL, '2023-01-13 16:34:54', NULL, NULL),
(9, 'Pedrooo', 'pedro@gmail.com', '$2y$10$dZMGgi.aQ.LtNc4TYAcbt.LYdGBBxjowba7VSwpgujdQwneSWtyHu', NULL, '2023-01-14 23:05:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_task`
--

CREATE TABLE `user_task` (
  `id` int(11) NOT NULL,
  `idTasks` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `user_task`
--

INSERT INTO `user_task` (`id`, `idTasks`, `idUsers`) VALUES
(1, 22, 7),
(3, 25, 7),
(4, 29, 7),
(5, 23, 7),
(6, 20, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices de tabela `importance`
--
ALTER TABLE `importance`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projects_category1_idx` (`idImportance`);

--
-- Índices de tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projects_category1_idx` (`idImportance`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices de tabela `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_users_idx` (`idTasks`),
  ADD KEY `fk_project_images_projects1_idx` (`idUsers`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `importance`
--
ALTER TABLE `importance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_projects_category1` FOREIGN KEY (`idImportance`) REFERENCES `importance` (`id`);

--
-- Restrições para tabelas `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `fk_project_images_projects1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`idTasks`) REFERENCES `tasks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
