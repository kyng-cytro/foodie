-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2023 at 11:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-03-02 10:52:45', '2023-03-02 10:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`, `created_at`, `updated_at`) VALUES
(19, 'Beef Plates', 'Food_Category_221.png', 1, 1, '2023-02-25 14:36:29', '2023-03-01 12:50:26'),
(20, 'Breads', 'Food_Category_900.jpg', 1, 1, '2023-02-25 14:36:38', '2023-02-25 14:36:38'),
(21, 'Pasta Plates', 'Food_Category_811.jpg', 1, 1, '2023-02-25 14:36:56', '2023-03-01 12:50:34'),
(30, 'Chicken Plates', 'Food_Category_781.png', 1, 1, '2023-03-01 12:50:09', '2023-03-01 12:50:40'),
(31, 'Burgers', 'Food_Category_610.png', 1, 1, '2023-03-01 12:50:54', '2023-03-01 12:50:54'),
(32, 'Healthy Items', 'Food_Category_886.png', 1, 1, '2023-03-01 12:51:28', '2023-03-01 12:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `price`, `image_name`, `rating`, `featured`, `active`, `category_id`, `created_at`, `updated_at`) VALUES
(19, 'Beef Plate', '20000.00', 'Food_Name_9075.jpg', 3, 1, 1, 19, '2023-02-26 22:59:08', '2023-02-26 22:59:08'),
(20, 'Bread Sticks', '240.00', 'Food_Name_550.jpg', 4, 1, 1, 20, '2023-02-26 23:19:44', '2023-02-26 23:19:44'),
(21, 'Cheese Pasta', '2430.00', 'Food_Name_9433.jpg', 3, 1, 1, 21, '2023-02-26 23:35:21', '2023-02-26 23:35:21'),
(22, 'Suya', '2300.00', 'Food_Name_913.jpg', 4, 1, 1, 19, '2023-02-26 23:36:31', '2023-02-26 23:36:31'),
(23, 'Dry Toast', '280.00', 'Food_Name_7657.jpg', 3, 1, 1, 20, '2023-02-26 23:37:35', '2023-02-26 23:37:35'),
(24, 'Steak', '14000.00', 'Food_Name_364.jpg', 4, 1, 1, 19, '2023-02-26 23:38:40', '2023-02-26 23:38:40'),
(25, 'Cold Noodles', '2495.00', 'Food_Name_8601.jpg', 3, 1, 1, 21, '2023-02-26 23:45:10', '2023-02-26 23:45:10'),
(26, 'Sea Food Pasta', '2345.00', 'Food_Name_4459.jpg', 4, 1, 1, 21, '2023-02-26 23:46:53', '2023-02-26 23:46:53'),
(27, 'Honey Glazed Stake', '25000.00', 'Food_Name_3029.jpg', 3, 1, 1, 19, '2023-02-26 23:49:32', '2023-02-26 23:49:32'),
(28, 'Hard Loaf', '2500.00', 'Food_Name_3072.jpg', 4, 1, 1, 20, '2023-02-26 23:52:51', '2023-02-26 23:52:51'),
(29, 'Veggi Plate', '2400.00', 'Food_Name_6102.jpg', 3, 1, 1, 32, '2023-02-26 23:59:17', '2023-03-01 12:53:16'),
(30, 'Mac & Cheese', '2329.00', 'Food_Name_5928.jpg', 4, 1, 1, 21, '2023-02-27 00:01:02', '2023-02-27 00:01:02'),
(31, 'Fedechini', '12400.00', 'Food_Name_7959.jpg', 4, 0, 1, 21, '2023-02-27 00:01:50', '2023-02-27 00:01:50'),
(32, 'Pasta With Herbs', '12000.00', 'Food_Name_3283.jpg', 2, 1, 1, 21, '2023-02-27 00:05:49', '2023-02-27 00:05:49'),
(33, 'Chocolate Spread', '760.00', 'Food_Name_1737.jpg', 4, 1, 1, 20, '2023-02-27 00:08:28', '2023-02-27 00:08:28'),
(34, 'Beef Burger', '2780.00', 'Food_Name_217.jpg', 4, 1, 1, 31, '2023-02-27 00:11:42', '2023-03-01 12:53:57'),
(36, 'King Burger', '2499.00', 'Food_Name_9449.jpg', 4, 1, 1, 31, '2023-03-01 12:56:53', '2023-03-01 12:56:53'),
(37, 'Chicken & Chips', '2300.00', 'Food_Name_5581.jpg', 3, 1, 1, 30, '2023-03-01 12:58:39', '2023-03-01 12:58:39'),
(38, 'Chicken & Yams', '4300.00', 'Food_Name_2500.jpg', 2, 1, 1, 30, '2023-03-01 12:59:17', '2023-03-01 12:59:17'),
(39, 'Pasta & Greens Bowl', '4250.00', 'Food_Name_5398.jpg', 3, 1, 1, 32, '2023-03-01 13:00:55', '2023-03-01 13:00:55'),
(40, 'Donuts', '350.00', 'Food_Name_9652.jpg', 4, 1, 1, 20, '2023-03-01 13:02:06', '2023-03-01 13:02:06'),
(41, 'Beacon Burger', '3400.00', 'Food_Name_1938.jpg', 4, 1, 1, 31, '2023-03-01 13:02:55', '2023-03-01 13:02:55'),
(42, 'Wagyu Beef', '43000.00', 'Food_Name_8953.jpg', 4, 1, 1, 19, '2023-03-01 13:04:07', '2023-03-01 13:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `total` decimal(10,2) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
