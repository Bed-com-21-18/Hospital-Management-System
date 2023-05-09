-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 11:25 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
(1, 3, '2023-05-06', '18:09:00', 'Neurologist', 'Chibayo', 'Charle', '18:07:40 05-05-2023 ', 'Prescribed by chama'),
(2, 4, '2023-05-20', '20:08:00', 'Surgeon', 'Wathyoka thako', 'Chance', '18:08:36 05-05-2023 ', 'Not Prescribed'),
(3, 7, '2023-05-03', '18:11:00', 'Cardiologist', 'Cardiac Arrest', 'Chanco', '18:09:29 05-05-2023 ', 'Not Prescribed'),
(4, 7, '2023-05-18', '20:37:00', 'Physiotherapist', 'Physical Intortion ', 'Charle', '18:37:38 05-05-2023 ', 'Not Prescribed'),
(5, 1, '2023-05-04', '00:35:00', 'Physiotherapist', 'Physical Dodomental', 'Charle', '18:39:05 05-05-2023 ', 'Prescribed by Joe Viola'),
(6, 7, '2023-05-04', '00:35:00', 'Surgeon', 'Tione Zammimba', 'Charle Cee', '19:43:28 05-05-2023 ', 'Not Prescribed'),
(7, 4, '2023-05-05', '21:56:00', 'Neurologist', 'ithjpto[kpferi', 'Charle', '19:55:34 05-05-2023 ', 'Prescribed by Omexie Gumba'),
(9, 2, '2023-05-07', '09:08:00', 'Surgeon', 'Broken Leg', 'Omexie Gumba', '09:09:32 06-05-2023 ', 'Prescribed by Charle Cee'),
(10, 5, '2023-05-06', '10:48:00', 'Surgeon', 'hfhfmhfmff', 'Charle', '10:49:27 06-05-2023 ', 'Prescribed by chama'),
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
(26, 9, '2023-05-11', '12:22:00', 'Pediatric', 'Broken Thigh', 'Charle Cee', '00:48:23 07-05-2023 ', NULL),
(27, 9, '2023-02-12', '12:22:00', 'Gastroenterologist', 'QHTEJRYUTIY,MNDBSVASAD X', 'Charle Cee', '16:01:43 07-05-2023 ', NULL),
(28, 12, '2023-05-07', '20:47:00', 'Gastroenterologist', 'URGENT ATTENTION', 'matilda', '20:47:30 07-05-2023 ', NULL),
(29, 1, '2023-05-08', '12:21:00', 'Physiotherapist', 'edrftgyhujuydtfuisru', 'ida', '16:16:12 08-05-2023 ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 'omexie', 'Physiotherapist', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Charle Cee', 'Surgeon', '70965feb0441ff7fc1982fc5c509136e'),
(7, 'chama', 'Surgeon', 'c20ad4d76fe97759aa27a0c99bff6710'),
(8, 'makiga', 'Physiotherapist', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_name` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `drug_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_name`, `symptoms`, `drug_price`) VALUES
('', '', 0),
('Acetaminophen', 'Fever', 0),
('Albuterol', 'Vomiting', 0),
('Aspirin', 'Fever', 0),
('Azithromycin', 'Cough, Shortness of breath', 0),
('Buffen', 'Chest pain, Body aches', 0),
('buprofen', 'Fever', 0),
('Carbamazepine', 'sore throat, skin rashes', 0),
('Cetirizine', 'Runny nose, Itching, Skin-rash', 0),
('Dextromethorphan', 'Cough', 0),
('Diphenhydramine', 'Pink eye', 0),
('Doxcyclin', 'Loss of Appetite Dizziness', 0),
('Guaifenesin', 'Cough', 0),
('Hedax', 'Fatigue', 0),
('Ibuprofen', 'Fever, Headache, Muscle aches', 0),
('Indosine', 'Diarrhoea, Allergy', 0),
('Intoxcyclin', 'Fatigue, General Body aches,', 0),
('Loperamide', 'Diarrhoea', 0),
('Ondansetron', 'Nausea, Vomiting', 0),
('Oxygen', 'Shortness of breath', 0),
('Panadol', 'Loss of taste, Nausea', 0),
('Paracetamol', 'Fever', 0),
('Poaxcyclin', 'Loss of Smell, Allergy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drug_price`
--

CREATE TABLE `drug_price` (
  `drug_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug_price`
--

INSERT INTO `drug_price` (`drug_name`, `price`) VALUES
('Acetaminophen', '45.00'),
('Albuterol', '670.00'),
('Aspirin', '800.00'),
('Azithromycin', '45.00'),
('Buffen', '5455.00'),
('Dextromethorphan', '67.00'),
('Hedax', '789.00'),
('Oxygen', '9999.00'),
('Paracetamol', '67.00');

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

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `phoneNumber`, `district`, `village`, `residential`, `others`, `symptoms`, `history`, `prescribed_by`, `prescribed_on`) VALUES
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'poiuytrew', 'Shortness of breath, Loss of taste, Diarrhoea', 'Kidney Disease', 'chama', '16:24:35 08-05-2023 '),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'rtkdjrsgeafken', 'Fever', 'High Blood Pressure, Heart Disease, Lung Disease, Liver Disease', 'Omexie Gumba', '10:12:39 05-05-2023 '),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', 'iiiwer', 'Shortness of breath, Diarrhoea, Itching, Chest Pain', 'High Blood Pressure', 'chama', '22:53:19 08-05-2023 '),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 997740566, 'Dowa', 'Mponela', 'Nason', 'palibe', 'Fever, Shortness of breath, Muscle aches, Nausea, Dizziness', 'High Blood Pressure, Heart Disease, Lung Disease, Liver Disease', 'Omexie Gumba', '10:13:52 05-05-2023 '),
(5, 'Avio', '2020-02-02', 'male', 11, 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'sneezing', 'Vomiting, Itching,  General body aches', 'High Blood Pressure, Kidney Disease', 'chama', '19:52:31 07-05-2023 '),
(7, 'Mary Banda', '1999-04-07', 'female', 23, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, NULL, NULL, NULL, NULL),
(8, 'Maureen', '1998-03-12', 'female', 12, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, NULL, NULL, NULL, NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, 2147483647, 'Bangwe', 'Blantyre', 'Nyambadwe', 'Chibayo', 'Cough, Vomiting, Allergy', 'High Blood Pressure, Cancer', 'Charle Cee', '15:47:20 07-05-2023 '),
(11, 'Charle Cee Graphix', '1988-02-21', 'Female', 35, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, NULL, NULL, NULL, NULL),
(12, 'OMEXIE CHAMA', '1999-12-09', 'Female', 24, 2147483647, 'Phalombe', 'Muwake', 'Zomba', NULL, NULL, NULL, NULL, NULL),
(13, 'mary kama', '2023-05-08', 'Female', 0, 2147483647, 'muwake', 'Muwake', 'Zomba', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'matilda', 'Receptionist', 'c20ad4d76fe97759aa27a0c99bff6710'),
(7, 'ida', 'Clinician', 'c20ad4d76fe97759aa27a0c99bff6710');

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
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_name`);

--
-- Indexes for table `drug_price`
--
ALTER TABLE `drug_price`
  ADD PRIMARY KEY (`drug_name`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
