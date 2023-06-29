-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 05:12 PM
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
(10, 11, 'Charle Cee Graphix', 'uploads/logo.jpg', 'piwoureiwe', '2023-05-17'),
(11, 15, 'Precious Mlimbika', 'uploads/2023y3.png', 'No comment', '2023-05-17'),
(12, 3, 'Gomboz Tech', 'uploads/Minica.png', 'Scanned and there results ', '2023-05-17'),
(13, 17, 'Jenifer Lopez', 'uploads/1665526186798.PNG', 'Her skin is good', '2023-05-17'),
(14, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(15, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(16, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(17, 3, 'Gomboz Tech', 'uploads/Capture.PNG', 'no any damages', ''),
(19, 17, 'Jenifer Lopez', 'uploads/usecase.PNG', 'guyftiyf', ''),
(20, 17, 'Jenifer Lopez', 'uploads/usecase.PNG', 'hiuhi', '2023-06-01'),
(21, 18, 'Omexie Chama', 'uploads/macheda.jpg', 'Open frature on ribs ', '2023-06-08'),
(22, 18, 'Omexie Chama', 'uploads/CHamba explain2.jpg', 'Open frature on ribs ', '2023-06-06'),
(23, 22, 'Chikondi Malabada', 'uploads/', 'no any damages', '2023-06-09'),
(24, 22, 'Chikondi Malabada', 'uploads/', 'no any damages', '2023-06-09'),
(25, 20, 'Steven Chungu', 'uploads/Screenshot (9).png', 'no any damages', '2023-06-09'),
(26, 20, 'Steven Chungu', 'uploads/Screenshot (9).png', 'no any damages', '2023-06-09'),
(27, 26, 'Lordwell manondo', 'uploads/Screenshot (4).png', 'open fracture on the left eye', '2023-06-28');

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
(4, 4, 'Edson Magombo', '2023-05-18', '15:50:00', 'Physiotherapist', 'kkkkkkkkkkkkkkkkkkkkkkkkk', 'ida', '15:51:01 18-05-2023 ', 'Prescribed by '),
(5, 18, 'Omexie Chama', '2023-07-09', '08:53:00', 'Surgeon', 'need surgery', 'charle-cee-graphix', '08:53:26 10-06-2023 ', NULL),
(6, 18, 'Omexie Chama', '2023-07-09', '08:53:00', 'Surgeon', 'need surgery', 'charle-cee-graphix', '08:53:26 10-06-2023 ', NULL),
(7, 26, 'Lordwell manondo', '2023-06-28', '12:39:00', 'Surgeon', 'check up', 'matilda', '22:40:16 28-06-2023 ', NULL);

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
(3, 18, 'Omexie Chama', 'Counselled', '2023-06-09', 'Zomba', 'Charplain', 'Male');

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
(5, 'omexie', 'Physiotherapist', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'chama', 'Surgeon', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(9, 'jo viola', 'Radiologist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(10, 'Njotcha', 'Neurologist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(11, 'charle-cee-graphix', 'Cardiologist', NULL, NULL, 'c20ad4d76fe97759aa27a0c99bff6710'),
(12, 'Mana', 'Medical Lab Scientist', 'Doctor', 'omexiechama@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

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
(47, '', 'joe', 'Positive', '2023-05-23', 'On treatment'),
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
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, '888678728', 'Lilongwe', 'Kabudula', 'Chikanda', 'Fever:1 day ago', NULL, 'Temperature:67', 'unconscious:need serious attention', NULL, 'Family history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morn,Amoxycilin  2 morn    ', '', '', '', 'chama', '16:24:35 08-05-2023 ', 4000, 'Paid Fully', 'Test for TB', NULL, NULL, NULL, NULL, NULL),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, '996348737', 'Lilongwe', 'Kachoka', 'Matawale', 'Fatigue, Headache', NULL, NULL, NULL, NULL, NULL, ', Asprin, Parapain, Doxycyclin, Fragel', '1 morn afternoon and evening\r\n2 jfdkslfgh', 'Mary Juma', '', 'Medication Given', 'Mary Juma', '19:00:32 18-05-2023 ', 24447, 'paid fully', 'Test for Malaria and TB', NULL, NULL, NULL, NULL, NULL),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, '881955791', 'Dowa', 'Kachoka', 'Kalimbuka', 'Cough:2 days ago', NULL, 'Temperature:67', 'alert:Wakomoka', NULL, NULL, '', 'Array', '', '', '', 'Charle Cee', '15:12:00 18-05-2023 ', 6407, 'not paid', 'Tets for HIV', NULL, NULL, NULL, NULL, 30000),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, '997740566', 'Dowa', 'Mponela', 'Nason', 'Muscle aches, Loss of appetite, Loss of taste', NULL, NULL, NULL, NULL, NULL, 'Amoxycilin, Aspirin, Buffen, Oxygen, Paracetamol', 'wretjjhgfdsadsfghgjh\r\ndsfghjkhgfdsasdsfdgfh\r\nfdgfhgfgdsasdsfg', '', '', 'Medication Given', NULL, '17:12:50 24-05-2023 ', 18300, 'Paid Fully', 'Test for HIV', NULL, NULL, 'HIV NEGATIVE', NULL, NULL),
(5, 'Avio', '2020-02-02', 'male', 11, '2147483647', 'Phalombe', 'olala', 'Old Naisi', 'Fever:2 days ago,Cough:2 days ago', NULL, 'Pulse rate:65,Respiratory rate:2', 'pale:dfghkli', NULL, 'Family history:weewewweew', 'Acetymethrin,Aspirin ', 'Acetymethrin 2khgfgf,Aspirin 5fdgdf', '', '', '', NULL, '03:29:42 04-06-2023 ', 4300, 'Paid Fully', 'Test for HIV', NULL, NULL, NULL, NULL, NULL),
(7, 'Mary Banda', '1999-04-07', 'female', 10, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Shortness of breath:2 days ago', NULL, 'Temperature:68988', 'unconscious:adsryioo', NULL, 'Drug history:', '', '', '', '', '', 'Charle Cee', '00:48:42 16-05-2023 ', 3613, 'Paid Fully', 'Test for AIDS', NULL, NULL, 'Malaria Negative, HIV Negative, and TB Positive', NULL, NULL),
(8, 'Maureen', '1998-03-12', 'female', 12, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Nausea, Vomiting', NULL, NULL, NULL, NULL, NULL, 'Oxygen, Tumbocid, Aspirin', 'kdffjgnkavskjbdvnjvdjsbb,\r\nbzXVb zdgvabszc.\r\nhdsfbsjdkdhgsvjdl', '', '', '', 'ida', '16:55:48 24-05-2023 ', 16300, 'Paid Fully', 'Test for HIV and AIDS', NULL, NULL, NULL, NULL, NULL),
(9, 'Zione Muliya', '1933-12-12', 'female', 90, '2147483647', 'Bangwe', 'Blantyre', 'Nyambadwe', 'Cough', NULL, NULL, NULL, NULL, NULL, 'Buffen', '', '', '', '', 'ida', '15:27:15 02-06-2023 ', 2000, 'not paid', 'Tets for Hiv', NULL, NULL, NULL, NULL, NULL),
(11, 'Charle Cee Graphix', '1988-02-21', 'Female', 35, '882595892', 'Zomba', 'Chikanda', 'university of malawi, po box 280, zomba', 'Fever:2 days ago', NULL, 'Temperature:65', 'pale:need serious attention', 'Pneumia,TB,Pleural', 'Family history:heart surgery', 'Amoxycilin      ,Aspirin ', 'Amoxycilin      dsfghhgfdsa,Aspirin  2 per day   ', '', '', '', 'Charle Cee', '19:43:06 17-05-2023 ', 24800, 'not paid', 'Parasitology', NULL, NULL, 'Parasitology: Not Found', 1500, 20000),
(12, 'OMEXIE CHAMA', '1999-12-09', 'Female', 24, '2147483647', 'Phalombe', 'Muwake', 'Zomba', 'Fever:2 days ago,Cough:2 days ago', NULL, 'Temperature:6798999,Blood pressure:67', 'alert:yttttttt', 'Pneumia', 'Drug history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morning, afternoon and evening,Amoxycilin      dsfghhgfdsa', '', '', '', 'Mary Juma', '12:33:36 20-05-2023 ', 4000, 'not paid', 'Test for Malaria', NULL, NULL, 'Malaria negative results', NULL, NULL),
(13, 'mary kama', '2023-05-08', 'Female', 12, '2147483647', 'muwake', 'Muwake', 'Zomba', 'General body aches, Skin rash, Allergy', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'ida', '16:54:09 24-05-2023 ', 4676, 'not paid', 'Test for HIv', NULL, NULL, 'HIV negative results', NULL, NULL),
(14, 'Gilson Chongo', '1990-05-14', 'Male', 33, '2147483647', 'Bangwe', 'Chikanda', 'university of malawi, po box 280, zomba', 'Cough:2 days ago', NULL, 'Temperature:89', 'pale:Wakomoka', 'Pneumia,TB', 'Drug history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morn ,Amoxycilin      dsfghhgfdsa', '', '', '', 'Mary Juma', '15:13:34 17-05-2023 ', 4000, 'Paid Fully', NULL, NULL, NULL, 'Malaria results- negative', NULL, NULL),
(15, 'Precious Mlimbika', '1998-05-16', 'Male', 25, '996842414', 'Lilongwe', 'Govala', 'Kufumbi', 'Fever:2 days ago', NULL, 'Temperature:23', 'pale:need serious attention', 'Pneumia,Pleural', 'Family history:heart surgery', 'Acetymethrin,Amoxycilin      ', 'Acetymethrin 2 morning, afternoon and evening,Amoxycilin      dsfghhgfdsa', '', '', '', 'Charle Cee', '18:03:46 16-05-2023 ', 4000, 'Paid Fully', 'Test for AIds', NULL, NULL, 'AIDS NEGATIVE', NULL, NULL),
(16, 'Ruben Dias', '2000-05-16', 'Male', 23, '435678', 'sfdghj', 'sdfgfhj', 'fdgfhyu', 'Fever:2 days ago', NULL, 'Pulse rate:89', 'pale:need serious attention', NULL, 'Acetymethrin', 'Drug history:Achikuda', '', '', '', '', 'Mary Juma', '12:48:01 20-05-2023 ', 0, 'Paid Fully', 'Biochemistry', NULL, NULL, 'AIDS negative', NULL, NULL),
(17, 'Jenifer Lopez', '1978-05-17', 'Female', 45, '34567890', 'Zambia', 'Zingwangwa', 'Zimbabwe', 'Fever:2 days', NULL, 'Temperature:37', 'alert:', 'Pneumia,TB', 'Drug history:panado', 'Acetymethrin', 'Acetymethrin 2 morn ', '', '', '', 'ida', '23:34:02 01-06-2023 ', 4000, 'not paid', 'Haematology', NULL, NULL, 'Blood Test: Negative', 1000, NULL),
(18, 'Omexie Chama', '2000-06-08', 'Male', 23, 'Zomba', 'Charle', 'SDA', 'Guard', 'Fever:2 days ago,Shortness of breath:1 day ago', NULL, 'Blood pressure:89', 'alert:', 'Acute respiratory infection,Upper respiratory tract infection', 'Surgical history:heart surgery', 'Amoxycilin      ', '', '', NULL, '', NULL, NULL, 3000, 'not paid', 'Haematology', NULL, NULL, 'Malaria: Negative', 1000, NULL),
(19, 'Peter Makazi', '2023-06-07', 'Male', 0, 'Thyolo', 'Chimwemwe', 'CCAP', 'teaccher', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Steven Chungu', '1987-06-07', 'Female', 36, 'Zomba', 'Chimwemwe', 'CCAP', 'Police', 'Cough:2 days ago', 'Surgery', 'Temperature:89', 'pale:', 'TB', 'Drug history:heart surgery', 'Aspirin ', '45', '', NULL, '', NULL, NULL, 2300, 'Cleared', NULL, 'Surgical Ward', NULL, NULL, NULL, 10000),
(21, 'Mavuto Kambuwe', '1999-06-07', 'Male', 24, 'Zomba', 'Chimwemwe', 'CCAP', 'Not working', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Chikondi Malabada', '1998-06-02', 'Male', 25, 'Zomba', 'Charle', 'SDA', 'teaccher', 'Cough:2 days,Shortness of breath:2 days ago', 'Drip', 'Temperature:45', 'pale:', 'TB', 'Drug history:heart surgery', 'Acetymethrin', 'Acetymethrin: 2  morning,afternoon and evening for 5 days', '', 'Discharged', '', 'matilda', '17:43:10 28-06-2023 ', 3000, 'not paid', 'Parasitology', 'Paediatrics Ward', '2023-06-09', NULL, NULL, NULL),
(23, 'Hannah Panatha', '1995-06-30', 'Female', 28, 'Nadzombe, Phalombe', 'Novahiwa', 'Catholic', 'Banker', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Kervin Msimuko', '1987-06-30', 'Male', 36, 'Zomba', 'Chimwemwe', 'Catholic', 'Police', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, 'not paid', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Gomboz Tech', '2000-06-14', 'Male', 23, 'Zomba', 'Eddie', 'Catholic', 'Designer', 'Fever:2 days', NULL, 'Temperature:67', 'unconscious:', 'Pneumia', 'Surgical history:heart surgery', 'Acetymethrin', 'Acetymethrin:2', '', NULL, '', 'matilda', '20:40:32 28-06-2023 ', 3000, 'not paid', 'Microbiology', NULL, NULL, NULL, NULL, NULL),
(26, 'Lordwell manondo', '1993-06-28', 'Male', 30, 'Lilongwe', 'Mwananga', 'CCAP', 'teaccher', 'Shortness of breath:2 days', NULL, 'Temperature:23', 'unconscious:', 'Pneumia', 'Surgical history:heart surgery', 'Acetymethrin', 'Acetymethrin: 2  morning,afternoon and evening for 5 days', '', NULL, '', 'matilda', '12:12:16 29-06-2023 ', 23000, 'not paid', NULL, NULL, NULL, NULL, NULL, 20000);

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
(7, 26, 'Lordwell manondo', 'UltraSound Scanning', 'Skull', 'Scanned');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `radiology`
--
ALTER TABLE `radiology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
