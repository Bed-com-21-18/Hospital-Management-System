-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 04:51 AM
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
(1, 4, 'Chikondi Malabada', 'uploads/x-ray.png', 'No comment', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `role` text DEFAULT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `prof`, `role`, `uname`, `email`, `pwd`, `code`, `expire`) VALUES
(9, 'Psychologists', NULL, 'jo viola', 'Avio@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 0),
(14, 'Physiotherapist', NULL, 'Omexie', 'Omexie@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 0),
(21, 'Cardiologist', NULL, 'charle-cee-programmer', 'chidulecharles1@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `antenatal`
--

CREATE TABLE `antenatal` (
  `full_name` text NOT NULL,
  `facility_name` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `last_menstrual_period` date NOT NULL,
  `expected_date_of_delivery` date NOT NULL,
  `visit_no` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `next_visit_date` date NOT NULL,
  `deliveries` varchar(100) NOT NULL,
  `c_section` varchar(100) NOT NULL,
  `abortions` varchar(100) NOT NULL,
  `stillbirths` varchar(100) NOT NULL,
  `vacuum_extraction` varchar(100) NOT NULL,
  `pre_eclampsia` varchar(100) NOT NULL,
  `asthma` varchar(100) NOT NULL,
  `hypertension` varchar(100) NOT NULL,
  `diabetes` varchar(100) NOT NULL,
  `epilepsy` varchar(100) NOT NULL,
  `renal_disease` varchar(100) NOT NULL,
  `fistula_repair` varchar(100) NOT NULL,
  `spine_deform` varchar(100) NOT NULL,
  `age_range` varchar(100) NOT NULL,
  `weight` int(100) NOT NULL,
  `blood_pressure` int(100) NOT NULL,
  `fetal_heart` varchar(100) NOT NULL,
  `gestation_age` varchar(100) NOT NULL,
  `lab` varchar(100) NOT NULL,
  `ttv_date` date DEFAULT NULL,
  `ttv_status` varchar(100) NOT NULL,
  `delivery_place` varchar(100) NOT NULL,
  `transportation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antenatal`
--

INSERT INTO `antenatal` (`full_name`, `facility_name`, `id`, `age`, `gender`, `last_menstrual_period`, `expected_date_of_delivery`, `visit_no`, `visit_date`, `next_visit_date`, `deliveries`, `c_section`, `abortions`, `stillbirths`, `vacuum_extraction`, `pre_eclampsia`, `asthma`, `hypertension`, `diabetes`, `epilepsy`, `renal_disease`, `fistula_repair`, `spine_deform`, `age_range`, `weight`, `blood_pressure`, `fetal_heart`, `gestation_age`, `lab`, `ttv_date`, `ttv_status`, `delivery_place`, `transportation`) VALUES
('Chiso Manda', 'General', 2, 23, NULL, '2023-02-06', '2023-10-06', 2, '2023-06-06', '2023-07-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', ''),
('Matha Zimba', 'General', 3, 25, NULL, '2023-04-06', '2024-02-06', 1, '2023-06-06', '2023-07-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', ''),
('Elia Chimodzi', 'General', 4, 32, NULL, '2023-06-07', '2023-12-29', 2, '2023-06-06', '2023-06-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', ''),
('Chiso Manda', 'General', 5, 24, 'female', '2023-04-09', '2024-03-09', 1, '2023-06-09', '2023-07-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', ''),
('Agatha', 'Songani', 6, 21, 'female', '2023-05-09', '2024-03-09', 1, '2023-06-09', '2023-07-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', ''),
('Agatha', 'Songani', 7, 21, 'female', '2023-05-09', '2024-03-09', 1, '2023-06-09', '2023-07-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', NULL, '', '', '');

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
(1, 1, 'Hannah Panatha', '2023-06-30', '04:44:00', 'Surgeon', 'Heart Surguery', 'Mana', '04:44:50 30-06-2023 ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE `counselling` (
  `id` int(11) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `statu` text NOT NULL,
  `dates` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `counsel` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counselling`
--

INSERT INTO `counselling` (`id`, `patient_id`, `patient_name`, `statu`, `dates`, `address`, `counsel`, `gender`) VALUES
(3, 18, 'Omexie Chama', 'Counselled', '2023-06-29', 'Zomba', 'Charplain', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `role` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `uname`, `prof`, `role`, `email`, `pwd`) VALUES
(5, 'omexie', 'Physiotherapist', 'Admin', NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(7, 'chama', 'Surgeon', 'Pharmacist', NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(9, 'jo viola', 'Radiologist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(10, 'Njotcha', 'Surgeon', 'Pharmacist', NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(11, 'charle-cee-graphix', 'Cardiologist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(12, 'Mana', 'Medical Lab Scientist', 'Doctor', 'omexiechama@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `drug_price1` int(11) NOT NULL,
  `drug_price2` text DEFAULT NULL,
  `quantity1` int(30) NOT NULL,
  `quantity2` int(30) NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`id`, `drug_name`, `drug_price1`, `drug_price2`, `quantity1`, `quantity2`, `status`) VALUES
(1, 'Vitamin C', 1327, '900', 20, 30, 'available'),
(2, 'Amoxycilin      ', 1773, '1000', 24, 36, 'available'),
(3, 'Panadol', 1882, '1000', 20, 30, 'available'),
(4, 'Aspirin ', 1091, '1300', 16, 34, 'not available'),
(6, 'Carbamazepine', 1814, '1330', 22, 28, 'available'),
(7, 'Fragel   ', 1793, '1020', 22, 36, 'available'),
(8, 'Buffen', 1522, '1000', 20, 32, 'available'),
(9, 'Doxcyclin', 1232, '1340', 22, 36, 'available'),
(11, 'Indosine', 1597, '1030', 20, 38, 'available'),
(12, 'Hedax', 1286, '899', 14, 30, 'available'),
(13, 'Oxygen', 1642, '12000', 22, 30, 'available'),
(14, 'Paracetamol ', 1350, '2000', 14, 30, 'available'),
(17, 'Parapain', 1827, '1000', 18, 36, 'available'),
(18, 'Penycilin', 1080, '970', 22, 30, 'available'),
(19, 'Penicilin', 1924, '1000', 16, 36, 'available'),
(20, 'Acetymethrin ', 2800, '2500', 16, 24, '0'),
(21, 'Tumbocid', 1115, '2000', 14, 34, 'available'),
(25, 'Bactrim', 1300, '1000', 20, 26, '0');

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
(23, '', 'Peter', 'Positive', 'zomba', 'Male', 'any', '2023-06-01'),
(24, '3', 'Mavuto Kambuwe', 'Positive', 'Zomba', 'Male', 'blood status', '2023-05-31');

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
(47, '', 'joe', 'Positive', '2023-05-23', 'On treatment'),
(48, '', 'joe', 'Negative', '2023-05-03', ''),
(49, '', 'Precious Mlimbika', 'Positive', '2023-05-24', 'On treatment'),
(50, '', 'Ruben Dias', 'Positive', '2023-05-26', 'On treatment'),
(51, '', 'Peter', 'Positive', '2023-06-01', 'On treatment'),
(52, '', 'Mavuto Kambuwe', 'Positive', '2023-05-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `hiv_treatment`
--

CREATE TABLE `hiv_treatment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` text DEFAULT NULL,
  `drug` text NOT NULL,
  `dates` date NOT NULL,
  `next_treat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiv_treatment`
--

INSERT INTO `hiv_treatment` (`id`, `patient_id`, `patient_name`, `weight`, `height`, `drug`, `dates`, `next_treat`) VALUES
(2, 0, 'Peter', '70', '1.7', '15PP', '2023-06-09', '2023-07-04'),
(3, 0, 'Ruben Dias', '60', '1.4', '13A', '2023-06-09', '2023-07-09');

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
(2, 'Parasitology', '15000.00'),
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
  `symptoms` text DEFAULT NULL,
  `treatment_plan` text DEFAULT NULL,
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

INSERT INTO `patient` (`id`, `name`, `date`, `gender`, `age`, `address`, `next_of_kin`, `religion`, `occupation`, `symptoms`, `treatment_plan`, `measurement`, `examination`, `disease`, `bio_history`, `drug`, `dosage`, `drug_given_by`, `discharge_status`, `drug_status`, `prescribed_by`, `prescribed_on`, `total_bills`, `status`, `tests`, `ward_bed`, `discharge_date`, `lab_results`, `lab_price`, `rad_price`) VALUES
(1, 'Hannah Panatha', '1995-06-30', 'Female', 28, 'Nadzombe, Phalombe', 'Novahiwa', 'Catholic', 'Banker', 'Skin rash:2 days', NULL, 'Blood pressure:39', 'pale:', NULL, 'Surgical history:heart surgery', '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Kervin Msimuko', '1987-06-30', 'Male', 36, 'Zomba', 'Chimwemwe', 'CCAP', 'Police', 'Cough:2 days ago', 'Surgery', 'Temperature:89', 'pale:', 'TB', 'Drug history:heart surgery', 'Aspirin ', '45', '', 'Discharged', '', NULL, '16:54:09 24-05-2023 ', 2300, 'Cleared', NULL, 'Surgical Ward', '2023-06-29', NULL, NULL, 10000),
(3, 'Mavuto Kambuwe', '1999-06-07', 'Male', 24, 'Zomba', 'Chimwemwe', 'CCAP', 'Not working', 'Itching:2 days', NULL, 'Respiratory rate:40', 'pale:', NULL, 'Social history:Achikuda', '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Chikondi Malabada', '1998-06-02', 'Male', 25, 'Zomba', 'Charle', 'SDA', 'teaccher', 'Shortness of breath:2 days', 'Drip', 'Respiratory rate:57', 'unconscious:', 'TB', 'Surgical history:heart surgery', 'Acetymethrin', 'Acetymethrin: 2  morning,afternoon and evening for 5 days', '', 'Discharged', '', 'matilda', '17:43:10 28-06-2023 ', 3000, 'not paid', 'Parasitology', 'Paediatrics Ward', '2023-06-09', NULL, NULL, 30000),
(5, 'Omexie Chama', '2000-06-08', 'Male', 23, 'Zomba', 'Charle', 'SDA', 'Guard', 'Fever:2 days ago,Shortness of breath:1 day ago', NULL, 'Blood pressure:89', 'alert:', 'Acute respiratory infection,Upper respiratory tract infection', 'Surgical history:heart surgery', 'Amoxycilin      ', '', '', NULL, '', NULL, '16:54:09 24-05-2023 ', 3000, 'not paid', 'Haematology', NULL, NULL, 'Malaria: Negative', 1000, NULL),
(6, 'Peter Makazi', '2023-06-29', 'Male', 40, 'Zomba', 'Mary', 'Catholic', 'Teacher', 'Cough:3 days ago,Headache:2 days ago', 'Drip', 'Temperature:37', 'alert:', 'Malaria,Upper respiratory tract infection', 'Drug history:heart surgery', 'Chloroquine', 'Chloroquine: 2 tablets morning and evening for 3 days', '', 'Discharged', '', 'matilda', '16:54:09 24-05-2023 ', 3000, 'not paid', 'Microbiology', 'Male Ward', '2023-06-29', 'Malaria: Positive', 1000, NULL),
(7, 'Faith Leman', '2002-06-08', 'Female', 21, 'Zomba', 'Kondwani', 'CCAP', 'Student', 'Fever:2 days ago,Headache:2 days ago', NULL, 'Blood pressure:89', 'alert:', 'Malaria,Upper respiratory tract infection', 'Drug history:heart surgery', 'Paracetamol', 'Paracetamol: 2 tablets morning and evening for 2 days', '', 'Discharged', '', 'matilda', '17:15:10 28-06-2023 ', 3000, 'not paid', 'Microbiology', 'Female Ward', '2023-06-09', 'Malaria: Positive', 1000, NULL),
(8, 'Mary Juma', '1990-06-12', 'Female', 31, 'Zomba', 'Chimwemwe', 'CCAP', 'Nurse', 'Cough:2 days', 'Surgery', 'Temperature:56', 'alert:', 'TB', 'Drug history:heart surgery', 'Aspirin ', '45', '', 'Discharged', '', NULL, '16:54:09 24-05-2023 ', 2300, 'Cleared', 'Serology', 'Surgical Ward', '2023-06-29', 'Blood Group A', 1500, 10000);

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
(1, 17, 'Jenifer Lopez', 'X-ray', 'chest pain', 'Scanned'),
(2, 18, 'Omexie Chama', 'X-ray', 'Scan for ribs', 'Scanned'),
(3, 18, 'Omexie Chama', 'X-ray', 'chest open fracture', 'Scanned'),
(4, 20, 'Steven Chungu', 'X-ray', 'Skull scanning', 'Scanned'),
(5, 22, 'Chikondi Malabada', 'X-ray', 'Need to check bone fracture', 'Scanned'),
(7, 26, 'Lordwell manondo', 'UltraSound Scanning', 'Skull', 'Scanned'),
(8, 4, 'Chikondi Malabada', 'Magnetic resonance imaging', 'Imaging', 'Scanned');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `prof` varchar(100) NOT NULL,
  `role` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `prof`, `role`, `email`, `pwd`) VALUES
(12, 'Mary Juma', 'Nurse', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(13, 'jo viola', 'Clinician', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(15, 'charle-cee', 'Receptionist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(16, 'matilda', 'Nurse', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(17, 'Memory Madeya', 'Receptionist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(18, 'Rushford Marcus', 'Medical Laboratory Scientist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(19, 'Yamikani Mount', 'Pharmacist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(20, 'Jimmy Madeya', 'Accountant', 'Admin', NULL, 'c20ad4d76fe97759aa27a0c99bff6710');

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
-- Indexes for table `antenatal`
--
ALTER TABLE `antenatal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `counselling`
--
ALTER TABLE `counselling`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `antenatal`
--
ALTER TABLE `antenatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counselling`
--
ALTER TABLE `counselling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hiv_test`
--
ALTER TABLE `hiv_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hiv_test_results`
--
ALTER TABLE `hiv_test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `hiv_treatment`
--
ALTER TABLE `hiv_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
