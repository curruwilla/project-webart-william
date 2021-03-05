-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 17:54
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webart`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `wap_users`
--

CREATE TABLE `wap_users` (
  `id` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `wap_users`
--

INSERT INTO `wap_users` (`id`, `thumb`, `first_name`, `last_name`, `email`, `password`, `genre`, `document`, `created_at`, `updated_at`) VALUES
(14, 'images/2021/03/william-alvares-1614708767.jpg', 'Fabricio', 'alvares', 'william.alvares@wapstore.com.br', '$2y$10$TY72/jGgP2Z6sazLnDGPOehpSJVghnM0nBAuxANUqQhJLRJ9W6xZK', 'male', '41040569870', '2021-03-02 19:12:31', '2021-03-02 19:46:18'),
(15, 'images/2021/03/1614708909.png', 'leonardo', 'alvares', 'leo@gmail.com', '$2y$10$Ox1JdaW0qzbCwmBRg/ILTegJ2267NHENa/ZCPe.b0Ke7Nn3BpMZeu', 'male', '451056546', '2021-03-02 19:15:09', '2021-03-02 19:15:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `wap_users`
--
ALTER TABLE `wap_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `wap_users`
--
ALTER TABLE `wap_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
