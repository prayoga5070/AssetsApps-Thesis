-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 08:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `3_asset`
--

CREATE TABLE `3_asset` (
  `id` int(200) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_acq` year(4) NOT NULL,
  `status` enum('Active','Writeoff','Inactive') NOT NULL,
  `user` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `qrcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `3_asset`
--

INSERT INTO `3_asset` (`id`, `code`, `name`, `year_acq`, `status`, `user`, `location`, `description`, `created_at`, `updated_at`, `deleted_at`, `id_user`, `qrcode`) VALUES
(1, 'AS-0001', 'Laptop Asus', 2011, 'Active', 'Prayoga', 'SO', '', '2024-03-24 12:43:23', '2024-03-24 12:43:23', NULL, 2, 'jhJCL');

-- --------------------------------------------------------

--
-- Table structure for table `3_asset_path`
--

CREATE TABLE `3_asset_path` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `3_asset_path`
--

INSERT INTO `3_asset_path` (`id`, `code`, `link`) VALUES
(1, 'scan_link', 'http://localhost/backup-portal-mki/qr/asset/scan_detail');

-- --------------------------------------------------------

--
-- Table structure for table `3_file_asset`
--

CREATE TABLE `3_file_asset` (
  `id` int(200) NOT NULL,
  `id_asset` int(200) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `3_file_asset`
--

INSERT INTO `3_file_asset` (`id`, `id_asset`, `file_path`, `file_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'uploads/assetsqr/2024-03-24', 'b22ae77e6ab15526d3f47cd89d8af5a3.jpg', '2024-03-24 12:43:24', '2024-03-24 12:43:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `3_log_asset`
--

CREATE TABLE `3_log_asset` (
  `id` int(200) NOT NULL,
  `id_asset` int(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_acq` year(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `3_log_asset`
--

INSERT INTO `3_log_asset` (`id`, `id_asset`, `code`, `name`, `year_acq`, `status`, `user`, `location`, `description`, `created_at`, `id_user`) VALUES
(1, 1, 'AS-0001', 'Laptop Asus', 2011, 'Active', 'Prayoga', 'SO', '', '2024-03-24 12:43:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `assets_menu` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `user_id`, `assets_menu`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2024-03-24 12:30:18', NULL),
(2, 2, 1, '2024-03-24 12:30:38', NULL),
(3, 3, NULL, '2024-03-24 12:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `active_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `password`, `level`, `dept_id`, `last_update`, `created_at`, `deleted_at`, `active_at`) VALUES
(1, 'Admin', 'admin@mitrakiaraindonesia.com', '$2y$05$zOOcQMFnC.aeY6mcgi4WkOO.fq6SS3LvcUOFJlXpjbNNikEQpZZme', 1, 8, '2024-03-24 12:18:42', '2024-03-24 12:18:42', NULL, '2024-03-24 12:18:42'),
(2, 'accounting', 'acc@mitrakiaraindonesia.com', '$2y$05$ZIGixfMVYZD3HfiPfdR8E.RF8zG29CeM5tAR6LahYLxSUtV/3E/F2', 3, 6, '2024-03-24 12:38:13', '2024-03-24 12:38:13', NULL, '2024-03-24 12:38:13'),
(3, 'User', 'user@mitrakiaraindonesia.com', '$2y$05$MVKgMlrDAdrW/V65wIGcK.UIbZqZmycqP6U.x/9YQ6GgKmKD0P64S', 3, 0, '2024-03-24 12:47:25', '2024-03-24 12:47:25', NULL, '2024-03-24 12:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'SCM', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(2, 'Technical & Spesification', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(3, 'HRGA', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(4, 'Marketing', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(5, 'Finance', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(6, 'Accounting', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(7, 'Procurement', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(8, 'IT', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(9, 'R&D', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(10, 'QC', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(11, 'Sales', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(12, 'Production', '2023-09-01 15:01:14', '2023-09-01 15:01:14'),
(13, 'EHS', '2023-11-23 11:44:24', '2023-11-23 11:44:24'),
(14, 'PPIC', '2024-03-01 09:52:43', '2024-03-01 09:52:43'),
(15, 'Maintenance', '2024-03-01 10:03:00', '2024-03-01 10:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3_asset`
--
ALTER TABLE `3_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3_asset_path`
--
ALTER TABLE `3_asset_path`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3_file_asset`
--
ALTER TABLE `3_file_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3_log_asset`
--
ALTER TABLE `3_log_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3_asset`
--
ALTER TABLE `3_asset`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3_asset_path`
--
ALTER TABLE `3_asset_path`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3_file_asset`
--
ALTER TABLE `3_file_asset`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `3_log_asset`
--
ALTER TABLE `3_log_asset`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
