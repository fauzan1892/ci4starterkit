-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 09:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4starterkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `app_description` text DEFAULT NULL,
  `app_favicon` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `app_owner` varchar(255) DEFAULT NULL,
  `app_phone` varchar(15) DEFAULT NULL,
  `app_email` varchar(255) DEFAULT NULL,
  `app_address` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `app_description`, `app_favicon`, `app_logo`, `app_owner`, `app_phone`, `app_email`, `app_address`, `updated_at`, `users_id`) VALUES
(1, 'My App', '', '1656312160_483546d903e854903634.png', '1656312169_6b9338cc5c5e50a53098.png', '', '', '', '', '2022-06-27 06:59:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active_users` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active 0 = non active',
  `users_role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`, `avatar`, `active_users`, `users_role_id`, `created_at`, `deleted_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '', 'Bekasi Indo', '$2y$10$69S6xUcJEN.5bRG20rgsAuOCa6slNOozAPy82Gf/ncc9ot/rBsfSO', '1656311593_b1cb16bb2cf16b2a2cae.png', 1, 1, '2022-03-22 02:23:15', NULL),
(2, 'Fauzan Falah', 'fauzancodekop', 'fauzancodekop@gmail.com', '089618173609', 'Bekasi', '$2y$10$QXjxpM2s/EbGj8os4wD8heGKsAnRqY.KFqzLjKPEIsbTbWr/EO27y', '1650614676_3fea90a34567f202f4c6.jpg', 1, 1, '2022-03-28 03:09:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `roles`, `created_at`, `deleted_at`) VALUES
(1, 'Admin', '2022-03-22 02:24:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
