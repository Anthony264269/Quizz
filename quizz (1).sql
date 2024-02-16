-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2023 at 03:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`) VALUES
(3, 'Quel jeune animal peut être une génisse ?'),
(4, 'En combien de périodes, un match de basketball est-il composé (sans prolongation) ?'),
(5, 'Quel pays possède un drapeau qui représente un aigle qui dévore un serpent ?'),
(6, 'Dans quelle ville peut-on voir le Château des ducs de Bretagne ?'),
(7, 'Dans quel pays africain, le Kilimandjaro se trouve-t-il ?'),
(8, 'Combien d\'anées séparent la période des dinosaure et celle des Hommes sur la Terre ?'),
(9, 'Comment écrit-on le chiffre 2 en allemand ?'),
(10, 'Combien de temps dure la rotation complète de la lune autour de la Terre ?');

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `right_answer` tinyint(1) NOT NULL,
  `question_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `reponse`, `right_answer`, `question_id`) VALUES
(1, 'Vache', 1, 3),
(2, 'Loup', 0, 3),
(3, 'Giraffe', 0, 3),
(4, 'Chien', 0, 3),
(13, '2', 0, 4),
(14, '4', 1, 4),
(15, '7', 0, 4),
(16, '5', 0, 4),
(17, 'Maroc', 0, 5),
(18, 'Egypte', 0, 5),
(19, 'Mexique', 1, 5),
(20, 'Espagne', 0, 5),
(21, 'Brest', 0, 6),
(22, 'Lorient', 0, 6),
(23, 'Rennes', 0, 6),
(24, 'Nantes', 1, 6),
(29, 'Tanzanie', 1, 7),
(30, 'Mozambique', 0, 7),
(31, 'Madagascar', 0, 7),
(32, 'Maroc', 0, 7),
(33, '600 000 ans', 0, 8),
(34, '6 millions d\'années', 0, 8),
(35, '60 millions d\'années', 1, 8),
(36, '600 millions d\'années', 0, 8),
(37, 'Zwei', 1, 9),
(38, 'Elf', 0, 9),
(39, 'Neun', 0, 9),
(40, 'Fünf', 0, 9),
(41, '7 jours\r\n', 0, 10),
(42, '14 jours', 0, 10),
(43, '21 jours', 0, 10),
(44, '28 jours', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `stat` int NOT NULL,
  `pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `stat`, `pseudo`) VALUES
(1, 0, 'Chafi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
