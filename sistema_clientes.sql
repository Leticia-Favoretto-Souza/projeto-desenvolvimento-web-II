-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/10/2024 às 23:46
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
(6, 'JULIA MARIA', 'MJULIA@GMAIL.COM', 'JULIA.PDF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `artista` varchar(100) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `quantidade` int NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `artista`, `ano`, `descricao`, `preco`, `quantidade`, `imagem`) VALUES
(1, 'Bringing It All Back Home', 'Bob Dylan', '1965', 'Edição lançada em 20 de novembro de 2015.\r\nQuinto álbum de estudio do cantor Bob Dylan, está na lista dos 200 álbuns definitivos no Rock and Roll Hall of Fame.', 250, 2, 'uploads/17303267896722b105b2d24.jpg'),
(2, 'Un Verano Sin Ti', 'Bad Bunny', '2022', 'Quarto álbum de estúdio do rapper e cantor porto-riquenho Bad Bunny.', 150, 20, 'uploads/17303268926722b16cda49f.jpg'),
(3, 'Business As Usual', 'Man at Work', '1981', 'Business as Usual é o álbum de estreia do grupo Men at Work, lançado em 9 de novembro de 1981. Em outubro de 2010, Business as Usual foi listado no livro, 100 Best Australian Albums. ', 120, 2, 'uploads/1730224872672122e82963f.jpeg'),
(4, 'Lola Versus Powerman and the Moneygoround, Pt.1', 'The Kinks', '1970', 'Lola Versus Powerman and the Moneygoround, Part One é um álbum conceitual da banda de rock britânica The Kinks. Lançado em 1970, é uma análise satírica das diversas facetas da indústria da música, incluindo editoras, sindicatos, imprensa, contadores, empresários e a estrada.', 120, 1, 'uploads/1730225440672125207efaf.jpg'),
(6, 'Pearl', 'Janis Joplin', '1971', 'Pearl é um álbum de Janis Joplin e da banda Full Tilt Boogie Band. Foi lançado em janeiro de 1971, três meses após a morte de Janis. É considerado por público e crítica como o melhor disco da cantora e o mais vendido.', 240, 1, 'uploads/17304121706723fe8a81ecf.jpg');

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
(8, 'Sandra', 'sandra@gmail.com', '$2y$10$nMiKq.3jTF8qSHoYSv.T9ekq3Pb0ut.ros3vjxGVILeBggOPucBLm', 'ADMINISTRADOR'),
(9, 'Amanda Ribeiro', 'amanda@gmail.com', '$2y$10$peitf/OPdwflyETs0JghJOn6IV6.xrJ3sQs2jri4ksrYqatumpETK', 'COMUM'),
(10, 'Carlos Ajuriaguerra', 'carlosaju@gmail.com', '$2y$10$MgFDHGp.oV/ClRGzfllvH.JH.pkA3llkZZD3CRHqZre10aaT7iBJq', 'COMUM'),
(11, 'Letícia Souza', 'leti.favoretto@gmail.com', '$2y$10$H8i8acLazBuh8t8cXocrzu8iawtlVLewnuLWApPrRBYAO9sLAqsD.', 'COMUM');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
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
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
