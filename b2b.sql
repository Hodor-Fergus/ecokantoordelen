-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `date`) VALUES
(1, 'admin', 'admin@admin.com', '123', '2023-04-19 06:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `companyregister`
--

CREATE TABLE `companyregister` (
  `id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `cid` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `pcode` text NOT NULL,
  `country` text NOT NULL,
  `temployee` text NOT NULL,
  `aemployee` text NOT NULL,
  `technical` text NOT NULL,
  `nontechnical` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cregister`
--

CREATE TABLE `cregister` (
  `id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `cid` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `pcode` text NOT NULL,
  `country` text NOT NULL,
  `temployee` int(11) NOT NULL,
  `aemployee` int(11) NOT NULL,
  `technical` int(11) NOT NULL,
  `nontechnical` int(11) NOT NULL,
  `aspace` text NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cregister`
--

INSERT INTO `cregister` (`id`, `cname`, `cid`, `street`, `city`, `pcode`, `country`, `temployee`, `aemployee`, `technical`, `nontechnical`, `aspace`, `expdate`, `date`) VALUES
(4, 'B2B', 'DH12323HKL', '12.A', 'NY', '1231', 'US', 250, 210, 190, 20, '210', '2023-05-31', '2023-04-21 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `officespace`
--

CREATE TABLE `officespace` (
  `id` int(11) NOT NULL,
  `officename` text NOT NULL,
  `tspace` int(11) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officespace`
--

INSERT INTO `officespace` (`id`, `officename`, `tspace`, `address`, `date`) VALUES
(2, 'NRN', 150, '1W,K,BN', '2023-04-20 03:02:47'),
(3, 'SR', 220, 'Tsuare, NY,US', '2023-04-20 04:21:18'),
(4, 'T&R', 1200, 'NY,US', '2023-04-20 08:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `type`, `date`) VALUES
(3, 'shif', 'shif@hotmail.com', '1234', 'organaization', '2023-04-20 15:00:25'),
(4, 'B2b', 'b2b@mail.com', '123', 'organaization', '2023-04-21 05:21:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyregister`
--
ALTER TABLE `companyregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cregister`
--
ALTER TABLE `cregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officespace`
--
ALTER TABLE `officespace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyregister`
--
ALTER TABLE `companyregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cregister`
--
ALTER TABLE `cregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officespace`
--
ALTER TABLE `officespace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
