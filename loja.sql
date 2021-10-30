-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/10/2021 às 02:08
-- Versão do servidor: 10.4.20-MariaDB
-- Versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `make`
--

CREATE TABLE `make` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `make`
--

INSERT INTO `make` (`id`, `descricao`) VALUES
(1, 'Maquiagem natural'),
(2, 'Maquiagem básica para o trabalho'),
(3, 'Maquiagem neutra'),
(4, 'teste2'),
(5, 'Maquiagem monocromática'),
(6, 'Maquiagem colorida'),
(7, 'Olho tudo e boca nada'),
(8, 'Olho tudo e boca tudo'),
(9, 'Maquiagem clássica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`id`, `nome`, `email`) VALUES
(1, 'José Carlos', 'jose@email.com'),
(8, 'Getúlio', 'getulio@gmail.com'),
(9, 'Jaqueline', 'jaqueline@email.com'),
(13, 'Breno Júnior', 'breno.junior@email.com'),
(15, 'Marcos José', '46@gmail.com'),
(17, 'Roberto Carlos', 'carlos@yahoo.com.br'),
(20, 'Albert2', '46@gmail.com2'),
(21, 'Simone', 'simone@email.com'),
(23, 'Zeli Dias', '46@gmail.comdd'),
(24, 'Zeli Dias2', '46@gmail.com67');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `make`
--
ALTER TABLE `make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
