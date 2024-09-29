-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2024 at 06:42 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkitymxy_medaprove`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE `allergies` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `warning` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`id`, `datetime`, `user_type`, `user_name`, `name`, `warning`) VALUES
(1, '2024-03-22 00:50:14', 'rnd_head', 'RnD Head', 'Allergy 1', 'Warning 1'),
(2, '2024-03-22 00:50:23', 'rnd_head', 'RnD Head', 'Allergy 2', 'Warning 2'),
(3, '2024-03-22 00:50:33', 'rnd_head', 'RnD Head', 'Allergy 3', 'Warning 3'),
(4, '2024-03-22 00:50:47', 'rnd_head', 'RnD Head', 'Allergy 4', 'Warning 4');

-- --------------------------------------------------------

--
-- Table structure for table `fc`
--

CREATE TABLE `fc` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `fr_id` text DEFAULT NULL,
  `psf_id` text DEFAULT NULL,
  `sample_value` text DEFAULT NULL,
  `sample_cost` text DEFAULT NULL,
  `value_for_cost` text DEFAULT NULL,
  `cost_for_value` text DEFAULT NULL,
  `ph` text DEFAULT NULL,
  `vescosity` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `finance_approve` text DEFAULT 'Pending',
  `finance_remark` text DEFAULT NULL,
  `marketing_approve` text NOT NULL DEFAULT 'Pending',
  `marketing_remark` text DEFAULT NULL,
  `rnd_approve` text NOT NULL DEFAULT 'Pending',
  `rnd_remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fc`
--

INSERT INTO `fc` (`id`, `datetime`, `user_type`, `user_name`, `fr_id`, `psf_id`, `sample_value`, `sample_cost`, `value_for_cost`, `cost_for_value`, `ph`, `vescosity`, `color`, `finance_approve`, `finance_remark`, `marketing_approve`, `marketing_remark`, `rnd_approve`, `rnd_remark`) VALUES
(1, '2024-03-23 12:47:25', 'rnd_head', 'RnD Head', '1', '15', '100ml', '200', '500ml', '1000', NULL, NULL, NULL, 'Pending', NULL, 'Approved', 'ok', 'Finalized', 'everything ok'),
(2, '2024-03-25 11:09:38', 'rnd_head', 'RnD Head', '3', '17', '50 ml', '4500', '5 L', '450000', NULL, NULL, NULL, 'Pending', NULL, 'Approved', 'FC Approved', 'Finalized', '');

-- --------------------------------------------------------

--
-- Table structure for table `fr`
--

CREATE TABLE `fr` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `psf_id` text DEFAULT NULL,
  `assign_person` text DEFAULT NULL,
  `assign_date` text DEFAULT NULL,
  `assign_duration` text DEFAULT NULL,
  `ph` text DEFAULT NULL,
  `vescosity` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `qa_approve` text NOT NULL DEFAULT 'Pending',
  `qa_remark` text DEFAULT NULL,
  `finance_approve` text DEFAULT 'Pending',
  `finance_remark` text DEFAULT NULL,
  `rnd_approve` text DEFAULT 'Pending',
  `version_no` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fr`
--

INSERT INTO `fr` (`id`, `datetime`, `user_type`, `user_name`, `psf_id`, `assign_person`, `assign_date`, `assign_duration`, `ph`, `vescosity`, `color`, `qa_approve`, `qa_remark`, `finance_approve`, `finance_remark`, `rnd_approve`, `version_no`) VALUES
(1, '2024-03-23 12:07:47', 'rnd_head', 'RnD Head', '15', 'Bashitha', '2024-03-30', '7 days', '10', '20', '#ff0000', 'Approved', 'ok qa approved', 'Approved', 'finance ok', 'Pending', NULL),
(2, '2024-03-24 10:11:31', 'rnd_head', 'RnD Head', '16', '', '', '', '', '', '#000000', 'Pending', '', 'Pending', NULL, 'Pending', NULL),
(3, '2024-03-25 10:58:46', 'rnd_head', 'RnD Head', '17', 'Bashitha', '2024-03-28', '5 weeks', '5.0', '0.5', '#ff0000', 'Approved', 'Sample Approved', 'Approved', 'Finance Approved', 'Finalized', 'ITC/HOC/001');

-- --------------------------------------------------------

--
-- Table structure for table `fr_ingredients`
--

CREATE TABLE `fr_ingredients` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `psf_id` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `quantity` text DEFAULT NULL,
  `uom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fr_ingredients`
--

INSERT INTO `fr_ingredients` (`id`, `datetime`, `user_type`, `user_name`, `psf_id`, `name`, `quantity`, `uom`) VALUES
(1, '2024-03-23 12:06:38', 'rnd_head', 'rnd_head', '15', 'soap', '2', 'ml'),
(2, '2024-03-23 12:07:06', 'rnd_head', 'rnd_head', '15', 'sugar', '5', 'ml'),
(8, '2024-03-24 12:46:42', NULL, NULL, '16', 'soap', '2', 'ml'),
(9, '2024-03-24 12:46:42', NULL, NULL, '16', 'sugar', '5', 'ml'),
(10, '2024-03-24 13:05:26', NULL, NULL, '16', 'soap', '2', 'ml'),
(11, '2024-03-24 13:05:26', NULL, NULL, '16', 'sugar', '5', 'ml'),
(12, '2024-03-25 10:57:57', 'rnd_head', 'rnd_head', '17', 'milk', '4', 'ml'),
(13, '2024-03-25 10:58:17', 'rnd_head', 'rnd_head', '17', 'water', '5', 'ml');

-- --------------------------------------------------------

--
-- Table structure for table `hazzards`
--

CREATE TABLE `hazzards` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `i1_name` text DEFAULT NULL,
  `i1_quantity` text DEFAULT NULL,
  `i1_unit` text DEFAULT NULL,
  `i2_name` text DEFAULT NULL,
  `i2_quantity` text DEFAULT NULL,
  `i2_unit` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hazzards`
--

INSERT INTO `hazzards` (`id`, `datetime`, `user_type`, `user_name`, `i1_name`, `i1_quantity`, `i1_unit`, `i2_name`, `i2_quantity`, `i2_unit`) VALUES
(7, '2024-02-11 09:23:39', 'rnd_head', 'RnD Head', 'Arsenic ', '5', 'mg', NULL, NULL, NULL),
(8, '2024-03-21 01:51:19', 'rnd_head', 'RnD Head', 'Carbon Monoxide', '30', 'ppm', NULL, NULL, NULL),
(9, '2024-03-21 01:51:38', 'rnd_head', 'RnD Head', 'Lead', '0.5', 'Î¼g/mÂ³', NULL, NULL, NULL),
(10, '2024-03-21 01:51:54', 'rnd_head', 'RnD Head', 'Noise', '85', 'dB', NULL, NULL, NULL),
(11, '2024-03-21 01:52:07', 'rnd_head', 'RnD Head', 'Benzene', '1', 'ppm', NULL, NULL, NULL),
(12, '2024-03-21 01:52:23', 'rnd_head', 'RnD Head', 'Asbestos', '0.01', 'fibers/cc', NULL, NULL, NULL),
(13, '2024-03-21 01:52:40', 'rnd_head', 'RnD Head', 'Radiation (X-ray)', '0.01', 'mSv', NULL, NULL, NULL),
(14, '2024-03-21 01:52:53', 'rnd_head', 'RnD Head', 'Formaldehyde', '0.1', 'ppm', NULL, NULL, NULL),
(15, '2024-03-21 01:53:07', 'rnd_head', 'RnD Head', 'Mercury', '0.002', 'mg/mÂ³', NULL, NULL, NULL),
(16, '2024-03-21 01:53:36', 'rnd_head', 'RnD Head', 'Particulate Matter (PM2.5)', '12', 'Î¼g/mÂ³', NULL, NULL, NULL),
(17, '2024-03-21 01:55:45', 'rnd_head', 'RnD Head', 'Heat', '45', 'Celsius', 'Humidity', '80', '%'),
(18, '2024-03-21 01:56:08', 'rnd_head', 'RnD Head', 'Noise', '90', 'dB', 'Chemical Fumes', '50', 'ppm'),
(19, '2024-03-21 01:56:55', 'rnd_head', 'RnD Head', 'Radiation', '2', 'Sievert', 'Oxygen Depletion', '10', '%'),
(20, '2024-03-21 01:57:26', 'rnd_head', 'RnD Head', 'Dust Particles', '100', 'mg/m^3', 'Toxic Gas', '25', 'ppm');

-- --------------------------------------------------------

--
-- Table structure for table `product_classes`
--

CREATE TABLE `product_classes` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_classes`
--

INSERT INTO `product_classes` (`id`, `datetime`, `user_type`, `user_name`, `name`) VALUES
(1, '2024-03-21 04:26:37', 'marketing_head', 'Marketing Head', 'Shampoo'),
(2, '2024-03-21 04:34:18', 'marketing_head', 'Marketing Head', 'Medicine'),
(3, '2024-03-21 04:34:34', 'marketing_head', 'Marketing Head', 'Chemical'),
(4, '2024-03-21 04:35:02', 'marketing_head', 'Marketing Head', 'Soap');

-- --------------------------------------------------------

--
-- Table structure for table `psf`
--

CREATE TABLE `psf` (
  `id` mediumint(9) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `user_type` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `usage_details` text DEFAULT NULL,
  `age_group` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `required_date` text DEFAULT NULL,
  `rnd_approve` text DEFAULT 'Pending',
  `rnd_remark` text DEFAULT NULL,
  `qa_approve` text DEFAULT 'Pending',
  `finance_approve` text DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `psf`
--

INSERT INTO `psf` (`id`, `datetime`, `user_type`, `user_name`, `number`, `customer_name`, `address`, `phone`, `email`, `class`, `usage_details`, `age_group`, `gender`, `ingredients`, `other_details`, `required_date`, `rnd_approve`, `rnd_remark`, `qa_approve`, `finance_approve`) VALUES
(15, '2024-03-23 12:02:47', 'marketing_head', 'marketing_head', NULL, 'Aveen', 'colombo', '123456', 'aveen@aveen.com', 'Chemical', 'body spray', 'Adults', 'Male', 'water and soap', '', '2024-03-30', 'Pending', NULL, 'Pending', 'Pending'),
(16, '2024-03-24 02:59:32', 'marketing_head', 'marketing_head', NULL, 'smmy1MMYHA', 'oveL12Lk5l', '7765932154', 'JFrzjLxe9w', 'Medicine', 'YoO8LUUCi6', 'Kids', 'Male', 'Itora0DtHymry,r rytu', 'VikXzXi2RL', '2024-02-14', 'Pending', NULL, 'Pending', 'Pending'),
(17, '2024-03-25 10:54:23', 'marketing_head', 'marketing_head', NULL, 'ITC Hotel', 'Mr Pasindu\r\nITC Hotel\r\nColombo 1', '0000000000', 'hhhh@gmail.com', 'Shampoo', 'Hair Shampoo', 'Adults', 'Unisex', 'Milk\r\nHoney', 'Smooth with milk fragrent', '2024-03-31', 'Pending', NULL, 'Pending', 'Pending'),
(18, '2024-03-25 12:16:47', 'marketing_head', 'marketing_head', NULL, 'FACHLh5kuo', '1zFCK8oKuZ', '6492693298', 'ITu5bIzyVp', 'Medicine', 'QeeP56Zqlz', 'Kids', 'Male', 'Itora0DtHymry,r rytu', 'uRsMc0B044', '2024-02-14', 'Pending', NULL, 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `edit` enum('0','1') DEFAULT NULL,
  `super` enum('0','1') DEFAULT '0',
  `verifycode` varchar(255) DEFAULT NULL,
  `verified` int(10) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `type`, `firstname`, `lastname`, `username`, `email`, `password`, `active`, `edit`, `super`, `verifycode`, `verified`, `image`) VALUES
(1, '2021-09-26', 'marketing_head', 'Marketing', 'Head', 'department_head', 'marketing_head', '$2y$10$BkMpht.n0EJW.Gwe6rUxFO978K2LQAJwBKp1tZ5mZ0mtlPGDyahTS', '0', '1', '0', NULL, 1, 'assets/images/users/1635418724_20210911_023434.jpg'),
(2, '2021-09-26', 'rnd_head', 'RnD', 'Head', 'rnd_head', 'rnd_head', '$2y$10$nh6UGIMilghmx6V37EbS6OGcfLotF38mR6bXPpnfQDQHfTEi8dDd6', '0', '1', '0', NULL, 1, 'assets/images/users/1635418724_20210911_023434.jpg'),
(32, '2021-09-26', 'qa_head', 'QA', 'Head', 'qa_head', 'qa_head', '$2y$10$fbfFGF6wsH9cpEYsysrkUuOPeucgUCT8WFVC8HsWf50B0CRPJoUjK', '0', '1', '0', NULL, 1, 'assets/images/users/1635418724_20210911_023434.jpg'),
(33, '2021-09-26', 'finance_head', 'Finance', 'Head', 'finance_head', 'finance_head', '$2y$10$.MfEjvMM4WZ9OJyuuKTg4erVaZjYFLkGYr/.W.T4SwANksZVVV4Ze', '0', '1', '0', NULL, 1, 'assets/images/users/1635418724_20210911_023434.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc`
--
ALTER TABLE `fc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fr`
--
ALTER TABLE `fr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fr_ingredients`
--
ALTER TABLE `fr_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hazzards`
--
ALTER TABLE `hazzards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_classes`
--
ALTER TABLE `product_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psf`
--
ALTER TABLE `psf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fc`
--
ALTER TABLE `fc`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fr`
--
ALTER TABLE `fr`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fr_ingredients`
--
ALTER TABLE `fr_ingredients`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hazzards`
--
ALTER TABLE `hazzards`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_classes`
--
ALTER TABLE `product_classes`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `psf`
--
ALTER TABLE `psf`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
