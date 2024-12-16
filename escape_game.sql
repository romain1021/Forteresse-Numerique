-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2024 at 10:51 AM
-- Server version: 8.4.2
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escape_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `content`) VALUES
(74, 'hey\r\n'),
(75, 'hey\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL DEFAULT (curdate()),
  `score` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `pseudo`, `email`, `date_inscription`, `score`) VALUES
(1, 'rorolegeek', 'rlombard2005@gmail.com', '2024-12-10', 0),
(6, 'rorolegeek', 'test@gmail.com', '2024-12-10', 0),
(8, 'cqzecezd', 'qdscqscdes@ezfzef.com', '2024-12-10', 0),
(11, 'rorolegeek', 'catherinelombard@laposte.net', '2024-12-13', 0),
(13, 'aezdezd', 'eafzer@liyfg.com', '2024-12-13', 0),
(14, 'rorolegeek', 'ROMAIN@EOZFJN.FR', '2024-12-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int NOT NULL,
  `pseudo` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `pseudo`, `time`) VALUES
(1, 'Romain le best de la vie a tous jamais ', '2024-12-16 10:30:00'),
(2, 'Pierre', '2024-12-16 10:45:00'),
(3, 'Messi', '2024-12-16 11:00:00'),
(4, 'CR7', '2024-12-16 11:15:00'),
(5, 'NoahSticot', '2024-12-16 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `partie`
--

CREATE TABLE `partie` (
  `id_partie` int NOT NULL,
  `id_joueur` int NOT NULL,
  `date_partie` date NOT NULL DEFAULT (curdate()),
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `partie`
--

INSERT INTO `partie` (`id_partie`, `id_joueur`, `date_partie`, `score`) VALUES
(1, 6, '2024-12-10', 0),
(2, 8, '2024-12-10', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `parties_sans_utilisateur`
-- (See below for the actual view)
--
CREATE TABLE `parties_sans_utilisateur` (
`date_partie` date
,`id_partie` int
,`score` int
);

-- --------------------------------------------------------

--
-- Table structure for table `SessionEnCours`
--

CREATE TABLE `SessionEnCours` (
  `id` int NOT NULL,
  `userId` text NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `code`) VALUES
(1, 'admin', 'password123', 'B7R8J2D'),
(2, 'user', '1234', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `identifiants` int NOT NULL,
  `password` int NOT NULL,
  `reccord` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `utilisateurs_sans_email`
-- (See below for the actual view)
--
CREATE TABLE `utilisateurs_sans_email` (
`date_inscription` date
,`id_joueur` int
,`pseudo` varchar(50)
,`score` int
);

-- --------------------------------------------------------

--
-- Structure for view `parties_sans_utilisateur`
--
DROP TABLE IF EXISTS `parties_sans_utilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `parties_sans_utilisateur`  AS SELECT `partie`.`id_partie` AS `id_partie`, `partie`.`date_partie` AS `date_partie`, `partie`.`score` AS `score` FROM `partie` ;

-- --------------------------------------------------------

--
-- Structure for view `utilisateurs_sans_email`
--
DROP TABLE IF EXISTS `utilisateurs_sans_email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `utilisateurs_sans_email`  AS SELECT `joueur`.`id_joueur` AS `id_joueur`, `joueur`.`pseudo` AS `pseudo`, `joueur`.`date_inscription` AS `date_inscription`, `joueur`.`score` AS `score` FROM `joueur` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id_partie`),
  ADD KEY `id_joueur` (`id_joueur`);

--
-- Indexes for table `SessionEnCours`
--
ALTER TABLE `SessionEnCours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partie`
--
ALTER TABLE `partie`
  MODIFY `id_partie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `SessionEnCours`
--
ALTER TABLE `SessionEnCours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
