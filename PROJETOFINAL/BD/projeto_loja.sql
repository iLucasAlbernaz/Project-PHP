-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2024 às 07:51
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nome_cartao` varchar(100) NOT NULL,
  `numero_cartao` varchar(16) NOT NULL,
  `expiracao_mes` int(11) NOT NULL,
  `expiracao_ano` int(11) NOT NULL,
  `codigo_seguranca` varchar(4) NOT NULL,
  `bandeira` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cartoes`
--

INSERT INTO `cartoes` (`id`, `cliente_id`, `nome_cartao`, `numero_cartao`, `expiracao_mes`, `expiracao_ano`, `codigo_seguranca`, `bandeira`, `created_at`) VALUES
(1, 2, 'ldwald', '1221211114444477', 12, 21, '1445', '', '2024-06-11 02:25:13'),
(2, 7, 'lucas', '1234567891234567', 11, 23, '1245', '', '2024-06-11 02:41:47'),
(3, 4, 'lili', '1224545', 22, 22, '2222', '', '2024-06-11 03:16:42'),
(4, 1, 'ujuj', '14141414', 11, 11, '1456', '', '2024-06-11 04:35:17'),
(5, 1, 'ujuj', '14141414', 11, 11, '1456', '', '2024-06-11 04:36:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `idade` int(3) NOT NULL,
  `email` varchar(80) NOT NULL,
  `apelido` varchar(40) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `idade`, `email`, `apelido`, `dataNascimento`, `telefone`, `genero`, `senha`) VALUES
(38, 'awdawda', '072.113.871-30', 52, 'NICOLLE@GMAIL.COM', 'Luquinhas', '5225-02-25', '(61)95247-8547', 'masculino', '123'),
(39, 'Joao Marcos', '000.555.888-33', 24, 'llg.albernaz1@gmail.com', 'Luquinhas', '2000-10-20', '(61)95247-8547', 'masculino', '123'),
(44, 'Lucas Gabriel ', '000.000.000-01', 24, 'llg.albernaz@gmail.com', 'Gabriel', '2000-01-20', '(61)99999-9999', 'masculino', '123456'),
(45, 'Gabriel ', '777.777.888-98', 22, 'llg.albernaz@gmail.com', 'joao', '2000-01-20', '(61)99999-8888', 'masculino', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cliente_id`) VALUES
(4, '72.000-000', 'QS 12 lote 7 cs 9', 9, 'Samambaia', 'Brasilia', 'DF', 19),
(11, '72.000-000', 'hkuhk', 1414, 'Sam', 'Brasilia', 'DF', 19),
(14, '72.220-120', 'Qnn 12, Lote 2, Apt', 305, 'Ceilândia', 'Brasilia', 'DF', 42),
(16, '72.220-120', 'QS 12 lote 7 cs 9', 305, 'Ceilândia', 'Brasilia', 'DF', 44);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `forma_pagamento` varchar(50) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `nome_produto`, `preco_unitario`, `quantidade`, `total`, `data`, `horario`, `forma_pagamento`, `cliente_id`) VALUES
(13, 'Navigator', 299.90, 1, 299.90, '2024-06-11', '01:00:53', '', 0),
(14, 'Navigator', 299.90, 1, 299.90, '2024-06-11', '01:38:38', '', 0),
(15, 'Luminosa Glamour', 199.90, 1, 199.90, '2024-06-11', '02:20:57', '', 0),
(16, 'Adrenaline Pro', 149.90, 1, 149.90, '2024-06-11', '02:22:57', '', 0),
(17, 'Brilho Celestial', 249.90, 1, 249.90, '2024-06-11', '02:23:22', '', 0),
(18, 'Navigator', 299.90, 1, 299.90, '2024-06-11', '02:23:49', '', 0),
(19, 'Luminosa Glamour', 199.90, 1, 199.90, '2024-06-11', '02:35:31', '', 0),
(20, 'Luminosa Glamour', 199.90, 1, 199.90, '2024-06-11', '02:37:04', '', 0),
(21, 'Éclat Majestique', 999.90, 1, 999.90, '2024-06-11', '02:40:09', '', 0),
(22, 'Adrenaline Pro', 149.90, 1, 149.90, '2024-06-11', '02:44:01', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
