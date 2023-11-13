-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2023 at 05:11 PM
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
('kmathavan018@gmail.com', '4d29ac9e8f26e29cb986197777f621ba'),
('tenshkumarkkt@gmail.com', '91382710bfb46616a78de6aa39b94cf1'),
('techcreed.coders@gmail.com', 'f193583bf2456ab8491e290f9c7b58d2');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_otp`
--

CREATE TABLE `forgot_otp` (
  `s_no` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(10) NOT NULL,
  `expire_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_otp`
--

INSERT INTO `forgot_otp` (`s_no`, `email`, `otp`, `expire_time`) VALUES
(1, 'kmathavan018@gmail.com', 732254, '2023-11-13 04:32:02'),
(2, 'kmathavan018@gmail.com', 371912, '2023-11-13 04:45:18'),
(3, 'kmathavan018@gmail.com', 400930, '2023-11-13 04:46:39'),
(4, 'kmathavan018@gmail.com', 628273, '2023-11-13 04:59:26'),
(5, 'kmathavan018@gmail.com', 178219, '2023-11-13 05:24:50'),
(6, 'tenshkumarkkt@gmail.com', 819373, '2023-11-13 08:34:52'),
(8, 'tenshkumarkkt@gmail.com', 933329, '2023-11-13 08:39:57');

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
  `is_closed` varchar(255) NOT NULL,
  `meeting_id` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `student_id`, `meeting_title`, `date`, `time`, `duration`, `meeting_link`, `is_closed`, `meeting_id`) VALUES
(2, 415257, 'Meeting for english class', '2023-11-02', '20:56:00', 50, 'http://google.demo.meet/123', 'true', 16998892142941),
(3, 12345, 'Meeting for english class', '2023-11-02', '20:56:00', 50, 'http://google.demo.meet/123', 'true', 16998892142941),
(8, 556644, 'meeting for english class', '6788-05-04', '06:08:00', 10, 'http://google.demo.meet/12345', 'false', 16998900097632);

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
(325945, '$2y$10$8c2gu4ZYPDsSMwQpyugevuBsfy0KaURvhoCEjrPZBPTEoJ9qc2oRu', 'techcreed.coders@gmail.com', 'instructor', 'TECH', 'CREED', 1, '2023-11-13 08:49:09'),
(415257, '$2y$10$vbyfCBcO1oqCTIzlB03edOCy0284t1vntmO9O1S2f8BWnmqAd84Ze', 'tenshkumarkkt@gmail.com', 'student', 'TENSHKUMAR', 'K', 1, '2023-11-13 08:21:52'),
(556644, '$2y$10$v62II8/QDEGYoQa9Ue3bW.lGvxRIIfxV5utg76cschdIneRlzKdpu', 'kmathavan018@gmail.com', 'student', 'madavan', 'maddy', 1, '2023-11-12 09:13:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgot_otp`
--
ALTER TABLE `forgot_otp`
  ADD PRIMARY KEY (`s_no`);

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
-- AUTO_INCREMENT for table `forgot_otp`
--
ALTER TABLE `forgot_otp`
  MODIFY `s_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
