-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 16, 2025 at 08:13 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooperativa_db`
--
CREATE DATABASE IF NOT EXISTS `cooperativa_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `cooperativa_db`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Sem nome',
  `email` varchar(255) NOT NULL DEFAULT 'Sem email',
  `password` varchar(255) NOT NULL DEFAULT '1234',
  `level` char(1) NOT NULL DEFAULT '9',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `email`, `password`, `level`) VALUES
('846c12ef-baa1-11ef-93d2-98bb1e1e6b83', 'Alice', 'alice@example.com', '12345', '1'),
('846c1868-baa1-11ef-93d2-98bb1e1e6b83', 'Bob', 'bob@example.com', '12345', '2'),
('846c1959-baa1-11ef-93d2-98bb1e1e6b83', 'Carol', 'carol@example.com', '12345', '3'),
('846c19de-baa1-11ef-93d2-98bb1e1e6b83', 'David', 'david@example.com', '12345', '4'),
('846c1a5c-baa1-11ef-93d2-98bb1e1e6b83', 'Eve', 'eve@example.com', '12345', '5');

-- --------------------------------------------------------

--
-- Table structure for table `change_history`
--

DROP TABLE IF EXISTS `change_history`;
CREATE TABLE IF NOT EXISTS `change_history` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `table` varchar(255) NOT NULL DEFAULT 'Sem tabela',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colportagem_report`
--

DROP TABLE IF EXISTS `colportagem_report`;
CREATE TABLE IF NOT EXISTS `colportagem_report` (
  `id` varchar(36) NOT NULL,
  `colportor` varchar(255) NOT NULL DEFAULT 'Sem nome',
  `kits` int(5) DEFAULT 0,
  `books` int(5) DEFAULT 0,
  `jav` int(5) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cash_amount` decimal(10,0) DEFAULT 0,
  `card_amount` decimal(10,0) DEFAULT 0,
  `transfer_amount` decimal(10,0) DEFAULT 0,
  `observations` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `colportagem_report`
--

INSERT INTO `colportagem_report` (`id`, `colportor`, `kits`, `books`, `jav`, `date`, `cash_amount`, `card_amount`, `transfer_amount`, `observations`) VALUES
('d4e7661f-baa1-11ef-93d2-98bb1e1e6b83', 'John', 2, 10, 1, '2024-12-20 03:09:37', 100, 50, 0, 'Entrega completa'),
('d4e76e1a-baa1-11ef-93d2-98bb1e1e6b83', 'Sarah', 3, 5, 2, '2024-12-20 03:09:37', 200, 0, 25, 'Entrega parcial'),
('d4e76ef6-baa1-11ef-93d2-98bb1e1e6b83', 'Michael', 1, 7, 3, '2024-12-20 03:09:37', 150, 75, 30, NULL),
('d4e76f7e-baa1-11ef-93d2-98bb1e1e6b83', 'Rachel', 2, 8, 1, '2024-12-20 03:09:37', 120, 50, 40, 'Urgente'),
('d4e76ff4-baa1-11ef-93d2-98bb1e1e6b83', 'David', 4, 12, 0, '2024-12-20 03:09:37', 300, 100, 50, NULL),
('8701761663', 'dsfsdf', 0, 0, 0, '2024-12-20 03:09:37', 0, 0, 0, NULL),
('9659728042', 'Rodrigo', 0, 0, 0, '2024-12-20 03:09:37', 0, 0, 0, NULL),
('4885391762', 'asdsad', 2, 2, 0, '2024-12-20 03:14:09', 3, 1, 2, ''),
('3975448356', 'asdsad', 2, 2, 0, '2024-12-20 03:26:13', 3, 1, 2, ''),
('2271892245', 'Yuri', 50, 0, 0, '2024-12-22 23:30:59', 500, 0, 1000, 'Bateu a meta!');

-- --------------------------------------------------------

--
-- Table structure for table `literature_stock`
--

DROP TABLE IF EXISTS `literature_stock`;
CREATE TABLE IF NOT EXISTS `literature_stock` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(10) NOT NULL DEFAULT '0',
  `type` char(2) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `arrived_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `observations` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `literature_stock`
--

INSERT INTO `literature_stock` (`id`, `name`, `quantity`, `type`, `purchase_date`, `arrived_date`, `observations`) VALUES
('9696426b-baa1-11ef-93d2-98bb1e1e6b83', 'Book 2', '15', '1', '2024-12-15 05:01:09', '2024-12-15 08:28:09', 'No observations'),
('9696432b-baa1-11ef-93d2-98bb1e1e6b83', 'Book 3', '5', '1', '2024-12-15 05:01:09', '2024-12-15 08:28:09', 'No observations'),
('969643a0-baa1-11ef-93d2-98bb1e1e6b83', 'Book 4', '20', '1', '2024-12-15 05:01:09', '2024-12-15 08:28:09', 'No observations'),
('9696440f-baa1-11ef-93d2-98bb1e1e6b83', 'Book 5', '8', '1', '2024-12-15 05:01:09', '2024-12-15 08:28:09', 'No observations'),
('2158247159', 'Book 1', '23', '0', '2024-12-19 07:00:49', '2024-12-17 13:00:00', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(10, '2024-04-03-104710', 'App\\Database\\Migrations\\Administrators', 'default', 'App', 1734238592, 1),
(11, '2024-06-10-112159', 'App\\Database\\Migrations\\BookStockTable', 'default', 'App', 1734238592, 1),
(12, '2024-06-10-121105', 'App\\Database\\Migrations\\ChangeHistoryTable', 'default', 'App', 1734238592, 1),
(13, '2024-08-03-100727', 'App\\Database\\Migrations\\ColportagemReport', 'default', 'App', 1734238592, 1),
(15, '2024-12-15-062708', 'App\\Database\\Migrations\\AddingColumnBookStock', 'default', 'App', 1734251289, 2),
(16, '2024-12-15-083747', 'App\\Database\\Migrations\\AddingColumnObsBookStock', 'default', 'App', 1734252057, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
