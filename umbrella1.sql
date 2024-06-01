-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2024 às 15:23
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
-- Banco de dados: `umbrella1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `email`, `senha`, `clinica_id`) VALUES
(28, 'Gabriel', 'gabrielrezcpessoa@gmail.com', '$2y$10$mdHrRD7Co5s99eMXPqfzdePOFHhdreC5eiFZwwRC/9n6lNQ4qX2x6', NULL),
(31, 'Vitor', 'vitor@email.com', '$2y$10$BnRIPszM9AvjRXxPVrd5zejt0JOLty5GW3bqIGQB9g5qqJJq6sK3m', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clinic`
--

INSERT INTO `clinic` (`id`, `nome`, `email`, `cnpj`, `senha`) VALUES
(17, 'Clinica Umbrella', 'umbrella@email.com', '12345', '$2y$10$NvxrGgLqPl/Nfko1HJZn4eU2DhZzWNnQ9J/3ohZDG4hAYoV592QSu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `paciente_email` varchar(255) DEFAULT NULL,
  `medico_crm` varchar(50) DEFAULT NULL,
  `data_consulta` date DEFAULT NULL,
  `horario_consulta` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id`, `paciente_email`, `medico_crm`, `data_consulta`, `horario_consulta`) VALUES
(2, 'carlos@email.com', '87654321', '2024-07-12', '15:30:00'),
(3, 'joana@email.com', '12345678', '2024-05-31', '15:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id`, `nome`, `email`, `especialidade`, `crm`, `senha`, `clinica_id`, `tipo`) VALUES
(3, 'Emanuel', 'emanuel@email.com', 'Ortopedista', '12345678', '$2y$10$s2TPs7IgIV5i8RkA4.az2O7Lu2oMvlJfIk7xHJlWAAxulTvO1VdhK', NULL, 'Médico'),
(4, 'Eduardo', 'eduardo@email.com', 'Neurologista', '87654321', '$2y$10$W5UEOWJIGwsPKE3nSFe9N.BWkauPeg9CjAqGKd4KSnAKDcHcl/dPq', NULL, 'Médico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `email`, `data_nascimento`, `sexo`, `senha`, `clinica_id`, `tipo`) VALUES
(7, 'João', 'joao@email.com', '1995-02-16', 'm', '$2y$10$4WGJpdIYHeXUWoNFc1rfcelZJFWngoV8QB.QW/QConAC8LkTxtU22', NULL, 'Paciente'),
(8, 'Carlos', 'carlos@email.com', '1984-02-08', 'm', '$2y$10$ovDL7ebBpSDI6VwrHQJUbOjvkqkz3d/HaZ3XCiVg/Zch.wxjqs5f6', NULL, 'Paciente'),
(9, 'Joana', 'joana@email.com', '2002-07-17', 'f', '$2y$10$Yc./t2g.4J85mdsPfpBDPOACkA7XYjWQNJdvIPA1Jtp.dgcf8QTji', NULL, 'Paciente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `clinica_id` (`clinica_id`);

--
-- Índices de tabela `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_email` (`paciente_email`),
  ADD KEY `medico_crm` (`medico_crm`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD KEY `clinica_id` (`clinica_id`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `clinica_id` (`clinica_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`);

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`paciente_email`) REFERENCES `paciente` (`email`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`medico_crm`) REFERENCES `medico` (`crm`);

--
-- Restrições para tabelas `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`);

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
