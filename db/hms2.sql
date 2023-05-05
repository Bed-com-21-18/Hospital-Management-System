-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 01:35 AM
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
-- Table structure for table `hospital_orders`
--

CREATE TABLE `hospital_orders` (
  `id` int(15) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `patient_name` text NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `patient_contact` int(15) NOT NULL,
  `patient_address` varchar(30) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  `grand_total` int(100) NOT NULL,
  `gst_number` int(100) NOT NULL,
  `paid_amount` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `payment_type` int(15) NOT NULL,
  `payment_status` int(15) NOT NULL,
  `payment_place` int(5) NOT NULL,
  `delete_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_orders`
--

INSERT INTO `hospital_orders` (`id`, `order_number`, `order_date`, `patient_name`, `doctor_name`, `patient_contact`, `patient_address`, `subtotal`, `total_amount`, `discount`, `grand_total`, `gst_number`, `paid_amount`, `due_amount`, `payment_type`, `payment_status`, `payment_place`, `delete_status`) VALUES
(1, 'INV-0001', '2023-02-28', 'Steve Kadama', '', 2147483647, '', 100, 10, 108, 49, 0, 49, 49, 2, 1, 0, 0),
(2, 'INV-0002', '2023-03-24', 'Aisha Joshua', '', 2147483647, '', 300, 0, 354, 0, 0, 354, 354, 3, 3, 1, 0),
(3, 'INV-0003', '2023-04-15', 'Gan Nkkwapatila', '', 2147483647, '', 860, 1015, 10, 1005, 155, 500, 505, 2, 2, 1, 0),
(4, 'INV-0004', '2023-04-15', 'Mary namagale', '', 2147483647, '', 60, 71, 0, 71, 11, 50, 21, 5, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_order_item`
--

CREATE TABLE `hospital_order_item` (
  `id` int(15) NOT NULL,
  `productName` int(100) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `lastid` int(50) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_order_item`
--

INSERT INTO `hospital_order_item` (`id`, `productName`, `quantity`, `rate`, `total`, `lastid`, `added_date`) VALUES
(5, 2, '1', '100', '100.00', 1, '0000-00-00'),
(6, 2, '2', '150', '300.00', 2, '0000-00-00'),
(7, 1, '2', '30', '60.00', 3, '2023-04-15'),
(8, 2, '4', '150', '600.00', 3, '2023-04-15'),
(9, 3, '1', '200', '200.00', 3, '2023-04-15'),
(10, 1, '2', '30', '60.00', 4, '2023-04-15');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '88a49c3695747772777310af4038d420', 'omexiechama@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine_brands`
--
ALTER TABLE `medicine_brands`
  ADD PRIMARY KEY (` brand_id`);

--
-- Indexes for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine_brands`
--
ALTER TABLE `medicine_brands`
  MODIFY ` brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
