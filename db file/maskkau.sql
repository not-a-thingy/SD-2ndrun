-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2021 at 09:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maskkau`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'seller1', '81dc9bdb52d04dc20036dbd8313ed055', '2021-09-26 09:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

DROP TABLE IF EXISTS `tblcontactusquery`;
CREATE TABLE IF NOT EXISTS `tblcontactusquery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'aaa', 'aaa@random.com', '123', 'testing\r\n', '2021-09-26 07:14:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(100) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `userEmail`, `ProductId`, `Quantity`, `status`, `PostingDate`) VALUES
(1, 'aaa', 1, 3, 2, '2021-09-13 03:18:47'),
(2, 'aaa@random.com', 2, 2, 0, '2021-09-25 14:35:46'),
(3, 'aaa@random.com', 3, 1, 0, '2021-09-25 14:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductsOverview` longtext,
  `Price` float DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Pimage1` varchar(120) DEFAULT NULL,
  `Pimage2` varchar(120) DEFAULT NULL,
  `Pimage3` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `ProductName`, `ProductsOverview`, `Price`, `Stock`, `Pimage1`, `Pimage2`, `Pimage3`, `RegDate`, `UpdationDate`) VALUES
(1, 'FC mask', 'football club version', 5, 50, 'FC (1).jpeg', 'FC (2).jpeg', 'FC (3).jpeg', '2021-09-13 03:13:26', NULL),
(2, 'dummy 1', 'dummy for testing', 10, 20, 'FC (3).jpeg', '', '', '2021-09-25 07:47:57', NULL),
(3, 'dummy 2', 'dummy for testing', 15, 100, 'FC (2).jpeg', '', '', '2021-09-25 07:48:32', NULL),
(4, 'dummy 3', 'dummy for testing', 20, 150, 'FC (2).jpeg', '', '', '2021-09-25 07:48:46', '2021-09-25 09:31:22'),
(5, 'dummy 4', 'dummy for testing', 25, 30, 'FC (1).jpeg', '', '', '2021-09-25 07:49:00', '2021-09-25 07:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `ProfilePicture` varchar(120) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `ProfilePicture`, `address`, `RegDate`, `UpdationDate`) VALUES
(1, 'ADD', 'aaa@random.com', '202cb962ac59075b964b07152d234b70', '01234', NULL, 'Selangor,KL', '2021-09-12 09:16:50', '2021-09-25 13:09:40'),
(2, 'abcd', 'aaab@random.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', NULL, 'KL', '2021-09-25 12:28:31', '2021-09-25 12:29:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
