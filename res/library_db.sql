-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 03:33 PM
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
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `ISBN` varchar(45) NOT NULL,
  `YearPublished` year(4) DEFAULT NULL,
  `TotalCopies` int(11) DEFAULT 0,
  `AvailableCopies` int(11) DEFAULT 0,
  `AddedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `Author`, `Genre`, `ISBN`, `YearPublished`, `TotalCopies`, `AvailableCopies`, `AddedDate`) VALUES
(1, 'Anne of Green Gables', 'Lucy Maud Montgomery', 'Fiction', '2491704803', '1908', 4, 2, '2024-10-31'),
(35, 'All the Worst Humans', 'Phil Elwood', 'Memoir', '9781234567890', '2024', 10, 10, '2024-10-15'),
(36, 'The Ministry of Time', 'Kaliane Bradley', 'Science Fiction', '9780987654321', '2024', 15, 15, '2024-10-15'),
(37, 'Martyr!', 'Kaveh Akbar', 'Fiction', '9781122334455', '2024', 12, 12, '2024-10-15'),
(38, 'Nuclear War', 'Annie Jacobsen', 'Non-Fiction', '9782233445566', '2024', 8, 8, '2024-10-15'),
(39, 'All the Colors of the Dark', 'Chris Whitaker', 'Mystery', '9783344556677', '2024', 7, 7, '2024-10-15'),
(40, 'The Science of Learning: 99 Studies That Every Teacher Needs to Know', 'Edward Watson and Bradley Busch', 'Education', '978123456789', '2024', 5, 5, '2024-11-12'),
(41, 'Core Practices in Teacher Education', 'Pam Grossman and Urban Fraefel', 'Education', '978098765432', '2024', 8, 8, '2024-11-12'),
(42, 'How to Build Your Antiracist Classroom', 'Orlene Badu', 'Education', '978112233445', '2024', 10, 10, '2024-11-12'),
(43, 'Fast Feedback', 'Lesley Hill and Gemma Whitby', 'Education', '978223344556', '2024', 7, 7, '2024-11-12'),
(44, 'Representation Matters: Becoming an Anti-Racist Educator', 'Aisha Thomas', 'Education', '978334455667', '2024', 6, 6, '2024-11-12'),
(45, 'After the Adults Change: Achievable Behaviour Nirvana', 'Paul Dix', 'Education', '978445566778', '2024', 9, 9, '2024-11-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
