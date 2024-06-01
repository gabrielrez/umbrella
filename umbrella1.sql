-- Estrutura do Banco de Dados `umbrella1`

-- Estrutura para tabela `admin`
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=41;

-- Estrutura para tabela `clinic`
CREATE TABLE `clinic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `cnpj` varchar(18) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=23;

-- Estrutura para tabela `consulta`
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_email` varchar(255) NOT NULL,
  `medico_crm` varchar(50) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario_consulta` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_email` (`paciente_email`),
  KEY `medico_crm` (`medico_crm`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`paciente_email`) REFERENCES `paciente` (`email`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`medico_crm`) REFERENCES `medico` (`crm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=4;

-- Estrutura para tabela `medico`
CREATE TABLE `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `especialidade` varchar(255) NOT NULL,
  `crm` varchar(20) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=5;

-- Estrutura para tabela `paciente`
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `clinica_id` int(11) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clinica_id` (`clinica_id`),
  CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`clinica_id`) REFERENCES `clinic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=11;
