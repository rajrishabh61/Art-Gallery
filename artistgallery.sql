-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 03:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artistgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `uidn` varchar(255) NOT NULL,
  `imageId` varchar(255) NOT NULL,
  `isLiked` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `uidn`, `imageId`, `isLiked`, `created_at`, `modified_at`, `status`) VALUES
(1, '2306076480d62e33bc4', '7', 0, '2024-03-18 07:44:57', '2024-03-18 07:44:58', 1),
(2, '2306076480d62e33bc4', '7', 0, '2024-03-18 07:44:59', '2024-03-18 07:45:01', 1),
(3, '2306076480d62e33bc4', '7', 0, '2024-03-18 07:45:01', '2024-03-18 07:45:02', 1),
(4, '2306076480d62e33bc4', '7', 0, '2024-03-18 07:45:03', '2024-03-18 07:45:19', 1),
(5, '2306076480d62e33bc4', '7', 0, '2024-03-18 07:45:14', '2024-03-18 07:45:19', 1),
(6, '2306076480d62e33bc4', '4', 0, '2024-03-18 07:45:16', '2024-03-18 07:45:18', 1),
(7, '2306076480d62e33bc4', '4', 0, '2024-06-09 07:56:55', '2024-06-09 07:56:56', 1),
(8, '2306076480d62e33bc4', '7', 0, '2024-06-09 08:09:55', '2024-06-09 08:09:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `uidn` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `download_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `uidn`, `filename`, `title`, `description`, `location`, `download_count`, `created_at`, `modified_at`, `status`) VALUES
(1, '2306076480d62e33bc4', 'Gallery_64843696cf73c.jpg', 'Muntain', 'Muntain', 'Muntain', 0, '2023-06-10 08:38:46', '2023-06-10 18:53:11', 1),
(2, '2306076480d62e33bc4', 'ARG_6484375a42ef91686386522.jpg', 'Rome', 'Rome', 'Rome', 1, '2023-06-10 08:42:02', '2024-06-09 08:12:05', 1),
(3, '2306076480d62e33bc4', 'ARG_6484375a449241686386522.jpg', 'Santorini , Greece', 'Santorini , Greece', 'Greece', 0, '2023-06-10 08:42:02', '2023-06-10 18:53:16', 1),
(4, '2306076480d62e33bc4', 'ARG_6484375a453761686386522.jpg', 'India', 'India', 'India', 0, '2023-06-10 08:42:02', '2023-06-10 18:53:20', 1),
(5, '2306076480d62e33bc4', 'ARG_6484375a45ea81686386522.jpg', 'Mexico', 'Mexico', 'Mexico', 0, '2023-06-10 08:42:02', '2023-06-10 18:53:27', 1),
(6, '23060964837867488e7', 'ARG_6484d4cba17331686426827.jpg', 'Spain', 'Spain', 'Spain', 1, '2023-06-10 19:53:47', '2024-06-09 07:57:19', 1),
(7, '23060964837867488e7', 'ARG_6484d4cba84a51686426827.jpg', 'Syria', 'Syria', 'Syria', 1, '2023-06-10 19:53:47', '2024-03-18 07:45:21', 1),
(8, '23060964837867488e7', 'ARG_6484d4cba97771686426827.jpg', 'Yoga', 'Yoga', 'Yoga', 0, '2023-06-10 19:53:47', '2023-06-12 09:33:58', 1),
(9, '23060964837867488e7', 'ARG_6484d4cbaa6f91686426827.jpg', 'Ocean in hand', 'Ocean in hand', 'Pacific ocean', 0, '2023-06-10 19:53:47', '2023-06-12 09:34:01', 1),
(10, '23060964837867488e7', 'ARG_6484d640042c81686427200.jpg', 'Car', 'Car', 'Car', 0, '2023-06-10 20:00:00', '2023-06-10 20:00:00', 1),
(11, '23060964837867488e7', 'ARG_6484d64005baa1686427200.jpg', 'Model', 'Model', 'Model', 0, '2023-06-10 20:00:00', '2023-06-10 20:00:00', 1),
(12, '23060964837867488e7', 'ARG_6484d6400682f1686427200.jpg', 'Melting Glacier', 'Melting Glacier', 'Melting Glacier', 0, '2023-06-10 20:00:00', '2023-06-10 20:00:00', 1),
(13, '23060964837867488e7', 'ARG_6484d640078671686427200.jpg', 'Women', 'Women', 'Women', 0, '2023-06-10 20:00:00', '2023-06-10 20:00:00', 1),
(14, '2306076480d62e33bc4', 'ARG_6485630a68a9e1686463242.jpg', 'Bengal Tiger', 'Bengal Tiger', 'India', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(15, '2306076480d62e33bc4', 'ARG_6485630a6d0eb1686463242.jpg', 'Lady', 'Lady', 'Lady', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(16, '2306076480d62e33bc4', 'ARG_6485630a6e5001686463242.jpg', 'House', 'House', 'House', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(17, '2306076480d62e33bc4', 'ARG_6485630a6f6161686463242.jpg', 'Reforestration', 'Reforestration', 'Amazon', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(18, '2306076480d62e33bc4', 'ARG_6485630a7113f1686463242.jpg', 'Dog', 'Dog', 'Dog', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(19, '2306076480d62e33bc4', 'ARG_6485630a726611686463242.jpg', 'Castle', 'Castle', 'Castle', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(20, '2306076480d62e33bc4', 'ARG_6485630a733031686463242.jpg', 'Prada', 'Prada', 'Prada', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(21, '2306076480d62e33bc4', 'ARG_6485630a73e281686463242.jpg', 'Door', 'Door', 'Door', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(22, '2306076480d62e33bc4', 'ARG_6485630a750401686463242.jpg', 'Haunted House', 'Haunted House', 'Haunted House', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(23, '2306076480d62e33bc4', 'ARG_6485630a75d411686463242.jpg', 'Flower', 'Flower', 'Flower', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(24, '2306076480d62e33bc4', 'ARG_6485630a768b01686463242.jpg', 'Desert', 'Desert', 'Desert', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(25, '2306076480d62e33bc4', 'ARG_6485630a776d91686463242.jpg', 'Sunset', 'Sunset', 'Sunset', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(26, '2306076480d62e33bc4', 'ARG_6485630a785091686463242.jpg', 'Spectacle Black', 'Spectacle Black', 'Spectacle Black', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(27, '2306076480d62e33bc4', 'ARG_6485630a790661686463242.jpg', 'Spectacle White', 'Spectacle White', 'Spectacle White', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1),
(28, '2306076480d62e33bc4', 'ARG_6485630a798a41686463242.jpg', 'Camel', 'Camel', 'Camel', 0, '2023-06-11 06:00:42', '2023-06-11 06:00:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `uidn` varchar(255) NOT NULL COMMENT 'user identification number',
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(10) DEFAULT NULL COMMENT 'One Time Password',
  `otpc_exp` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uidn`, `fullname`, `email`, `salt`, `password`, `otp`, `otpc_exp`, `created_at`, `modified_at`, `status`) VALUES
(5, '2306076480d62e33bc4', 'Madhav Kundra', 'example1@gmail.com', 'c42846e5720eca0d46ca616e608795f2', '$2y$12$c42846e5720eca0d46ca6umn5xl7422t8QpYH6mUDTfi6u89YLzci', NULL, '2023-06-07 21:13:01', '2023-06-07 19:10:38', '2023-06-12 09:32:16', 1),
(7, '23060964837867488e7', 'Raghav ', 'eample2@gmail.com', '75f78c9b5d1f86284379ffedbc479d0a', '$2y$12$75f78c9b5d1f86284379feULXY4RL.patY7FzwR8GudklJsNP34Iy', NULL, '2023-06-09 21:07:19', '2023-06-09 19:07:19', '2023-06-12 09:32:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `id` int(255) NOT NULL,
  `uidn` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
