-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 05:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_verify`
--

CREATE TABLE `email_verify` (
  `email` varchar(100) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_verify`
--

INSERT INTO `email_verify` (`email`, `verification_code`) VALUES
('kmathavan018@gmail.com', '11a624a42f8afe17e3f7225c71d08478'),
('kmathavan018@gmail.com', '7d67505b8b3b3c6f04ce866383685f35'),
('kmathavan018@gmail.com', '4d29ac9e8f26e29cb986197777f621ba');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(12) NOT NULL,
  `student_id` int(12) NOT NULL,
  `meeting_title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` int(12) NOT NULL,
  `meeting_link` varchar(535) NOT NULL,
  `is_closed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `reg_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `email`, `role`, `first_name`, `last_name`, `is_verified`, `reg_date`) VALUES
(123, '123', 'student1@gmail.com', 'student', 'student', '1', 0, NULL),
(1234, '1234', 'test@gmail.com', 'student', 'test', '123', 0, NULL),
(12345, '12345', 'testing@gmail.com', 'student', 'test', '12345', 0, NULL),
(556644, '$2y$10$NhUZoMKlnZjAeMle4HbS2eryHih.CKa3xcfqA/3dckFvK4dEE5ohu', 'kmathavan018@gmail.com', 'faculty', 'madavan', 'maddy', 1, '2023-11-12 09:13:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
