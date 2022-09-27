-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 01:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chedroxi_cav`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `ID` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`ID`, `description`, `date`, `active`) VALUES
(8, 'This is to inform you that starting March 2023 we will be using this CAV System. Please inform your school head administration.', '2022-09-25', 'yes'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Vivamus at augue eget arcu dictum varius. Vitae suscipit tellus mauris a diam. Turpis massa sed elementum tempus egestas sed sed. Magna fermentum iaculis eu non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Vitae congue mauris rhoncus aenean vel elit. Amet cons', '2022-09-25', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement_replies`
--

CREATE TABLE `tbl_announcement_replies` (
  `id` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `announcementid` int(11) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_announcement_replies`
--

INSERT INTO `tbl_announcement_replies` (`id`, `schoolid`, `announcementid`, `reply`, `date`) VALUES
(7, 2, 9, 'noted po maam/sir', '2022-09-27'),
(8, 2, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Vivamus at augue eget arcu dictum varius. Vitae suscipit tellus mauris a diam. Turpis massa sed elementum tempus egestas sed sed. Magna fermentum iaculis eu non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Vitae congue mauris rhoncus aenean vel elit. Amet cons', '2022-09-27'),
(9, 5, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Vivamus at augue eget arcu dictum varius. Vitae suscipit tellus mauris a diam. Turpis massa sed elementum tempus egestas sed sed. Magna fermentum iaculis eu non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Vitae congue mauris rhoncus aenean vel elit. Amet cons', '2022-09-27'),
(10, 1, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Vivamus at augue eget arcu dictum varius. Vitae suscipit tellus mauris a diam. Turpis massa sed elementum tempus egestas sed sed. Magna fermentum iaculis eu non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Vitae congue mauris rhoncus aenean vel elit. Amet cons', '2022-09-27'),
(11, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non curabitur gravida arcu ac. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Vivamus at augue eget arcu dictum varius. Vitae suscipit tellus mauris a diam. Turpis massa sed elementum tempus egestas sed sed. Magna fermentum iaculis eu non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Vitae congue mauris rhoncus aenean vel elit. Amet cons', '2022-09-27'),
(12, 1, 8, 'okiie', '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commissioners`
--

CREATE TABLE `tbl_commissioners` (
  `commissionerID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_commissioners`
--

INSERT INTO `tbl_commissioners` (`commissionerID`, `fullName`, `position`, `active`) VALUES
(1, 'FOO, BURGER', 'Director IV', 'yes'),
(2, 'CHRISTOPHER PIO O. PULIDO, DPA', 'Supervising Education Program Specialist', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `courseID` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `courseTitle` varchar(30) NOT NULL,
  `courseDesc` varchar(50) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`courseID`, `schoolID`, `courseTitle`, `courseDesc`, `active`) VALUES
(1, 2, 'BSIT', 'Bachelor of Science in Information Technology', 'yes'),
(2, 2, 'BSBA', 'Bachelor of Science in Business Administration', 'yes'),
(3, 2, 'BSCS', 'Bachelor of Science in Computer Science', 'yes'),
(4, 2, 'BSIS', 'Bachelor of Science in Information Systems', 'yes'),
(5, 2, 'BSA', 'Bachelor of Science in Accountancy', 'no'),
(6, 2, 'BSMT', 'Bachelor of Science in Marine Technology', 'yes'),
(8, 1, 'BSTLE', 'Bachelor of Science in TLE', 'Yes'),
(9, 5, 'BSPM', 'Bachelor of Science in Pet Management', 'yes'),
(10, 2, 'BSAE', 'Bachelor of Science in Agriculture', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `messagefrom` int(11) NOT NULL,
  `messageto` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `messagefrom`, `messageto`, `message`, `status`, `datetime`) VALUES
(1, 2, 10, 'Hello', 1, '2022-09-27 07:14:37'),
(2, 2, 10, 'testtesttesttesttesttesttesttest', 1, '2022-09-27 07:26:55'),
(3, 2, 10, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 1, '2022-09-27 07:26:55'),
(4, 3, 10, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 1, '2022-09-27 07:27:05'),
(5, 3, 10, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 1, '2022-09-27 07:27:05'),
(6, 2, 10, 'asdasdasdasdasdasdsd', 1, '2022-09-27 08:25:50'),
(7, 2, 10, 'asdasdasdasdasdasdasdasdasdas   asdasd', 1, '2022-09-27 08:25:50'),
(8, 2, 10, 'asasdasdasdasdasd', 1, '2022-09-27 08:26:24'),
(9, 3, 10, 'sdasdasdasdasdasd asd asd asd asd asdasdas', 1, '2022-09-27 08:26:24'),
(10, 2, 10, ' asda sd asd asd asd asd asd asd', 1, '2022-09-27 08:26:34'),
(11, 4, 10, ' asda sd asd asd asd asd', 0, '2022-09-27 08:26:34'),
(12, 2, 10, 'voang', 1, '2022-09-27 08:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prices`
--

CREATE TABLE `tbl_prices` (
  `priceID` int(11) NOT NULL,
  `itemDesc` varchar(30) NOT NULL,
  `price` double(5,2) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prices`
--

INSERT INTO `tbl_prices` (`priceID`, `itemDesc`, `price`, `active`) VALUES
(3, 'Certification Fee', 80.00, 'yes'),
(4, 'Doc Stamp Tax', 30.00, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process`
--

CREATE TABLE `tbl_process` (
  `ID` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `courseID` int(11) NOT NULL,
  `applicationType` varchar(20) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `SOnumber` varchar(20) DEFAULT NULL,
  `graduationDate` varchar(30) NOT NULL,
  `syStarted` varchar(30) NOT NULL,
  `syEnded` varchar(30) NOT NULL,
  `documentType` varchar(10) NOT NULL,
  `requestLetter` blob NOT NULL,
  `indorsementLetter` blob NOT NULL,
  `tor` blob NOT NULL,
  `diploma` blob NOT NULL,
  `ORnumber` varchar(30) DEFAULT NULL,
  `preparedBy` varchar(50) DEFAULT NULL,
  `reviewedBy` varchar(50) DEFAULT NULL,
  `commissionerID` int(11) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updatedby` varchar(50) DEFAULT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_process`
--

INSERT INTO `tbl_process` (`ID`, `schoolID`, `firstName`, `middleName`, `lastName`, `courseID`, `applicationType`, `mode`, `SOnumber`, `graduationDate`, `syStarted`, `syEnded`, `documentType`, `requestLetter`, `indorsementLetter`, `tor`, `diploma`, `ORnumber`, `preparedBy`, `reviewedBy`, `commissionerID`, `status`, `created_at`, `updated_at`, `updatedby`, `active`) VALUES
(77, 5, 'Minda', '', 'Ryn', 9, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, '00366124', 'BOOC, JAYSON JONES', 'DOROMAL, KENT', 2, 'Validated', '2022-09-25', '2022-09-25', 'DOROMAL, KENT', 'Yes'),
(78, 2, 'Ryu', '', 'Padoru', 1, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, '006631', 'BOOC, JAYSON JONES', 'DOROMAL, KENT', 1, 'Validated', '2022-09-25', '2022-09-25', 'DOROMAL, KENT', 'Yes'),
(79, 2, 'Patrick Ryan', 'Yawa', 'Abraham', 3, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, '00612874', 'BOOC, JAYSON JONES', 'DOROMAL, KENT', 1, 'Validated', '2022-09-25', '2022-09-25', 'DOROMAL, KENT', 'Yes'),
(80, 2, 'Kenneth', 'Mabz', 'Maboot', 1, 'Special Order', 'Conventional', NULL, 'October 2025', '2017-2018', '2024-2025', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, '023121', 'BOOC, JAYSON JONES', 'DOROMAL, KENT', 2, 'Validated', '2022-09-25', '2022-09-25', 'DOROMAL, KENT', 'Yes'),
(81, 2, 'Leslie', 'Corpuz', 'Liquit', 1, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x4552442e706e67, NULL, NULL, NULL, NULL, 'Rejected', '2022-09-26', '2022-09-26', 'BOOC, JAYSON JONES', 'Yes'),
(82, 2, 'Michelle', 'Mondejar', 'Cinco', 1, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, '00241112', 'BOOC, JAYSON JONES', NULL, 2, 'Processing', '2022-09-26', '2022-09-26', 'BOOC, JAYSON JONES', 'Yes'),
(83, 2, 'Ariel', 'Diacosta', 'Abo-Abo', 1, 'Special Order', 'Conventional', NULL, 'October 2022', '2017-2018', '2021-2022', 'Local', 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x53414d504c45205052494e542e706466, 0x63686564726f78692e6a7067, NULL, NULL, NULL, NULL, 'Pending', '2022-09-26', '2022-09-26', NULL, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleID` int(11) NOT NULL,
  `roleDesc` varchar(30) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleID`, `roleDesc`, `active`) VALUES
(1, 'ADMINISTRATOR', 'YES'),
(2, 'MODERATOR', 'YES'),
(4, 'SCHOOL REGISTRAR', 'YES'),
(5, 'CASHIER', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE `tbl_schools` (
  `schoolID` int(11) NOT NULL,
  `schoolDesc` varchar(50) NOT NULL,
  `schoolCity` varchar(30) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schools`
--

INSERT INTO `tbl_schools` (`schoolID`, `schoolDesc`, `schoolCity`, `active`) VALUES
(1, 'Maryknoll College of Panabo, INC.', 'Panabo City', 'yes'),
(2, 'University of Mindanao', 'Davao City', 'yes'),
(3, 'ACES Polytechnic College', 'Panabo City', 'yes'),
(4, 'Davao del Norte State College', 'Panabo City', 'yes'),
(5, 'Ateneo de Davao', 'Davao City', 'yes'),
(6, 'STI', 'Davao City', 'yes'),
(7, 'Holy Cross of Davao', 'Davao City', 'yes'),
(8, 'Malayan Colleges University', 'Davao City', 'no'),
(10, 'CHEDROXI', 'Davao City', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `roleID` int(11) NOT NULL,
  `picture` blob DEFAULT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `lastname`, `firstname`, `username`, `password`, `roleID`, `picture`, `active`) VALUES
(1, 'BOOC', 'JAYSON JONES', 'soya', '1231', 1, '', 'yes'),
(2, 'VECINA', 'JAMES ANTHONY', 'james', '1231', 4, '', 'yes'),
(3, 'ABO-ABO', 'ARIEL', 'yel', '1231', 4, '', 'yes'),
(4, 'LIQUIT', 'LESLIE', 'les', '1231', 4, '', 'yes'),
(5, 'ONE', 'PAMELA', 'pam', '1231', 5, '', 'yes'),
(9, 'PROCESSOR', 'ONE', 'pro', '1231', 2, '', 'yes'),
(12, 'DOROMAL', 'KENT', 'kent', '1231', 2, NULL, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_school`
--

CREATE TABLE `tbl_user_school` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_school`
--

INSERT INTO `tbl_user_school` (`ID`, `userID`, `schoolID`, `active`) VALUES
(1, 2, 2, 'Yes'),
(2, 3, 1, 'yes'),
(3, 4, 5, 'yes'),
(6, 12, 10, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_announcement_replies`
--
ALTER TABLE `tbl_announcement_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_commissioners`
--
ALTER TABLE `tbl_commissioners`
  ADD PRIMARY KEY (`commissionerID`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `courseDesc` (`courseDesc`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prices`
--
ALTER TABLE `tbl_prices`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `schoolID` (`schoolID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `commissionerID` (`commissionerID`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `tbl_user_school`
--
ALTER TABLE `tbl_user_school`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_announcement_replies`
--
ALTER TABLE `tbl_announcement_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_commissioners`
--
ALTER TABLE `tbl_commissioners`
  MODIFY `commissionerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_prices`
--
ALTER TABLE `tbl_prices`
  MODIFY `priceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_process`
--
ALTER TABLE `tbl_process`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_school`
--
ALTER TABLE `tbl_user_school`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD CONSTRAINT `tbl_courses_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `tbl_schools` (`schoolID`);

--
-- Constraints for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD CONSTRAINT `tbl_process_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `tbl_schools` (`schoolID`),
  ADD CONSTRAINT `tbl_process_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `tbl_courses` (`courseID`),
  ADD CONSTRAINT `tbl_process_ibfk_4` FOREIGN KEY (`commissionerID`) REFERENCES `tbl_commissioners` (`commissionerID`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `tbl_roles` (`roleID`);

--
-- Constraints for table `tbl_user_school`
--
ALTER TABLE `tbl_user_school`
  ADD CONSTRAINT `tbl_user_school_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbl_users` (`userID`),
  ADD CONSTRAINT `tbl_user_school_ibfk_2` FOREIGN KEY (`schoolID`) REFERENCES `tbl_schools` (`schoolID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
