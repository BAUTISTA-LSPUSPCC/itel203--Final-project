-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 03:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customertable`
--

CREATE TABLE `customertable` (
  `id` int(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Cpnumber` bigint(11) NOT NULL,
  `birthday` date NOT NULL,
  `purok` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertable`
--

INSERT INTO `customertable` (`id`, `firstname`, `lastname`, `password`, `email`, `Cpnumber`, `birthday`, `purok`, `brgy`, `municipality`, `province`) VALUES
(50, 'Angelo', 'Polo    ', 'angelopolo111    ', 'angelopolo111@gmail.com', 9661542138, '2001-01-01', '1', 'Pulo', 'San Antonio', 'Quezonawdawdawdawdawdawdawda'),
(51, 'Juan', 'Dela Cruz', 'pass', 'juan@gmail.com', 9661542137, '2004-01-01', '2', 'Lamot2', 'Nagcarlan', 'LB'),
(52, 'Sherwin', 'Quizon', '3wmad1', 'sherwinquizon@lspu.edu.ph', 9123456781, '1999-01-01', '1', 'Pury', 'San Antonio', 'Quezon');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `comment`) VALUES
(35, 'Angelo', 'cardo@gmail.com', 'This Website is good'),
(36, 'cardo', 'angelopolo111@gmail.com', 'wew'),
(37, 'juan', 'CokePh@gmail.com', 'Juan ang aswang'),
(38, '', '', 'wow'),
(39, '', '', 'wow'),
(40, '', '', 'wow'),
(41, 'angelo', 'angelopolo111@gmail.com', 'qwert'),
(42, 'angelo', 'angelopolo111@gmail.com', 'qwert'),
(43, 'Angelo', 'angelopolo111@gmail.com', 'wad'),
(44, 'Angelo', 'angelopolo111@gmail.com', 'qwertyyityir'),
(45, 'Angelo', 'angelopolo111@gmail.com', 'qwertyyityir'),
(46, 'Angelo', 'angelopolo111@gmail.com', 'qaz'),
(47, 'Angelo', 'angelopolo111@gmail.com', 'qaz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Product_Name`, `Price`, `Category`, `Product_Description`, `Product_Image`) VALUES
(108, '2', 2, 'Breakfast', 'awdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawdawdaawd', 'sample.png'),
(110, '4', 4, 'Lunch', 'aew', 'floor.jpg'),
(111, '5', 5, 'Lunch', 'efwef', 'bg.png'),
(112, '6', 6, 'Extra', '6', 'add friend.jpg'),
(116, 'qwert', 16, 'Breakfast', 'qwewq', 'wayt.jpg'),
(117, 'awdawd', 123, 'Beverage', 'awdawda', 'sample.png'),
(118, 'awdwada', 100, 'Customized Beverage', 'awdawd', 'sample.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customertable`
--
ALTER TABLE `customertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customertable`
--
ALTER TABLE `customertable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
