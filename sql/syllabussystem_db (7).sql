-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 01:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `user_picture` text NOT NULL,
  `userpic_fileloc` text NOT NULL,
  `tupv_id` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `department` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`ID`, `user_picture`, `userpic_fileloc`, `tupv_id`, `username`, `password`, `full_name`, `department`, `type`) VALUES
(1, 'default.jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\id.jpg', 'TUPV-20-2296', 'admin', 'admin123', 'Christian Noel Salvador', 'COET', 'admin'),
(17, 'bhoy(1).jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\bhoy(1).jpg', 'TUPV-20-2234', 'user', '$2y$10$KINon8qr8iZTOGmsbvZZy.w9m3/Zj4gqm/Wpwah.4dZnAvGY37T3K', 'Jhimboy Talagtag', 'COET', 'user'),
(18, 'default.jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\default.jpg', 'TUPV-20-2236', 'TUPV-20-2236', '$2y$10$0o/x5PVLJquizZrptiUGauIY6MDXUb1IFbAepLO.ZBHHhFuSsEZq.', 'Paul John Padohinog', 'COAC', 'user'),
(20, 'default.jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\default.jpg', 'TUPV-20-2238', 'TUPV-20-2238', '$2y$10$qMsrwykIHsMhNZiC6WueCOtZ8eWkto4iPKElN47XYWPdDxd04qKWG', 'Patrick Lasola', 'COET', 'user'),
(21, 'default.jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\default.jpg', 'TUPV-20-2267', 'TUPV-20-2267', '$2y$10$2/CnzbqKxgJzeZ5I6YTIKOAebfyByfJI6ivzgZz0tKC4d50pBa1tO', 'Yoshiyuki Canoy', 'COET', 'user'),
(22, 'default.jpg', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\userpics\\default.jpg', 'TUPV-20-2235', 'TUPV-20-2235', '$2y$10$8I0oydUiGNUdt4xf5jVBgOJoGBCCxsilshooGcRnie0PX8rOis3Km', 'Rodolfo Baylen III', 'COET', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog_tbl`
--

CREATE TABLE `activitylog_tbl` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `type_content` text NOT NULL,
  `choice` text NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `upload_name` text NOT NULL,
  `subj` text NOT NULL,
  `subjCode` text NOT NULL,
  `terms` text NOT NULL,
  `years` text NOT NULL,
  `file` text NOT NULL,
  `fileLoc` text NOT NULL,
  `yearqb` text NOT NULL,
  `subjqb` text NOT NULL,
  `termqb` text NOT NULL,
  `semesterqb` text NOT NULL,
  `questionqb` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog_tbl`
--

INSERT INTO `activitylog_tbl` (`id`, `type`, `type_content`, `choice`, `upload_time`, `upload_name`, `subj`, `subjCode`, `terms`, `years`, `file`, `fileLoc`, `yearqb`, `subjqb`, `termqb`, `semesterqb`, `questionqb`, `A`, `B`, `C`, `D`, `Answers`) VALUES
(36, 'Question', 'Question Bank', 'Declined', '2023-10-31 06:13:03', 'Andrew Tate', '', '', '', '', '', '', 'any year', 'Tate lessons', 'Prelim', '3rd Semester', 'Do you like women?', 'No', 'Nada', 'Hell no', 'Be a pussy', 'B'),
(37, 'Unarchived Question', 'Question Bank', 'Unarchived', '2023-10-31 06:25:49', 'Andrew Tate', '', '', '', '', '', '', 'any year', 'Tate lessons', 'Prelim', '3rd Semester', 'Do you like women?', 'No', 'Nada', 'Hell no', 'Be a pussy', 'B'),
(40, 'Syllabus', 'Module', 'Declined', '2023-10-31 12:56:01', 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'wqeqw', 'qweqwe', 'wqeqwe', '', '', '', '', '', '', '', '', '', ''),
(41, 'Syllabus', 'Module', 'Declined', '2023-10-31 12:56:29', 'Paul John Padohinog', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Midterm', '2nd Year', 'exam-done.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam-done.pdf', '', '', '', '', '', '', '', '', '', ''),
(42, 'Question', 'Question Bank', 'Declined', '2023-10-31 14:12:30', 'Christian Noel Salvador', '', '', '', '', '', '', '2nd Year', 'National Service Training Program 2 (NROTC II/CWTS II)', 'Prelim', '3rd Semester', 'dfsddf', 'asdbb', 'bbsd', 'ccsa', 'dsa', 'C'),
(44, 'Question', 'Question Bank', 'Declined', '2023-11-01 10:23:22', 'Andrew Tate', '', '', '', '', '', '', 'any year', 'Tate lessons', 'Prelim', '3rd Semester', 'Do you like women?', 'No', 'Nada', 'Hell no', 'Be a pussy', 'B'),
(45, 'Question', 'Question Bank', 'Accepted', '2023-11-01 10:31:45', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Prelim', '2nd Semester', 'What the fuck?', 'A1', 'B1', 'C1', 'D1', 'A'),
(46, 'Question', 'Question Bank', 'Declined', '2023-11-01 11:16:24', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Software Engineering', 'Prelim', '2nd Semester', 'What the Hell', 'A1', 'B1', 'C1', 'D1', 'A'),
(47, 'Question', 'Question Bank', 'Declined', '2023-11-01 11:44:39', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Filipino 2 (Panitikang Panlipunan)', 'Midterm', '2nd Semester', 'Test Question', 'A1', 'B1', 'C1', 'D1', 'B'),
(48, 'Question', 'Question Bank', 'Accepted', '2023-11-01 11:47:04', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Instrumentation and Process Control', 'Midterm', '1st Semester', 'Test Question3', 'A2', 'B2', 'C2', 'D2', 'B'),
(49, 'Question', 'Question Bank', 'Declined', '2023-11-01 11:51:54', 'Rodolfo Baylen III', '', '', '', '', '', '', '3rd Year', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'Midterm', '1st Semester', 'Test Question2', 'A1', 'B1', 'C1', 'D1', 'B'),
(50, 'Question', 'Question Bank', 'Accepted', '2023-11-01 11:59:09', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Properties of Engineering Materials', 'Endterm', '1st Semester', 'Test Question4', 'A1', 'B1', 'C1', 'D1', 'C'),
(51, 'Question', 'Question Bank', 'Declined', '2023-11-01 11:59:23', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'Midterm', '3rd Semester', 'Test Question5', 'A2', 'B2', 'C2', 'D2', 'B'),
(52, 'Syllabus', 'Module', 'Accepted', '2023-11-01 12:03:01', 'Rodolfo Baylen III', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Midterm', '2nd Year', 'exam example.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam example.pdf', '', '', '', '', '', '', '', '', '', ''),
(53, 'Syllabus', 'Module', 'Accepted', '2023-11-01 12:05:15', 'Christian Noel Salvador', 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V', 'Midterm', '2nd Year', 'Document.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Document.pdf', '', '', '', '', '', '', '', '', '', ''),
(54, 'Syllabus', 'Module', 'Declined', '2023-11-01 12:24:20', 'Rodolfo Baylen III', 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V', 'Prelim', '2nd Year', 'exam done.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam done.pdf', '', '', '', '', '', '', '', '', '', ''),
(55, 'Question', 'Question Bank', 'Accepted', '2023-11-01 12:46:26', 'Rodolfo Baylen III', '', '', '', '', '', '', '2nd Year', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'Midterm', '2nd Semester', 'What the Hell is happening', 'A1', 'B1', 'C1', 'D1', 'B'),
(56, 'Question', 'Question Bank', 'Declined', '2023-11-01 12:46:44', 'Rodolfo Baylen III', '', '', '', '', '', '', '3rd Year', 'Filipino 2 (Panitikang Panlipunan)', 'Midterm', '1st Semester', 'What the fuck is Happening', 'A2', 'B2', 'C2', 'D2', 'C'),
(57, 'Syllabus', 'Module', 'Declined', '2023-11-01 13:14:52', 'Patrick Lasola', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '2nd Year', 'Midterm-GEM1-TF.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Midterm-GEM1-TF.pdf', '', '', '', '', '', '', '', '', '', ''),
(58, 'Question', 'Question Bank', 'Accepted', '2023-11-01 16:39:07', 'Jhimboy Talagtag', '', '', '', '', '', '', '3rd Year', 'Properties of Engineering Materials', 'Midterm', '2nd Semester', 'Try ta ni nga question amo ni sa ang i accept ko', 'A1', 'B1', 'C1', 'D1', 'B'),
(59, 'Question', 'Question Bank', 'Declined', '2023-11-01 16:39:22', 'Jhimboy Talagtag', '', '', '', '', '', '', '3rd Year', 'Microprocessor and Interfacing Systems', 'Prelim', '2nd Semester', 'Try ta ni nga question amo ni sa ang i decline ko', 'A2', 'B2', 'C2', 'D2', 'B'),
(60, 'Syllabus', 'Module', 'Accepted', '2023-11-01 16:40:24', 'Jhimboy Talagtag', 'Software Engineering', 'COMP332B-V', 'Endterm', '3rd Year', 'sensors-20-01042-v2.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\sensors-20-01042-v2.pdf', '', '', '', '', '', '', '', '', '', ''),
(61, 'Syllabus', 'Module', 'Declined', '2023-11-01 16:40:49', 'Jhimboy Talagtag', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Midterm', '3rd Year', 'Midterm-GEM1-TF(1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Midterm-GEM1-TF(1).pdf', '', '', '', '', '', '', '', '', '', ''),
(62, 'Syllabus', 'Module', 'Declined', '2023-11-07 04:51:43', 'Jhimboy Talagtag', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Prelim', '3rd Year', 'Document.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Document.pdf', '', '', '', '', '', '', '', '', '', ''),
(63, 'Syllabus', 'Module', 'Accepted', '2023-11-07 07:49:38', 'Jhimboy Talagtag', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '3rd Year', 'SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1(1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1(1).pdf', '', '', '', '', '', '', '', '', '', ''),
(64, 'Question', 'Question Bank', 'Accepted', '2023-11-07 08:08:06', 'Jhimboy Talagtag', '', '', '', '', '', '', '3rd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Midterm', '2nd Semester', 'In robotics, what does the term \"End-Effector\" refer to?', 'The main controller unit of a robot', 'The part of a robot that connects it to the power source', 'The final component or tool attached to the robot\'s arm for performing tasks', 'The sensors that provide feedback to the robot\'s control system', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `actlog_tbl`
--

CREATE TABLE `actlog_tbl` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `choice` text NOT NULL,
  `type_content` text NOT NULL,
  `upload_name` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actlog_tbl`
--

INSERT INTO `actlog_tbl` (`id`, `type`, `upload_time`, `choice`, `type_content`, `upload_name`, `content`) VALUES
(30, 'Question', '2023-10-23 09:17:33', 'Accepted', 'Question Bank', 'Ela Juanillo', 'Love mo pa rin ba ko pag naging kuto ako?'),
(31, 'Question', '2023-10-19 04:38:06', 'Declined', 'Question Bank', 'BBBBBBBB', 'BBBBBBBBB'),
(32, 'Question', '2023-10-23 15:22:53', 'Declined', 'Question Bank', 'aaa', 'aaa'),
(33, 'Question', '2023-10-23 15:28:11', 'Declined', 'Question Bank', 'Ela Juanillo', 'Love mo pa rin ba ko pag naging kuto ako?'),
(34, 'Question', '2023-10-23 15:28:29', 'Accepted', 'Question Bank', 'aaa', 'aaa'),
(35, 'Syllabus', '2023-10-25 06:42:56', 'Declined', 'Module', 'qweqweqweqw', 'wqeqwe'),
(36, 'Question', '2023-10-25 07:12:51', 'Accepted', 'Question Bank', 'BBBBBBBB', 'BBBBBBBBB');

-- --------------------------------------------------------

--
-- Table structure for table `answers_tbl`
--

CREATE TABLE `answers_tbl` (
  `id` int(11) NOT NULL,
  `ans` text NOT NULL,
  `uc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers_tbl`
--

INSERT INTO `answers_tbl` (`id`, `ans`, `uc`) VALUES
(10, '4, 2, 2, 1, 3', 'CWXPH4'),
(11, '2, 1, 3, 2, 1, 3, 4, 1, 2, 2, 4, 3, 1, 4, 2, 2, 4, 4, 4, 4, 3, 1, 4, 4, 1, 1, 2, 4, 3, 2, 3, 2, 2, 3, 3, 2, 4, 4, 4, 2, 1, 3, 1, 2, 3, 2, 2, 3, 3, 2', '7878CE'),
(12, '4, 2, 3, 4, 2, 3, 1, 1, 3, 4, 2, 2, 3, 2, 4, 3, 3, 2, 1, 3, 4, 2, 2, 4, 2, 1, 4, 2, 4, 1, 3, 2, 4, 4, 1, 3, 4, 2, 1, 2, 1, 3, 4, 2, 1, 2, 2, 3, 3, 4', 'ZC67Z1'),
(13, '4, 3, 4, 2, 3, 4, 2, 3, 3, 2', 'HTZ8CO');

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `id` int(11) NOT NULL,
  `courseName` text NOT NULL,
  `acro` text NOT NULL,
  `dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `declinedsyllabus_tbl`
--

CREATE TABLE `declinedsyllabus_tbl` (
  `ID` int(11) NOT NULL,
  `archiveDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uploaderId` int(11) NOT NULL,
  `NameUpload` text NOT NULL,
  `subj` text NOT NULL,
  `subjCode` text NOT NULL,
  `term` text NOT NULL,
  `year` text NOT NULL,
  `file` text NOT NULL,
  `fileLoc` text NOT NULL,
  `dateUpload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateDeclined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `declinedsyllabus_tbl`
--

INSERT INTO `declinedsyllabus_tbl` (`ID`, `archiveDate`, `uploaderId`, `NameUpload`, `subj`, `subjCode`, `term`, `year`, `file`, `fileLoc`, `dateUpload`, `dateDeclined`) VALUES
(13, '2023-10-25 06:43:05', 0, 'qweqweqweqw', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'qweqwewq', '2023-10-25 06:42:56', '2023-11-07 04:48:21'),
(17, '2023-10-25 09:54:13', 0, 'bbbbbbbbbbb', 'bbbbbbbbbbb', 'bbbbbbbbb', 'bbbbbbbbbbbbbb', 'bbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbbbb', '2023-10-25 09:50:53', '2023-11-07 04:48:21'),
(18, '2023-10-31 03:20:20', 0, 'AAAAAAAAAAAAAAA', 'AAAAAAAAAAAAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAAAA', 'AAAAAAAAAA', 'AAAAAAAAAA', 'AAAAAAAAAAA', '2023-10-31 03:20:12', '2023-11-07 04:48:21'),
(19, '2023-10-31 06:38:30', 0, 'ZZZZZZZZZZZZZ', 'ZZZZZZZZZZ', 'ZZZZZZZZZZZZ', 'ZZZZZZZZZZ', 'ZZZZZZZZZZ', 'ZZZZZZZZZZZ', 'ZZZZZZZZZZZZZZZZZZ', '2023-10-31 05:10:26', '2023-11-07 04:48:21'),
(20, '2023-10-31 12:56:01', 0, 'qweqwe', 'qweqwe', 'qweqwe', 'wqeqwe', 'wqeqw', 'qweqwe', 'wqeqwe', '2023-10-31 06:39:32', '2023-11-07 04:48:21'),
(21, '2023-10-31 12:56:29', 0, 'Paul John Padohinog', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Midterm', '2nd Year', 'exam-done.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam-done.pdf', '2023-10-31 12:55:42', '2023-11-07 04:48:21'),
(22, '2023-11-01 12:24:20', 22, 'Rodolfo Baylen III', 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V', 'Prelim', '2nd Year', 'exam done.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam done.pdf', '2023-11-01 12:24:01', '2023-11-07 04:48:21'),
(23, '2023-11-01 13:14:52', 20, 'Patrick Lasola', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '2nd Year', 'Midterm-GEM1-TF.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Midterm-GEM1-TF.pdf', '2023-11-01 13:13:33', '2023-11-07 04:48:21'),
(24, '2023-11-01 16:40:49', 17, 'Jhimboy Talagtag', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Midterm', '3rd Year', 'Midterm-GEM1-TF(1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Midterm-GEM1-TF(1).pdf', '2023-11-01 16:40:00', '2023-11-07 04:48:21'),
(25, '2023-11-07 04:51:43', 17, 'Jhimboy Talagtag', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Prelim', '3rd Year', 'Document.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Document.pdf', '2023-11-07 04:48:47', '2023-11-07 04:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `departmenttbl`
--

CREATE TABLE `departmenttbl` (
  `id` int(11) NOT NULL,
  `dptname` text NOT NULL,
  `acronym` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmenttbl`
--

INSERT INTO `departmenttbl` (`id`, `dptname`, `acronym`) VALUES
(38, 'College of Automation and Control', 'COAC'),
(52, 'College of Engineering Technology', 'COET'),
(53, 'College of Engineering', 'COE');

-- --------------------------------------------------------

--
-- Table structure for table `exammaker_tbl`
--

CREATE TABLE `exammaker_tbl` (
  `id` int(11) NOT NULL,
  `uploader` text NOT NULL,
  `uploaderId` text NOT NULL,
  `Subj` text NOT NULL,
  `Term` text NOT NULL,
  `Semester` text NOT NULL,
  `items` text NOT NULL,
  `uniquecode` text NOT NULL,
  `dateUpload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exammaker_tbl`
--

INSERT INTO `exammaker_tbl` (`id`, `uploader`, `uploaderId`, `Subj`, `Term`, `Semester`, `items`, `uniquecode`, `dateUpload`) VALUES
(49, 'Paul John Padohinog', '18', 'Software Engineering', 'Midterm', '1st Semester', '5', 'CWXPH4', '2023-11-07 05:45:34'),
(50, 'Jhimboy Talagtag', '17', 'Software Engineering', 'Midterm', '1st Semester', '50', 'ZC67Z1', '2023-11-07 06:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `generatedquestions_tbl`
--

CREATE TABLE `generatedquestions_tbl` (
  `id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Answer` text NOT NULL,
  `UniqueCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generatedquestions_tbl`
--

INSERT INTO `generatedquestions_tbl` (`id`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `UniqueCode`) VALUES
(113, 'In the software development lifecycle, what does the \"Planning\" phase typically involve?', 'Executing the code', 'Gathering and analyzing requirements', 'Defining the software structure', 'Creating a project roadmap and schedule', 'D', 'CWXPH4'),
(114, 'Which type of testing examines the software’s functionality when stressed by a high load or volume?', 'Usability Testing', 'Stress Testing', 'System Testing', 'Compatibility Testing', 'B', 'CWXPH4'),
(115, 'In the context of software engineering, what is \"agile\" focused on?', 'Creating a single, extensive software release', 'Adapting to changing requirements and delivering increments of software', 'Structured, rigid development processes', 'Writing comprehensive documentation before coding', 'B', 'CWXPH4'),
(116, 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', 'CWXPH4'),
(117, 'Which software development model involves breaking down the project into several small parts called \"increments\" that are designed, implemented, and tested incrementally?', 'Spiral Model', 'Waterfall Model', 'Incremental Model', 'Incremental Model', 'C', 'CWXPH4'),
(118, 'Which type of testing examines the software’s functionality when stressed by a high load or volume?', 'Usability Testing', 'Stress Testing', 'System Testing', 'Compatibility Testing', 'B', '7878CE'),
(119, 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', '7878CE'),
(120, 'Which development process involves breaking down the project into smaller segments and completing them iteratively?', 'Waterfall Model', 'Spiral Model', 'Incremental Model', 'V-Model', 'C', '7878CE'),
(121, 'What is the primary objective of \"Black-box Testing\" in software testing?', 'To evaluate the internal structures or workings of a system', 'To examine the software\'s functionality without looking at its internal code', 'To validate the software against user requirements', 'To check the individual units or components of the software', 'B', '7878CE'),
(122, 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', '7878CE'),
(123, 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '7878CE'),
(124, 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', ' Application Programming Interface', 'D', '7878CE'),
(125, 'Which testing method examines the software to verify if it can work with other elements such as hardware, software, networks, etc.?', 'Integration Testing', ' System Testing', 'Unit Testing', 'Acceptance Testing', 'A', '7878CE'),
(126, 'In the context of software engineering, what is \"agile\" focused on?', 'Creating a single, extensive software release', 'Adapting to changing requirements and delivering increments of software', 'Structured, rigid development processes', 'Writing comprehensive documentation before coding', 'B', '7878CE'),
(127, 'What is the primary purpose of a version control system like Git in software development?', 'To design graphical user interfaces', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To test software across different operating systems', 'B', '7878CE'),
(128, 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', 'Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', '7878CE'),
(129, 'What is the purpose of \"pair programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '7878CE'),
(130, 'What does the term \"SDLC\" stand for in Software Engineering?', 'Software Development Lifecycle', 'Systematic Design and Logical Control', 'Systematic Deployment of Logical Code', 'Software Design and Logical Continuity', 'A', '7878CE'),
(131, 'In the software development lifecycle, what does the \"Planning\" phase typically involve?', 'Executing the code', 'Gathering and analyzing requirements', 'Defining the software structure', 'Creating a project roadmap and schedule', 'D', '7878CE'),
(132, 'What is the primary goal of a \'use case\' in software development?', 'To outline the specific functions of a class', 'To illustrate the interaction between users and the software system', 'To specify the acceptance criteria for software features', 'To define the layout and design of the user interface', 'B', '7878CE'),
(133, 'In the context of software development, what is the purpose of the \"SRS\" document?', 'To list software resources and storage', 'To specify the system’s requirements and functionalities', 'To showcase user interface designs', 'To document system testing results', 'B', '7878CE'),
(134, 'What does the term \"API\" stand for in the context of software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', '7878CE'),
(135, 'What is the primary purpose of a \'use case\' in software development?', 'To outline a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', '7878CE'),
(136, 'What is the primary purpose of a \'use case\' in software development?', 'To describe a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', '7878CE'),
(137, 'Which software development model emphasizes the development process in a series of repeated cycles, allowing for constant refinement?', 'Waterfall Model', 'V-Model', 'Spiral Model', 'Iterative Model', 'D', '7878CE'),
(138, 'Which testing method assesses individual units or components of a software application independently?', 'Integration Testing', 'System Testing', 'Unit Testing', 'Acceptance Testing', 'C', '7878CE'),
(139, 'What does UML stand for in software engineering?', 'Unified Modeling Language', 'Uniform Modeling Logic', 'Universal Markup Language', 'Unique Model Link', 'A', '7878CE'),
(140, 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', '7878CE'),
(141, 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', '7878CE'),
(142, 'What is the purpose of version control systems like Git in software development?', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To design the graphical user interface', 'To test software against various operating systems', 'A', '7878CE'),
(143, 'Which software development methodology focuses on a sequential, non-iterative design process?', 'Waterfall Model', ' Agile Model', 'V-Model', 'Incremental Model', 'A', '7878CE'),
(144, 'Which development methodology emphasizes constant user involvement throughout the project?', 'Waterfall Model', ' Agile Model', ' V-Model', 'Spiral Model', 'B', '7878CE'),
(145, 'Which development methodology relies on frequent, small incremental releases with constant user feedback?', 'Waterfall Model', 'Iterative Model', 'V-Model', ' Agile Model', 'D', '7878CE'),
(146, 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '7878CE'),
(147, 'Which software development process involves the continuous feedback loop for constant improvement?', 'Waterfall Model', 'Agile Model', 'V-Model', 'Spiral Model', 'B', '7878CE'),
(148, 'Which software development model involves continuously revisiting and refining earlier stages as new understanding is gained throughout the project?', 'V-Model', 'Waterfall Model', 'Spiral Model', ' Iterative Model', 'C', '7878CE'),
(149, 'What does \"SCRUM\" represent in Agile Software Development?', 'An iterative and incremental approach to software development', 'A project management framework with roles, events, and artifacts', 'A technique for software testing and validation', 'A design pattern for user interface development', 'B', '7878CE'),
(150, 'What is the purpose of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', '7878CE'),
(151, 'What is the primary goal of a software requirement specification document?', 'To list software resources and storage', 'To list software resources and storage', 'To capture and communicate the system\'s intended behavior and constraints', 'To document system testing results', 'C', '7878CE'),
(152, 'Which type of testing is performed to validate if the software works in different environments, configurations, and conditions?', 'Integration Testing', 'Regression Testing', 'System Testing', 'Acceptance Testing', 'C', '7878CE'),
(153, 'Which development model involves a linear and sequential approach, moving through phases like Requirements, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'V-Model', 'Spiral Model', 'B', '7878CE'),
(154, 'What is the main goal of the \"Planning\" phase in the Software Development Lifecycle?', 'To execute the code', 'To gather and analyze requirements', 'To define the structure of the software', 'To create a project roadmap and schedule', 'D', '7878CE'),
(155, 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', ' Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', '7878CE'),
(156, 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', '7878CE'),
(157, 'What is the purpose of the \"Requirement Analysis\" phase in Software Development?', 'To ensure that the software is bug-free', 'To define the features, functions, and constraints of the software', 'To create a user-friendly interface', 'To ensure the compatibility of software with various devices', 'B', '7878CE'),
(158, 'What is the term for software testing that assesses whether the software can be successfully installed, configured, and uninstalled?', 'Installation Testing', 'Regression Testing', 'Stress Testing', 'Usability Testing', 'A', '7878CE'),
(159, 'In software development, what does the acronym \"OOP\" commonly represent?', 'Operational Object Processing', 'Output Oriented Programming', 'Object-Oriented Programming', 'Open-Source Protocol', 'C', '7878CE'),
(160, 'What is the main goal of \"Acceptance Testing\" in software development?', 'To verify the software against user requirements', 'To test the entire system after changes to ensure no new defects arise', 'To assess the software\'s behavior in various environments', 'To examine the software’s functionality when stressed by a high load or volume', 'A', '7878CE'),
(161, 'In software development, what is the purpose of \"unit testing\"?', 'To test the software as a whole before release', 'To examine the individual units or components of the software', 'To validate the software against user requirements', 'To assess the system\'s behavior in various environments', 'B', '7878CE'),
(162, 'Which testing method examines the software’s functionality against the specified requirements?', 'Integration Testing', 'Regression Testing', 'Acceptance Testing', 'System Testing', 'C', '7878CE'),
(163, 'What is the main goal of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', '7878CE'),
(164, 'Which software development model is known for its sequential phases of Requirement Analysis, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'Spiral Model', 'V-Model', 'B', '7878CE'),
(165, 'What is the role of a software requirement specification in the development process?', 'To document how to use the software', 'To define user interfaces', 'To capture and communicate the system\'s intended behavior and constraints', 'To create architectural diagrams', 'C', '7878CE'),
(166, 'Which software development model involves breaking down the project into several small parts called \"increments\" that are designed, implemented, and tested incrementally?', 'Spiral Model', 'Waterfall Model', 'Incremental Model', 'Incremental Model', 'C', '7878CE'),
(167, 'What is the primary objective of \"User Acceptance Testing\" (UAT) in software development?', 'To ensure that the code is error-free', 'To verify that the software meets user requirements', 'To assess the software\'s security features', 'To check the speed and performance of the software', 'B', '7878CE'),
(168, 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', 'ZC67Z1'),
(169, 'Which software development model is known for its sequential phases of Requirement Analysis, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'Spiral Model', 'V-Model', 'B', 'ZC67Z1'),
(170, 'In software development, what does the acronym \"OOP\" commonly represent?', 'Operational Object Processing', 'Output Oriented Programming', 'Object-Oriented Programming', 'Open-Source Protocol', 'C', 'ZC67Z1'),
(171, 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', ' Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', 'ZC67Z1'),
(172, 'What is the primary purpose of a version control system like Git in software development?', 'To design graphical user interfaces', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To test software across different operating systems', 'B', 'ZC67Z1'),
(173, 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', 'ZC67Z1'),
(174, 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', 'ZC67Z1'),
(175, 'What is the main goal of \"Acceptance Testing\" in software development?', 'To verify the software against user requirements', 'To test the entire system after changes to ensure no new defects arise', 'To assess the software\'s behavior in various environments', 'To examine the software’s functionality when stressed by a high load or volume', 'A', 'ZC67Z1'),
(176, 'Which software development model involves breaking down the project into several small parts called \"increments\" that are designed, implemented, and tested incrementally?', 'Spiral Model', 'Waterfall Model', 'Incremental Model', 'Incremental Model', 'C', 'ZC67Z1'),
(177, 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', 'ZC67Z1'),
(178, 'Which development model involves a linear and sequential approach, moving through phases like Requirements, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'V-Model', 'Spiral Model', 'B', 'ZC67Z1'),
(179, 'In the context of software development, what is the purpose of the \"SRS\" document?', 'To list software resources and storage', 'To specify the system’s requirements and functionalities', 'To showcase user interface designs', 'To document system testing results', 'B', 'ZC67Z1'),
(180, 'Which testing method examines the software’s functionality against the specified requirements?', 'Integration Testing', 'Regression Testing', 'Acceptance Testing', 'System Testing', 'C', 'ZC67Z1'),
(181, 'What is the purpose of the \"Requirement Analysis\" phase in Software Development?', 'To ensure that the software is bug-free', 'To define the features, functions, and constraints of the software', 'To create a user-friendly interface', 'To ensure the compatibility of software with various devices', 'B', 'ZC67Z1'),
(182, 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', 'Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', 'ZC67Z1'),
(183, 'Which testing method assesses individual units or components of a software application independently?', 'Integration Testing', 'System Testing', 'Unit Testing', 'Acceptance Testing', 'C', 'ZC67Z1'),
(184, 'Which development process involves breaking down the project into smaller segments and completing them iteratively?', 'Waterfall Model', 'Spiral Model', 'Incremental Model', 'V-Model', 'C', 'ZC67Z1'),
(185, 'In the context of software engineering, what is \"agile\" focused on?', 'Creating a single, extensive software release', 'Adapting to changing requirements and delivering increments of software', 'Structured, rigid development processes', 'Writing comprehensive documentation before coding', 'B', 'ZC67Z1'),
(186, 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', 'ZC67Z1'),
(187, 'What is the primary goal of a software requirement specification document?', 'To list software resources and storage', 'To list software resources and storage', 'To capture and communicate the system\'s intended behavior and constraints', 'To document system testing results', 'C', 'ZC67Z1'),
(188, 'What is the primary purpose of a \'use case\' in software development?', 'To describe a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', 'ZC67Z1'),
(189, 'What is the primary objective of \"User Acceptance Testing\" (UAT) in software development?', 'To ensure that the code is error-free', 'To verify that the software meets user requirements', 'To assess the software\'s security features', 'To check the speed and performance of the software', 'B', 'ZC67Z1'),
(190, 'Which type of testing examines the software’s functionality when stressed by a high load or volume?', 'Usability Testing', 'Stress Testing', 'System Testing', 'Compatibility Testing', 'B', 'ZC67Z1'),
(191, 'Which software development model emphasizes the development process in a series of repeated cycles, allowing for constant refinement?', 'Waterfall Model', 'V-Model', 'Spiral Model', 'Iterative Model', 'D', 'ZC67Z1'),
(192, 'What is the primary objective of \"Black-box Testing\" in software testing?', 'To evaluate the internal structures or workings of a system', 'To examine the software\'s functionality without looking at its internal code', 'To validate the software against user requirements', 'To check the individual units or components of the software', 'B', 'ZC67Z1'),
(193, 'What is the term for software testing that assesses whether the software can be successfully installed, configured, and uninstalled?', 'Installation Testing', 'Regression Testing', 'Stress Testing', 'Usability Testing', 'A', 'ZC67Z1'),
(194, 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', ' Application Programming Interface', 'D', 'ZC67Z1'),
(195, 'What does \"SCRUM\" represent in Agile Software Development?', 'An iterative and incremental approach to software development', 'A project management framework with roles, events, and artifacts', 'A technique for software testing and validation', 'A design pattern for user interface development', 'B', 'ZC67Z1'),
(196, 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', 'ZC67Z1'),
(197, 'What is the purpose of version control systems like Git in software development?', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To design the graphical user interface', 'To test software against various operating systems', 'A', 'ZC67Z1'),
(198, 'Which software development model involves continuously revisiting and refining earlier stages as new understanding is gained throughout the project?', 'V-Model', 'Waterfall Model', 'Spiral Model', ' Iterative Model', 'C', 'ZC67Z1'),
(199, 'Which software development process involves the continuous feedback loop for constant improvement?', 'Waterfall Model', 'Agile Model', 'V-Model', 'Spiral Model', 'B', 'ZC67Z1'),
(200, 'What does the term \"API\" stand for in the context of software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', 'ZC67Z1'),
(201, 'What is the primary purpose of a \'use case\' in software development?', 'To outline a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', 'ZC67Z1'),
(202, 'What does UML stand for in software engineering?', 'Unified Modeling Language', 'Uniform Modeling Logic', 'Universal Markup Language', 'Unique Model Link', 'A', 'ZC67Z1'),
(203, 'What is the role of a software requirement specification in the development process?', 'To document how to use the software', 'To define user interfaces', 'To capture and communicate the system\'s intended behavior and constraints', 'To create architectural diagrams', 'C', 'ZC67Z1'),
(204, 'Which development methodology relies on frequent, small incremental releases with constant user feedback?', 'Waterfall Model', 'Iterative Model', 'V-Model', ' Agile Model', 'D', 'ZC67Z1'),
(205, 'In software development, what is the purpose of \"unit testing\"?', 'To test the software as a whole before release', 'To examine the individual units or components of the software', 'To validate the software against user requirements', 'To assess the system\'s behavior in various environments', 'B', 'ZC67Z1'),
(206, 'What does the term \"SDLC\" stand for in Software Engineering?', 'Software Development Lifecycle', 'Systematic Design and Logical Control', 'Systematic Deployment of Logical Code', 'Software Design and Logical Continuity', 'A', 'ZC67Z1'),
(207, 'Which development methodology emphasizes constant user involvement throughout the project?', 'Waterfall Model', ' Agile Model', ' V-Model', 'Spiral Model', 'B', 'ZC67Z1'),
(208, 'Which software development methodology focuses on a sequential, non-iterative design process?', 'Waterfall Model', ' Agile Model', 'V-Model', 'Incremental Model', 'A', 'ZC67Z1'),
(209, 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', 'ZC67Z1'),
(210, 'What is the main goal of the \"Planning\" phase in the Software Development Lifecycle?', 'To execute the code', 'To gather and analyze requirements', 'To define the structure of the software', 'To create a project roadmap and schedule', 'D', 'ZC67Z1'),
(211, 'What is the primary goal of a \'use case\' in software development?', 'To outline the specific functions of a class', 'To illustrate the interaction between users and the software system', 'To specify the acceptance criteria for software features', 'To define the layout and design of the user interface', 'B', 'ZC67Z1'),
(212, 'Which testing method examines the software to verify if it can work with other elements such as hardware, software, networks, etc.?', 'Integration Testing', ' System Testing', 'Unit Testing', 'Acceptance Testing', 'A', 'ZC67Z1'),
(213, 'What is the purpose of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', 'ZC67Z1'),
(214, 'What is the main goal of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', 'ZC67Z1'),
(215, 'What is the purpose of \"pair programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', 'ZC67Z1'),
(216, 'Which type of testing is performed to validate if the software works in different environments, configurations, and conditions?', 'Integration Testing', 'Regression Testing', 'System Testing', 'Acceptance Testing', 'C', 'ZC67Z1'),
(217, 'In the software development lifecycle, what does the \"Planning\" phase typically involve?', 'Executing the code', 'Gathering and analyzing requirements', 'Defining the software structure', 'Creating a project roadmap and schedule', 'D', 'ZC67Z1'),
(218, 'What does the term \"API\" stand for in the context of software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', 'HTZ8CO'),
(219, 'Which type of testing is performed to validate if the software works in different environments, configurations, and conditions?', 'Integration Testing', 'Regression Testing', 'System Testing', 'Acceptance Testing', 'C', 'HTZ8CO'),
(220, 'What is the main goal of the \"Planning\" phase in the Software Development Lifecycle?', 'To execute the code', 'To gather and analyze requirements', 'To define the structure of the software', 'To create a project roadmap and schedule', 'D', 'HTZ8CO'),
(221, 'What is the primary purpose of a version control system like Git in software development?', 'To design graphical user interfaces', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To test software across different operating systems', 'B', 'HTZ8CO'),
(222, 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', 'HTZ8CO'),
(223, 'Which software development model emphasizes the development process in a series of repeated cycles, allowing for constant refinement?', 'Waterfall Model', 'V-Model', 'Spiral Model', 'Iterative Model', 'D', 'HTZ8CO'),
(224, 'What does \"SCRUM\" represent in Agile Software Development?', 'An iterative and incremental approach to software development', 'A project management framework with roles, events, and artifacts', 'A technique for software testing and validation', 'A design pattern for user interface development', 'B', 'HTZ8CO'),
(225, 'In software development, what does the acronym \"OOP\" commonly represent?', 'Operational Object Processing', 'Output Oriented Programming', 'Object-Oriented Programming', 'Open-Source Protocol', 'C', 'HTZ8CO'),
(226, 'Which testing method assesses individual units or components of a software application independently?', 'Integration Testing', 'System Testing', 'Unit Testing', 'Acceptance Testing', 'C', 'HTZ8CO'),
(227, 'Which software development model is known for its sequential phases of Requirement Analysis, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'Spiral Model', 'V-Model', 'B', 'HTZ8CO');

-- --------------------------------------------------------

--
-- Table structure for table `qbchecker_tbl`
--

CREATE TABLE `qbchecker_tbl` (
  `id` int(11) NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `archiveDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uploadedby` text NOT NULL,
  `time_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Question` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Answer` text NOT NULL,
  `Subject` text NOT NULL,
  `Year` text NOT NULL,
  `Term` text NOT NULL,
  `Semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qbchecker_tbl`
--

INSERT INTO `qbchecker_tbl` (`id`, `uploaderId`, `archiveDate`, `uploadedby`, `time_uploaded`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `Subject`, `Year`, `Term`, `Semester`) VALUES
(46, 17, '2023-11-07 08:11:33', 'Jhimboy Talagtag', '2023-11-07 08:11:33', 'hello', 'A', 'B', 'C', 'D', 'A', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', '2nd Year', 'Midterm', '2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `qbdecline_tbl`
--

CREATE TABLE `qbdecline_tbl` (
  `id` int(11) NOT NULL,
  `archiveDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uploaderId` int(11) NOT NULL,
  `uploadedby` text NOT NULL,
  `time_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Question` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Answer` text NOT NULL,
  `Subject` text NOT NULL,
  `Year` text NOT NULL,
  `Term` text NOT NULL,
  `Semester` text NOT NULL,
  `dateDeclined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qbdecline_tbl`
--

INSERT INTO `qbdecline_tbl` (`id`, `archiveDate`, `uploaderId`, `uploadedby`, `time_uploaded`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `Subject`, `Year`, `Term`, `Semester`, `dateDeclined`) VALUES
(20, '2023-10-31 14:12:30', 0, 'Christian Noel Salvador', '2023-10-31 14:12:08', 'dfsddf', 'asdbb', 'bbsd', 'ccsa', 'dsa', 'C', 'National Service Training Program 2 (NROTC II/CWTS II)', '2nd Year', 'Prelim', '3rd Semester', '2023-11-07 04:59:57'),
(21, '2023-11-01 10:23:22', 0, 'Andrew Tate', '2023-10-31 06:25:49', 'Do you like women?', 'No', 'Nada', 'Hell no', 'Be a pussy', 'B', 'Tate lessons', 'any year', 'Prelim', '3rd Semester', '2023-11-07 04:59:57'),
(22, '2023-11-01 11:17:02', 22, 'Rodolfo Baylen III', '2023-11-01 11:17:02', 'What the Hell', 'A1', 'B1', 'C1', 'D1', 'A', 'Software Engineering', '2nd Year', 'Prelim', '2nd Semester', '2023-11-07 04:59:57'),
(23, '2023-11-01 11:44:39', 22, 'Rodolfo Baylen III', '2023-11-01 11:33:40', 'Test Question', 'A1', 'B1', 'C1', 'D1', 'B', 'Filipino 2 (Panitikang Panlipunan)', '2nd Year', 'Midterm', '2nd Semester', '2023-11-07 04:59:57'),
(24, '2023-11-01 11:51:54', 22, 'Rodolfo Baylen III', '2023-11-01 11:46:46', 'Test Question2', 'A1', 'B1', 'C1', 'D1', 'B', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', '3rd Year', 'Midterm', '1st Semester', '2023-11-07 04:59:57'),
(25, '2023-11-01 11:59:23', 22, 'Rodolfo Baylen III', '2023-11-01 11:58:53', 'Test Question5', 'A2', 'B2', 'C2', 'D2', 'B', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', '2nd Year', 'Midterm', '3rd Semester', '2023-11-07 04:59:57'),
(26, '2023-11-01 12:46:44', 22, 'Rodolfo Baylen III', '2023-11-01 12:46:13', 'What the fuck is Happening', 'A2', 'B2', 'C2', 'D2', 'C', 'Filipino 2 (Panitikang Panlipunan)', '3rd Year', 'Midterm', '1st Semester', '2023-11-07 04:59:57'),
(27, '2023-11-01 16:39:22', 17, 'Jhimboy Talagtag', '2023-11-01 16:38:53', 'Try ta ni nga question amo ni sa ang i decline ko', 'A2', 'B2', 'C2', 'D2', 'B', 'Microprocessor and Interfacing Systems', '3rd Year', 'Prelim', '2nd Semester', '2023-11-07 04:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `questionbank_tbl`
--

CREATE TABLE `questionbank_tbl` (
  `ID` int(11) NOT NULL,
  `Year` text NOT NULL,
  `Subject` text NOT NULL,
  `Term` text NOT NULL,
  `Semester` text NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `uploadedby` text NOT NULL,
  `time_uploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Question` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Answer` text NOT NULL,
  `dateAccepted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionbank_tbl`
--

INSERT INTO `questionbank_tbl` (`ID`, `Year`, `Subject`, `Term`, `Semester`, `uploaderId`, `uploadedby`, `time_uploaded`, `Question`, `A`, `B`, `C`, `D`, `Answer`, `dateAccepted`) VALUES
(205, '1st Year', 'Analytic Geometry with Solid Mensuration', 'Midterm', '2nd Semester', 20, 'Patrick Lasola', '2023-11-01 10:17:40', 'What is the equation of a plane in three-dimensional space?', 'Ax+By+Cz=D', 'y=mx+b', 'E=mc^2', 'F=ma', 'A', '2023-11-07 04:56:45'),
(206, '2nd Year', 'Intro to Computing Environment (Logic Formulation)', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:17:44', 'What data type is used to store a single character in many programming languages?', 'Integer', 'Float', 'String', 'Char', 'D', '2023-11-07 04:56:45'),
(207, '1st Year', 'Intro to Computing Environment (Logic Formulation)', 'Endterm', '2nd Semester', 20, 'Patrick Lasola', '2023-11-01 10:17:47', 'In computer programming, what does the acronym \"CPU\" stand for?', 'Central Processing Unit', 'Computer Programming Unit', 'Computer Peripheral Unit', 'Central Print Unit', 'A', '2023-11-07 04:56:45'),
(208, '3rd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Midterm', '2nd Semester', 21, 'Yoshiyuki Canoy', '2023-11-01 10:13:34', 'In robotics, what does the term \"End-Effector\" refer to?', 'The main controller unit of a robot', 'The part of a robot that connects it to the power source', 'The final component or tool attached to the robot\'s arm for performing tasks', 'The sensors that provide feedback to the robot\'s control system', 'C', '2023-11-07 04:56:45'),
(209, '3rd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Prelim', '3rd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the primary purpose of a PID controller in a robotic system?', 'To provide wireless communication', 'To manage the power supply', 'To regulate the position and stability of the robot', 'To create a visual interface for users', 'C', '2023-11-07 04:56:45'),
(210, '2nd Year', 'Contracts, Laws, Specifications and Ethics', 'Midterm', '3rd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which legal principle states that contracts should be fair, just, and entered into willingly by all parties involved?', 'Principle of Acceptance', 'Principle of Equity', 'Principle of Offer', 'Principle of Breach', 'B', '2023-11-07 04:56:45'),
(211, '2nd Year', 'Workshop Theory and Practice 3 (Sheet Metal Works)', 'Midterm', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which tool is commonly used for bending sheet metal at a specific angle?', 'Hammer', 'Pliers', 'Brake press', 'Screwdriver', 'C', '2023-11-07 04:56:45'),
(212, '4th Year', 'Software Engineering', 'Prelim', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'In the software development life cycle, which phase involves defining the software\'s functionality and features?', 'Implementation', 'Testing', 'Requirements analysis', 'Maintenance', 'C', '2023-11-07 04:56:45'),
(213, '1st Year', 'Filipino 2 (Panitikang Panlipunan)', 'Midterm', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Sinu-sino ang mga pangunahing manunulat na kinikilala sa panahon ng panitikang Panlipunan?', 'Jose Rizal, Andres Bonifacio', 'Francisco Balagtas, Juan Luna', 'Emilio Aguinaldo, Ferdinand Marcos', 'Manuel Quezon, Corazon Aquino', 'A', '2023-11-07 04:56:45'),
(214, '1st Year', 'Filipino 2 (Panitikang Panlipunan)', 'Endterm', '3rd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Ano ang pangunahing tema ng \"Noli Me Tangere\" ni Jose Rizal?', 'Pag-ibig', 'Kalayaan', 'Kasaysayan', 'Kahirapan', 'A', '2023-11-07 04:56:45'),
(215, '2nd Year', 'Software Engineering', 'Prelim', '3rd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the role of a version control system in software development?', 'It helps manage project finances.', 'It tracks changes to source code and facilitates collaboration among developers.', 'It automates the testing process.', 'It designs user interfaces.', 'B', '2023-11-07 04:56:45'),
(216, '4th Year', 'Network Administration', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'In computer networking, what is the primary function of a router?', 'To connect devices within a local area network (LAN)', 'To filter and forward data packets between different networks', 'To provide wireless access to the internet', 'To protect against computer viruses and malware', 'B', '2023-11-07 04:56:45'),
(217, '4th Year', 'Network Administration', 'Midterm', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the purpose of the IP address in a computer network?', 'To determine the physical location of a device', 'To identify the manufacturer of a device', 'To uniquely identify devices on the network', 'To encrypt data for secure transmission', 'C', '2023-11-07 04:56:45'),
(218, '3rd Year', 'Software Engineering', 'Prelim', '3rd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which software development methodology emphasizes incremental and iterative development with a focus on customer feedback?', 'Waterfall', 'Agile', 'Spiral', 'V-Model', 'B', '2023-11-07 04:56:45'),
(219, '2nd Year', 'National Service Training Program 2 (NROTC II/CWTS II)', 'Midterm', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'In the context of NROTC (National Reserve Officers\' Training Corps), what is the primary mission of the program?', 'To provide military training to students for active duty service', 'To develop leadership skills and a sense of civic duty among students', 'To offer scholarships to students interested in engineering', 'To provide physical fitness training to college athletes', 'B', '2023-11-07 04:56:45'),
(220, '3rd Year', 'Instrumentation and Process Control', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the purpose of a control loop in process control systems?', 'To measure the flow of electricity in a circuit', 'To maintain a specific process variable (e.g., temperature or pressure) at a desired setpoint', 'To monitor environmental conditions in a laboratory', 'To regulate the speed of a computer\'s processor', 'B', '2023-11-07 04:56:45'),
(221, '3rd Year', 'Instrumentation and Process Control', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is a sensor or transducer in the context of instrumentation and process control?', 'A device that converts a physical quantity (e.g., temperature, pressure) into an electrical signal', 'A control panel with buttons and switches', 'A unit that measures the humidity in the air', 'A software program used for data analysis', 'A', '2023-11-07 04:56:45'),
(222, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What does the term \"SDLC\" stand for in Software Engineering?', 'Software Development Lifecycle', 'Systematic Design and Logical Control', 'Systematic Deployment of Logical Code', 'Software Design and Logical Continuity', 'A', '2023-11-07 04:56:45'),
(223, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'Which software development model is known for its sequential phases of Requirement Analysis, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'Spiral Model', 'V-Model', 'B', '2023-11-07 04:56:45'),
(224, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'In software development, what does the acronym \"OOP\" commonly represent?', 'Operational Object Processing', 'Output Oriented Programming', 'Object-Oriented Programming', 'Open-Source Protocol', 'C', '2023-11-07 04:56:45'),
(225, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'Which testing method assesses individual units or components of a software application independently?', 'Integration Testing', 'System Testing', 'Unit Testing', 'Acceptance Testing', 'C', '2023-11-07 04:56:45'),
(226, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What is the primary goal of a \'use case\' in software development?', 'To outline the specific functions of a class', 'To illustrate the interaction between users and the software system', 'To specify the acceptance criteria for software features', 'To define the layout and design of the user interface', 'B', '2023-11-07 04:56:45'),
(227, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', 'Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', '2023-11-07 04:56:45'),
(228, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What does the term \"API\" stand for in the context of software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', '2023-11-07 04:56:45'),
(229, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What does \"SCRUM\" represent in Agile Software Development?', 'An iterative and incremental approach to software development', 'A project management framework with roles, events, and artifacts', 'A technique for software testing and validation', 'A design pattern for user interface development', 'B', '2023-11-07 04:56:45'),
(230, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What is the purpose of version control systems like Git in software development?', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To design the graphical user interface', 'To test software against various operating systems', 'A', '2023-11-07 04:56:45'),
(231, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'In the context of software engineering, what is \"agile\" focused on?', 'Creating a single, extensive software release', 'Adapting to changing requirements and delivering increments of software', 'Structured, rigid development processes', 'Writing comprehensive documentation before coding', 'B', '2023-11-07 04:56:45'),
(232, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'Which type of testing is performed to validate if the software works in different environments, configurations, and conditions?', 'Integration Testing', 'Regression Testing', 'System Testing', 'Acceptance Testing', 'C', '2023-11-07 04:56:45'),
(233, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What is the purpose of the \"Requirement Analysis\" phase in Software Development?', 'To ensure that the software is bug-free', 'To define the features, functions, and constraints of the software', 'To create a user-friendly interface', 'To ensure the compatibility of software with various devices', 'B', '2023-11-07 04:56:45'),
(234, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What is the term for software testing that assesses whether the software can be successfully installed, configured, and uninstalled?', 'Installation Testing', 'Regression Testing', 'Stress Testing', 'Usability Testing', 'A', '2023-11-07 04:56:45'),
(235, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'Which software development process involves the continuous feedback loop for constant improvement?', 'Waterfall Model', 'Agile Model', 'V-Model', 'Spiral Model', 'B', '2023-11-07 04:56:45'),
(236, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 20, 'Patrick Lasola', '2023-11-01 10:09:22', 'What does UML stand for in software engineering?', 'Unified Modeling Language', 'Uniform Modeling Logic', 'Universal Markup Language', 'Unique Model Link', 'A', '2023-11-07 04:56:45'),
(237, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', '2023-11-07 04:56:45'),
(238, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which development methodology relies on frequent, small incremental releases with constant user feedback?', 'Waterfall Model', 'Iterative Model', 'V-Model', ' Agile Model', 'D', '2023-11-07 04:56:45'),
(239, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the primary purpose of a \'use case\' in software development?', 'To describe a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', '2023-11-07 04:56:45'),
(240, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the main goal of the \"Planning\" phase in the Software Development Lifecycle?', 'To execute the code', 'To gather and analyze requirements', 'To define the structure of the software', 'To create a project roadmap and schedule', 'D', '2023-11-07 04:56:45'),
(241, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'In software development, what is the purpose of \"unit testing\"?', 'To test the software as a whole before release', 'To examine the individual units or components of the software', 'To validate the software against user requirements', 'To assess the system\'s behavior in various environments', 'B', '2023-11-07 04:56:45'),
(242, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the primary purpose of a version control system like Git in software development?', 'To design graphical user interfaces', 'To manage and track changes in source code and facilitate collaboration among developers', 'To compile and debug code errors', 'To test software across different operating systems', 'B', '2023-11-07 04:56:45'),
(243, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which software development model emphasizes the development process in a series of repeated cycles, allowing for constant refinement?', 'Waterfall Model', 'V-Model', 'Spiral Model', 'Iterative Model', 'D', '2023-11-07 04:56:45'),
(244, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the role of a software requirement specification in the development process?', 'To document how to use the software', 'To define user interfaces', 'To capture and communicate the system\'s intended behavior and constraints', 'To create architectural diagrams', 'C', '2023-11-07 04:56:45'),
(245, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', 'Application Programming Interface', 'D', '2023-11-07 04:56:45'),
(246, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which testing method examines the software’s functionality against the specified requirements?', 'Integration Testing', 'Regression Testing', 'Acceptance Testing', 'System Testing', 'C', '2023-11-07 04:56:45'),
(247, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the purpose of \"pair programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '2023-11-07 04:56:45'),
(248, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', '2023-11-07 04:56:45'),
(249, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'In the context of software development, what is the purpose of the \"SRS\" document?', 'To list software resources and storage', 'To specify the system’s requirements and functionalities', 'To showcase user interface designs', 'To document system testing results', 'B', '2023-11-07 04:56:45'),
(250, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'Which development process involves breaking down the project into smaller segments and completing them iteratively?', 'Waterfall Model', 'Spiral Model', 'Incremental Model', 'V-Model', 'C', '2023-11-07 04:56:45'),
(251, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 10:16:49', 'What is the purpose of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', '2023-11-07 04:56:45'),
(252, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which software development model involves breaking down the project into several small parts called \"increments\" that are designed, implemented, and tested incrementally?', 'Spiral Model', 'Waterfall Model', 'Incremental Model', 'Incremental Model', 'C', '2023-11-07 04:56:45'),
(253, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the primary objective of \"User Acceptance Testing\" (UAT) in software development?', 'To ensure that the code is error-free', 'To verify that the software meets user requirements', 'To assess the software\'s security features', 'To check the speed and performance of the software', 'B', '2023-11-07 04:56:45'),
(254, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which type of testing examines the software’s functionality when stressed by a high load or volume?', 'Usability Testing', 'Stress Testing', 'System Testing', 'Compatibility Testing', 'B', '2023-11-07 04:56:45'),
(255, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '2023-11-07 04:56:45'),
(256, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which software development model involves continuously revisiting and refining earlier stages as new understanding is gained throughout the project?', 'V-Model', 'Waterfall Model', 'Spiral Model', ' Iterative Model', 'C', '2023-11-07 04:56:45'),
(257, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the primary purpose of a \'use case\' in software development?', 'To outline a specific scenario within the code', 'To highlight potential system vulnerabilities', 'To identify problems in the user interface', 'To define interactions between users and the software system', 'D', '2023-11-07 04:56:45'),
(258, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the primary goal of a software requirement specification document?', 'To list software resources and storage', 'To list software resources and storage', 'To capture and communicate the system\'s intended behavior and constraints', 'To document system testing results', 'C', '2023-11-07 04:56:45'),
(259, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which software development methodology focuses on a sequential, non-iterative design process?', 'Waterfall Model', ' Agile Model', 'V-Model', 'Incremental Model', 'A', '2023-11-07 04:56:45'),
(260, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which development methodology emphasizes constant user involvement throughout the project?', 'Waterfall Model', ' Agile Model', ' V-Model', 'Spiral Model', 'B', '2023-11-07 04:56:45'),
(261, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the primary objective of \"Black-box Testing\" in software testing?', 'To evaluate the internal structures or workings of a system', 'To examine the software\'s functionality without looking at its internal code', 'To validate the software against user requirements', 'To check the individual units or components of the software', 'B', '2023-11-07 04:56:45'),
(262, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the main goal of \"Regression Testing\" in software development?', 'To validate the system against the requirements', 'To test the entire system after changes to ensure no new defects arise', 'To verify the code written by a particular developer', 'To examine system performance under stress', 'B', '2023-11-07 04:56:45'),
(263, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which testing method examines the software to verify if it can work with other elements such as hardware, software, networks, etc.?', 'Integration Testing', ' System Testing', 'Unit Testing', 'Acceptance Testing', 'A', '2023-11-07 04:56:45'),
(264, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What does the term \"API\" stand for in software development?', 'Application Programmed Interface', 'Automated Programming Interface', 'Advanced Programming Instruction', ' Application Programming Interface', 'D', '2023-11-07 04:56:45'),
(265, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'In the software development lifecycle, what does the \"Planning\" phase typically involve?', 'Executing the code', 'Gathering and analyzing requirements', 'Defining the software structure', 'Creating a project roadmap and schedule', 'D', '2023-11-07 04:56:45'),
(266, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which development model involves a linear and sequential approach, moving through phases like Requirements, Design, Implementation, Testing, Deployment, and Maintenance?', 'Agile Model', 'Waterfall Model', 'V-Model', 'Spiral Model', 'B', '2023-11-07 04:56:45'),
(267, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the main goal of \"Acceptance Testing\" in software development?', 'To verify the software against user requirements', 'To test the entire system after changes to ensure no new defects arise', 'To assess the software\'s behavior in various environments', 'To examine the software’s functionality when stressed by a high load or volume', 'A', '2023-11-07 04:56:45'),
(268, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What does the term \"CI/CD\" stand for in the software development process?', 'Continuous Integration/Continuous Deployment', 'Code Integration/Code Deployment', 'Comprehensive Integration/Continuous Design', 'Continuous Inspection/Code Deployment', 'A', '2023-11-07 04:56:45'),
(269, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which phase of the Software Development Lifecycle involves detailed planning and the creation of a project roadmap?', ' Requirements Analysis', 'Design', 'Implementation', 'Planning', 'D', '2023-11-07 04:56:45'),
(270, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'What is the purpose of \"Pair Programming\" in Agile Software Development?', 'To minimize the number of team members', 'To optimize individual productivity', 'To foster collaboration and enhance software quality', 'To manage the development timeline', 'C', '2023-11-07 04:56:45'),
(271, '3rd Year', 'Software Engineering', 'Midterm', '1st Semester', 17, 'Jhimboy Talagtag', '2023-11-01 10:12:56', 'Which software development model emphasizes the creation of prototypes to better understand user needs and system requirements?', 'Spiral Model', 'V-Model', 'Agile Model', 'Prototyping Model', 'D', '2023-11-07 04:56:45'),
(272, '2nd Year', 'Intro to Computing Environment (Logic Formulation)', 'Midterm', '1st Semester', 1, 'Christian Noel Salvador', '2023-11-01 10:30:33', 'asdfsdfsadsasd', 'asdas', 'B2', 'C2', 'd2', 'B', '2023-11-07 04:56:45'),
(273, '2nd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Prelim', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 11:54:59', 'What the fuck?', 'A1', 'B1', 'C1', 'D1', 'A', '2023-11-07 04:56:45'),
(274, '2nd Year', 'Instrumentation and Process Control', 'Midterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 11:46:47', 'Test Question3', 'A2', 'B2', 'C2', 'D2', 'B', '2023-11-07 04:56:45'),
(275, '2nd Year', 'Properties of Engineering Materials', 'Endterm', '1st Semester', 22, 'Rodolfo Baylen III', '2023-11-01 11:58:53', 'Test Question4', 'A1', 'B1', 'C1', 'D1', 'C', '2023-11-07 04:56:45'),
(276, '2nd Year', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'Midterm', '2nd Semester', 22, 'Rodolfo Baylen III', '2023-11-01 12:46:13', 'What the Hell is happening', 'A1', 'B1', 'C1', 'D1', 'B', '2023-11-07 04:56:45'),
(277, '3rd Year', 'Properties of Engineering Materials', 'Midterm', '2nd Semester', 17, 'Jhimboy Talagtag', '2023-11-01 16:38:53', 'Try ta ni nga question amo ni sa ang i accept ko', 'A1', 'B1', 'C1', 'D1', 'B', '2023-11-07 04:56:45'),
(278, '3rd Year', 'Robotics and Intelligent Control Systems Engineering 1', 'Midterm', '2nd Semester', 17, 'Jhimboy Talagtag', '2023-11-07 05:41:12', 'In robotics, what does the term \"End-Effector\" refer to?', 'The main controller unit of a robot', 'The part of a robot that connects it to the power source', 'The final component or tool attached to the robot\'s arm for performing tasks', 'The sensors that provide feedback to the robot\'s control system', 'C', '2023-11-07 08:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `id` int(11) NOT NULL,
  `subjectName` text NOT NULL,
  `subjCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`id`, `subjectName`, `subjCode`) VALUES
(4, 'Robotics and Intelligent Control Systems Engineering 1', 'COMP322-V'),
(5, 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V'),
(6, 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V'),
(7, 'Contracts, Laws, Specifications and Ethics', 'CLSE-V'),
(8, 'Thesis 2: Writing and Final Defense', 'RES3-V'),
(12, 'Workshop Theory and Practice 3 (Sheet Metal Works)', 'WSTP3-3V'),
(13, 'Intro to Computing Environment (Logic Formulation)', 'COMP112-V'),
(14, 'Analytic Geometry with Solid Mensuration', 'MATH3-V'),
(15, 'National Service Training Program 2 (NROTC II/CWTS II)', 'NSTP2-V'),
(16, 'Engineering Measurement (Metrology)', 'EM111ET-V'),
(17, 'Properties of Engineering Materials', 'PEM122-V'),
(22, 'Network Administration', 'COMP332C-V'),
(23, 'Instrumentation and Process Control', 'TE1-V'),
(24, 'Software Engineering', 'COMP332B-V'),
(25, 'Microprocessor and Interfacing Systems', 'COMP312C-V');

-- --------------------------------------------------------

--
-- Table structure for table `syllabuschecker_tbl`
--

CREATE TABLE `syllabuschecker_tbl` (
  `ID` int(11) NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `NameUpload` text NOT NULL,
  `subj` text NOT NULL,
  `subjCode` text NOT NULL,
  `term` text NOT NULL,
  `year` text NOT NULL,
  `file` text NOT NULL,
  `fileLoc` text NOT NULL,
  `dateUpload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabuschecker_tbl`
--

INSERT INTO `syllabuschecker_tbl` (`ID`, `uploaderId`, `NameUpload`, `subj`, `subjCode`, `term`, `year`, `file`, `fileLoc`, `dateUpload`) VALUES
(48, 17, 'Jhimboy Talagtag', 'Software Engineering', 'COMP332B-V', 'Endterm', '3rd Year', 'Aliling_Environmental_Engineering_Week_1-4 (1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Aliling_Environmental_Engineering_Week_1-4 (1).pdf', '2023-11-07 07:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_tbl`
--

CREATE TABLE `syllabus_tbl` (
  `id` int(11) NOT NULL,
  `USERUPLOADID` int(11) NOT NULL,
  `NAMEUPLOAD` text NOT NULL,
  `SUBJECTS` text NOT NULL,
  `CODE` text NOT NULL,
  `TERM` text NOT NULL,
  `YEARS` text NOT NULL,
  `FILES` text NOT NULL,
  `FILELOC` text NOT NULL,
  `DATEUPLOAD` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateAccepted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus_tbl`
--

INSERT INTO `syllabus_tbl` (`id`, `USERUPLOADID`, `NAMEUPLOAD`, `SUBJECTS`, `CODE`, `TERM`, `YEARS`, `FILES`, `FILELOC`, `DATEUPLOAD`, `dateAccepted`) VALUES
(27, 17, 'Jhimboy Talagtag', 'Workshop Theory and Practice 3 (Sheet Metal Works)', 'WSTP3-3V', 'Midterm', '3rd', 'CLARION-REYSIL-M.-EXAM.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\CLARION-REYSIL-M.-EXAM.pdf', '2023-10-22 15:20:01', '2023-11-07 05:00:57'),
(28, 17, 'Jhimboy Talagtag', 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V', 'Midterm', '2nd', 'SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1.pdf', '2023-10-22 16:36:08', '2023-11-07 05:00:57'),
(29, 17, 'Jhimboy Talagtag', 'Engineering Measurement (Metrology)', 'EM111ET-V', 'Endterm', '3rd', 'DEVELOPMENT OF A LEARNING ENHANCEMENT EXAM TEST PAPER GENERATOR WITH TEST ANSWER SCANNER FOR TUP VISAYAS CHAPTER 1.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\DEVELOPMENT OF A LEARNING ENHANCEMENT EXAM TEST PAPER GENERATOR WITH TEST ANSWER SCANNER FOR TUP VISAYAS CHAPTER 1.pdf', '2023-10-22 16:36:29', '2023-11-07 05:00:57'),
(30, 17, 'Jhimboy Talagtag', 'Robotics and Intelligent Control Systems Engineering 1', 'COMP322-V', 'Prelim', '2nd', 'ROBOTICS-NOTES.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\ROBOTICS-NOTES.pdf', '2023-10-22 16:37:13', '2023-11-07 05:00:57'),
(33, 18, 'Paul John Padohinog', 'Workshop Theory and Practice 3 (Sheet Metal Works)', 'WSTP3-3V', 'Endterm', '4th', 'MGT-IM-Week-8.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\MGT-IM-Week-8.pdf', '2023-10-22 16:42:32', '2023-11-07 05:00:57'),
(35, 22, 'Rodolfo Baylen III', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '4th', 'ECON-Learning-Content.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\ECON-Learning-Content.pdf', '2023-11-01 12:04:16', '2023-11-07 05:00:57'),
(36, 22, 'Rodolfo Baylen III', 'Contracts, Laws, Specifications and Ethics', 'CLSE-V', 'Midterm', '2nd', 'yuttttt.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\yuttttt.pdf', '2023-11-01 12:04:18', '2023-11-07 05:00:57'),
(37, 22, 'Rodolfo Baylen III', 'Robotics and Intelligent Control Systems Engineering 1', 'COMP322-V', 'Midterm', '2nd Year', 'Confidence-Interval_-How-to-Find-a-Confidence-Interval_-The-Easy-Way.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Confidence-Interval_-How-to-Find-a-Confidence-Interval_-The-Easy-Way.pdf', '2023-11-01 12:04:20', '2023-11-07 05:00:57'),
(38, 22, 'Rodolfo Baylen III', 'Robotics and Intelligent Control Systems Engineering 1', 'COMP322-V', 'Midterm', '3rd Year', 'zscoretable.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\zscoretable.pdf', '2023-11-01 12:04:22', '2023-11-07 05:00:57'),
(39, 22, 'Rodolfo Baylen III', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '2nd Year', 'MGT-IM-Week-8(1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\MGT-IM-Week-8(1).pdf', '2023-11-01 12:04:24', '2023-11-07 05:00:57'),
(40, 22, 'Rodolfo Baylen III', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Midterm', '3rd Year', 'COMPNET-REVIEWER-MIDTERM.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\COMPNET-REVIEWER-MIDTERM.pdf', '2023-11-01 12:04:28', '2023-11-07 05:00:57'),
(42, 22, 'Rodolfo Baylen III', 'Robotics and Intelligent Control Systems Engineering 1', 'COMP322-V', '', '', 'blkwarrior,+Journal+manager,+ch09.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\blkwarrior,+Journal+manager,+ch09.pdf', '2023-11-01 12:04:30', '2023-11-07 05:00:57'),
(43, 0, 'asdasd', 'asdqweqwe', 'qwef', 'qweqweas', 'qweasd', 'qwedas', 'wqedas', '2023-10-25 07:42:36', '2023-11-07 05:00:57'),
(44, 0, 'asdasd', 'asdasd', 'asda', 'qwe', 'qweqw', 'ewqqwe', 'qweqw', '2023-10-25 09:44:13', '2023-11-07 05:00:57'),
(45, 0, 'ccccccc', 'cccccccc', 'cccccccc', 'cccccccccc', 'ccccccc', 'ccccccc', 'cccccc', '2023-10-25 09:57:31', '2023-11-07 05:00:57'),
(46, 22, 'Rodolfo Baylen III', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '4th Year', '5.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\5.pdf', '2023-11-01 12:04:34', '2023-11-07 05:00:57'),
(47, 0, 'Rainier Guinsatao', 'MATH', 'MATH-68', 'Midterm', '2nd', 'MATH.pdf', ' 	C:xampphtdocsThesis-Projectsdbuploaded_filesCANOY ...', '2023-10-31 03:20:35', '2023-11-07 05:00:57'),
(48, 22, 'Rodolfo Baylen III', 'Thesis 2: Writing and Final Defense', 'RES3-V', 'Midterm', '2nd Year', 'exam example.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\exam example.pdf', '2023-11-01 12:02:32', '2023-11-07 05:00:57'),
(49, 1, 'Christian Noel Salvador', 'Filipino 2 (Panitikang Panlipunan)', 'GEE3-V', 'Midterm', '2nd Year', 'Document.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\Document.pdf', '2023-10-31 14:52:44', '2023-11-07 05:00:57'),
(50, 17, 'Jhimboy Talagtag', 'Software Engineering', 'COMP332B-V', 'Endterm', '3rd Year', 'sensors-20-01042-v2.pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\sensors-20-01042-v2.pdf', '2023-11-01 16:40:10', '2023-11-07 05:00:57'),
(51, 17, 'Jhimboy Talagtag', 'Filipino 1 (Kontekstwalisadong Komunikasyon sa Filipino)', 'GEE2-V', 'Endterm', '3rd Year', 'SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1(1).pdf', 'C:\\xampp\\htdocs\\TUPV-SS\\files\\syllabusfiles\\SALVADOR_CHRISTIAN_NOEL_FO9-A_CLSE_WEEK1(1).pdf', '2023-11-07 05:12:27', '2023-11-07 07:49:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `activitylog_tbl`
--
ALTER TABLE `activitylog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actlog_tbl`
--
ALTER TABLE `actlog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers_tbl`
--
ALTER TABLE `answers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declinedsyllabus_tbl`
--
ALTER TABLE `declinedsyllabus_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exammaker_tbl`
--
ALTER TABLE `exammaker_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generatedquestions_tbl`
--
ALTER TABLE `generatedquestions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qbchecker_tbl`
--
ALTER TABLE `qbchecker_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qbdecline_tbl`
--
ALTER TABLE `qbdecline_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionbank_tbl`
--
ALTER TABLE `questionbank_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabuschecker_tbl`
--
ALTER TABLE `syllabuschecker_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `activitylog_tbl`
--
ALTER TABLE `activitylog_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `actlog_tbl`
--
ALTER TABLE `actlog_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `answers_tbl`
--
ALTER TABLE `answers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `declinedsyllabus_tbl`
--
ALTER TABLE `declinedsyllabus_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `departmenttbl`
--
ALTER TABLE `departmenttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `exammaker_tbl`
--
ALTER TABLE `exammaker_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `generatedquestions_tbl`
--
ALTER TABLE `generatedquestions_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `qbchecker_tbl`
--
ALTER TABLE `qbchecker_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `qbdecline_tbl`
--
ALTER TABLE `qbdecline_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questionbank_tbl`
--
ALTER TABLE `questionbank_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `syllabuschecker_tbl`
--
ALTER TABLE `syllabuschecker_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
