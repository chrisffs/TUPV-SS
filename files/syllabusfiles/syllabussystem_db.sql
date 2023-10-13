-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 09:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syllabussystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `ID` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `tupv_id` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `department` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`ID`, `id_number`, `tupv_id`, `username`, `password`, `full_name`, `department`, `type`) VALUES
(1, 1, 'TUPV-20-2296', 'admin', 'admin123', 'Christian Noel Salvador', 'COET', 'admin'),
(2, 2, 'TUPV-20-2297', 'user', 'user123', 'Yoshiyuki Canoy', 'COAC', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `id` int(11) NOT NULL,
  `courseName` text NOT NULL,
  `acro` text NOT NULL,
  `dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_tbl`
--

INSERT INTO `courses_tbl` (`id`, `courseName`, `acro`, `dept`) VALUES
(1, 'Bachelor of Science in Electronics Engineering', 'BSEcE', 'COE'),
(2, 'Bachelor of Science in Mechanical Engeering', 'BSME', 'COE'),
(3, 'Bachelor of Science in Electrical Engineering', 'BSEE', 'COE'),
(4, 'Bachelor of Science in Computer Engineering', 'BSCpE', 'COE'),
(5, 'Bachelor of Science in Electronics Engineering', 'BSMxE', 'COAC'),
(6, 'Bachelor of Science in Instrumentation and Control Engineering', 'BSICE', 'COAC'),
(7, 'Bachelor of Technology in Mechatronics Technology', 'BETMxT', 'COAC'),
(11, 'Bachelor of Science in Chemistry', 'BSChem', 'COET'),
(12, 'Bachelor of Science in Engineering Technology', 'BET', 'COET');

-- --------------------------------------------------------

--
-- Table structure for table `departmenttbl`
--

CREATE TABLE `departmenttbl` (
  `id` int(11) NOT NULL,
  `dptname` text NOT NULL,
  `acronym` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departmenttbl`
--

INSERT INTO `departmenttbl` (`id`, `dptname`, `acronym`) VALUES
(4, 'College of Engineering', 'COE'),
(5, 'College of Automation and Control', 'COAC'),
(6, 'College of Engineering Technology', 'COET');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `id` int(11) NOT NULL,
  `subjectName` text NOT NULL,
  `subjCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`id`, `subjectName`, `subjCode`) VALUES
(1, 'MATH', 'MAT-MX3'),
(2, 'FILPINO', 'FIL-213');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_tbl`
--

CREATE TABLE `syllabus_tbl` (
  `ID` int(11) NOT NULL,
  `Syear` text NOT NULL,
  `Sterm` text NOT NULL,
  `Ssubject` text NOT NULL,
  `Suploaded` text NOT NULL,
  `SuploadDate` date NOT NULL,
  `Sfile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
