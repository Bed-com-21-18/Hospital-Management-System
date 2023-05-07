-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 09:01 AM
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
(14, 'Physiotherapist', 'Omexie', 'Omexie@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '', 0);

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
(4, 'joe viola', 'radiologist', 'c20ad4d76fe97759aa27a0c99bff6710'),
(5, 'jekapu', 'Physiotherapist', '81dc9bdb52d04dc20036dbd8313ed055'),
(0, 'omexie', 'Surgon', 'c20ad4d76fe97759aa27a0c99bff6710');

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
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `mrp` int(100) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `expiry_date` date NOT NULL,
  `added_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_image`, `brand_id`, `category_id`, `quantity`, `price`, `mrp`, `batch_no`, `expiry_date`, `added_date`, `active`, `status`) VALUES
(1, 'Aspirin', 'medicine1.jpg', 1, 1, '100', '5', 10, '307002', '2023-02-28', '2023-02-28', 1, 1),
(2, 'Paracetamol', 'medicine2.jpg', 2, 1, '50', '3', 5, '307003', '2023-02-16', '2023-02-28', 1, 1),
(3, 'Amoxicillin', 'medicine3.jpg', 3, 3, '20', '10', 15, '307004', '2023-03-13', '2023-02-28', 1, 1),
(4, 'Ibuprofen', 'medicine4.jpg', 4, 1, '200', '7', 12, '307005', '2023-05-31', '2023-04-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_brands`
--

CREATE TABLE `medicine_brands` (
  ` brand_id` int(11) NOT NULL,
  ` brand_name` varchar(255) NOT NULL,
  ` brand_active` tinyint(1) NOT NULL DEFAULT 0,
  ` brand_status` enum('active','inactive') NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_brands`
--

INSERT INTO `medicine_brands` (` brand_id`, ` brand_name`, ` brand_active`, ` brand_status`) VALUES
(1, 'Cipla', 1, 'active'),
(2, 'Central Medical Stores', 1, 'active'),
(3, 'Sun Pharma', 1, 'active'),
(4, 'Micro Labs', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_categories`
--

CREATE TABLE `medicine_categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` tinyint(1) NOT NULL DEFAULT 0,
  `categories_status` enum('active','inactive') NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_categories`
--

INSERT INTO `medicine_categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Tablets', 1, 'active'),
(2, 'Syrup', 1, 'active'),
(3, 'Skin Liquid', 1, 'active'),
(4, 'Pain Killer', 1, 'active');

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
(1, 'Chiso Bwanali', '2458-09-09', 'female', 20, 'chiso@gmail.com', 888678728, 'Lilongwe', 'Kabudula', 'Chikanda', 'Malungo', 'Fever, Muscle aches', 'Diabetes', 'omexie', '12:20:41 05-05-2023 '),
(2, 'Chiso Bwanali', '1100-09-02', 'female', 17, 'edsonmagombo92@0gmail.com', 996348737, 'Lilongwe', 'Kachoka', 'Matawale', 'Malaria', 'Fever, Muscle aches', 'Diabetes', 'omexie', '12:22:19 05-05-2023 '),
(3, 'Gomboz Tech', '2020-02-02', 'male', 54, 'bed-com-33-18@unima.ac.mw', 881955791, 'Dowa', 'Kachoka', 'Kalimbuka', NULL, NULL, NULL, 'Charle Cee', '01:59:18 05-05-2023 '),
(4, 'Edson Magombo', '2020-08-09', 'male', 19, 'edsonmagombo920@gmail.com', 997740566, 'Dowa', 'Mponela', 'Nason', 'palibe', 'Fever, Shortness of breath, Muscle aches, Nausea, Dizziness', 'High Blood Pressure, Heart Disease, Lung Disease, Liver Disease', 'Omexie Gumba', '10:13:52 05-05-2023 '),
(5, 'Avio', '2020-02-02', 'male', 11, 'avio@gmail.com', 2147483647, 'Phalombe', 'olala', 'Old Naisi', 'zotupa', 'Shortness of breath', 'Cancer, Kidney Disease, Autoimmune Disease', 'omexie', '12:36:31 05-05-2023 ');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `occupation`, `mobile`, `address`) VALUES
(1, 'OMEXIE CHAMA', 5, 'Male', 'teaccher', 2147483647, 'Zomba'),
(2, 'OMEXIE CHAMA', 8, 'Female', 'Guard', 2147483647, 'Zomba'),
(3, 'MAGOBO', 8, 'Female', 'Guard', 2147483647, 'Zomba');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `instructions` varchar(50) NOT NULL,
  `doc_name` varchar(20) NOT NULL
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
(2, 'Avio', 'Physiotherapist', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'Peter', 'radiologist', 'c4ca4238a0b923820dcc509a6f75849b'),
(0, 'chidule', 'Nurse', 'c20ad4d76fe97759aa27a0c99bff6710');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
