-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-portfolio215.alwaysdata.net
-- Generation Time: Jun 05, 2024 at 10:19 PM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio215_343348`
--
CREATE DATABASE IF NOT EXISTS `portfolio215_343348` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `portfolio215_343348`;

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
(2, 'Iulian', 'Ionita', 'ionita.iulian215@gmail.com', '$2y$10$6vHfFh2eo/0LVOht1HWqcO1uvbKrW7EwBh4tkBohdw/uaZJKIXt2.');

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
(1, 'Max', 3, '2021-05-15', '123456789', NULL, NULL, 'Chien1.png'),
(2, 'Bella', 5, '2019-09-20', '987654321', NULL, 'Chat1.png', 'Chat1.png'),
(3, 'Charlie', 2, '2022-02-10', '456123789', NULL, NULL, 'Chien1.png'),
(4, 'Lucy', 4, '2020-11-25', '789456123', NULL, NULL, NULL),
(5, 'Daisy', 6, '2018-08-12', '654987321', NULL, NULL, NULL),
(6, 'Rocky', 3, '2021-04-30', '321654987', NULL, NULL, NULL),
(7, 'Luna', 4, '2020-10-05', '987321654', NULL, NULL, NULL),
(8, 'Cooper', 2, '2022-01-20', '159357486', NULL, NULL, NULL),
(9, 'Sadie', 7, '2017-07-08', '369852147', NULL, NULL, NULL),
(10, 'Buddy', 5, '2019-12-15', '258741369', NULL, NULL, NULL),
(11, '', 0, '0000-00-00', '', NULL, 'photos_animaux/', ''),
(12, '', 0, '0000-00-00', '', NULL, 'photos_animaux/', ''),
(13, 'Pouffi', 15, '2008-01-05', '12AZ', NULL, 'photos_animaux/', 'ChienChat.jpg'),
(14, 'Pouffi', 15, '2008-01-05', '12AZ', NULL, 'photos_animaux/', 'Chat1.png'),
(15, 'Nina', 7, '2024-06-07', '12AZ', NULL, 'photos_animaux/', 'Chien1.png'),
(16, '', 0, '0000-00-00', '', NULL, 'photos_animaux/', ''),
(17, '', 0, '0000-00-00', '', NULL, 'photos_animaux/', ''),
(18, 'Stan', 20, '2024-05-28', '12AZ', NULL, 'photos_animaux/', 'Chien1.png'),
(19, 'Luci', 5, '2019-01-05', '12AZ', 2, 'photos_animaux/', 'Lucie.png');

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
(3, 1, '2024-06-05');

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
(1, 3),
(15, 2),
(19, 3);

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
(3, 'jackroussel', 15),
(4, 'jackroussel', 15),
(5, 'Siamois', 19);

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
(3, 'chien', 15),
(4, 'chien', 15),
(5, 'chat', 19);

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
(5, 2, 'Iulian', 'Lucie', 'photos_utilisateurs/Lucie.png');

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
(2, 'Iulian', '20', 648772014, 'Ionita', 'rue Bonnefoy', '$2y$10$/BZDUdt/VeNsS1BLBU3DqOL0viCM51DXg.dtaY5p9dFJszIq9pKt6', 'ionita.iulian215@gmail.com'),
(3, 'Iulian', '20', 648772014, 'Ionita', 'rue Bonnefoy', '$2y$10$ChOsvuFDZQlqPqLis3jTseEYofOwCQI2.M/DLIgDEutamH4qDMPXW', 'ionita.iulian215@gmail.com'),
(4, 'Iulian', '25', 6584736, 'Ionita', 'rue Bonnefoy', '$2y$10$2pLppvX94eqcAPXZHuf9Oe3jalfSAGTcws0BsR8qgRSulOq5kT4NG', 'ionita.iulian@gmail.com'),
(8, 'Iulian', '10', 648772014, 'Ionita', 'rue Bonnefoy', '$2y$10$jUm6KHxjG2I4vUI39C.EHO2C5yQYv5LSZ6WeJkbMIezCOnf0W6.TK', 'ionita@gmail.com');

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
(2, 'Claude', 2),
(3, 'Richard', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

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
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `Id_Animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `Id_Consultation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `espece`
--
ALTER TABLE `espece`
  MODIFY `Id_Espece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typeanimal`
--
ALTER TABLE `typeanimal`
  MODIFY `Id_TypeAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `Id_Veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
