-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2015 at 09:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `Name` varchar(45) NOT NULL,
  `Father's Name` varchar(45) NOT NULL,
  `Mother's Name` varchar(45) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `AdmissionClass` varchar(11) NOT NULL,
  `Previous Class Attend` varchar(45) NOT NULL,
  `Previous Class Result` varchar(45) NOT NULL,
  `Previous School Attend` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`Name`, `Father's Name`, `Mother's Name`, `Address`, `AdmissionClass`, `Previous Class Attend`, `Previous Class Result`, `Previous School Attend`, `Email`, `Phone`) VALUES
('Md. Khaled', 'Khaled Rahman', 'Khaleda Rahman', 'Mohakhali', 'XI', 'X', '5.00', 'Rajuk College', 'khaled@gmail.com', '01612354567');

-- --------------------------------------------------------

--
-- Table structure for table `admissionclass`
--

CREATE TABLE IF NOT EXISTS `admissionclass` (
  `Class` varchar(11) NOT NULL,
  `Seat` int(11) NOT NULL,
  PRIMARY KEY (`Class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admissionclass`
--

INSERT INTO `admissionclass` (`Class`, `Seat`) VALUES
('IX', 200),
('VI', 200),
('VII', 200),
('VIII', 200),
('XI', 200);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idCourse` int(11) NOT NULL,
  `CourseName` varchar(45) NOT NULL,
  PRIMARY KEY (`idCourse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCourse`, `CourseName`) VALUES
(10106, 'Bangla 1st 06'),
(10107, 'Bangla 1st 07'),
(10108, 'Bangla 1st 08'),
(10206, 'Bangla 2nd 06'),
(10207, 'Bangla 2nd 07'),
(20106, 'English 1st 08 '),
(20107, 'English 1st 07'),
(20108, 'English 1st 08'),
(20206, 'English 2nd 06'),
(20207, 'English 2nd 07');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `noticeId` int(11) NOT NULL,
  `nosub` varchar(255) DEFAULT NULL,
  `noticetext` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`noticeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeId`, `nosub`, `noticetext`, `date`) VALUES
(101, 'Final Examination', 'The Final examination of SIBS will start from 13st December, 2015. Student should get their admit card within 3rd December.', '2015-11-30'),
(102, 'Examination Vacation', 'SIBS will remain close from 6th December to 12th December, 2015.  ', '2015-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `courseId` int(11) NOT NULL,
  `stuId` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  KEY `courseId_idx` (`courseId`),
  KEY `stuId_idx` (`stuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`courseId`, `stuId`, `Grade`) VALUES
(10106, 6001, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `idSchedule` int(11) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  PRIMARY KEY (`idSchedule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`idSchedule`, `schedule`) VALUES
(1, '8:15-9:05'),
(2, '9:10-10:00'),
(3, '10:05-10:45'),
(4, '10:50-11:30'),
(5, '11:35-12:15');

-- --------------------------------------------------------

--
-- Table structure for table `ssrel`
--

CREATE TABLE IF NOT EXISTS `ssrel` (
  `staffId` int(11) DEFAULT NULL,
  `scheduleid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  KEY `idSchedule_idx` (`scheduleid`),
  KEY `staffId` (`staffId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ssrel`
--

INSERT INTO `ssrel` (`staffId`, `scheduleid`, `courseid`, `day`) VALUES
(2, 1, 10106, 'Sunday - Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE KEY `staffID_UNIQUE` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `username`, `password`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Admin', '010101', NULL, NULL, NULL, NULL),
(2, 'Adnan', 'himel', 'Adnan Rahman', 'adnan@yahoo.com', '01674141415', 'Gulshan');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `idStudent` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`idStudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `Name`) VALUES
(6001, 'Md. Nahid Hasan'),
(6002, 'Nahid Himel'),
(7001, 'Khaledue Rahman'),
(7002, 'Tom Hanks'),
(8001, 'Johnny Depp');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `courseId` FOREIGN KEY (`courseId`) REFERENCES `course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stuId` FOREIGN KEY (`stuId`) REFERENCES `student` (`idStudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ssrel`
--
ALTER TABLE `ssrel`
  ADD CONSTRAINT `idSchedule` FOREIGN KEY (`scheduleid`) REFERENCES `schedule` (`idSchedule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ssrel_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`),
  ADD CONSTRAINT `ssrel_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffID`),
  ADD CONSTRAINT `staffid` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
