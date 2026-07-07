-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2026 às 03:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hoteis_e_pousadas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pousadas_e_hoteis`
--

CREATE TABLE `pousadas_e_hoteis` (
  `id_pousada_e_hotel` int(11) NOT NULL,
  `nome_pousada_e_hotel` varchar(100) DEFAULT NULL,
  `local_pousada_e_hotel` varchar(100) DEFAULT NULL,
  `preco_pousada_e_hotel` varchar(100) DEFAULT NULL,
  `comodidades_pousada_e_hotel` text NOT NULL,
  `imagem_pousada_e_hotel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pousadas_e_hoteis`
--

INSERT INTO `pousadas_e_hoteis` (`id_pousada_e_hotel`, `nome_pousada_e_hotel`, `local_pousada_e_hotel`, `preco_pousada_e_hotel`, `comodidades_pousada_e_hotel`, `imagem_pousada_e_hotel`) VALUES
(1, 'Hotel Riad', 'União da Vitória, PR', '67,67', '[\"Centro\",\"Janela\",\"Cama\",\"Luz\",\"Encanamento\"]', '1783387829_riad.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'Raul Karvat', 'karvat@gmail.com', '$2y$10$ESPBAH5jiTctZSjQ0X1W0O9/w5BmVgCl.jpSIWqhRbqEOb0Si/1fm'),
(2, 'Elcio Sava', 'elcio@gmail.com', '$2y$10$C8SU1MAQRAEOsejdF6BO5OZdLE3KAK1EcnVpmguLIHaMWBwpbpNLe'),
(3, 'Silvio', 'silvio@gmail.com', '$2y$10$3Xsqbcn.m8Z6hdFhopOMq.Ldy0iFxagwIbzBo.kpG6PTNjwC6ozTS'),
(4, 'Sandra', 'sandra@gmail.com', '$2y$10$7BHHh0MGPeckb39FauoVIeln1jJ4D9zX919XCvEIEEU9q5ZbUpMqC'),
(5, 'Alayde', 'alyde@gmail.com', '$2y$10$0jx/GM1YtG2yz8SNxms30e2F.wAxt0edNm6vu2beVSXaCThWAMzXC');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pousadas_e_hoteis`
--
ALTER TABLE `pousadas_e_hoteis`
  ADD PRIMARY KEY (`id_pousada_e_hotel`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pousadas_e_hoteis`
--
ALTER TABLE `pousadas_e_hoteis`
  MODIFY `id_pousada_e_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
