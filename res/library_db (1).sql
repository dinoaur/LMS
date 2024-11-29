-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 12:45 AM
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
(1, 'Anne of Green Gables', 'Lucy Maud Montgomery', 'Fiction', '2491704803', '1908', 4, 0, '2024-10-31'),
(35, 'All the Worst Humans', 'Phil Elwood', 'Memoir', '9781234567890', '2024', 10, 8, '2024-10-15'),
(36, 'The Ministry of Time', 'Kaliane Bradley', 'Science Fiction', '9780987654321', '2024', 15, 13, '2024-10-15'),
(37, 'Martyr!', 'Kaveh Akbar', 'Fiction', '9781122334455', '2024', 12, 10, '2024-10-15'),
(38, 'Nuclear War', 'Annie Jacobsen', 'Non-Fiction', '9782233445566', '2024', 8, 8, '2024-10-15'),
(39, 'All the Colors of the Dark', 'Chris Whitaker', 'Mystery', '9783344556677', '2024', 7, 7, '2024-10-15'),
(40, 'The Science of Learning: 99 Studies That Every Teacher Needs to Know', 'Edward Watson and Bradley Busch', 'Education', '978123456789', '2024', 5, 4, '2024-11-12'),
(41, 'Core Practices in Teacher Education', 'Pam Grossman and Urban Fraefel', 'Education', '978098765432', '2024', 8, 7, '2024-11-12'),
(42, 'How to Build Your Antiracist Classroom', 'Orlene Badu', 'Education', '978112233445', '2024', 10, 9, '2024-11-12'),
(43, 'Fast Feedback', 'Lesley Hill and Gemma Whitby', 'Education', '978223344556', '2024', 7, 7, '2024-11-12'),
(44, 'Representation Matters: Becoming an Anti-Racist Educator', 'Aisha Thomas', 'Education', '978334455667', '2024', 6, 6, '2024-11-12'),
(45, 'After the Adults Change: Achievable Behaviour Nirvana', 'Paul Dix', 'Education', '978445566778', '2024', 9, 9, '2024-11-12'),
(46, 'Atomic Habits', 'James Clear', 'Self-help', '0735211299', '2018', 3, 2, '2024-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `BorrowDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `ReturnDate` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `UserID`, `BookID`, `BorrowDate`, `DueDate`, `ReturnDate`, `Status`) VALUES
(2, 6, 1, '2024-11-12', '2024-11-26', '2024-11-12', 'pending'),
(3, 6, 1, '2024-11-12', '2024-11-26', '2024-11-12', 'pending'),
(4, 6, 1, '2024-11-12', '2024-11-26', NULL, 'pending'),
(5, 7, 1, '2024-11-22', '2024-12-06', NULL, 'pending'),
(6, 9, 35, '2024-11-22', '2024-12-06', NULL, 'pending'),
(7, 9, 1, '2024-11-22', '2024-12-06', NULL, 'pending'),
(8, 10, 35, '2024-11-22', '2024-12-06', NULL, 'pending'),
(9, 10, 36, '2024-11-22', '2024-12-06', NULL, 'pending'),
(10, 10, 37, '2024-11-22', '2024-12-06', NULL, 'pending'),
(11, 10, 41, '2024-11-22', '2024-12-06', NULL, 'pending'),
(12, 10, 42, '2024-11-22', '2024-12-06', NULL, 'pending'),
(13, 10, 46, '2024-11-22', '2024-12-06', NULL, 'pending'),
(14, 10, 40, '2024-11-22', '2024-12-06', NULL, 'pending'),
(15, 9, 36, '2024-11-24', '2024-12-08', NULL, 'pending'),
(16, 9, 37, '2024-11-24', '2024-12-08', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('Admin','Librarian','User') NOT NULL,
  `Name` varchar(100) NOT NULL,
  `RegistrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `Role`, `Name`, `RegistrationDate`) VALUES
(5, 'admin_demi@edu', '2811c3e2f1d319d33e53ce761bcc4e34', 'Admin', 'Admin Demi', '2024-11-12'),
(6, 'Krizza@edu', 'c5205d5c5375931aae66a8b06bea7e8e', 'User', 'Krizza', '2024-11-12'),
(7, 'admin@edu', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin', '2024-11-12'),
(8, 'demi@edu', '202cb962ac59075b964b07152d234b70', 'Admin', 'Demi', '2024-11-22'),
(9, 'anne@edu', '202cb962ac59075b964b07152d234b70', 'User', 'Anne', '2024-11-22'),
(10, '20171714@S.UBAGUIO.EDU', '202cb962ac59075b964b07152d234b70', 'User', 'DEMIRAYE-ANNE BUSONGAN', '2024-11-22');

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
