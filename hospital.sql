-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 01:36 PM
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
-- Database: `hospital`
--

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
(10, 5, '2023-05-06', '10:48:00', 'Surgeon', 'hfhfmhfmff', 'Charle', '10:49:27 06-05-2023 ', 'Prescribed by Charle Cee');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `prof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `uname`, `pwd`, `prof`) VALUES
(1, 'Joe Viola', 'Malawi', 'Physiotherapist'),
(2, 'Omexie Gumba', 'Malawi', 'Neurologist'),
(3, 'Charle Cee', 'Malawi', 'Surgeon');

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
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 'chiso@gmail.com', 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'Malaria', 'Shortness of breath, Loss of taste, Itching, Pink eye', 'High Blood Pressure, Asthma, Liver Disease', 'Joe Viola', '10:43:07 06-05-2023 '),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 'edsonmagombo92@0gmail.com', 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'Chibayo', 'Diarrhoea, Itching, Chest Pain, Pink eye', 'Pregnancy, Asthma, Liver Disease', 'Charle Cee', '10:45:35 06-05-2023 '),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 'bed-com-33-18@unima.ac.mw', 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', NULL, NULL, NULL, 'Charle Cee', '01:59:18 05-05-2023 '),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 'edsonmagombo920@gmail.com', 997740566, 'Dowa', 'Mponela', 'Nason', 'Malungo', 'Cough, Muscle aches, Vomiting, Allergy', 'Diabetes, Lung Disease, Thyroid Problems', 'Omexie Gumba', '10:28:42 06-05-2023 '),
(5, 'Avio', '2020-02-02', 'male', 11, 'avio@gmail.com', 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'Malungo', 'Shortness of breath, Vomiting, Chest Pain', 'High Blood Pressure, Cancer, Thyroid Problems', 'Charle Cee', '10:51:56 06-05-2023 '),
(7, 'Charle Cee Graphix', '2023-05-05', 'male', 100, 'chidulecharles1@gmail.com', 882595892, 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Malaria', 'Fever, Loss of appetite, Vomiting, Diarrhoea', 'Diabetes, High Blood Pressure', 'Joe Viola', '19:51:08 05-05-2023 ');

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
(1, 'Charle', 'Cardiologist', 'Malawi'),
(2, 'Chanco', 'Orthopedist', 'Malawi'),
(3, 'Chance', 'Dermatologist', 'Malawi'),
(4, 'Chan', 'Neurologist', 'Malawi'),
(5, 'Chola', 'Surgeon', 'Malawi'),
(6, 'Peter', 'radiologist', 'Malawi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
