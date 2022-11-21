-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2022 às 19:41
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `f_guardar_dinheiro`
--

CREATE TABLE `f_guardar_dinheiro` (
  `id_guardar` int(20) NOT NULL,
  `data` date NOT NULL,
  `valor` int(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `objetivo` varchar(40) NOT NULL,
  `id_usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `f_guardar_dinheiro`
--

INSERT INTO `f_guardar_dinheiro` (`id_guardar`, `data`, `valor`, `descricao`, `objetivo`, `id_usuario`) VALUES
(1, '2022-11-19', 100, 'teste', '123', 61),
(4, '2022-11-11', 21313, 'aaads', '', 61);

-- --------------------------------------------------------

--
-- Estrutura da tabela `f_registros`
--

CREATE TABLE `f_registros` (
  `id_registro` int(20) NOT NULL,
  `data` date DEFAULT NULL,
  `categoria` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` int(20) NOT NULL,
  `parcelamento` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `natureza` varchar(15) NOT NULL,
  `pg` varchar(3) NOT NULL,
  `data_pagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `f_registros`
--

INSERT INTO `f_registros` (`id_registro`, `data`, `categoria`, `descricao`, `valor`, `parcelamento`, `tipo`, `id_usuario`, `natureza`, `pg`, `data_pagamento`) VALUES
(1, '2022-11-14', 'g', 'dfgdfg', 100, 5, 'parcelado', 61, 'despesa', 'sim', '2022-11-21'),
(2, '2022-12-14', 'g', 'dfgdfg', 100, 4, 'parcelado', 61, 'despesa', 'sim', '2022-11-21'),
(3, '2023-01-14', 'g', 'dfgdfg', 100, 3, 'parcelado', 61, 'despesa', 'sim', '2022-11-21'),
(4, '2023-02-14', 'g', 'dfgdfg', 100, 2, 'parcelado', 61, 'despesa', 'sim', '2022-11-21'),
(5, '2023-03-14', 'g', 'dfgdfg', 100, 1, 'parcelado', 61, 'despesa', 'sim', '2022-11-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `grupo_usuario` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `grupo_usuario`) VALUES
(1, 'admin', '123', 1),
(61, 'miqueias', '123', 1),
(62, 'teste', '123', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `f_guardar_dinheiro`
--
ALTER TABLE `f_guardar_dinheiro`
  ADD PRIMARY KEY (`id_guardar`);

--
-- Índices para tabela `f_registros`
--
ALTER TABLE `f_registros`
  ADD PRIMARY KEY (`id_registro`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `f_guardar_dinheiro`
--
ALTER TABLE `f_guardar_dinheiro`
  MODIFY `id_guardar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `f_registros`
--
ALTER TABLE `f_registros`
  MODIFY `id_registro` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
