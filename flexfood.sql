-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 01:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `destynyvalor`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `IDdoCarrinho` int(11) NOT NULL,
  `nomeDaPessoa` varchar(200) DEFAULT NULL,
  `nomeDoProduto` varchar(200) DEFAULT NULL,
  `IDdaPessoa` int(11) DEFAULT NULL,
  `IDdoProduto` int(11) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `name` varchar(140) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `preco` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cadastro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`name`, `description`, `id`, `preco`, `category`, `image`, `cadastro_id`) VALUES
('Monitor Gamer Acer QG240Y Nitro 23.8 Full HD', 'Monitor Gamer Acer QG240Y Nitro 23.8 Full HD\r\n \r\n\r\nDiminui o Input Lag\r\nO Nitro QG240Y S3bipx conta com uma alta taxa de atualização de até 180Hz e até 1 ms VRB de tempo de resposta. Prepare-se para ver imagens mais suaves, sem rastros e sem rasgos.\r\n\r\nCo', 20, 740, 'Monitores', 'produto (3).png', NULL),
('Cadeira Gamer Husky Gaming Tempest 500 Cor Preto', 'A Cadeira Gamer Husky Storm oferece design moderno e resistente, além de ser muito confortável. A Storm possui sintético PU (material sintético laminado) em sua superfície, com densidade da espuma de 50kg/m³ no assento e 35kg/m³ no encosto, suportando um ', 21, 650, 'Cadeiras Gamer', 'produto (1).png', NULL),
('Galax PLACA DE VIDEO GEFORCE RTX 3050 EX 1-CLICK OC 8GB GDDRD6', 'Desempenho de Última Geração\r\nA Placa de Vídeo Galax NVIDIA GeForce RTX 3050 EX foi desenvolvida com o poderoso desempenho gráfico da arquitetura NVIDIA Ampere. Ela apresenta RT Cores de 2ª geração e Tensor Cores de 3ª geração dedicados, novos multiproces', 22, 1430, 'Peças', 'produto (5).png', NULL),
('Mouse Gamer Logitech G403 HERO\r\n', 'EQUIPADO COM O SENSOR HERO\r\n \r\n\r\nO G403 entra no ringue com a nova geração do sensor HERO 25K. Prepare-se para um mouse com rastreamento 1:1 no próximo nível, faixa de sensibilidade de 100-25.600 DPI, além de suavização, filtragem e aceleração nulas.\r\n\r\n ', 23, 284, 'Acessórios', 'produto (4).png', NULL),
('Echo Dot 5ª geração', 'Echo Dot 5ª geração Amazon, com Alexa, com Relógio, Smart Speaker, Display, Azul\r\nO Echo Dot com o melhor som já lançado: curta uma experiência sonora ainda melhor em comparação às versões anteriores do Echo Dot com Alexa e ouça vocais mais nítidos, grave', 24, 269, 'Acessórios', 'produto (7).png', NULL),
('Teclado Mecânico Gamer Husky Gaming Blizzard', 'Switches com feedback audível e tátil\r\nSwitch Gateron Red contam com um feedback audível e tátil. É versátil e aprimorado em relação a outros switches. Ele traz a tecnologia dos switches mecânicos e é um ícone para os jogos e longos períodos de digitação.', 25, 210, 'Periféricos', 'produto (6).png', NULL),
('HEADSET GAMER HYPERX CLOUD STINGER 2 CORE', 'Headset Gamer HyperX Cloud Stinger 2, Drivers 50mm, Preto.\r\n \r\n\r\nCom um novo design e 2 anos de DTS Headphone:X Spatial Audio, o Cloud Stinger 2 mantém os fundamentos do Cloud Stinger e os refina.\r\n\r\nAinda pesando menos de 300g, o Cloud Stinger 2 é leve, ', 27, 250, 'Periféricos', 'produto (2).png', NULL),
('Cadeira games', 'cadeira gamer muito boa pode comprar compra por favor', 30, 1499, 'Acessórios', 'produto (1).png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` varchar(255) NOT NULL,
  `last_login_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `registration_date`, `last_login_date`) VALUES
(1, 'competidor', '$2y$10$W8ITmW9eQui00NRTkidPrOCDKc/28ucuIT/6EdcnJL/iBL8uPZNbC', '02-Sep-2024 19-47-42', '04-Sep-24 09:08:49'),
(2, 'teste', '$2y$10$7246r5IyrhpWzCJqvZCR3emEydp0PCizFxUtE39e5qB38aU72aAPK', '02-Sep-2024 19-48-02', '02-Sep-24 10:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`IDdoCarrinho`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `IDdoCarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
