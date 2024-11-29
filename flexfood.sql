-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 20:31
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
(1, 'Leonardo', 'Banin Oleriano', '$2y$10$oOPuXbINEoE6vUyO0l4OKe7kCEekAjCpsqKcvFKNf.x1.YWDvDDF2', 'leonardobanin@gmail.com', 'df2ff4a5eb9e8ecb05bf573096972ab31a08b729697ff5704149f8c0dc84a378e4e9e0124a0784d795b5ece7fc52b080990c', '37e64024e90d0c5e7bf7ee0cf6ef9e37fd7b8d9d04313f763616e198813e94ca1098bd63395412d84657314315fe5268aff9c046ab52b7c47b6ae16d.jpg', 'Sou Leonardo Banin Oleriano, apaixonado por tecnologia e inovação. Adoro aprender coisas novas, enfrentar desafios e buscar formas de tornar a vida mais prática e eficiente. Acredito que cada dia é uma nova oportunidade para crescer e evoluir.'),
(2, 'Felipe', 'Silva', '$2y$10$4zY/WPc41zpx5JJtn79uROUgEWRAxTbncFIlrq7KVfqInzwXE0ME2', 'felipesilva@gmail.com', '79f0442ee2b6c834bbb2dfce35e4abc43f772735cfa5b722914e823a6b303ee2d79003ee99da5ee6ac457fb3360aebab9e42', '', ''),
(3, 'Leonardo ', 'Banin', '$2y$10$dJAFZdMwiE2Zq9OzocwgOOCPokTnpfFSFcD9MYlIbGnhIPcZ8xWGq', 'olerianoleonardo@gmail.com', '873b2745a5a40854e8f89b84034a4b4170716cc36f6f859d8c3af945f76f924015d7c7c38c701e2e189255c19057d0882afe', '', 'Conta Admin Da Empresa FlexFood'),
(4, 'Mago', 'Mago', '$2y$10$CjBsKtJG9en.DbE.LujZyOE/4Szkq2KOv6lctslOIcnTGlXHnQWAa', 'mago@mago.com', 'ee1e77c92db79702f81a1923c51d4ebffe6506931c2093a27bbb1af0bb3e633f582ab10cdd40117b2ce23372e6754f2b8ae1', '', ''),
(5, 'teste', 'teste1', '$2y$10$2iMBG1LdWfG2E.pH6q5W3e0Yz.MLeFq5mQmV8KWR0n0HwPjLMmYDO', 'teste@email.com', 'b9db7614454f76c64499860ca1c19dd5c6230f7f7a2cf1e68696d38855d34105264d748beac65e14bf9cd01af8a8b5716fcb', '', '');

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
('Sorvete Delicia Pícole Oggi 60ml', '\r\nDelícia Oggi 60ml \r\nSabores:Chocolate , Morango , Uva , Cookie , Maracuja , Limão , Abacaxi ', 20, 2.55, 'Outros', 'produto (3).png', NULL),
('Refrigerante Diversos LATA 350ML', 'Com sabor inconfundível e único, \r\nRefrigerantes: Coca cola , Guaraná , Fanta Laranja , Fanta Uva ', 21, 5.99, 'Bebidas', 'produto (1).png', NULL),
('Salgadinho Fofura Diversos Sabores 80g', 'Snack à base de milho . No tamanho de 80g ideal para compartilhar com amigos e família!\r\nSabores: Queijo , Presunto , Churrasco , Cebola ', 22, 5.99, 'Outros', 'produto (5).png', NULL),
('Café Expresso Tradicional Máquina', '\r\nO café expresso tradicional é uma bebida concentrada e encorpada, com um sabor intenso e uma fina crema dourada no topo. Preparado a partir de grãos finamente moídos, tem um aroma marcante e um equilíbrio entre amargor e leve doçura, servido em pequenas', 23, 4.55, 'Bebidas', 'produto (4).png', NULL),
('Pirulitos Chicletes Bubbaloo Balas ', 'Pirulitos 7 Belo: Os pirulitos 7 Belo são um clássico entre as guloseimas brasileiras, conhecidos por sua forma icônica e sabores variados. \r\nTipos de doce: Bala , Pirulito Chiclete ', 24, 0.55, 'Outros', 'produto (7).png', NULL),
('	\r\nPão De Queijo Forno De Minas Tradicional', 'O Pão de Queijo Tradicional Forno de Minas  a opção perfeita para quem procura um pão de queijo saboroso e prático de', 25, 4.99, 'Salgados', 'produto (6).png', NULL),
('Coxinha de Frango Grande', 'Receita caseira, massa super saborosa com um recheio de frango bem molhadinho e um temperinho de dar água na boca!\r\nPeso médio: 0,200gr.\r\nTipos: Frango e Frango com catupry ', 27, 3.59, 'Salgados', 'produto (2).png', NULL),
('Biscoito Recheado Bono 126g', 'A Bono Recheada (126g) é uma bolacha crocante e irresistível, com duas camadas de biscoito e um recheio cremoso \r\nSabores: Morango , Chocolate , Doce de leite ', 31, 3.59, 'Outros', 'produto (8).png', NULL),
(' Água Mineral Crystal  500ml', 'A Água Mineral Crystal  auxilia na hidratação e é uma ótima opção para ser consumida a qualquer momento.\r\nTipos : Com gás ou sem ', 32, 2.99, 'Bebidas', 'produto (9).png ', NULL),
('Esfirra de Carne', 'Tem o recheio envolto pela massa, formando uma espécie de \"pacote\" que é assado até dourar. Essa versão é prática para comer com as mãos.\r\nTipos :  Carne , Frango , Queijo ', 33, 6.99, 'Salgados', 'produto (10).png', NULL),
('Suco Dell Vale Nectar ', 'O Suco Dell Vale Néctar Lata 290ml é uma bebida prática e refrescante, ideal para quem busca sabor e nutrição de forma rápida e conveniente\r\nTipos: Maracujá , Uva , Manga , Pêssego ', 34, 6.99, 'Bebidas', 'produto (11).png', NULL),
('Pastel Saboroso', 'O pastel é uma iguaria clássica e irresistível da culinária brasileira, conhecido por sua massa fina e crocante, dourada por fora e recheada com uma infinidade de sabores.\r\nTipos: Carne , Queijo , Frango ', 35, 6.99, 'Salgados', 'produto (12).png', NULL),
('Café Expresso Tradicional Máquina', '\r\nO café expresso tradicional é uma bebida concentrada e encorpada, com um sabor intenso e uma fina crema dourada no topo. Preparado a partir de grãos finamente moídos, tem um aroma marcante e um equilíbrio entre amargor e leve doçura, servido em pequenas', 36, 4.55, 'Bebidas', 'produto (4).png', NULL);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `IDdoCarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
