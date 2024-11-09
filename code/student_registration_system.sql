-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 10:34 AM
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
-- Database: `student_registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `icnum` varchar(12) NOT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `email`, `phone`, `icnum`, `faculty`, `reg_date`) VALUES
(29, 'Chew', 'Male', 'chewchiuxian@graduate.utm.my', '011-10830382', '040308031099', 'Computing', '2024-11-06'),
(30, 'Lau', 'Male', 'YKLau@gmail.com', '011-10430382', '012345678888', 'Computing', '2024-11-06'),
(31, 'Ali', 'Male', 'ali@gmail.com', '6', '6', 'Engineering', '2024-11-06'),
(32, 'Jamie Chen Yu Xiang', 'Female', 'jcyx@gmail.com', '9999', '4444', 'Social-Sciences', '2024-11-06'),
(33, 'ccx', 'Male', 'ali@gmail.com', '6', '012345678888', 'MJIIT', '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'chewchiuxian', '$2y$10$v9x3cuTLEHPCv4NZ4kQ02OK.M9GFqbqkUt1Q5GptzvHNoofWetamm', '2024-11-06 02:44:01'),
(2, 'elijahsheyu', '$2y$10$B5IyHN46CHMvzmY.QrFvPuRiHEShZN8Fmb5mNXCIYgldkI8c5hy3e', '2024-11-06 12:47:18'),
(3, 'elijahsheyun', '$2y$10$PkzyVhH.05d/8qxOv52D3OCi8Tg7ay2MHMbmWnD7hftvtt2J2Y6M2', '2024-11-06 13:56:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
