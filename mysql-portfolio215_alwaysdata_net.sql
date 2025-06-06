-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql-portfolio215.alwaysdata.net
-- Generation Time: Jun 06, 2025 at 01:20 PM
-- Server version: 10.11.13-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio215_spa2mars`
--
CREATE DATABASE IF NOT EXISTS `portfolio215_spa2mars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `portfolio215_spa2mars`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `ANom` varchar(50) DEFAULT NULL,
  `APrenom` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `ANom`, `APrenom`, `email`, `mdp`) VALUES
(1, 'Likow', 'Chady', NULL, NULL),
(2, 'Iulian', 'Ionita', 'ionita.iulian215@gmail.com', 'Azer123'),
(3, 'iulian', 'ionita', 'ionita.iulian@gmail.com', '$2y$10$AfAleIQ2HkX7U13rp.PMVuiP4N9GBCcXwR5gwjzgctf56CVUnekZq'),
(4, 'iulian', 'ionita', 'a.a@gmail.com', '$2y$10$LluwHBK2Q7eM9RVzL9vvmO4a51Fa615sMm6MwIEBNf.4mWNLQwQJa'),
(5, 'A', 'A', 'a@gmail.com', '$2b$10$EGM7M7TSlNvitIAIAHV4m.oGIDnLMIxoPplUvP84ZZ3CzoFKjdn5C'),
(6, 'Ionita', 'Iulian', 'b@gmail.com', '$2b$10$insLOMG6x8ak74ABwBNlNO9qOhx5akKn6RRXVOS3Mi1ete13pqyEi');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_photos`
--

CREATE TABLE `adoption_photos` (
  `Id_Photo` int(11) NOT NULL,
  `Id_Adoption` int(11) NOT NULL,
  `Photo_URL` varchar(255) NOT NULL,
  `DateAjout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `Id_Animal` int(11) NOT NULL,
  `AnPrenom` varchar(50) DEFAULT NULL,
  `AnAge` int(11) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  `AnPuce` varchar(50) DEFAULT NULL,
  `Id_Utilisateur` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`Id_Animal`, `AnPrenom`, `AnAge`, `dateNaiss`, `AnPuce`, `Id_Utilisateur`, `image_path`, `image_filename`) VALUES
(1, 'Max', 3, '2021-05-09', '123456789', 10, NULL, 'Chien2025.png'),
(13, 'Pouffi', 15, '2008-01-04', '12AZ', NULL, '/images/1749171058649-ath.png', '1749171058649-ath.png'),
(15, 'Nina', 7, '2024-06-07', '12AZ', 11, 'photos_animaux/', 'Chien1.png'),
(22, 'b', 1, '2025-04-04', 'A1', 9, NULL, 'bbfca4432688ca5dfe4f7662112a97d5'),
(23, 'Ariel', 2, '2025-03-30', 'aertyu', 15, NULL, '1749177821298-screenEditBunkerAdmin.png'),
(26, 'Armand', 3, '2025-04-11', 'AZERTUIO1234567', NULL, NULL, '1749154752083-Chien2025.png'),
(27, 'A', 1, '2025-06-07', NULL, NULL, '/images/1749159887836-ath.png', '1749159887836-ath.png'),
(28, 'Azi', 10, '2014-02-06', NULL, NULL, NULL, '1749178187573-screenEditPersonnelAdmin.png');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `Id_Consultation` int(11) NOT NULL,
  `Vaccination` tinyint(1) DEFAULT NULL,
  `dateVaccPuce` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`Id_Consultation`, `Vaccination`, `dateVaccPuce`) VALUES
(2, 1, '2024-05-30'),
(4, 1, '2025-04-25'),
(5, 1, '2025-04-24'),
(7, 1, '2025-06-05'),
(8, 1, '2025-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `Id_Message` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Sujet` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `DateEnvoi` datetime NOT NULL,
  `Lu` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `effectuer`
--

CREATE TABLE `effectuer` (
  `Id_Animal` int(11) NOT NULL,
  `Id_Consultation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `effectuer`
--

INSERT INTO `effectuer` (`Id_Animal`, `Id_Consultation`) VALUES
(15, 2),
(22, 4),
(26, 7),
(26, 8);

-- --------------------------------------------------------

--
-- Table structure for table `espece`
--

CREATE TABLE `espece` (
  `Id_Espece` int(11) NOT NULL,
  `LibelEspece` varchar(50) DEFAULT NULL,
  `Id_Animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `espece`
--

INSERT INTO `espece` (`Id_Espece`, `LibelEspece`, `Id_Animal`) VALUES
(2, 'calico', 13),
(8, 'calico', 22),
(18, 'labrador', 26),
(20, NULL, 23),
(23, 'siamois', 27),
(24, 'calico', 28);

-- --------------------------------------------------------

--
-- Table structure for table `gerer`
--

CREATE TABLE `gerer` (
  `Id_Admin` int(11) NOT NULL,
  `Id_Animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeanimal`
--

CREATE TABLE `typeanimal` (
  `Id_TypeAnimal` int(11) NOT NULL,
  `LibelTypeAnimal` varchar(50) DEFAULT NULL,
  `Id_Animal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `typeanimal`
--

INSERT INTO `typeanimal` (`Id_TypeAnimal`, `LibelTypeAnimal`, `Id_Animal`) VALUES
(2, 'chat', 13),
(8, 'chat', 22),
(18, 'chien', 26),
(20, NULL, 23),
(23, 'chat', 27),
(24, 'chat', 28);

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `animalName` varchar(255) NOT NULL,
  `filePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`id`, `userId`, `userName`, `animalName`, `filePath`) VALUES
(1, 2, 'Iulian', 'Nina', 'photos_utilisateurs/Chien1.png'),
(5, 2, 'Iulian', 'Lucie', 'photos_utilisateurs/Lucie.png'),
(6, 11, 'b', 'Nina', 'photos_utilisateurs/1745939486530-sac.png'),
(7, 9, 'a', 'b', 'photos_utilisateurs/1749117305455-IMG_2793.png');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `UNom` varchar(50) DEFAULT NULL,
  `UAge` varchar(50) DEFAULT NULL,
  `UTel` int(11) DEFAULT NULL,
  `UPrenom` varchar(50) DEFAULT NULL,
  `UAdress` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_Utilisateur`, `UNom`, `UAge`, `UTel`, `UPrenom`, `UAdress`, `mdp`, `email`) VALUES
(2, 'Iulian', '20', 648772014, 'Ionita', 'rue Bonnefoy', 'Azer', 'ionita.iulian21@gmail.com'),
(3, 'Iulian', '20', 648772014, 'Ionita', 'rue Bonnefoy', '$2y$10$ChOsvuFDZQlqPqLis3jTseEYofOwCQI2.M/DLIgDEutamH4qDMPXW', 'ionita.iulian5@gmail.com'),
(4, 'Iulian', '25', 6584736, 'Ionita', 'rue Bonnefoy', '$2y$10$2pLppvX94eqcAPXZHuf9Oe3jalfSAGTcws0BsR8qgRSulOq5kT4NG', 'ionita.iulian@gmail.com'),
(8, 'Iulian', '10', 648772014, 'Ionita', 'rue Bonnefoy', '$2y$10$jUm6KHxjG2I4vUI39C.EHO2C5yQYv5LSZ6WeJkbMIezCOnf0W6.TK', 'ionita@gmail.com'),
(9, 'a', '2', NULL, 'a', '2', '$2b$10$VhGex/hugGoPTVsrx410Re/B1qDZf9jdkqiYgy9dnmZbdaFFXyBpK', 'a@gmail.com'),
(10, 'a', '1', NULL, 'a', '1', '$2b$10$vkM6cKwNy/K9zswhKPB2l.ISTVh31OFQsZzDEd5IjehUShDw7kivO', 'b@gmail.com'),
(11, 'b', '1', NULL, 'b', '20 rue bonnefoy', '$2b$10$h3DsyifnL0osvi0cl/DtSup/q/dbQKXuC0o6Je8nlR5gY8Q9OAcsi', 'r@gmail.com'),
(12, 'Ionita', '1', NULL, 'Iulian', '20 rue Bonnefoy', '$2b$10$0rpujO41f9vu0.aZR5wu2eEEpLDzRGg1NUDKd7DjETotEcolNLQ2.', 'ionita.iulian215@gmail.com'),
(13, 'Ionita', '1', NULL, 'Iulian', '20 rue Bonnefoy', '$2b$10$f./wrUZex7IkuGeqbHYmd.ULNFcTAdON7q6/VfxfrOQCTKNRlPZ/C', '5@gmail.com'),
(14, 'Ionita', '0', NULL, 'Iulian', '20 rue Bonnefoy', '$2b$10$YUdHEWnR0zBkEfT/TcGxj.YlucjFkVmXj9o21l5JiVe0dPNRhi1fe', 'c@gmail.com'),
(15, 'Jean', '39', NULL, 'Paul', 'rue des chateigne 20', '$2b$10$IP9ZAF016PZ/c1eziAXdJOU9k3Vm1edOnPVltiaocdwhNh4rqeFB.', 'user@spa2mars.com'),
(16, 'Ionita', '1', NULL, 'Iulian', '20 rue Bonnefoy', '$2b$10$.9WKld5/BU4VJnaBO.P7zuxpjhCvls4dQPev89ol5wrJAo.o8IXFW', '2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `Id_Veterinaire` int(11) NOT NULL,
  `NomMedecin` varchar(50) DEFAULT NULL,
  `Id_Consultation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `veterinaire`
--

INSERT INTO `veterinaire` (`Id_Veterinaire`, `NomMedecin`, `Id_Consultation`) VALUES
(2, 'Claude', 5),
(3, 'Richard', 8),
(4, 'Abuba', NULL),
(5, 'Fred', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `adoption_photos`
--
ALTER TABLE `adoption_photos`
  ADD PRIMARY KEY (`Id_Photo`),
  ADD KEY `FK_AdoptionPhotos_Adoption` (`Id_Adoption`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`Id_Animal`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`Id_Consultation`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`Id_Message`),
  ADD KEY `FK_ContactMessages_Users` (`Id_User`);

--
-- Indexes for table `effectuer`
--
ALTER TABLE `effectuer`
  ADD PRIMARY KEY (`Id_Animal`,`Id_Consultation`),
  ADD KEY `Id_Consultation` (`Id_Consultation`);

--
-- Indexes for table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`Id_Espece`),
  ADD KEY `Id_Animal` (`Id_Animal`);

--
-- Indexes for table `gerer`
--
ALTER TABLE `gerer`
  ADD PRIMARY KEY (`Id_Admin`,`Id_Animal`),
  ADD KEY `Id_Animal` (`Id_Animal`);

--
-- Indexes for table `typeanimal`
--
ALTER TABLE `typeanimal`
  ADD PRIMARY KEY (`Id_TypeAnimal`),
  ADD KEY `Id_Animal` (`Id_Animal`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`);

--
-- Indexes for table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`Id_Veterinaire`),
  ADD KEY `Id_Consultation` (`Id_Consultation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adoption_photos`
--
ALTER TABLE `adoption_photos`
  MODIFY `Id_Photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `Id_Animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `Id_Consultation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `Id_Message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `espece`
--
ALTER TABLE `espece`
  MODIFY `Id_Espece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `typeanimal`
--
ALTER TABLE `typeanimal`
  MODIFY `Id_TypeAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `Id_Veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Constraints for table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `effectuer_ibfk_1` FOREIGN KEY (`Id_Animal`) REFERENCES `animal` (`Id_Animal`),
  ADD CONSTRAINT `effectuer_ibfk_2` FOREIGN KEY (`Id_Consultation`) REFERENCES `consultation` (`Id_Consultation`);

--
-- Constraints for table `espece`
--
ALTER TABLE `espece`
  ADD CONSTRAINT `espece_ibfk_1` FOREIGN KEY (`Id_Animal`) REFERENCES `animal` (`Id_Animal`);

--
-- Constraints for table `gerer`
--
ALTER TABLE `gerer`
  ADD CONSTRAINT `gerer_ibfk_1` FOREIGN KEY (`Id_Admin`) REFERENCES `admin` (`Id_Admin`),
  ADD CONSTRAINT `gerer_ibfk_2` FOREIGN KEY (`Id_Animal`) REFERENCES `animal` (`Id_Animal`);

--
-- Constraints for table `typeanimal`
--
ALTER TABLE `typeanimal`
  ADD CONSTRAINT `typeanimal_ibfk_1` FOREIGN KEY (`Id_Animal`) REFERENCES `animal` (`Id_Animal`);

--
-- Constraints for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `user_photos_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`Id_Utilisateur`);

--
-- Constraints for table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD CONSTRAINT `veterinaire_ibfk_1` FOREIGN KEY (`Id_Consultation`) REFERENCES `consultation` (`Id_Consultation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
