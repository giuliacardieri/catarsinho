-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07-Mar-2018 às 04:20
-- Versão do servidor: 5.7.18
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catarsinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  `userdata` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_added` datetime DEFAULT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `photo`, `value`, `user_id`, `time_added`) VALUES
(2, 'Construção de luminária sustentável de LED', 'Atualmente é necessário pensar na sustenbilidade ao criar um novo projeto. Com a luminária sustentável de LED podemos obter não só um produto bonito e agradável, como sustentável e fácil de manter. Com alta durabilidade!', 'luminaria.jpeg', 500, 7, '2018-03-06 22:30:00'),
(25, 'Mr Dinokiki e os elementos interativos', 'Mr Dinokiki, ou Dinokiki (a sílaba forte é no segundo KI), é um personagem que criei em 2014 para aprender a usar JavaScript em um site. Contudo, desde 2014 o Dino e eu crescemos, e com isso veio um novo objetivo: proporcionar uma experiência divertida e interativa ao usuário. Ajude o Dinokiki!', 'bfbdee62b1eb754fe9c4e2a5c489b6c5.png', 250, 6, '2018-03-06 19:30:00'),
(27, 'App para vagas de emprego de tecnologia em Bauru', 'Um projeto para criar um app (inicialmente android) com o objetivo de juntar todas as vagas na área de tecnologia em Bauru-SP. Esperamos que isso ajude todos as pessoas que procuram empregos na área de tecnologia na região de Bauru.', '04e73cdaf4481cc12c865e0b324c29c0.png', 407, 9, '2018-03-06 08:30:00'),
(28, 'PWA Agenda', 'Um PWA de agenda personalizável em relação ao design, funcionalidades, modalidades e categorias. Com objetivo de auxiliar o tratamento de coisas específicas como Diabetes, dieta, execução de projeto, planejamento em geral.', '96147aaa91e2c9d7ea9795f91812f904.png', 475, 6, '2018-03-04 09:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `password`, `id`) VALUES
('Giulia', 'Cardieri', 'giulia.cardieri@gmail.com', 'cf376e9f17e5caf4b94d2457a35f65f5f0197226', 6),
('Gabriel', 'Hossu', 'gabrielhossu@hotmail.com', 'lolala', 7),
('Mr', 'Dinokiki', 'dinokikiteam@gmail.com', 'cf376e9f17e5caf4b94d2457a35f65f5f0197226', 8),
('Alessandra', 'Sasaki', 'ale.sasaki@gmail.com', 'cf376e9f17e5caf4b94d2457a35f65f5f0197226', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_foreign_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
