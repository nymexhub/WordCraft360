-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2023 at 09:12 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `750W`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_750`
--

CREATE TABLE `reg_750` (
  `id` int NOT NULL,
  `data` longtext NOT NULL,
  `work_name` mediumtext NOT NULL,
  `date` varchar(255) NOT NULL,
  `activo` int DEFAULT NULL,
  `date_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_750`
--

INSERT INTO `reg_750` (`id`, `data`, `work_name`, `date`, `activo`, `date_title`) VALUES
(31, 'Writing ... Testing ', '', 'Tuesday 6 of June 2023 09:12:17 AM', NULL, 'Tuesday June the 6th, 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg_750`
--
ALTER TABLE `reg_750`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg_750`
--
ALTER TABLE `reg_750`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
