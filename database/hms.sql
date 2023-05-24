-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 05:38 PM
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
-- Table structure for table `add_radiology`
--

CREATE TABLE `add_radiology` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `dates` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_radiology`
--

INSERT INTO `add_radiology` (`id`, `patient_id`, `patient_name`, `photo`, `comments`, `dates`) VALUES
(8, 7, 'Mary Banda', 'uploads/img.jpg', 'hiiljhl', '2023-05-04'),
(9, 11, 'Charle Cee Graphix', 'uploads/images.png', 'piwoureiwe', '2023-05-17'),
(10, 11, 'Charle Cee Graphix', 'uploads/logo.jpg', 'piwoureiwe', '2023-05-17'),
(11, 15, 'Precious Mlimbika', 'uploads/2023y3.png', 'No comment', '2023-05-17'),
(12, 3, 'Gomboz Tech', 'uploads/Minica.png', 'Scanned and there results ', '2023-05-17'),
(13, 17, 'Jenifer Lopez', 'uploads/1665526186798.PNG', 'Her skin is good', '2023-05-17');

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
  `name` varchar(30) NOT NULL,
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

INSERT INTO `appointments` (`id`, `patient_id`, `name`, `date`, `time`, `professional`, `reason`, `booked_by`, `booked_at`, `status`) VALUES
(1, 3, 'Gomboz Tech', '2023-05-18', '10:59:00', 'Surgeon', 'Need Heartbreak surgery', 'Mary Juma', '11:00:16 18-05-2023 ', 'Prescribed by Charle Cee'),
(2, 12, 'OMEXIE CHAMA', '2023-05-18', '11:00:00', 'Surgeon', 'Nedds Head surgery', 'Mary Juma', '11:00:57 18-05-2023 ', 'Prescribed by Charle Cee'),
(3, 17, 'Jenifer Lopez', '2023-05-18', '17:50:00', 'Physiotherapist', 'gffffffffffffffffffffffffffffffffff', 'ida', '15:50:31 18-05-2023 ', 'Prescribed by Charle Cee'),
(4, 4, 'Edson Magombo', '2023-05-18', '15:50:00', 'Physiotherapist', 'kkkkkkkkkkkkkkkkkkkkkkkkk', 'ida', '15:51:01 18-05-2023 ', 'Prescribed by ');

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
(6, 'Charle Cee', 'Physiotherapist', '70965feb0441ff7fc1982fc5c509136e'),
(7, 'chama', 'Surgeon', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `drug_price2` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`id`, `drug_name`, `drug_price2`, `status`) VALUES
(1, 'Vitamin C', '900', 'available'),
(2, 'Amoxycilin      ', '1000', 'available'),
(3, 'Panadol', '1000', 'available'),
(4, 'Aspirin ', '1300', 'not available'),
(6, 'Carbamazepine', '1330', 'available'),
(7, 'Fragel   ', '1020', 'available'),
(8, 'Buffen', '1000', 'available'),
(9, 'Doxcyclin', '1340', 'available'),
(11, 'Indosine', '1030', 'available'),
(12, 'Hedax', '899', 'available'),
(13, 'Oxygen', '12000', 'available'),
(14, 'Paracetamol ', '2000', 'available'),
(17, 'Parapain', '1000', 'available'),
(18, 'Penycilin', '970', 'available'),
(19, 'Penicilin', '1000', 'available'),
(20, 'Acetymethrin', '2000', 'available'),
(21, 'Tumbocid', '2000', 'available');

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
  `drug` text NOT NULL,
  `dosage` text NOT NULL,
  `drug_given_by` text NOT NULL,
  `drug_status` text NOT NULL,
  `prescribed_by` text DEFAULT NULL,
  `prescribed_on` text DEFAULT NULL,
  `total_bills` int(15) DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'not paid',
  `tests` text DEFAULT NULL,
  `lab_results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `phoneNumber`, `district`, `village`, `residential`, `others`, `symptoms`, `history`, `drug`, `dosage`, `drug_given_by`, `drug_status`, `prescribed_by`, `prescribed_on`, `total_bills`, `status`, `tests`, `lab_results`) VALUES
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'poiuytrew', 'Shortness of breath, Loss of taste, Diarrhoea', 'Kidney Disease', '', '', '', '', 'chama', '16:24:35 08-05-2023 ', NULL, 'Paid not fully', 'Test for TB', NULL),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'rtkdjrsgeafken', 'Fatigue, Headache', 'Fatigue, Headache', ', Asprin, Parapain, Doxycyclin, Fragel', '1 morn afternoon and evening\r\n2 jfdkslfgh', 'Mary Juma', 'Medication Given', 'Mary Juma', '19:00:32 18-05-2023 ', 24447, 'paid fully', 'Test for Malaria and TB', NULL),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', 'lskdfj', 'Dizziness', 'Fever, Cough, Shortness of breath', '', 'Array', '', '', 'Charle Cee', '15:12:00 18-05-2023 ', 6407, 'not paid', 'Tets for HIV', NULL),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 997740566, 'Dowa', 'Mponela', 'Nason', 'palibe', 'Muscle aches, Loss of appetite, Loss of taste', 'Muscle aches, Loss of appetite, Loss of taste', 'Amoxycilin, Aspirin, Buffen, Oxygen, Paracetamol', 'wretjjhgfdsadsfghgjh\r\ndsfghjkhgfdsasdsfdgfh\r\nfdgfhgfgdsasdsfg', '', 'Medication Given', NULL, '17:12:50 24-05-2023 ', 18300, 'Paid Fully', 'Test for HIV', 'HIV NEGATIVE'),
(5, 'Avio', '2020-02-02', 'male', 11, 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'Malungo', 'Loss of appetite, Pink eye, Vomiting', 'Loss of appetite, Pink eye, Vomiting', '', '', '', '', 'Mary Juma', '12:49:47 18-05-2023 ', 3480, 'Paid Fully', 'Test for HIV', NULL),
(7, 'Mary Banda', '1999-04-07', 'female', 10, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Malungo', 'Shortness of breath, Loss of appetite', 'Asthma, Heart Disease, Kidney Disease, Thyroid Problems', '', '', '', '', 'Charle Cee', '00:48:42 16-05-2023 ', 3613, 'Paid Fully', 'Test for AIDS', 'Malaria Negative, HIV Negative, and TB Positive'),
(8, 'Maureen', '1998-03-12', 'female', 12, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Nausea, Vomiting', 'Nausea, Vomiting', 'Oxygen, Tumbocid, Aspirin', 'kdffjgnkavskjbdvnjvdjsbb,\r\nbzXVb zdgvabszc.\r\nhdsfbsjdkdhgsvjdl', '', '', 'ida', '16:55:48 24-05-2023 ', 16300, 'Paid Fully', 'Test for HIV and AIDS', NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, 2147483647, 'Bangwe', 'Blantyre', 'Nyambadwe', 'Chibayo', 'Fever, Cough, Shortness of breath, Fatigue, Headache, Chest Pain, Dizziness', 'Fever, Cough, Shortness of breath, Fatigue, Headache, Chest Pain, Dizziness', '', '', '', '', 'Mary Juma', '17:32:56 23-05-2023 ', 22147, 'not paid', 'Tets for Hiv', NULL),
(11, 'Charle Cee Graphix', '1988-02-21', 'Female', 35, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Fever, Cough, Shortness of breath, Headache', NULL, '', '', '', '', 'Charle Cee', '19:43:06 17-05-2023 ', 7147, 'not paid', 'HIV', NULL),
(12, 'OMEXIE CHAMA', '1999-12-09', 'Female', 24, 2147483647, 'Phalombe', 'Muwake', 'Zomba', 'MaLungo', 'Muscle aches, Loss of appetite', 'Loss of taste', 'Acetaminophen, Azithromycin, Bruffen, Carbamazepine, indosine and Parapain', '2 tablets per day', '', '', 'Mary Juma', '12:33:36 20-05-2023 ', 1000, 'not paid', 'Test for Malaria', 'Malaria negative results'),
(13, 'mary kama', '2023-05-08', 'Female', 12, 2147483647, 'muwake', 'Muwake', 'Zomba', NULL, 'General body aches, Skin rash, Allergy', 'Sore throat, Runny nose, Nausea, Vomiting', '', '', '', '', 'ida', '16:54:09 24-05-2023 ', 4676, 'not paid', 'Test for HIv', 'HIV negative results'),
(14, 'Gilson Chongo', '1990-05-14', 'Male', 33, 2147483647, 'Bangwe', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Cough, Fatigue, Sore throat, Runny nose, Vomiting, Diarrhoea', NULL, '', '', '', '', 'Mary Juma', '15:13:34 17-05-2023 ', 7007, 'Paid Fully', 'Test for Malaria', 'Malaria results- negative'),
(15, 'Precious Mlimbika', '1998-05-16', 'Male', 25, 996842414, 'Lilongwe', 'Govala', 'Kufumbi', 'b, Azithromycin, Intoxcyclin, Oxygen', 'Sore throat, Runny nose, Pink eye', NULL, '', '', '', '', 'Charle Cee', '18:03:46 16-05-2023 ', 5202, 'Paid Fully', 'Test for AIds', 'AIDS NEGATIVE'),
(16, 'Ruben Dias', '2000-05-16', 'Male', 23, 435678, 'sfdghj', 'sdfgfhj', 'fdgfhyu', NULL, 'Muscle aches, Loss of appetite, Loss of taste, Nausea, Vomiting, Diarrhoea, Itching', 'Muscle aches, Loss of appetite, Loss of taste, Nausea, Vomiting, Diarrhoea, Itching', 'acetaminophen, aspirin, bruffen, hedax, carbamazepine, doxycylin', '@ tablets per day', '', '', 'Mary Juma', '12:48:01 20-05-2023 ', 5853, 'Paid Fully', 'Test for AIDS', 'AIDS negative'),
(17, 'Jenifer Lopez', '1978-05-17', 'Female', 45, 34567890, 'Zambia', 'Zingwangwa', 'Zimbabwe', NULL, 'Muscle aches, Loss of appetite', 'Muscle aches, Loss of appetite', 'Aspirin, Panadol', 'dsdfghjk\r\nfdghjkl', '', '', 'ida', '17:26:32 24-05-2023 ', 3300, 'not paid', 'Test for AIDS', 'HIV and AIDS negative results');

-- --------------------------------------------------------

--
-- Table structure for table `radiology`
--

CREATE TABLE `radiology` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `scan` varchar(30) NOT NULL,
  `messages` varchar(333) NOT NULL,
  `statu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radiology`
--

INSERT INTO `radiology` (`id`, `patient_id`, `patient_name`, `scan`, `messages`, `statu`) VALUES
(11, 15, 'Precious Mlimbika', 'Chibayo', 'iuyutyrter', 'Scanned'),
(12, 8, 'Maureen', 'Stomach', 'sfghjfkl', ''),
(13, 3, 'Gomboz Tech', 'leg bone fracture', 'Has broken his leg', 'Scanned'),
(14, 17, 'Jenifer Lopez', 'Skin Breachableness', 'Test her skin', 'Scanned'),
(15, 17, 'Jenifer Lopez', 'Stomach', 'kjohigu', '');

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
(7, 'ida', 'Clinician', 'c20ad4d76fe97759aa27a0c99bff6710'),
(8, 'Charle Cee', 'Nurse', '70965feb0441ff7fc1982fc5c509136e'),
(11, 'Charle', 'Receptionist', 'c20ad4d76fe97759aa27a0c99bff6710'),
(12, 'Mary Juma', 'Nurse', 'c20ad4d76fe97759aa27a0c99bff6710');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_radiology`
--
ALTER TABLE `add_radiology`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiology`
--
ALTER TABLE `radiology`
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
-- AUTO_INCREMENT for table `add_radiology`
--
ALTER TABLE `add_radiology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `radiology`
--
ALTER TABLE `radiology`
  ADD CONSTRAINT `radiology_ibfk_1` FOREIGN KEY (`id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
