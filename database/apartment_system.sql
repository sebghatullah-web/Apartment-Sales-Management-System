-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2026 at 06:14 AM
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
-- Database: `apartment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `apartment_number` varchar(50) NOT NULL,
  `area` float DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `status` enum('COMPLETED','UNDER_CONSTRUCTION','NOT_STARTED') NOT NULL,
  `base_price` decimal(15,2) DEFAULT NULL,
  `estimated_total_cost` decimal(15,2) DEFAULT NULL,
  `spent_cost` decimal(15,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `floor_id`, `apartment_number`, `area`, `rooms`, `status`, `base_price`, `estimated_total_cost`, `spent_cost`, `created_at`) VALUES
(3, 11, '0001', 114, 3, 'COMPLETED', 34200.00, 10000.00, 10000.00, '2026-03-11 08:42:34'),
(4, 12, '0002', 114, 3, 'COMPLETED', 34200.00, 10000.00, 10000.00, '2026-03-11 08:43:21'),
(5, 13, '0003', 113, 3, 'COMPLETED', 34200.00, 10000.00, 10000.00, '2026-03-11 08:43:58'),
(6, 14, '0004', 114, 3, 'COMPLETED', 34200.00, 10000.00, 10000.00, '2026-03-11 08:44:35'),
(7, 15, '0005', 114, 3, 'UNDER_CONSTRUCTION', 34200.00, 10000.00, 1000.00, '2026-03-11 08:45:23'),
(8, 16, '0006', 114, 3, 'UNDER_CONSTRUCTION', 34200.00, 10000.00, 1000.00, '2026-03-11 08:46:14'),
(9, 17, '0007', 114, 3, 'UNDER_CONSTRUCTION', 34200.00, 10000.00, 1000.00, '2026-03-11 08:46:56'),
(10, 18, '0008', 114, 3, 'UNDER_CONSTRUCTION', 34200.00, 10000.00, 1000.00, '2026-03-11 08:47:24'),
(11, 19, '0009', 114, 3, 'NOT_STARTED', 34200.00, 10000.00, 0.00, '2026-03-11 08:47:53'),
(12, 20, '0010', 114, 3, 'NOT_STARTED', 34200.00, 10000.00, 0.00, '2026-03-11 08:48:22'),
(13, 21, '0011', 114, 3, 'NOT_STARTED', 34200.00, 10000.00, 0.00, '2026-03-11 08:48:48'),
(14, 22, '0012', 114, 3, 'NOT_STARTED', 34200.00, 10000.00, 0.00, '2026-03-11 08:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `floors_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `project_id`, `name`, `floors_count`) VALUES
(3, 4, '001', 4),
(4, 4, '002', 4),
(5, 4, '003', 4),
(6, 4, '004', 4),
(7, 4, '005', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `national_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `phone`, `email`, `national_id`, `created_at`) VALUES
(1, 'احمد', '0799564213', 'ahmad@kabulnewcity.com', '+93', '2026-03-10 09:29:20'),
(2, 'محمود', '0798712345', 'mahmod@gmail.com', '+93', '2026-03-11 08:50:24'),
(3, 'لیلا', '0789546324', 'laila@gmail.com', '+93', '2026-03-11 08:51:07'),
(4, 'مریم', '07678574213', 'mariam@gmail.com', '+93', '2026-03-11 08:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `floor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `block_id`, `floor_number`) VALUES
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 4, 1),
(16, 4, 2),
(17, 4, 3),
(18, 4, 4),
(19, 5, 1),
(20, 5, 2),
(21, 5, 3),
(22, 5, 4),
(23, 6, 1),
(24, 6, 2),
(25, 6, 3),
(26, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` enum('info','success','warning','error') NOT NULL DEFAULT 'info',
  `entity_type` varchar(50) NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ownerships`
--

CREATE TABLE `ownerships` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `sale_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ownerships`
--

INSERT INTO `ownerships` (`id`, `apartment_id`, `customer_id`, `sale_price`, `sale_date`) VALUES
(3, 3, 4, 34200.00, '2026-03-11'),
(4, 4, 3, 34200.00, '2026-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `ownership_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment_date` date NOT NULL,
  `method` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ownership_id`, `amount`, `payment_date`, `method`, `description`) VALUES
(2, 3, 34200.00, '2026-03-11', 'حضوری', ''),
(3, 4, 10000.00, '2026-03-11', 'حضوری', ''),
(4, 4, 10000.00, '2026-03-12', 'حضوری', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','INACTIVE','COMPLETED') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `location`, `description`, `created_at`, `status`) VALUES
(4, 'پروژه اول', 'ده سبز', '', '2026-03-11 08:34:09', 'ACTIVE'),
(5, 'پروژه دوم', 'ده سبز', '', '2026-03-11 08:34:29', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reserved_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('ACTIVE','CANCELLED','CONVERTED_TO_SALE') DEFAULT 'ACTIVE',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `apartment_id`, `customer_id`, `reserved_at`, `status`, `created_at`) VALUES
(2, 7, 4, '2026-03-11 13:29:17', 'ACTIVE', '2026-03-11 13:29:17'),
(3, 8, 3, '2026-03-11 13:49:01', 'ACTIVE', '2026-03-11 13:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `role` enum('ADMIN','SALES','VIEWER') DEFAULT 'VIEWER',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'System Admin', 'ADMIN', '2026-03-11 04:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownerships`
--
ALTER TABLE `ownerships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownership_id` (`ownership_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ownerships`
--
ALTER TABLE `ownerships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ownerships`
--
ALTER TABLE `ownerships`
  ADD CONSTRAINT `ownerships_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ownerships_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`ownership_id`) REFERENCES `ownerships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
