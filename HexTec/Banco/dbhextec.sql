-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2025 às 01:14
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
-- Banco de dados: `dbhextec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `imagem`) VALUES
(8, 'Mouse negativo', 399.00, 'Mouse gamer de alta performance com design ergonômico', '../Imagens/positivo.jpg'),
(9, 'Headset 7.1 Surround', 149.90, 'Headset com som surround e microfone de alta qualidade.', '../Imagens/headset.jpg'),
(10, 'Mouse Gamer Attack Shark X11', 120.90, 'Mouse gamer com DPI ajustável e iluminação RGB.', '../Imagens/attack.jpg'),
(11, 'Webcam Razer', 219.99, 'Webcam de alta definição com microfone embutido.', '../Imagens/webc.jpg'),
(12, 'Teclado Redragon', 149.90, 'Teclado mecânico gamer com iluminação RGB.', '../Imagens/redragon.jpg'),
(13, 'Microfone HyperX Gamer', 449.90, 'Microfone profissional para streaming e gravação.', '../Imagens/hyperx.jpg'),
(14, 'Headset Gamer Cat', 89.99, 'Headset leve e confortável com som cristalino.', '../Imagens/cat.jpg'),
(15, 'Câmera Web Logitech', 169.90, 'Câmera web para streaming e videochamadas.', '../Imagens/weblogi.jpg'),
(16, 'Mouse Gamer Logitech', 219.99, 'Mouse gamer com alta precisão e design ergonômico.', '../Imagens/mouselogi.jpg'),
(17, 'Teclado ATK R26 Ultra', 447.99, 'Teclado gamer com switches ultra responsivos.', '../Imagens/tecaspas.jpg'),
(18, 'Mesa Digitalizadora WACOM Cintiq', 250.00, 'Mesa digitalizadora profissional para designers.', '../Imagens/mesa.jpg'),
(19, 'Mouse Gamer Razer', 120.90, 'Mouse gamer de alta performance com iluminação RGB.', '../Imagens/mouseraz.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `senha` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`) VALUES
(1, 'admin', '12345678etec', 'admin@gmail.com'),
(2, 'rodrigo', 'rodrigo', 'rodrigo@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
