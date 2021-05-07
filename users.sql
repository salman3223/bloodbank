-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 09:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `blooduser`
--

CREATE TABLE `blooduser` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blooduser`
--

INSERT INTO `blooduser` (`id`, `name`, `phone`, `email`, `DOB`, `addr`, `username`, `passwd`) VALUES
(1, 'sairaj thalkar', 2147483647, 'sairaj@gmail.com', '14/09/1997', 'alibag', 'sairaj@gmail.com', '1234'),
(2, 'dhru ', 0, '', '?????../??', '', '', ''),
(3, 'dhrupal shah', 2147483647, '1289dhrupal@gmail.com', '8/07/1998', 'Mumbai', '1289dhrupal@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `donor_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `bloodgrp` varchar(3) NOT NULL,
  `donate_dt` varchar(10) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`donor_id`, `amount`, `bloodgrp`, `donate_dt`, `id`) VALUES
(1, 2, 'B+', '20/10/2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL,
  `bloodgrp` varchar(3) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `issue_dt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `amount`, `bloodgrp`, `id`, `issue_dt`) VALUES
(1, 1, 'B+', 1, '20/10/2018');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT 0,
  `bloodgrp` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `amount`, `bloodgrp`) VALUES
(1, 0, 'A+'),
(2, 0, 'A-'),
(3, 1, 'B+'),
(4, 0, 'B-'),
(5, 0, 'O+'),
(6, 0, 'O-'),
(7, 0, 'AB+'),
(8, 0, 'AB-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blooduser`
--
ALTER TABLE `blooduser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blooduser`
--
ALTER TABLE `blooduser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `donor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donate`
--
ALTER TABLE `donate`
  ADD CONSTRAINT `donate_ibfk_1` FOREIGN KEY (`id`) REFERENCES `blooduser` (`id`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`id`) REFERENCES `blooduser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
