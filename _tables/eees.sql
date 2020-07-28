-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 10:40 PM
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
-- Database: `eees`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseId` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseId`, `CourseName`, `CreatedDate`) VALUES
(1, 'Electrical Engineering', '2020-05-24 21:44:21'),
(2, 'Mechanical Engineering', '2020-05-24 21:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `LoginId` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `LastLogin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`LoginId`, `Email`, `LastLogin`) VALUES
(1, 'admin@yahoo.com', '2020-03-31 18:37:46'),
(2, 'admin@yahoo.com', '2020-03-31 18:38:34'),
(3, 'kevincliffo@gmail.com', '2020-03-31 18:57:07'),
(4, 'admin@yahoo.com', '2020-04-01 09:55:10'),
(5, 'admin@yahoo.com', '2020-05-03 17:04:03'),
(6, 'admin@yahoo.com', '2020-05-04 00:10:44'),
(7, 'kevin.ngere@gmail.com', '2020-05-04 00:16:21'),
(8, 'kevin.ngere@gmail.com', '2020-05-04 00:16:33'),
(9, 'kevin@yahoo.com', '2020-05-04 00:19:12'),
(10, 'admin@yahoo.com', '2020-05-04 00:21:33'),
(11, 'admin@yahoo.com', '2020-05-04 00:21:40'),
(12, 'kevin.ngere@gmail.com', '2020-05-04 11:49:12'),
(13, 'admin@yahoo.com', '2020-05-04 12:58:28'),
(14, 'admin@yahoo.com', '2020-05-04 13:00:43'),
(15, 'admin@yahoo.com', '2020-05-04 13:05:07'),
(16, 'admin@yahoo.com', '2020-05-22 11:21:55'),
(17, 'admin@yahoo.com', '2020-05-24 12:16:40'),
(18, 'admin@yahoo.com', '2020-05-24 18:50:55'),
(19, 'admin@yahoo.com', '2020-06-07 21:32:52'),
(20, 'admin@yahoo.com', '2020-06-08 09:05:22'),
(21, 'admin@yahoo.com', '2020-06-08 12:48:37'),
(22, 'admin@yahoo.com', '2020-06-08 13:59:17'),
(23, 'admin@yahoo.com', '2020-06-08 14:05:18'),
(24, 'admin@yahoo.com', '2020-06-08 19:34:22'),
(25, 'kev@yahoo.com', '2020-06-08 20:11:47'),
(26, 'kev@yahoo.com', '2020-06-08 20:23:14'),
(27, 'kev@yahoo.com', '2020-06-08 21:01:44'),
(28, 'admin@yahoo.com', '2020-06-08 21:06:32'),
(29, 'kev@yahoo.com', '2020-06-08 21:20:29'),
(30, 'admin@yahoo.com', '2020-06-15 18:58:25'),
(31, 'admin@yahoo.com', '2020-06-15 20:25:27'),
(32, 'admin@yahoo.com', '2020-06-16 02:57:50'),
(33, 'admin@yahoo.com', '2020-06-16 10:57:34'),
(34, 'admin@yahoo.com', '2020-06-16 12:09:35'),
(35, 'admin@yahoo.com', '2020-06-16 13:52:32'),
(36, 'admin@yahoo.com', '2020-06-16 18:32:52'),
(37, 'admin@yahoo.com', '2020-06-16 18:33:00'),
(38, 'admin@yahoo.com', '2020-06-16 18:33:14'),
(39, 'admin@yahoo.com', '2020-06-16 18:33:32'),
(40, 'admin@yahoo.com', '2020-06-16 18:34:16'),
(41, 'admin@yahoo.com', '2020-06-16 18:40:17'),
(42, 'peter.ndungu@gmail.com', '2020-06-16 18:41:16'),
(43, 'admin@yahoo.com', '2020-06-16 19:48:43'),
(44, 'admin@yahoo.com', '2020-06-16 20:53:08'),
(45, 'admin@yahoo.com', '2020-06-16 20:54:57'),
(46, 'admin@yahoo.com', '2020-06-16 20:55:38'),
(47, 'admin@yahoo.com', '2020-06-16 20:55:49'),
(48, 'admin@yahoo.com', '2020-06-16 20:56:35'),
(49, 'admin@yahoo.com', '2020-06-16 20:57:10'),
(50, 'admin@yahoo.com', '2020-06-16 21:02:20'),
(51, 'admin@yahoo.com', '2020-06-16 21:02:37'),
(52, 'admin@yahoo.com', '2020-06-16 21:05:43'),
(53, 'admin@yahoo.com', '2020-06-16 21:06:22'),
(54, 'admin@yahoo.com', '2020-06-16 21:07:01'),
(55, 'admin@yahoo.com', '2020-06-16 21:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `NoteId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `UnitName` varchar(50) DEFAULT NULL,
  `CourseName` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`NoteId`, `Name`, `UnitName`, `CourseName`, `CreatedDate`) VALUES
(1, 'BLOCK_DIAGRAMS_NOTES.pdf', 'Control System', '', '2020-06-08 19:51:42'),
(2, 'CONTROL_SYSYEMS_QUESTIONS.pdf', 'Control System', '', '2020-06-08 19:51:42'),
(3, 'Electrical_Protection_and_Service_for_Buildings.pd', 'Control System', '', '2020-06-08 19:51:42'),
(4, 'Electronics_and_control_systems_Avionics_nov_2081.', 'Control System', '', '2020-06-08 19:51:42'),
(5, 'INTRODUCTION_TO_CONTROL_SYSTEM.pdf', 'Control System', '', '2020-06-08 19:51:43'),
(6, 'STEADY_STATE_ERRORS_IN_UNITY_FEEDBACK_P.O.Ochieng.', 'Control System', '', '2020-06-08 19:51:43'),
(7, 'STEADY_STATE_ERRORS_NOTES.pdf', 'Control System', '', '2020-06-08 19:51:43'),
(8, 'Stepper_motors.pdf', 'Control System', '', '2020-06-08 19:51:43'),
(9, 'SYSTEM_MODELLING_NOTES.pdf', 'Control System', '', '2020-06-08 19:51:43'),
(10, '8051_Instruction_Set.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(11, 'Introduction_to_microcontrollers.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(12, 'Microcontroller_programming.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(13, 'MICROCONTROLLER_QUESTIONS-2.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(14, 'MICROCONTROLLER_QUESTIONS.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(15, 'Pin_Configuration_of_8051.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(16, 'stepper_motors.pdf', 'Microcontroller', '', '2020-06-08 19:51:43'),
(17, 'Degrees_of_freedom.pdf', 'robotics', '', '2020-06-08 19:51:43'),
(18, 'ROBOTICS_CLASS_NOTES.pdf', 'robotics', '', '2020-06-08 19:51:44'),
(19, 'robotics_notes.pdf', 'robotics', '', '2020-06-08 19:51:44'),
(20, 'ROBOTICS_SUM_NOTES-1.pdf', 'robotics', '', '2020-06-08 19:51:44'),
(21, 'ROBOTICS_SUM_NOTES.pdf', 'robotics', '', '2020-06-08 19:51:44'),
(23, 'Designing_systems.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(24, 'Examples_of_PLC_applications.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(25, 'Function_Block_diagram.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(26, 'input_output_devices.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(27, 'Introduction_to_Programmable_logic_controllers.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(28, 'Ladder_Programming.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(29, 'Networks_1.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(30, 'Other_PLC_programming_languages.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:44'),
(31, 'PLC_calibration.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(32, 'PLC_NETWORKING.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(33, 'PLC_Networks.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(34, 'PLC_QUESTIONS.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(35, 'PLC_SYSTEM_MAINTENANCE.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(36, 'scada-0.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(37, 'scadaclassification-.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(38, 'scadappt-.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(39, 'scada_components.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(40, 'SCADA_NOTES.pdf', 'Programmable Logic Controllers', '', '2020-06-08 19:51:45'),
(41, 'Solar.pdf', 'Solar Installation', '', '2020-06-08 19:51:45'),
(42, 'SOLAR_INSTALLATION_QUESTIONS.pdf', 'Solar Installation', '', '2020-06-08 19:51:46'),
(43, 'Solar_installation_technology_Supplementary.pdf', 'Solar Installation', '', '2020-06-08 19:51:46'),
(44, 'Solar_PV_Systems.pdf', 'Solar Installation', '', '2020-06-08 19:51:46'),
(45, 'Stand_alone_Solar_Electric_Systems.pdf', 'Solar Installation', '', '2020-06-08 19:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `SettingId` int(11) NOT NULL,
  `SettingKey` varchar(50) NOT NULL,
  `SettingName` varchar(50) NOT NULL,
  `SettingValue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingId`, `SettingKey`, `SettingName`, `SettingValue`) VALUES
(2, 'starting_year', 'Starting Year', '1990'),
(3, 'starting_month', 'Starting Month', '1'),
(4, 'subscription_fee', 'Subscription Fee', '500');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `SubscriptionId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Amount` double(10,2) NOT NULL,
  `Year` int(4) NOT NULL,
  `Month` int(2) NOT NULL,
  `PaymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`SubscriptionId`, `UserId`, `Amount`, `Year`, `Month`, `PaymentDate`) VALUES
(1, 2, 500.00, 2020, 7, '2020-06-16 14:01:07'),
(2, 1, 500.00, 2020, 2, '2020-06-16 17:46:22'),
(3, 2, 500.00, 2018, 1, '2020-06-16 17:57:14'),
(4, 3, 500.00, 2020, 3, '2020-06-16 22:17:37'),
(5, 3, 500.00, 2020, 2, '2020-06-16 22:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `UnitId` int(11) NOT NULL,
  `UnitName` varchar(50) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`UnitId`, `UnitName`, `CourseName`, `CreatedDate`) VALUES
(1, 'Programmable Logic Controllers', '', '2020-05-24 20:49:40'),
(2, 'Control System', '', '2020-05-24 20:56:29'),
(3, 'Solar Installation', '', '2020-05-24 20:57:45'),
(4, 'Microcontroller', '', '2020-06-07 21:34:05'),
(5, 'Robotics', '(Microcontroller)', '2020-06-08 20:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `RegNo` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `Subscribed` int(10) NOT NULL,
  `LastLogin` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `RegNo`, `FirstName`, `LastName`, `UserType`, `Email`, `Password`, `IDNumber`, `MobileNo`, `Subscribed`, `LastLogin`, `CreatedDate`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin', 'admin@yahoo.com', 'ff53475470d2d7ee6e4f1dd41e717452', '00000000', '0700000000', 1, '2020-06-16 21:07:58', '2020-06-15 20:24:55'),
(2, 'EEES-2020/06-0001', 'Peter', 'Ndungu', 'User', 'peter.ndungu@gmail.com', '1d0258c2440a8d19e716292b231e3190', '34556754', '0735662278', 1, '2020-06-16 18:41:16', '2020-06-15 20:42:42'),
(3, 'EEES-2020/06-0002', 'Loise', 'Chege', 'User', 'loise.chege@gmail.com', '1d0258c2440a8d19e716292b231e3190', '45343323', '0711212123', 1, '2020-06-16 22:16:46', '2020-06-16 22:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`LoginId`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`NoteId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`SettingId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`SubscriptionId`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`UnitId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `NoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `SettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `SubscriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `UnitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
