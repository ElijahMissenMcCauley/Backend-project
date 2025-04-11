-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 01:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `classGroup` varchar(10) DEFAULT NULL,
  `classCapacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `teacherID`, `classGroup`, `classCapacity`) VALUES
(1, 1, 'Reception', 20),
(2, 7, 'Year 1', 25),
(3, 5, 'Year 2', 22),
(4, 3, 'Year 3', 24),
(5, 6, 'Year 4', 30),
(6, 2, 'Year 5', 35),
(7, 4, 'Year 6', 27);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` int(11) NOT NULL,
  `pName` varchar(100) DEFAULT NULL,
  `pSurname` varchar(100) DEFAULT NULL,
  `pAddress` varchar(100) DEFAULT NULL,
  `pEmail` varchar(100) DEFAULT NULL,
  `pTelephone` varchar(15) DEFAULT NULL,
  `numChildren` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `pName`, `pSurname`, `pAddress`, `pEmail`, `pTelephone`, `numChildren`) VALUES
(1, 'Raj', 'Patel', '15 Maple Avenue', 'raj.patel@gmail.com', '+44 7694 518237', 2),
(2, 'Priya', 'Patel', '15 Maple Avenue', 'priya.patel@gmail.com', '+44 7694 518238', 2),
(3, 'Miguel', 'Chavez', '27 Pine Road', 'miguel.chavez@gmail.com', '+44 7694 518239', 1),
(4, 'Fatima', 'Ahmed', '8 Oak Drive', 'fatima.ahmed@gmail.com', '+44 7694 518240', 1),
(5, 'Carlos', 'Lopez', '12 Bluebell Crescent', 'carlos.lopez@gmail.com', '+44 7694 518241', 1),
(6, 'Nadia', 'Ibrahim', '25 Birch Lane', 'nadia.ibrahim@gmail.com', '+44 7694 518242', 2),
(7, 'Gareth', 'Ibrahim', '25 Birch Lane', 'gareth.ibrahim@gmail.com', '+44 7694 518243', 2),
(8, 'Amar', 'Singh', '7 Greenway Street', 'amar.singh@gmail.com', '+44 7694 518244', 2),
(9, 'Sanya', 'Singh', '7 Greenway Street', 'sanya.singh@gmail.com', '+44 7694 518245', 2),
(10, 'Samuel', 'Roberts', '34 Riverbank Drive', 'samuel.roberts@gmail.com', '+44 7694 518246', 2),
(11, 'Megan', 'Roberts', '34 Riverbank Drive', 'megan.roberts@gmail.com', '+44 7694 518247', 2),
(12, 'David', 'Martin', '23 Willow Street', 'david.martin@gmail.com', '+44 7694 518248', 2),
(13, 'Sophie', 'Martin', '23 Willow Street', 'sophie.martin@gmail.com', '+44 7694 518249', 2),
(14, 'Aminah', 'Hussain', '90 King\'s Road', 'aminah.hussain@gmail.com', '+44 7694 518250', 2),
(15, 'Ben', 'Hussain', '90 King\'s Road', 'ben.hussain@gmail.com', '+44 7694 518251', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `classID` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `medInfo` varchar(1000) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `classID`, `first_name`, `surname`, `age`, `address`, `medInfo`, `DateOfBirth`) VALUES
(1, 1, 'Patel', 'Smith', 5, '15 Maple Avenue', 'Medical Info: None', '2019-07-15'),
(2, 2, 'Chloe', 'Patel', 6, '15 Maple Avenue', 'None', '2018-11-03'),
(3, 3, 'Sophia', 'Chavez', 7, '27 Pine Road', 'Asthma', '2017-04-21'),
(4, 4, 'Amira', 'Ahmed', 8, '8 Oak Drive', 'None', '2016-09-14'),
(5, 5, 'Ryan', 'Lopez', 9, '12 Bluebell Crescent', 'None', '2015-06-29'),
(6, 6, 'Sophie', 'Ibrahim', 9, '25 Birch Lane', 'No allergies', '2015-01-17'),
(7, 7, 'Zane', 'Ibrahim', 10, '25 Birch Lane', 'No known allergies', '2014-12-09'),
(8, 1, 'Maya', 'Singh', 5, '7 Greenway Street', 'None', '2019-02-11'),
(9, 2, 'Olivia', 'Singh', 6, '7 Greenway Street', 'Asthma', '2018-08-23'),
(10, 2, 'Nia', 'Roberts', 7, '34 Riverbank Drive', 'Lactose intolerant', '2017-03-02'),
(11, 6, 'Jaden', 'Roberts', 9, '34 Riverbank Drive', 'No allergies', '2015-10-30'),
(12, 5, 'Ethan', 'Martin', 8, '23 Willow Street', 'None', '2016-05-25'),
(13, 4, 'Lily', 'Martin', 8, '23 Willow Street', 'Asthma', '2016-11-11'),
(14, 7, 'Ella', 'Hussain', 10, '90 King\'s Road', 'No known allergies', '2014-04-08'),
(15, 1, 'Charlie', 'Hussain', 5, '90 King\'s Road', 'None', '2019-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE `student_parent` (
  `studentID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_parent`
--

INSERT INTO `student_parent` (`studentID`, `parentID`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(3, 3),
(5, 5),
(6, 6),
(7, 6),
(6, 7),
(7, 7),
(8, 8),
(9, 8),
(8, 9),
(9, 9),
(10, 10),
(10, 11),
(12, 12),
(13, 12),
(12, 13),
(13, 13),
(14, 14),
(15, 14),
(14, 15),
(15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `tSurname` varchar(100) DEFAULT NULL,
  `tAddress` varchar(100) DEFAULT NULL,
  `tEmail` varchar(100) DEFAULT NULL,
  `tSalary` float DEFAULT NULL,
  `bgCheck` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `tName`, `tSurname`, `tAddress`, `tEmail`, `tSalary`, `bgCheck`) VALUES
(1, 'John', 'Smith', '5 Repington Way', 'john-smith123@gmail.com', 29904, 1),
(2, 'Helena', 'Francine', '17 Mill Lane', 'HFrancine@gmail.com', 28718, 1),
(3, 'Damion', 'Stephens', '34 Thornton Road', 'DamionStevens@gmail.com', 33339, 1),
(4, 'Xavier', 'Fabien', '24 Winchester Avenue', 'XavFabien@gmail.com', 32253, 1),
(5, 'Elsie', 'Sanders', '117 North Road', 'EllieSanders@gmail.com', 32413, 1),
(6, 'Lylah', 'Johnson', '2 Kenwood Bank', 'Lylah-Johnson@gmail.com', 30276, 1),
(7, 'Benji', 'Witkowska', '37 High Street', 'BenWitkowska@gmail.com', 34355, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `class_ibfk_1` (`teacherID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD PRIMARY KEY (`parentID`,`studentID`),
  ADD KEY `fk_student` (`studentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`);

--
-- Constraints for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_parent_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `student_parent_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
