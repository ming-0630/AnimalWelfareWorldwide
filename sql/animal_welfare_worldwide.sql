-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 25, 2020 at 03:01 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal welfare worldwide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_t`
--

DROP TABLE IF EXISTS `admin_t`;
CREATE TABLE IF NOT EXISTS `admin_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `SurrenderID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_t`
--

INSERT INTO `admin_t` (`id`, `Username`, `Password`, `SurrenderID`) VALUES
(1, 'admin', 'admin123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `listing_t`
--

DROP TABLE IF EXISTS `listing_t`;
CREATE TABLE IF NOT EXISTS `listing_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Breed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `SurrenderID` int(11) NOT NULL,
  `Status` varchar(12) NOT NULL DEFAULT 'Not Adopted',
  `Approval` varchar(15) NOT NULL DEFAULT 'Not Approved',
  PRIMARY KEY (`id`),
  KEY `SurrenderID` (`SurrenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `listing_t`
--

INSERT INTO `listing_t` (`id`, `Name`, `Breed`, `imageurl`, `Age`, `Type`, `Location`, `Description`, `Gender`, `SurrenderID`, `Status`, `Approval`) VALUES
(2, 'Meow', 'Persian', 'http://localhost/wdt%20assignment/img/petimg/5f9384f4d7c27.jpg', '2 years', 'Cat', 'KL', 'CUTE', 'Female', 1, 'Adopted', 'Not Approved'),
(4, 'Luffy', 'Mixed', 'http://localhost/wdt%20assignment/img/petimg/5f938622f00f5.png', '1 yr old ', 'Dog', 'KL', 'Cheerful and dumb dog', 'male', 1, 'Adopted', 'Approved'),
(5, 'Biscuit', 'Golden Retriver', 'http://localhost/wdt%20assignment/img/petimg/5f9384829e2fb.jpg', '1 year', 'Dog', 'Gombak', 'Good boy', 'male', 1, 'Not Adopted', 'Approved'),
(6, 'Diana', 'Mixed', 'http://localhost/wdt%20assignment/img/petimg/5f93865a5bbcc.jpg', '1 year', 'Cat', 'KL', 'Tame Female Cat', 'Female', 1, 'Not Adopted', 'Approved'),
(10, 'Akali', 'White cat', 'http://localhost/wdt%20assignment/img/petimg/5f9386f9a9ef0.png', '2 years', 'Cat', 'China', 'New Born kitten ', 'Female', 1, 'Not Adopted', 'Approved'),
(18, 'Dawn', 'Mixed', 'http://localhost/wdt%20assignment/img/petimg/5f9389b18ee95.jpg', '4 Years ', 'Dog', 'Setapak', 'Calm and funny dog.', 'Female', 4, 'Adopted', 'Approved'),
(19, 'Luna', 'Mixed', 'http://localhost/wdt%20assignment/img/petimg/5f938ad2aee57.png', '2 Years', 'Cat', 'Penang', 'A bit grumpy initially and need some time to gain her trust', 'Female', 4, 'Not Adopted', 'Approved'),
(20, 'Tom', 'Tabby Cat', 'http://localhost/wdt%20assignment/img/petimg/5f938b6620626.jpg', '5 years', 'Cat', 'Sepang', 'A cat that needs a lot of attention and can catch mice!', 'Female', 4, 'Adopted', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `mem_t`
--

DROP TABLE IF EXISTS `mem_t`;
CREATE TABLE IF NOT EXISTS `mem_t` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` longtext NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `DateOfBirth` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mem_t`
--

INSERT INTO `mem_t` (`uid`, `Username`, `Password`, `PhoneNumber`, `Email`, `Gender`, `DateOfBirth`) VALUES
(1, 'mingfai0630', 'sad', '011-27111300', 'HELLOHELLO@gmail.com', 'male', '2020-10-13'),
(2, 'sad', 'sad', '011-27111300', 'HELLO@gmail.com', 'male', '2020-10-27'),
(3, 'reccakurei1107', 'asd', '000-00000008', 'asdasd@asda.com', 'male', '2020-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `surrender_t`
--

DROP TABLE IF EXISTS `surrender_t`;
CREATE TABLE IF NOT EXISTS `surrender_t` (
  `SurrenderID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` longtext NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `DateOfBirth` date NOT NULL,
  PRIMARY KEY (`SurrenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surrender_t`
--

INSERT INTO `surrender_t` (`SurrenderID`, `Username`, `Password`, `PhoneNumber`, `Email`, `Gender`, `DateOfBirth`) VALUES
(0, 'admin', 'admin', '011-22221300', 'aww@gmail.com', 'admin', '2020-02-12'),
(1, 'reccakurei1107', '123', '000-00000008', 'HELLOOOO@gmail.com', 'Male', '2020-10-29'),
(3, 'sad', '123', '011-2712300', 'HELLO@gmail.com', 'male', '2020-10-05'),
(4, 'mingfai0630', '123', '011-27111300', 'HELLOHELLO@gmail.com', 'male', '2020-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist_t`
--

DROP TABLE IF EXISTS `watchlist_t`;
CREATE TABLE IF NOT EXISTS `watchlist_t` (
  `uid` int(11) NOT NULL,
  `listingsID` int(11) NOT NULL,
  KEY `listingsID` (`listingsID`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `watchlist_t`
--

INSERT INTO `watchlist_t` (`uid`, `listingsID`) VALUES
(1, 2),
(2, 4),
(2, 2),
(1, 5),
(1, 18);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listing_t`
--
ALTER TABLE `listing_t`
  ADD CONSTRAINT `listing_t_ibfk_1` FOREIGN KEY (`SurrenderID`) REFERENCES `surrender_t` (`SurrenderID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `watchlist_t`
--
ALTER TABLE `watchlist_t`
  ADD CONSTRAINT `watchlist_t_ibfk_1` FOREIGN KEY (`listingsID`) REFERENCES `listing_t` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `watchlist_t_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `mem_t` (`uid`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
