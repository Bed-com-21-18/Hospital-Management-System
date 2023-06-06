-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:11 PM
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
(13, 17, 'Jenifer Lopez', 'uploads/1665526186798.PNG', 'Her skin is good', '2023-05-17'),
(14, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(15, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(16, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(17, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', '');

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
(5, 'omexie', 'Physiotherapist', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Charle Cee', 'Physiotherapist', '70965feb0441ff7fc1982fc5c509136e'),
(7, 'chama', 'Surgeon', 'c20ad4d76fe97759aa27a0c99bff6710'),
(9, 'jo viola', 'Radiologist', 'c20ad4d76fe97759aa27a0c99bff6710');

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
-- Table structure for table `hiv_test`
--

CREATE TABLE `hiv_test` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `statu` varchar(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `descriptions` text NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiv_test`
--

INSERT INTO `hiv_test` (`id`, `patient_id`, `patient_name`, `statu`, `location`, `gender`, `descriptions`, `date`) VALUES
(18, '', 'joe', 'Positive', 'Mpomba', 'Male', 'jvjh', '2023-05-23'),
(19, '', 'joe', 'Negative', 'zomba', 'Male', 'k;jil;', '2023-05-03'),
(21, '16', 'Ruben Dias', 'Positive', 'fdgfhyu', 'Male', 'body pains', '2023-05-26'),
(22, '15', 'Precious Mlimbika', 'Positive', 'Kufumbi', 'Male', 'loss of appetite', '2023-05-24'),
(23, '', 'Peter', 'Positive', 'zomba', 'Male', 'any', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `hiv_test_results`
--

CREATE TABLE `hiv_test_results` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `statu` text NOT NULL,
  `dates` date NOT NULL,
  `treatment` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiv_test_results`
--

INSERT INTO `hiv_test_results` (`id`, `patient_id`, `patient_name`, `statu`, `dates`, `treatment`) VALUES
(47, '', 'joe', 'Positive', '2023-05-23', ''),
(48, '', 'joe', 'Negative', '2023-05-03', ''),
(49, '', 'Precious Mlimbika', 'Positive', '2023-05-24', 'On treatment'),
(50, '', 'Ruben Dias', 'Positive', '2023-05-26', 'On treatment'),
(51, '', 'Peter', 'Positive', '2023-06-01', 'On treatment');

-- --------------------------------------------------------

--
-- Table structure for table `hiv_treatment`
--

CREATE TABLE `hiv_treatment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `drug` text NOT NULL,
  `dates` date NOT NULL,
  `next_treat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiv_treatment`
--

INSERT INTO `hiv_treatment` (`id`, `patient_id`, `patient_name`, `weight`, `drug`, `dates`, `next_treat`) VALUES
(6, 14, 'Gilson Chongo', '55', '100 ARVs', '2023-05-29', '2023-12-02'),
(7, 0, 'Ruben Dias', '40', '100 ARVs', '2023-05-30', '2023-09-08'),
(8, 0, 'Precious Mlimbika', '40', '100 ARVs', '2023-05-30', '2023-08-25'),
(9, 0, 'joe', '60', '100 ARVs', '2023-05-24', '2023-06-30'),
(10, 0, 'Peter', '55', '100 ARVs', '2023-06-01', '2023-06-09'),
(11, 0, 'Peter', '40', '100 ARVs', '2023-06-09', '2023-06-10'),
(12, 0, 'Precious Mlimbika', '40', '100 ARVs', '2023-05-25', '2023-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `test_name`, `price`) VALUES
(1, 'Biochemistry', '1200.00'),
(2, 'Parasitology', '1500.00'),
(3, 'Serology', '1500.00'),
(4, 'Haematology', '1000.00'),
(5, 'Microbiology', '1300.00'),
(6, 'X-ray', '10000.00'),
(7, 'UltraSound Scanning', '20000.00'),
(8, 'Magnetic resonance imaging', '30000.00');

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
  `address` text NOT NULL,
  `next_of_kin` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `others` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `measurement` text DEFAULT NULL,
  `examination` text DEFAULT NULL,
  `disease` text DEFAULT NULL,
  `bio_history` text DEFAULT NULL,
  `drug` text NOT NULL,
  `dosage` text NOT NULL,
  `drug_given_by` text NOT NULL,
  `discharge_status` text DEFAULT NULL,
  `drug_status` text NOT NULL,
  `prescribed_by` text DEFAULT NULL,
  `prescribed_on` text DEFAULT NULL,
  `total_bills` int(15) DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'not paid',
  `tests` text DEFAULT NULL,
  `ward_bed` text DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `lab_results` text DEFAULT NULL,
  `lab_price` int(30) DEFAULT NULL,
  `rad_price` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `address`, `next_of_kin`, `religion`, `occupation`, `others`, `symptoms`, `measurement`, `examination`, `disease`, `bio_history`, `drug`, `dosage`, `drug_given_by`, `discharge_status`, `drug_status`, `prescribed_by`, `prescribed_on`, `total_bills`, `status`, `tests`, `ward_bed`, `discharge_date`, `lab_results`, `lab_price`, `rad_price`) VALUES
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, '888678728', 'Lilongwe', 'Kabudula', 'Chikanda', 'poiuytrew', 'Fever:1 day ago', 'Temperature:67', 'unconscious:need serious attention', NULL, 'Family history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morn,Amoxycilin  2 morn    ', '', '', '', 'chama', '16:24:35 08-05-2023 ', 4000, 'Paid Fully', 'Test for TB', NULL, NULL, NULL, NULL, NULL),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, '996348737', 'Lilongwe', 'Kachoka', 'Matawale', 'rtkdjrsgeafken', 'Fatigue, Headache', NULL, NULL, NULL, NULL, ', Asprin, Parapain, Doxycyclin, Fragel', '1 morn afternoon and evening\r\n2 jfdkslfgh', 'Mary Juma', '', 'Medication Given', 'Mary Juma', '19:00:32 18-05-2023 ', 24447, 'paid fully', 'Test for Malaria and TB', NULL, NULL, NULL, NULL, NULL),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, '881955791', 'Dowa', 'Kachoka', 'Kalimbuka', 'lskdfj', 'Cough:2 days ago', 'Temperature:67', 'alert:Wakomoka', NULL, NULL, '', 'Array', '', '', '', 'Charle Cee', '15:12:00 18-05-2023 ', 6407, 'not paid', 'Tets for HIV', NULL, NULL, NULL, NULL, 30000),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, '997740566', 'Dowa', 'Mponela', 'Nason', 'palibe', 'Muscle aches, Loss of appetite, Loss of taste', NULL, NULL, NULL, NULL, 'Amoxycilin, Aspirin, Buffen, Oxygen, Paracetamol', 'wretjjhgfdsadsfghgjh\r\ndsfghjkhgfdsasdsfdgfh\r\nfdgfhgfgdsasdsfg', '', '', 'Medication Given', NULL, '17:12:50 24-05-2023 ', 18300, 'Paid Fully', 'Test for HIV', NULL, NULL, 'HIV NEGATIVE', NULL, NULL),
(5, 'Avio', '2020-02-02', 'male', 11, '2147483647', 'Phalombe', 'olala', 'Old Naisi', 'Malungo', 'Fever:2 days ago,Cough:2 days ago', 'Pulse rate:65,Respiratory rate:2', 'pale:dfghkli', NULL, 'Family history:weewewweew', 'Acetymethrin,Aspirin ', 'Acetymethrin 2khgfgf,Aspirin 5fdgdf', '', '', '', NULL, '03:29:42 04-06-2023 ', 4300, 'Paid Fully', 'Test for HIV', NULL, NULL, NULL, NULL, NULL),
(7, 'Mary Banda', '1999-04-07', 'female', 10, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Malungo', 'Shortness of breath:2 days ago', 'Temperature:68988', 'unconscious:adsryioo', NULL, 'Drug history:', '', '', '', '', '', 'Charle Cee', '00:48:42 16-05-2023 ', 3613, 'Paid Fully', 'Test for AIDS', NULL, NULL, 'Malaria Negative, HIV Negative, and TB Positive', NULL, NULL),
(8, 'Maureen', '1998-03-12', 'female', 12, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Nausea, Vomiting', NULL, NULL, NULL, NULL, 'Oxygen, Tumbocid, Aspirin', 'kdffjgnkavskjbdvnjvdjsbb,\r\nbzXVb zdgvabszc.\r\nhdsfbsjdkdhgsvjdl', '', '', '', 'ida', '16:55:48 24-05-2023 ', 16300, 'Paid Fully', 'Test for HIV and AIDS', NULL, NULL, NULL, NULL, NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, '2147483647', 'Bangwe', 'Blantyre', 'Nyambadwe', 'Chibayo', 'Cough', NULL, NULL, NULL, NULL, 'Buffen', '', '', '', '', 'ida', '15:27:15 02-06-2023 ', 2000, 'not paid', 'Tets for Hiv', NULL, NULL, NULL, NULL, NULL),
(11, 'Charle Cee Graphix', '1988-02-21', 'Female', 35, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Fever:2 days ago', 'Temperature:65', 'pale:need serious attention', 'Pneumia,TB,Pleural', 'Family history:heart surgery', 'Amoxycilin      ,Aspirin ', 'Amoxycilin      dsfghhgfdsa,Aspirin  2 per day   ', '', '', '', 'Charle Cee', '19:43:06 17-05-2023 ', 24800, 'not paid', 'Parasitology', NULL, NULL, 'Parasitology: Not Found', 1500, 20000),
(12, 'OMEXIE CHAMA', '1999-12-09', 'Female', 24, '2147483647', 'Phalombe', 'Muwake', 'Zomba', 'MaLungo', 'Fever:2 days ago,Cough:2 days ago', 'Temperature:6798999,Blood pressure:67', 'alert:yttttttt', 'Pneumia', 'Drug history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morning, afternoon and evening,Amoxycilin      dsfghhgfdsa', '', '', '', 'Mary Juma', '12:33:36 20-05-2023 ', 4000, 'not paid', 'Test for Malaria', NULL, NULL, 'Malaria negative results', NULL, NULL),
(13, 'mary kama', '2023-05-08', 'Female', 12, '2147483647', 'muwake', 'Muwake', 'Zomba', NULL, 'General body aches, Skin rash, Allergy', NULL, NULL, NULL, NULL, '', '', '', '', '', 'ida', '16:54:09 24-05-2023 ', 4676, 'not paid', 'Test for HIv', NULL, NULL, 'HIV negative results', NULL, NULL),
(14, 'Gilson Chongo', '1990-05-14', 'Male', 33, '2147483647', 'Bangwe', 'Chikanda', 'university of malawi, po box 280, zomba', NULL, 'Cough:2 days ago', 'Temperature:89', 'pale:Wakomoka', 'Pneumia,TB', 'Drug history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morn ,Amoxycilin      dsfghhgfdsa', '', '', '', 'Mary Juma', '15:13:34 17-05-2023 ', 4000, 'Paid Fully', NULL, NULL, NULL, 'Malaria results- negative', NULL, NULL),
(15, 'Precious Mlimbika', '1998-05-16', 'Male', 25, '996842414', 'Lilongwe', 'Govala', 'Kufumbi', 'b, Azithromycin, Intoxcyclin, Oxygen', 'Fever:2 days ago', 'Temperature:23', 'pale:need serious attention', 'Pneumia,Pleural', 'Family history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morning, afternoon and evening,Amoxycilin      dsfghhgfdsa', '', '', '', 'Charle Cee', '18:03:46 16-05-2023 ', 4000, 'Paid Fully', 'Test for AIds', NULL, NULL, 'AIDS NEGATIVE', NULL, NULL),
(16, 'Ruben Dias', '2000-05-16', 'Male', 23, '435678', 'sfdghj', 'sdfgfhj', 'fdgfhyu', NULL, 'Fever:2 days ago', 'Pulse rate:89', 'pale:need serious attention', NULL, 'Acetymethrin', 'Drug history:Achikuda', '', '', '', '', 'Mary Juma', '12:48:01 20-05-2023 ', 0, 'Paid Fully', 'Biochemistry', NULL, NULL, 'AIDS negative', NULL, NULL),
(17, 'Jenifer Lopez', '1978-05-17', 'Female', 45, '34567890', 'Zambia', 'Zingwangwa', 'Zimbabwe', NULL, 'Shortness of breath:', 'Pulse rate:', 'pale:', 'Pneumia,TB', 'Social history:', 'Acetymethrin', 'Acetymethrin 2 morn ', '', '', '', 'ida', '23:34:02 01-06-2023 ', 4000, 'not paid', 'Haematology', NULL, NULL, 'Blood Test: Negative', 1000, NULL),
(18, 'Omexie Chama', '2000-06-08', 'Male', 23, 'Zomba', 'Charle', 'SDA', 'Guard', NULL, 'Cough:', 'Temperature:', 'alert:', 'TB', 'Drug history:', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morn ,Acetymethrin 2 morn ', '', NULL, '', NULL, NULL, 4000, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL);

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
(13, 3, 'Gomboz Tech', 'leg bone fracture', 'Has broken his leg', ''),
(14, 17, 'Jenifer Lopez', 'Skin Breachableness', 'Test her skin', 'Scanned'),
(15, 17, 'Jenifer Lopez', 'Stomach', 'kjohigu', ''),
(16, 3, 'Gomboz Tech', 'Magnetic resonance imaging', '', ''),
(17, 11, 'Charle Cee Graphix', 'UltraSound Scanning', '', '');

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
(12, 'Mary Juma', 'Nurse', 'c20ad4d76fe97759aa27a0c99bff6710'),
(13, 'jo viola', 'Clinician', 'c20ad4d76fe97759aa27a0c99bff6710');

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
-- Indexes for table `hiv_test`
--
ALTER TABLE `hiv_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiv_test_results`
--
ALTER TABLE `hiv_test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiv_treatment`
--
ALTER TABLE `hiv_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hiv_test`
--
ALTER TABLE `hiv_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hiv_test_results`
--
ALTER TABLE `hiv_test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hiv_treatment`
--
ALTER TABLE `hiv_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
