-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 06:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `EmailAddress` varchar(100) DEFAULT NULL,
  `Semester1GPA` decimal(3,2) DEFAULT NULL,
  `Semester2GPA` decimal(3,2) DEFAULT NULL,
  `Semester3GPA` decimal(3,2) DEFAULT NULL,
  `Semester4GPA` decimal(3,2) DEFAULT NULL,
  `FinalCGPA` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `Name`, `DateOfBirth`, `Gender`, `ContactNumber`, `EmailAddress`, `Semester1GPA`, `Semester2GPA`, `Semester3GPA`, `Semester4GPA`, `FinalCGPA`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '2000-01-15', 'M', '1234567890', 'johndoe@example.com', '3.50', '3.60', '3.75', '3.80', '3.66', NULL, NULL),
(2, 'Alice Smith', '1999-02-20', 'F', '0987654321', 'alicesmith@example.com', '3.80', '3.70', '3.85', '3.90', '3.81', NULL, NULL),
(3, 'Michael Johnson', '2001-03-25', 'M', '1122334455', 'michaelj@example.com', '3.60', '3.55', '3.50', '3.65', '3.58', NULL, NULL),
(4, 'Emily Davis', '2000-05-10', 'F', '2233445566', 'emilydavis@example.com', '3.70', '3.80', '3.65', '3.75', '3.73', NULL, NULL),
(5, 'Daniel Wilson', '2000-06-18', 'M', '3344556677', 'danielw@example.com', '3.40', '3.50', '3.55', '3.60', '3.51', NULL, NULL),
(6, 'Sophia Brown', '2001-07-22', 'F', '4455667788', 'sophiabrown@example.com', '3.65', '3.75', '3.80', '3.85', '3.76', NULL, NULL),
(7, 'James Miller', '1999-08-14', 'M', '5566778899', 'jamesmiller@example.com', '3.30', '3.40', '3.45', '3.50', '3.41', NULL, NULL),
(8, 'Olivia Moore', '2000-09-05', 'F', '6677889900', 'oliviamoore@example.com', '3.90', '3.85', '3.95', '4.00', '3.93', NULL, NULL),
(9, 'Liam Taylor', '2001-10-30', 'M', '7788990011', 'liamtaylor@example.com', '3.55', '3.60', '3.50', '3.65', '3.58', NULL, NULL),
(10, 'Ava Anderson', '1999-11-12', 'F', '8899001122', 'avaanderson@example.com', '3.60', '3.50', '3.45', '3.55', '3.53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
