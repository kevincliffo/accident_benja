-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 05:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accident`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `Id` int(11) NOT NULL,
  `UUID` varchar(255) NOT NULL,
  `ReportedBy` varchar(100) DEFAULT NULL,
  `County` varchar(50) NOT NULL,
  `SubCounty` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `AccidentType` varchar(50) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `AccidentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`Id`, `UUID`, `ReportedBy`, `County`, `SubCounty`, `Location`, `AccidentType`, `Details`, `AccidentDate`) VALUES
(1, '80dae4eb-b683-4c1b-840d-9cac3fb514ba', 'kevin.njagi@yahoo.com', 'Mombasa', 'Nyali', 'Cinemax', 'Person and Motorbike', 'Person hit by motorbike while coming out of Chandarana Supermarket Nyali.', '2020-07-29 22:25:07'),
(2, '4bb30421-45ad-4803-a169-b9997b3a7dfe', NULL, 'Mombasa', 'Nyali', 'Cinemax', 'Person and Motorbike', 'Two motorbikes collide and hit pedestrian at Nyali Cinemax.', '2020-08-17 14:52:23'),
(12, 'c9535edf-a547-48a7-ae23-f8cffa85e073', NULL, 'Taita/Taveta', 'Taveta Town', 'Town', 'Person and Motorbike', 'Motorbikes collided and hit pedestrian.', '2020-08-17 15:17:11'),
(13, 'e3c3e430-aecc-4cca-861a-dba759ad85b1', 'admin@yahoo.com', 'Mombasa', 'Nyai', 'Ratna', 'Bicycle and Motorbike', 'Motorbike and Bicycle head-on collision.', '2020-09-01 12:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `Id` int(11) NOT NULL,
  `County` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`Id`, `County`) VALUES
(1, 'Mombasa'),
(2, 'Kwale'),
(3, 'Kilifi'),
(4, 'Tana River'),
(5, 'Lamu'),
(6, 'Taita/Taveta'),
(7, 'Garissa'),
(8, 'Wajir'),
(9, 'Mandera'),
(10, 'Marsabit'),
(11, 'Isiolo'),
(12, 'Meru'),
(13, 'Tharaka-Nithi'),
(14, 'Embu'),
(15, 'Kitui'),
(16, 'Machakos'),
(17, 'Makueni'),
(18, 'Nyandarua'),
(19, 'Nyeri'),
(20, 'Kirinyaga'),
(21, 'Murang\'a'),
(22, 'Kiambu'),
(23, 'Turkana'),
(24, 'West Pokot'),
(25, 'Samburu'),
(26, 'Trans Nzoia'),
(27, 'Uasin Gishu'),
(28, 'Elgeyo/Marakwet'),
(29, 'Nandi'),
(30, 'Baringo'),
(31, 'Laikipia'),
(32, 'Nakuru'),
(33, 'Narok'),
(34, 'Kajiado'),
(35, 'Kericho'),
(36, 'Bomet'),
(37, 'Kakamega'),
(38, 'Vihiga'),
(39, 'Bungoma'),
(40, 'Busia'),
(41, 'Siaya'),
(42, 'Kisumu'),
(43, 'Homa Bay'),
(44, 'Migori'),
(45, 'Kisii'),
(46, 'Nyamira'),
(47, 'Nairobi City');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `Id` int(11) NOT NULL,
  `AccidentUUID` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`Id`, `AccidentUUID`, `Name`, `Path`) VALUES
(1, '80dae4eb-b683-4c1b-840d-9cac3fb514ba', 'bike-human2.jpg', 'uploads/bike-human2.jpg'),
(2, '80dae4eb-b683-4c1b-840d-9cac3fb514ba', 'bike-human.jpg', 'uploads/bike-human.jpg'),
(13, 'c9535edf-a547-48a7-ae23-f8cffa85e073', 'class.jpg', 'uploads/class.jpg'),
(14, 'e3c3e430-aecc-4cca-861a-dba759ad85b1', 'side_project.jpg', 'uploads/side_project.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `motorvehicles`
--

CREATE TABLE `motorvehicles` (
  `Id` int(11) NOT NULL,
  `AccidentUUID` varchar(255) NOT NULL,
  `MotorVehicleType` varchar(255) NOT NULL,
  `NumberPlate` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motorvehicles`
--

INSERT INTO `motorvehicles` (`Id`, `AccidentUUID`, `MotorVehicleType`, `NumberPlate`, `Color`) VALUES
(1, 'c9535edf-a547-48a7-ae23-f8cffa85e073', 'Motor Bike', 'KJHZ 625J', 'White'),
(2, 'c9535edf-a547-48a7-ae23-f8cffa85e073', 'Motor Bike', 'KJUZ 256G', 'Black'),
(3, 'c9535edf-a547-48a7-ae23-f8cffa85e073', 'Motor Bike', 'KJHZ 245R', 'Green'),
(4, 'e3c3e430-aecc-4cca-861a-dba759ad85b1', 'Bicycle', 'NA', 'Black'),
(5, 'e3c3e430-aecc-4cca-861a-dba759ad85b1', 'Motor Bike', 'KGTZ 878L', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `LastLogin` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `UserType`, `Email`, `Password`, `MobileNo`, `LastLogin`, `CreatedDate`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@yahoo.com', 'ff53475470d2d7ee6e4f1dd41e717452', '0715768692', '2020-07-13 00:19:27', '2020-07-13 00:19:27'),
(2, 'Kevin', 'Njagi', 'User', 'kevin.njagi@yahoo.com', '1d0258c2440a8d19e716292b231e3190', '0726551145', '2020-07-29 00:29:39', '2020-07-29 00:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `motorvehicles`
--
ALTER TABLE `motorvehicles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `motorvehicles`
--
ALTER TABLE `motorvehicles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
