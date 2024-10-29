-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/10/2024 às 01:04
-- Versão do servidor: 8.0.39
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `arquivo_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `arquivo_pdf`) VALUES
(1, 'Leticia Favoretto de Souza', 'leti@gmail.com', '66fe0c0c0c9f6_Español-verbos.pdf'),
(3, 'Gabriele Souza', 'gabi@gmail.com', '66fe0c376ebb1_Curriculo_Leticia_Favoretto_Souza.pdf'),
(4, 'ANDRE', 'ANDRE@GMAIL.COM', 'ARQUIVO.PDF'),
(5, 'MARIA APARECISA', 'MARIAAP@GMAIL.COM', 'MARIA.PDF'),
(6, 'JULIA MARIA', 'MJULIA@GMAIL.COM', 'JULIA.PDF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_acesso`) VALUES
(1, 'Marco Martins de Souza', 'marco@gmail.com', '$2y$10$uIeeVPqoA4ZDrqcoPSMfn.4UcZAxwgYyJ2eB0SNt3/bcY3dgb8vJ2', 'COMUM'),
(2, 'leticia', 'leticia@hotmail.com', '$2y$10$xaaFV03gxK25i4I0CVdKMug1uHis4m1RMb.aTJZyi/jFi8/Zq/0J6', 'ADMINISTRADOR '),
(8, 'Sandra', 'sandra@gmail.com', '$2y$10$nMiKq.3jTF8qSHoYSv.T9ekq3Pb0ut.ros3vjxGVILeBggOPucBLm', 'ADMINISTRADOR'),
(9, 'Amanda Ribeiro', 'amanda@gmail.com', '$2y$10$peitf/OPdwflyETs0JghJOn6IV6.xrJ3sQs2jri4ksrYqatumpETK', 'COMUM'),
(10, 'Carlos Ajuriaguerra', 'carlosaju@gmail.com', '$2y$10$MgFDHGp.oV/ClRGzfllvH.JH.pkA3llkZZD3CRHqZre10aaT7iBJq', 'COMUM');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
