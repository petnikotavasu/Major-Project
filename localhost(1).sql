-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2022 at 12:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outpass`
--
CREATE DATABASE IF NOT EXISTS `outpass` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `outpass`;

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` varchar(7) NOT NULL,
  `gname` varchar(30) NOT NULL,
  `gnumber` bigint(15) NOT NULL,
  `snumber` bigint(15) NOT NULL,
  `fromdate` varchar(20) DEFAULT NULL,
  `todate` varchar(20) DEFAULT NULL,
  `reason` varchar(256) NOT NULL,
  `applydate` varchar(20) DEFAULT current_timestamp(),
  `outpassId` bigint(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `rejected_date` varchar(20) NOT NULL DEFAULT 'NULL',
  `accepted_date` varchar(20) NOT NULL DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` varchar(7) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `password`, `name`, `gender`, `email`) VALUES
('r170000', '12345', 'xyz', 'Male', 'xyz@gmail.com'),
('r170242', '1719109745', 'D Prudhvi Teja', 'Male', 'r170242@rguktrkv.ac.in'),
('r170829', 'vijaya@123', 'T Jyothsna', 'Female', 'r170829@rguktrkv.ac.in'),
('r170865', '1719102983', 'S VEDA PRAKASH', 'Male', 'veda@gmail.com'),
('r170981', 'r170981', 'Y PAVAN KUMAR REDDY', 'Male', 'pavan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `warden_login`
--

CREATE TABLE `warden_login` (
  `empId` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden_login`
--

INSERT INTO `warden_login` (`empId`, `password`, `name`, `gender`, `email`) VALUES
('170865', 'veda@123', 'WARDEN1 (warden)', 'Male', 'veda@gmail.com'),
('170981', 'warden', 'WARDEN2 (warden)', 'Male', 'yarasipavan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`outpassId`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warden_login`
--
ALTER TABLE `warden_login`
  ADD PRIMARY KEY (`empId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `outpassId` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
