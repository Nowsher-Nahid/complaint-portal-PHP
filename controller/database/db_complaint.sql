-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2024 at 06:43 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `id` int NOT NULL,
  `sender_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sender_phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `files` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  `nt_status` int NOT NULL,
  `created_date` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_time` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`id`, `sender_name`, `sender_email`, `sender_phone`, `title`, `description`, `files`, `status`, `nt_status`, `created_date`, `created_time`) VALUES
(1, 'Mr. User', 'user@example.com', '010000000', 'Water pollution', 'Lorem Ipsum\r\n&#34;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&#34;\r\n&#34;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&#34;\r\nWhat is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '[\"1708763958download (1).jpg\",\"1708763958download (2).jpg\",\"1708763958download.jpg\",\"1708763958dummy.pdf\",\"1708763958file_example_MP4_480_1_5MG.mp4\"]', 0, 1, '2024-02-24', '08:39 am'),
(2, 'User one', 'user1@example.com', '01816010878', 'Testing a complaint', 'Lorem ipsum dolor sit amet', '[\"1708795716download.jpg\",\"1708795716dummy.pdf\",\"1708795716file_example_MP4_480_1_5MG.mp4\"]', 1, 1, '2024-01-24', '05:28 pm'),
(3, 'User one', 'user1@example.com', '01816010878', 'A new ', 'new testing', '[\"1708796421.\"]', 0, 1, '2024-02-20', '05:40 pm'),
(4, 'User one', 'user1@example.com', '01816010878', 'ertertert', 'asdasdasd', '[\"1708796625download (1).jpg\"]', 1, 1, '2024-02-24', '05:43 pm'),
(5, 'User one', 'user1@example.com', '01816010878', 'yyyy', 'erterte', '', 0, 1, '2023-12-24', '05:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE `tbl_replies` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `files` text COLLATE utf8mb4_general_ci,
  `receiver_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `nt_status` int NOT NULL,
  `created_date` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_time` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_replies`
--

INSERT INTO `tbl_replies` (`id`, `title`, `reply`, `files`, `receiver_name`, `receiver_email`, `status`, `nt_status`, `created_date`, `created_time`) VALUES
(2, 'Water pollution', 'We will look into the matter in no time.', '[\"1708792012Home 4.jpg\",\"1708792012Home1-2.jpg\"]', 'Mr. User', 'user@example.com', 0, 1, '2024-02-24', '04:26 pm'),
(3, 'Testing a complaint', 'We will look inot it', '[\"1708795744.\"]', 'User one', 'user1@example.com', 0, 1, '2024-02-24', '05:29 pm'),
(4, 'yyyy', 'ki yyyyy vaag ja', '', 'User one', 'user1@example.com', 0, 1, '2024-02-24', '05:46 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_date` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created_time` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `phone`, `password`, `type`, `created_date`, `created_time`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '01816010878', '670b14728ad9902aecba32e22fa4f6bd', 'Super Admin', '2024-02-23', '02:38 pm'),
(4, 'General admin', 'generaladmin@example.com', '0180000000', '9cafeef08db2dd477098a0293e71f90a', 'Admin', '2024-02-24', '09:10 am'),
(6, 'User one', 'user1@example.com', '01816010878', '670b14728ad9902aecba32e22fa4f6bd', 'User', '2024-02-24', '05:26 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
