-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 12:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'administrator', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-12-14 23:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'J.K. Rowling', '2023-12-10 10:35:03', '2023-12-15 07:24:12'),
(2, ' Jovito R. Salonga', '2023-12-10 10:43:48', NULL),
(3, 'Madeline Miller', '2023-12-10 12:55:09', NULL),
(5, 'Robert Kayosaki', '2023-12-15 07:25:29', '2023-12-15 07:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `BookPrice` decimal(10,2) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `bookImage`, `isIssued`, `RegDate`, `UpdationDate`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone', 1, 1, '9788869183157', 150.00, 'b207bd28e0609c9d881af7116535ab51.jpg', NULL, '2023-12-10 10:44:50', '2023-12-15 07:23:02'),
(2, 'Harry Potter and the Chamber of Secrets', 1, 1, '9788869185182', 150.00, 'f9c53895ae28e4a678d6b23f848668f4.jpg', NULL, '2023-12-10 10:46:07', NULL),
(3, 'Harry Potter and the Prisoner of Azkaban', 1, 1, '9788869186127', 150.00, '0a446778556a1c7aa022d6207f753fda.jpg', NULL, '2023-12-10 10:46:37', NULL),
(4, 'Harry Potter And The Goblet Of Fire', 1, 1, '9780439139595', 150.00, '4471f81c184bedc46aa709fc7bea9257.jpg', NULL, '2023-12-10 10:47:09', NULL),
(5, 'Harry Potter and the Order of the Phoenix', 1, 1, '978043958064', 150.00, '8548bcd6c1832ce85522430328a46e90.jpg', NULL, '2023-12-10 10:48:05', NULL),
(6, 'Harry Potter and the Half-Blood Prince ', 1, 1, '9780439791328', 150.00, 'a9ddd70ebe574891b71c50070a52036a.jpg', NULL, '2023-12-10 10:48:39', NULL),
(7, 'Harry Potter and the Deathly Hallows', 1, 1, '9780545029377', 150.00, 'b683f13069f0f8156b2d4dd4fd01e75a.jpg', NULL, '2023-12-10 10:49:11', NULL),
(8, 'Harry Potter and the Cursed Child', 1, 1, '978075156355', 150.00, '1f7bc08ed77bc3b517c06aa95f5316cd.jpg', NULL, '2023-12-10 10:49:40', NULL),
(9, 'Presidential Plunder: The Quest for the Marcos Ill', 2, 1, '9789718567289', 150.00, 'd53aa60f62c2f8aeef31545ddd2be324.png', NULL, '2023-12-10 10:50:40', '2023-12-10 10:51:15'),
(10, 'Circe', 4, 3, '9780316556347', 100.00, '1ee1dab8ad899bb5b37f3f175fc7f27f.jpg', 1, '2023-12-10 12:56:05', '2023-12-14 23:52:32'),
(11, 'Rich Dad, Poor Dad', 6, 5, '194845661554', 180.00, 'b04b39d30efa8ecc7f71d37934da1140.jpg', 1, '2023-12-15 07:41:46', '2023-12-15 07:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Fiction', 1, '2023-12-10 10:40:52', '2023-12-10 10:40:52'),
(2, 'Philippine History', 1, '2023-12-10 10:41:02', '2023-12-10 10:41:02'),
(4, 'Greek Mythology', 1, '2023-12-10 12:50:45', '2023-12-15 07:39:38'),
(6, 'Motivational', 1, '2023-12-15 07:39:57', '2023-12-15 07:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(5, 10, 'SID023', '2023-12-14 23:52:32', NULL, NULL, NULL),
(6, 11, 'SID024', '2023-12-15 07:43:15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID022', 'Tin Curay', 'tin@gmail.com', '0912345678', '811137414f6975fd9b48dd36b73f2fb1', 1, '2023-12-10 10:19:24', '2023-12-15 07:39:01'),
(2, 'SID023', 'Joshua Sungadan Lingayo', 'josh@gmail.com', '0932654987', 'f94adcc3ddda04a8f34928d862f404b4', 1, '2023-12-14 23:48:37', NULL),
(3, 'SID024', 'Billy Busingan Sungadan', 'billy@gmail.com', '0912345678', '38aed6e236ae7ec2a2173c2d0010b33f', 1, '2023-12-15 07:29:40', '2023-12-15 07:37:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`),
  ADD KEY `StudentId_2` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
