-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 04:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bku-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category_createAt` datetime DEFAULT NULL,
  `Category_updatedAt` datetime DEFAULT NULL,
  `Category_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_id`, `Category_name`, `Category_createAt`, `Category_updatedAt`, `Category_hide`) VALUES
(1, 'Frontend', '2021-11-18 05:06:12', '2021-11-18 05:06:12', 0),
(2, 'Backend', '2021-11-18 06:23:45', '2021-11-18 06:23:45', 0),
(3, 'FullStack', '2021-11-18 14:24:03', '2021-11-18 14:24:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `Jobs_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Category_id` int(11) DEFAULT NULL,
  `Jobs_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Jobs_summary` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Jobs_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Jobs_quantity` int(5) DEFAULT NULL,
  `Jobs_salary` int(11) DEFAULT NULL,
  `Jobs_createAt` datetime DEFAULT NULL,
  `Jobs_updatedAt` datetime DEFAULT NULL,
  `Jobs_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`Jobs_id`, `user_id`, `Category_id`, `Jobs_name`, `Jobs_summary`, `Jobs_description`, `Jobs_quantity`, `Jobs_salary`, `Jobs_createAt`, `Jobs_updatedAt`, `Jobs_hide`) VALUES
(4, 1, 1, 'Frontend Developer', 'Signon bonus 13th month salary \\n Chance to be trained overseas \\n 24-27 days leave per year', 'Develop Progressive Web Apps and Responsive Web Apps for cloud/ IoT/ pharma applications using latest technologies such as Angular 8+, React, UI5, Vue and Ionic.', 0, 2000, '2021-11-18 00:00:00', '2021-11-18 00:00:00', 0),
(5, 1, 2, 'Backend Developer', 'High-spec Macbook Pro and kits \\n WFH and Education Allowances \\n World-class projects', 'Modern backend technologies, such as Golang/Java/NodeJS, microservices, gRPC, and Kubernetes to realize scalable and stable cloud architectures.', 0, 1500, '2021-11-18 00:00:00', '2021-11-18 00:00:00', 0),
(6, 1, 3, 'Fullstack Developer', 'Competitive salary + bonus \\n Premium healthcare package \\n English working environment', 'Your are familiar with one our 3 existing tech stacks 1) TypeScript/Vue/NodeJS/GraphQL 2) Vue/Django and 3) PHP/Synphony', 0, 5000, '2021-11-18 00:00:00', '2021-11-18 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_createAt` datetime DEFAULT NULL,
  `role_updatedAt` datetime DEFAULT NULL,
  `role_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`role_id`, `role_name`, `role_createAt`, `role_updatedAt`, `role_hide`) VALUES
(1, 'Employer', '2021-11-18 05:22:08', '2021-11-18 05:22:08', 0),
(2, 'User', '2021-11-18 05:22:08', '2021-11-18 05:22:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_number` int(11) DEFAULT NULL,
  `user_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_createAt` datetime DEFAULT NULL,
  `user_updatedAt` datetime DEFAULT NULL,
  `user_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`Jobs_id`),
  ADD KEY `ASSOCIATION_2_FK` (`user_id`),
  ADD KEY `ASSOCIATION_3_FK` (`Category_id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ASSOCIATION_1_FK` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `Jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD CONSTRAINT `FK_Association_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_Association_3` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
