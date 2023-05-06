-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 12:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `prof`, `uname`, `email`, `pwd`, `code`, `expire`) VALUES
(9, 'Psychologists', 'jo viola', 'Avio@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 0),
(14, 'Physiotherapist', 'Omexie', 'Omexie@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(19, 'Surgeon', 'Charle Cee', 'chidulecharles1@gmail.com', '70965feb0441ff7fc1982fc5c509136e', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `professional` varchar(255) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `booked_by` text DEFAULT NULL,
  `booked_at` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `date`, `time`, `professional`, `reason`, `booked_by`, `booked_at`, `status`) VALUES
(1, 3, '2023-05-06', '18:09:00', 'Neurologist', 'Chibayo', 'Charle', '18:07:40 05-05-2023 ', 'Not Prescribed'),
(2, 4, '2023-05-20', '20:08:00', 'Surgeon', 'Wathyoka thako', 'Chance', '18:08:36 05-05-2023 ', 'Not Prescribed'),
(3, 7, '2023-05-03', '18:11:00', 'Cardiologist', 'Cardiac Arrest', 'Chanco', '18:09:29 05-05-2023 ', 'Not Prescribed'),
(4, 7, '2023-05-18', '20:37:00', 'Physiotherapist', 'Physical Intortion ', 'Charle', '18:37:38 05-05-2023 ', 'Not Prescribed'),
(5, 1, '2023-05-04', '00:35:00', 'Physiotherapist', 'Physical Dodomental', 'Charle', '18:39:05 05-05-2023 ', 'Prescribed by Joe Viola'),
(6, 7, '2023-05-04', '00:35:00', 'Surgeon', 'Tione Zammimba', 'Charle Cee', '19:43:28 05-05-2023 ', 'Not Prescribed'),
(7, 4, '2023-05-05', '21:56:00', 'Neurologist', 'ithjpto[kpferi', 'Charle', '19:55:34 05-05-2023 ', 'Prescribed by Omexie Gumba'),
(9, 2, '2023-05-07', '09:08:00', 'Surgeon', 'Broken Leg', 'Omexie Gumba', '09:09:32 06-05-2023 ', 'Prescribed by Charle Cee'),
(10, 5, '2023-05-06', '10:48:00', 'Surgeon', 'hfhfmhfmff', 'Charle', '10:49:27 06-05-2023 ', 'Prescribed by Charle Cee'),
(11, 4, '2023-05-06', '15:19:00', 'Physiotherapist', 'Urgent attention needed', 'Charle Cee', '15:17:58 06-05-2023 ', NULL),
(12, 4, '2023-05-06', '17:29:00', 'Physiotherapist', 'Need urgent attention', 'Charle Cee', '15:30:05 06-05-2023 ', NULL),
(13, 5, '2023-05-06', '15:33:00', 'Physiotherapist', 'Need Urgent attention', 'Charle Cee', '15:32:21 06-05-2023 ', NULL),
(14, 5, '2023-05-06', '15:33:00', 'Physiotherapist', 'Need Urgent attention', 'Charle Cee', '15:32:21 06-05-2023 ', NULL),
(15, 5, '2023-05-06', '16:46:00', 'Physiotherapist', 'Need Urgent attention', 'Charle Cee', '15:49:00 06-05-2023 ', NULL),
(16, 5, '2023-05-06', '16:46:00', 'Physiotherapist', 'Need Urgent attention', 'Charle Cee', '15:49:05 06-05-2023 ', NULL),
(17, 5, '2023-05-06', '16:46:00', 'Physiotherapist', 'Need Urgent attention', 'Charle Cee', '15:49:05 06-05-2023 ', NULL),
(18, 1, '2023-05-04', '15:50:00', 'Physiotherapist', 'e13rwerytu', 'Charle Cee', '15:50:10 06-05-2023 ', NULL),
(19, 3, '2023-05-05', '15:58:00', 'Physiotherapist', 'sady', 'Charle Cee', '15:56:38 06-05-2023 ', NULL),
(20, 2, '2023-05-05', '16:10:00', 'Neurologist', 'SADFD', 'Charle Cee', '16:08:59 06-05-2023 ', NULL),
(21, 2, '2023-05-21', '02:33:00', 'Cardiologist', 'fd', 'Charle Cee', '16:11:37 06-05-2023 ', NULL),
(22, 5, '2023-05-06', '21:04:00', 'Cardiologist', 'sdfjghjkl', 'Charle Cee', '21:04:44 06-05-2023 ', NULL),
(23, 5, '2023-05-06', '21:04:00', 'Cardiologist', 'sdfjghjkl', 'Charle Cee', '21:11:11 06-05-2023 ', NULL),
(24, 1, '1999-11-01', '11:11:00', 'Gastroenterologist', 'dsfdghjkl', 'Charle Cee', '21:11:53 06-05-2023 ', NULL),
(25, 2, '2023-05-04', '23:46:00', 'Dermatologist', 'rtuyigf', 'Charle Cee', '23:44:32 06-05-2023 ', NULL),
(26, 9, '2023-05-11', '12:22:00', 'Pediatric', 'Broken Thigh', 'Charle Cee', '00:48:23 07-05-2023 ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `uname`, `prof`, `pwd`) VALUES
(4, 'joe viola', 'Radiologist', 'c20ad4d76fe97759aa27a0c99bff6710'),
(5, 'jekapu', 'Physiotherapist', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Charle Cee', 'Surgeon', '70965feb0441ff7fc1982fc5c509136e');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_name` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_name`, `symptoms`) VALUES
('Paracetamol', 'Fever'),
('Ibuprofen', 'Fever, Headache, Muscle aches'),
('Azithromycin', 'Cough, Shortness of breath'),
('Prednisone', 'Shortness of breath, Chest Pain'),
('Cetirizine', 'Runny nose, Itching, Skin-rash'),
('Ondansetron', 'Nausea, Vomiting'),
('Loperamide', 'Diarrhoea'),
('Diphenhydramine', 'Pink eye'),
('Acetaminophen', 'Fever'),
('buprofen', 'Fever'),
('Aspirin', 'Fever'),
('Dextromethorphan', 'Cough'),
('Guaifenesin', 'Cough'),
('Albuterol', 'Vomiting'),
('Prednisone', 'Headache '),
('Oxygen', 'Shortness of breath'),
('Panadol', 'Loss of taste, Nausea'),
('Buffen', 'Chest pain, Body aches'),
('Carbamazepine', 'sore throat, skin rashes'),
('Doxcyclin', 'Loss of Appetite Dizziness'),
('Poaxcyclin', 'Loss of Smell, Allergy'),
('Intoxcyclin', 'Fatigue, General Body aches,'),
('Indosine', 'Diarrhoea, Allergy'),
('Hedax', 'Fatigue');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `district` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `residential` varchar(100) NOT NULL,
  `others` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  `prescribed_by` text DEFAULT NULL,
  `prescribed_on` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `email`, `phoneNumber`, `district`, `village`, `residential`, `others`, `symptoms`, `history`, `prescribed_by`, `prescribed_on`) VALUES
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 'chiso@gmail.com', 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'Malaria', 'Shortness of breath, Nausea, Vomiting, Dizziness', 'High Blood Pressure, Heart Disease, Lung Disease, Cancer, Liver Disease, Autoimmune Disease', 'Omexie Gumba', '10:24:53 05-05-2023 '),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 'edsonmagombo92@0gmail.com', 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'rtkdjrsgeafken', 'Fever', 'High Blood Pressure, Heart Disease, Lung Disease, Liver Disease', 'Omexie Gumba', '10:12:39 05-05-2023 '),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 'bed-com-33-18@unima.ac.mw', 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', NULL, NULL, NULL, 'Charle Cee', '01:59:18 05-05-2023 '),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 'edsonmagombo920@gmail.com', 997740566, 'Dowa', 'Mponela', 'Nason', 'palibe', 'Fever, Shortness of breath, Muscle aches, Nausea, Dizziness', 'High Blood Pressure, Heart Disease, Lung Disease, Liver Disease', 'Omexie Gumba', '10:13:52 05-05-2023 '),
(5, 'Avio', '2020-02-02', 'male', 11, 'avio@gmail.com', 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'qwqertyu', 'Cough, Vomiting', 'Diabetes, Cancer', 'Charle Cee', '23:18:24 06-05-2023 '),
(7, 'Mary Banda', '1999-04-07', 'female', 23, 'chidulecharles1@gmail.com', 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, NULL, NULL, NULL, NULL),
(8, 'Maureen', '1998-03-12', 'female', 12, 'chidulecharledfdfs1@gmail.com', 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, NULL, NULL, NULL, NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, 'chidulecharlhes1@gmail.com', 2147483647, 'Bangwe', 'Blantyre', 'Nyambadwe', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `prof`, `pwd`) VALUES
(2, 'Avio', 'Physiotherapist', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'Peter', 'Radiologist', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'Charle Cee', 'Surgeon', '70965feb0441ff7fc1982fc5c509136e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
