-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 10:30 AM
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
(1, 4, 'Edson Magombo', '2023-05-17', '18:57:00', 'Dermatologist', 'Need', 'Mary Juma', '19:08:34 17-05-2023 ', NULL),
(2, 16, 'Ruben Dias', '2023-05-17', '19:19:00', 'Physiotherapist', 'Need Physical checkup', 'Mary Juma', '19:20:18 17-05-2023 ', NULL),
(3, 16, 'Ruben Dias', '2023-05-17', '19:22:00', 'Orthopedic', 'wathyoka Mwendo', 'Mary Juma', '19:22:50 17-05-2023 ', NULL),
(4, 11, 'Charle Cee Graphix', '2023-05-17', '19:26:00', 'Surgeon', 'Broken Leg', 'Charle Cee', '19:27:04 17-05-2023 ', 'Prescribed by Charle Cee'),
(8, 11, 'Charle Cee Graphix', '2023-05-17', '19:41:00', 'Gastroenterologist', 'Need another Doctor', 'Charle Cee', '19:42:08 17-05-2023 ', NULL),
(9, 17, 'Jenifer Lopez', '2023-05-17', '19:50:00', 'Surgeon', 'Needs Plastic Surgery', 'ida', '19:50:51 17-05-2023 ', NULL);

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
(7, 'chama', 'Surgeon', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_name` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `drug_price` int(11) NOT NULL,
  `drug_price2` text DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `dosage2` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_name`, `symptoms`, `drug_price`, `drug_price2`, `dosage`, `dosage2`, `status`) VALUES
('Acetaminophen', 'Fever', 887, '880', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Aspirin', 'Fever', 203, '1047', '2 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Azithromycin', 'Cough, Shortness of breath', 957, '1092', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Bruffen', 'Sneezing, Yelling', 700, '1100', '2 morning, afternoon and evening', '1 morning, afternoon and evening', 'not available'),
('Buffen', 'Sneezing, Yelling', 300, '823', '2 morning, afternoon and evening', '1 morning, afternoon and evening', 'not available'),
('buprofen', 'Fever', 297, '1339', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Carbamazepine', 'sore throat, skin rashes', 865, '726', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Cetirizine', 'Runny nose, Itching, Skin-rash', 633, '1114', '2 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Dextromethorphan', 'Cough', 468, '893', '2 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Diphenhydramine', 'Pink eye', 345, '623', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Doxcyclin', 'Loss of Appetite Dizziness', 220, '939', '1 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Fragel', 'Sneezing, Yelling, Tiredness', 800, '1300', '1 morning, afternoon and evening', '2 morning, afternoon and evening', 'Click to select'),
('Hedax', 'Sneezing, Yelling', 700, '1100', '1/2 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Ibuprofen', 'Fever, Headache, Muscle aches', 740, '1023', '2 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Indosine', 'Diarrhoea, Allergy', 998, '720', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Intoxcyclin', 'Fatigue, General Body aches,', 870, '1033', '2 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Loperamide', 'Diarrhoea', 354, '503', '2 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Ondansetron', 'Nausea, Vomiting', 862, '918', '1 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Oxygen', 'Shortness of breath', 447, '582', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Paracetamol', 'Fever', 451, '656', '2 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available'),
('Parapain', 'Itching', 500, '1000', '1 morning, afternoon and evening', '2 morning, afternoon and evening', 'available'),
('Parapano', 'Dozing', 600, '700', '1 morning, afternoon and evening', '1 morning, afternoon and evening', 'available'),
('Poaxcyclin', 'Loss of Smell, Allergy', 814, '1036', '2 morning, afternoon and evening', '1/2 morning, afternoon and evening', 'available');

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
('Hedax', '789.00'),
('Oxygen', '9999.00'),
('Panadol', '5002.00'),
('Poaxcyclin', '500.00');

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
  `prescribed_on` text DEFAULT NULL,
  `total_bills` int(15) DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'not paid',
  `tests` text DEFAULT NULL,
  `lab_results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `phoneNumber`, `district`, `village`, `residential`, `others`, `symptoms`, `history`, `prescribed_by`, `prescribed_on`, `total_bills`, `status`, `tests`, `lab_results`) VALUES
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'poiuytrew', 'Shortness of breath, Loss of taste, Diarrhoea', 'Kidney Disease', 'chama', '16:24:35 08-05-2023 ', NULL, 'not paid', 'Test for TB', NULL),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'rtkdjrsgeafken', 'Shortness of breath, Loss of appetite, Allergy', 'High Blood Pressure, Cancer', 'Charle Cee', '10:42:47 10-05-2023 ', 4436, 'Paid Fully', 'Test for Malaria and TB', NULL),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', 'lskdfj', 'Cough, Loss of appetite', 'High Blood Pressure', 'Charle Cee', '00:49:59 16-05-2023 ', 2645, 'not paid', 'Tets for HIV', NULL),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 997740566, 'Dowa', 'Mponela', 'Nason', 'palibe', 'Shortness of breath, Headache, Muscle aches, Sore throat, Runny nose, Vomiting, Diarrhoea, Skin rash, Allergy', 'Asthma, Liver Disease, Autoimmune Disease', 'Charle Cee', '14:57:07 17-05-2023 ', 1801, 'Paid Fully', 'Test for Hiv', NULL),
(5, 'Avio', '2020-02-02', 'male', 11, 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'Malungo', 'Cough, Shortness of breath, Fatigue, Headache, Loss of taste, Sore throat, Runny nose, Itching, Skin rash', 'Diabetes, Thyroid Problems', 'Mary Juma', '15:14:27 17-05-2023 ', 11395, 'Paid Fully', 'Test for HIV', NULL),
(7, 'Mary Banda', '1999-04-07', 'female', 10, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Malungo', 'Shortness of breath, Loss of appetite', 'Asthma, Heart Disease, Kidney Disease, Thyroid Problems', 'Charle Cee', '00:48:42 16-05-2023 ', 3613, 'Paid Fully', 'Test for AIDS', 'Malaria Negative, HIV Negative, and TB Positive'),
(8, 'Maureen', '1998-03-12', 'female', 12, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Chest Pain, Pink eye, Nausea', NULL, 'Charle Cee', '11:23:51 17-05-2023 ', 2541, 'not paid', 'Test for HIV and AIDS', NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, 2147483647, 'Bangwe', 'Blantyre', 'Nyambadwe', 'Chibayo', 'Shortness of breath, Loss of appetite, Sore throat', 'Shortness of breath, Loss of appetite, Sore throat', 'Mary Juma', '10:26:34 18-05-2023 ', 3489, 'not paid', 'Tets for Hiv', NULL),
(11, 'Charle Cee Graphix', '1988-02-21', 'Female', 35, 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Fever, Cough, Shortness of breath, Headache', NULL, 'Charle Cee', '19:43:06 17-05-2023 ', 7147, 'not paid', 'HIV', NULL),
(12, 'OMEXIE CHAMA', '1999-12-09', 'Female', 24, 2147483647, 'Phalombe', 'Muwake', 'Zomba', NULL, 'Cough, Shortness of breath, Fatigue', NULL, 'Charle Cee', '15:18:23 17-05-2023 ', 4699, 'not paid', 'Test for Malaria', 'Malaria negative results'),
(13, 'mary kama', '2023-05-08', 'Female', 12, 2147483647, 'muwake', 'Muwake', 'Zomba', NULL, 'Sore throat, Runny nose, Nausea, Vomiting', 'Sore throat, Runny nose, Nausea, Vomiting', 'Mary Juma', '10:27:32 18-05-2023 ', 4676, 'not paid', 'Test for HIv', 'HIV negative results'),
(14, 'Gilson Chongo', '1990-05-14', 'Male', 33, 2147483647, 'Bangwe', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Cough, Fatigue, Sore throat, Runny nose, Vomiting, Diarrhoea', NULL, 'Mary Juma', '15:13:34 17-05-2023 ', 7007, 'Paid Fully', 'Test for Malaria', 'Malaria results- negative'),
(15, 'Precious Mlimbika', '1998-05-16', 'Male', 25, 996842414, 'Lilongwe', 'Govala', 'Kufumbi', 'b, Azithromycin, Intoxcyclin, Oxygen', 'Sore throat, Runny nose, Pink eye', NULL, 'Charle Cee', '18:03:46 16-05-2023 ', 5202, 'Paid Fully', 'Test for AIds', 'AIDS NEGATIVE'),
(16, 'Ruben Dias', '2000-05-16', 'Male', 23, 435678, 'sfdghj', 'sdfgfhj', 'fdgfhyu', NULL, 'Loss of taste, Sore throat, Nausea, Vomiting, Diarrhoea, Itching', 'Loss of taste, Sore throat, Nausea, Vomiting, Diarrhoea, Itching', 'Mary Juma', '20:49:19 17-05-2023 ', 6074, 'Paid Fully', 'Test for AIDS', 'AIDS negative'),
(17, 'Jenifer Lopez', '1978-05-17', 'Female', 45, 34567890, 'Zambia', 'Zingwangwa', 'Zimbabwe', NULL, 'Fatigue, Headache, Dizziness', 'Fatigue, Headache, Dizziness', 'Charle Cee', '21:03:40 17-05-2023 ', 2830, 'not paid', 'Test for AIDS', 'HIV and AIDS negative results');

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
-- Indexes for table `radiology`
--
ALTER TABLE `radiology`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
