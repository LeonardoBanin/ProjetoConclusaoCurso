-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2024 às 19:12
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
-- Banco de dados: `flexfood`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `name`, `lastname`, `passw`, `email`, `token`, `image`, `bio`) VALUES
(1, 'Leonardo ', 'Banin Oleriano', '$2y$10$oOPuXbINEoE6vUyO0l4OKe7kCEekAjCpsqKcvFKNf.x1.YWDvDDF2', 'leonardobanin@gmail.com', 'e525ec3cbd3cab3e744f368d3b372ab19ccaa6fdf5a8fe73b8666f1f048642386d3599537363804581fec45f8bc71dd5fa36', '37e64024e90d0c5e7bf7ee0cf6ef9e37fd7b8d9d04313f763616e198813e94ca1098bd63395412d84657314315fe5268aff9c046ab52b7c47b6ae16d.jpg', 'Flex Food deixando seu dia cada vez melhor '),
(2, 'Felipe', 'Silva', '$2y$10$4zY/WPc41zpx5JJtn79uROUgEWRAxTbncFIlrq7KVfqInzwXE0ME2', 'felipesilva@gmail.com', '26389571feaac7f2dee1ee97bc2d22d020e726d22a8ff075d6c083cbd559f64ea61027417ee39a0081809d8ec78e7903066c', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
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
-- Estrutura para tabela `produtos`
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
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`name`, `description`, `id`, `preco`, `category`, `image`, `cadastro_id`) VALUES
('Sorvete Delicia Pícole Oggi 60ml', '\r\nDelícia Oggi 60ml \r\nSabores:Chocolate , Morango , Uva , Cookie , Maracuja , Limão , Abacaxi ', 20, 2.5, 'Outros', 'produto (3).png', NULL),
('Refrigerante Diversos LATA 350ML', 'Com sabor inconfundível e único, \r\nRefrigerantes: Coca cola , Guaraná , Fanta Laranja , Fanta Uva ', 21, 5, 'Bebidas', 'produto (1).png', NULL),
('Salgadinho Fofura Diversos Sabores 80g', 'Snack à base de milho . No tamanho de 80g ideal para compartilhar com amigos e família!\r\nSabores: Queijo , Presunto , Churrasco , Cebola ', 22, 5.99, 'Outros', 'produto (5).png', NULL),
('Café Expresso Tradicional Máquina', '\r\nO café expresso tradicional é uma bebida concentrada e encorpada, com um sabor intenso e uma fina crema dourada no topo. Preparado a partir de grãos finamente moídos, tem um aroma marcante e um equilíbrio entre amargor e leve doçura, servido em pequenas', 23, 4.5, 'Bebidas', 'produto (4).png', NULL),
('Pirulitos Chicletes Bubbaloo Balas ', 'Pirulitos 7 Belo: Os pirulitos 7 Belo são um clássico entre as guloseimas brasileiras, conhecidos por sua forma icônica e sabores variados. \r\nTipos de doce: Bala , Pirulito Chiclete ', 24, 0.55, 'Outros', 'produto (7).png', NULL),
('	\r\nPão De Queijo Forno De Minas Tradicional', 'O Pão de Queijo Tradicional Forno de Minas  a opção perfeita para quem procura um pão de queijo saboroso e prático de', 25, 4.99, 'Salgados', 'produto (6).png', NULL),
('Coxinha de Frango Grande', 'Receita caseira, massa super saborosa com um recheio de frango bem molhadinho e um temperinho de dar água na boca!\r\nPeso médio: 0,200gr.\r\nTipos: Frango e Frango com catupry ', 27, 3.5, 'Salgados', 'produto (2).png', NULL),
('Biscoito Recheado Bono 126g', 'A Bono Recheada (126g) é uma bolacha crocante e irresistível, com duas camadas de biscoito e um recheio cremoso \r\nSabores: Morango , Chocolate , Doce de leite ', 31, 3.5, 'Outros', 'produto (8).png', NULL),
(' Água Mineral Crystal  500ml', 'A Água Mineral Crystal  auxilia na hidratação e é uma ótima opção para ser consumida a qualquer momento.\r\nTipos : Com gás ou sem ', 32, 2.99, 'Bebidas', 'produto (9).png ', NULL),
('Esfirra de Carne', 'Tem o recheio envolto pela massa, formando uma espécie de \"pacote\" que é assado até dourar. Essa versão é prática para comer com as mãos.\r\nTipos :  Carne , Frango , Queijo ', 33, 6.99, 'Salgados', 'produto (10).png', NULL),
('Suco Dell Vale Nectar ', 'O Suco Dell Vale Néctar Lata 290ml é uma bebida prática e refrescante, ideal para quem busca sabor e nutrição de forma rápida e conveniente\r\nTipos: Maracujá , Uva , Manga , Pêssego ', 34, 6.99, 'Bebidas', 'produto (11).png', NULL),
('Pastel Saboroso', 'O pastel é uma iguaria clássica e irresistível da culinária brasileira, conhecido por sua massa fina e crocante, dourada por fora e recheada com uma infinidade de sabores.\r\nTipos: Carne , Queijo , Frango ', 35, 6.99, 'Salgados', 'produto (12).png', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` varchar(255) NOT NULL,
  `last_login_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `registration_date`, `last_login_date`) VALUES
(1, 'competidor', '$2y$10$W8ITmW9eQui00NRTkidPrOCDKc/28ucuIT/6EdcnJL/iBL8uPZNbC', '02-Sep-2024 19-47-42', '04-Sep-24 09:08:49'),
(2, 'teste', '$2y$10$7246r5IyrhpWzCJqvZCR3emEydp0PCizFxUtE39e5qB38aU72aAPK', '02-Sep-2024 19-48-02', '02-Sep-24 10:20:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`IDdoCarrinho`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `IDdoCarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
