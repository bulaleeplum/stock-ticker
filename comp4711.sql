-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 08:13 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp4711`
--

-- --------------------------------------------------------

--
-- Table structure for table `Collections`
--

CREATE TABLE `Collections` (
  `Player` varchar(6) NOT NULL,
  `StockAmount` int(6) NOT NULL,
  `Code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Collections`
--

INSERT INTO `Collections` (`Player`, `StockAmount`, `Code`) VALUES
('Mickey', 100, 'BOND'),
('Mickey', 10, 'GOLD'),
('Mickey', 50, 'GRAN'),
('Mickey', 0, 'IND'),
('Mickey', 5, 'OIL'),
('Mickey', 170, 'TECH'),
('Henry', 25, 'BOND'),
('Henry', 500, 'GOLD'),
('Henry', 0, 'GRAN'),
('Henry', 1000, 'IND'),
('Henry', 0, 'OIL'),
('Henry', 170, 'TECH'),
('George', 0, 'BOND'),
('George', 0, 'GOLD'),
('George', 0, 'GRAN'),
('George', 1000, 'IND'),
('George', 20, 'OIL'),
('George', 10, 'TECH'),
('Donald', 10, 'BOND'),
('Donald', 10, 'GOLD'),
('Donald', 30, 'GRAN'),
('Donald', 5, 'IND'),
('Donald', 20, 'OIL'),
('Donald', 50, 'TECH');

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL,
  `seq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `Player` varchar(6) DEFAULT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `ID` varchar(30) NOT NULL,
  `Cash` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`Player`, `Cash`) VALUES
('Mickey', 1000),
('Donald', 3000),
('George', 2000),
('Henry', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `Code` varchar(4) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Category` varchar(1) NOT NULL,
  `Value` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(4) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  `seq` int(11) NOT NULL,
  `agent` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
