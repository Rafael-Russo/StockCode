-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2024 às 17:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stockcode`
--

CREATE DATABASE stockcode;
USE stockcode;

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazenamento`
--

CREATE TABLE `armazenamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(360) NOT NULL,
  `qr_code` varchar(360) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `armazenamento`
--

INSERT INTO `armazenamento` (`id`, `nome`, `qr_code`) VALUES
(5, 'teste', './assets/qrcodes/armazens/5.png'),
(6, 'teste 2 edit', './assets/qrcodes/armazens/6.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramenta`
--

CREATE TABLE `ferramenta` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(360) NOT NULL,
  `img` varchar(360) DEFAULT NULL,
  `calibragem` int(1) NOT NULL DEFAULT 0 COMMENT '0 = descalibrado,\r\n1 = calibrado',
  `qr_code` varchar(360) DEFAULT NULL,
  `armazenamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ferramenta`
--

INSERT INTO `ferramenta` (`id`, `nome`, `img`, `calibragem`, `qr_code`, `armazenamento`) VALUES
(10, 'FERRAMENTA TESTE', '/assets/images/ferramentas/bb3c59e3d5b253edb8cb9c8773ba2f76.png', 1, './assets/qrcodes/ferramentas/10.png', 2),
(11, 'teste 2', '', 0, './assets/qrcodes/ferramentas/11.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ferramenta_id` int(11) NOT NULL,
  `calibragem` int(11) NOT NULL,
  `armazenamento_id` int(11) DEFAULT NULL,
  `acao` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `usuario_id`, `ferramenta_id`, `calibragem`, `armazenamento_id`, `acao`, `timestamp`) VALUES
(14, 6, 11, 1, 5, 'colocado', '2024-05-24 11:56:59'),
(15, 6, 11, 1, 0, 'retirado', '2024-05-24 11:57:01'),
(16, 6, 11, 0, 6, 'colocado', '2024-05-24 11:57:12'),
(17, 6, 11, 0, 0, 'retirado', '2024-05-24 11:57:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(360) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(6, 'TESTE', 'teste@teste.com', 'aa1bf4646de67fd9086cf6c79007026c');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ferramenta`
--
ALTER TABLE `ferramenta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `ferramenta`
--
ALTER TABLE `ferramenta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
