-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2026 at 04:41 AM
-- Server version: 8.0.46
-- PHP Version: 8.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casanovasheaven_coastguard`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|103.198.99.126', 'i:1;', 1776861725),
('admin@gmail.com|103.198.99.126:timer', 'i:1776861725;', 1776861725),
('admin@gmail.com|110.226.180.40', 'i:1;', 1775890810),
('admin@gmail.com|110.226.180.40:timer', 'i:1775890810;', 1775890810),
('digilpur@gmail.com|103.198.99.126', 'i:2;', 1776861188),
('digilpur@gmail.com|103.198.99.126:timer', 'i:1776861188;', 1776861188),
('officer@indiancoastguard.gov.in|103.198.99.126', 'i:1;', 1776942883),
('officer@indiancoastguard.gov.in|103.198.99.126:timer', 'i:1776942883;', 1776942883),
('officer@indiancoastguard.gov.in|110.226.177.218', 'i:1;', 1776770024),
('officer@indiancoastguard.gov.in|110.226.177.218:timer', 'i:1776770024;', 1776770024),
('officer123indiancoastguard|103.198.99.126', 'i:1;', 1776860734),
('officer123indiancoastguard|103.198.99.126:timer', 'i:1776860734;', 1776860734),
('officer123indiancoastguard|110.226.180.40', 'i:1;', 1775910347),
('officer123indiancoastguard|110.226.180.40:timer', 'i:1775910347;', 1775910347),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:36:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"view_users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"eidt_users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"view_my_profile\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:5;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"view users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:5;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"create users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:10:\"edit users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"delete users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:5;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:10:\"edit roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:16:\"view permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:5;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"edit permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:14:\"view locations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:5;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"create locations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:14:\"edit locations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:16:\"delete locations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:12:\"view notices\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:5;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:14:\"create notices\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:12:\"edit notices\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:4;i:2;i:5;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:14:\"delete notices\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:17:\"view item masters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:5;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"create item masters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:17:\"edit item masters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:19:\"delete item masters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:19:\"import item masters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:7:\"demo123\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:12:\"ticket_raise\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:4;i:2;i:5;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:13:\"raise tickets\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:4;i:2;i:5;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:12:\"import_excel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:13:\"upload manual\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:13:\"delete manual\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"all_delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:8:\"all_view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:5;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:14:\"Parallel Admin\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:14:\"Location Users\";s:1:\"c\";s:3:\"web\";}}}', 1777202023);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operational',
  `status_reason` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serviced_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `location_id`, `code`, `serial_no`, `equipment`, `qty`, `uom`, `status`, `status_reason`, `remarks`, `created_at`, `updated_at`, `serviced_date`) VALUES
(1, 11, 'PB-OB-BR1', NULL, 'Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 01:15:49', '2026-04-25 06:05:34', NULL),
(72, 7, 'DI-NSB-BR1', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(73, 7, 'DI-NSB-BR2', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(74, 7, 'DI-NSB-BR3', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'non-operational', 'demojkjldgfasdf', NULL, '2026-03-26 02:14:30', '2026-04-13 11:24:18', NULL),
(75, 7, 'DI-NSB-BR4', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'pcs', 'non-operational', 'demo', NULL, '2026-03-26 02:14:30', '2026-04-11 06:29:30', NULL),
(76, 7, 'DI-NSB-BR5', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(77, 7, 'DI-NSB-HPP1', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(78, 7, 'DI-NSB-HPP2', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(79, 7, 'DI-NSB-HPP3', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(80, 7, 'DI-NSB-HPP4', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(81, 7, 'DI-NSB-HPP5', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(82, 7, 'DI-NSB-AB1', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(83, 7, 'DI-NSB-AB2', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(84, 7, 'DI-NSB-AB3', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(85, 7, 'DI-NSB-AB4', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(86, 7, 'DI-NSB-AB5', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(87, 7, 'DI-NSB-HSS1', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(88, 7, 'DI-NSB-HSS2', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(89, 7, 'DI-NSB-HSS3', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(90, 7, 'DI-NSB-HSS4', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(91, 7, 'DI-NSB-HSS5', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(92, 7, 'DI-NSB-AHS1', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(93, 7, 'DI-NSB-AHS2', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(94, 7, 'DI-NSB-AHS3', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(95, 7, 'DI-NSB-AHS4', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(96, 7, 'DI-NSB-AHS5', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(97, 7, 'DI-NSB-TS1', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(98, 7, 'DI-NSB-TS2', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(99, 7, 'DI-NSB-TS3', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(100, 7, 'DI-NSB-TS4', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(102, 7, 'DI-NSB-AS', NULL, 'Anchoring Set (30 Kgs) for HDB-N 1000', 35, 'Sets', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(103, 7, 'DI-NSB-JSS1', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(104, 7, 'DI-NSB-JSS2', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(105, 7, 'DI-NSB-JSS3', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(106, 7, 'DI-NSB-JSS4', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(107, 7, 'DI-NSB-JSS5', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(108, 7, 'DI-NSB-LSL', NULL, 'Lifting Slings Set 12T (Container & Reel) for HDB-N 1000', 5, 'Sets', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(109, 7, 'DI-NSB-LSS', NULL, 'Lifting Slings Set 2T (Power Pack) for HDB-N 1000', 5, 'Sets', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(110, 7, 'DI-NSB-C1', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(111, 7, 'DI-NSB-C2', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(112, 7, 'DI-NSB-C3', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(113, 7, 'DI-NSB-C4', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(114, 7, 'DI-NSB-C5', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(115, 7, 'DI-NSB-SPKB1', NULL, 'Fabric 1500 x 2000 mm for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(116, 7, 'DI-NSB-SPKB2', NULL, 'Hardener for HDB-N 1000', 5, 'Kg', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(117, 7, 'DI-NSB-SPKB3', NULL, 'Rubber Adhesive for HDB-N 1000', 5, 'Kg', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(118, 7, 'DI-NSB-SPKB4', NULL, 'Sand Paper 230 x 280 mm for HDB-N 1000', 30, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(119, 7, 'DI-NSB-SPKB5', NULL, 'F1 Valve T-Tool Key for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(120, 7, 'DI-NSB-SPKB6', NULL, 'Cutter Knife for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(121, 7, 'DI-NSB-SPKB7', NULL, 'Allenkey 6 mm for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(122, 7, 'DI-NSB-SPKB8', NULL, 'Spanner 17 mm for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(123, 7, 'DI-NSB-SPKB9', NULL, 'F1 Valve Opening Closing Tool for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(124, 7, 'DI-NSB-SPKB10', NULL, 'Connecting Link LL8 for HDB-N 1000', 10, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(125, 7, 'DI-NSB-SPKB11', NULL, 'F1 Valve for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(126, 7, 'DI-NSB-SPKB12', NULL, 'Quick Link KEPL 10 - SS316 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(127, 7, 'DI-NSB-SPKB13', NULL, 'Stapler for Emergency Fixing of Boom for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(128, 7, 'DI-NSB-SPKBR1', NULL, '1/2\" x 3/8\"Adapter SS316 for Boom Reel HSR 1712', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(129, 7, 'DI-NSB-SPKBR2', NULL, '1/8\" x 1/4\" Adapter SS316 for Boom Reel HSR 1712', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(130, 7, 'DI-NSB-SPKBR3', NULL, '3/8\" x 3/8\" Adapter SS316 for Boom Reel HSR 1712', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(131, 7, 'DI-NSB-SPKBR4', NULL, '1/4\" x 3/8\" Adapter SS316 for Boom Reel HSR 1712', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(132, 7, 'DI-NSB-SPKBR5', NULL, '3/8\" Dowty Washers - 404529 for Boom Reel HSR 1712', 25, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(133, 7, 'DI-NSB-SPKBR6', NULL, '1/4\" Dowty Washers - 404930 for Boom Reel HSR 1712', 25, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(134, 7, 'DI-NSB-SPKBR7', NULL, '1/2\" Dowty Washers - 404530 for Boom Reel HSR 1712', 25, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(135, 7, 'DI-NSB-SPKHPP1', NULL, 'Kohler KD441 Engine Fuel Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(136, 7, 'DI-NSB-SPKHPP2', NULL, 'Kohler KD441 Engine Air Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(137, 7, 'DI-NSB-SPKHPP3', NULL, 'Kohler KD441 Engine Oil Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(138, 7, 'DI-NSB-SPKHPP4', NULL, 'Hydraulic Oil Filter / Air Breather for Hydraulic Power Pack LPP 7 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(139, 7, 'DI-NSB-SPKHPP5', NULL, '3/8\" QRC Connector for Hydraulic Power Pack LPP 7 for HDB-N 1000', 5, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(140, 7, 'DI-NSB-SPKHPP6', NULL, '3/8\" Dowty Washers - 404529 for Hydraulic Power Pack LPP 7 for HDB-N 1000', 15, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(141, 7, 'DI-NSB-SPKHPP7', NULL, '1\" Dowty Washers - 404930 for Hydraulic Power Pack LPP 7 for HDB-N 1000', 15, 'Pcs', 'operational', NULL, NULL, '2026-03-26 02:14:30', '2026-03-26 02:14:30', NULL),
(142, 10, 'Molestiae porro ut s', 'Est aspernatur magn', 'Assumenda expedita e', 325, 'set', 'non-operational', 'demooo', NULL, '2026-04-09 06:12:13', '2026-04-09 06:12:13', NULL),
(143, 11, 'PB-OB-BR2', NULL, 'Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(144, 11, 'PB-OB-BR3', NULL, 'Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(145, 11, 'PB-OB-BR4', NULL, 'Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(146, 11, 'PB-OB-HPP1', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(147, 11, 'PB-OB-HPP2', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(148, 11, 'PB-OB-HPP3', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(149, 11, 'PB-OB-HPP4', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(150, 11, 'PB-OB-AB1', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(151, 11, 'PB-OB-AB2', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(152, 11, 'PB-OB-AB3', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(153, 11, 'PB-OB-AB4', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(154, 11, 'PB-OB-HSS1', NULL, 'Hydraulic Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(155, 11, 'PB-OB-HSS2', NULL, 'Hydraulic Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(156, 11, 'PB-OB-HSS3', NULL, 'Hydraulic Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(157, 11, 'PB-OB-HSS4', NULL, 'Hydraulic Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(158, 11, 'PB-OB-AHS1', NULL, 'Air Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(159, 11, 'PB-OB-AHS2', NULL, 'Air Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(160, 11, 'PB-OB-AHS3', NULL, 'Air Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(161, 11, 'PB-OB-AHS4', NULL, 'Air Hose Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(162, 11, 'PB-OB-TS1', NULL, 'Towing Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(163, 11, 'PB-OB-TS2', NULL, 'Towing Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(164, 11, 'PB-OB-TS3', NULL, 'Towing Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(165, 11, 'PB-OB-TS4', NULL, 'Towing Set for HDB-N 1500', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(166, 11, 'PB-OB-AS', NULL, 'Anchoring Set (40 Kgs) for HDB-N 1500', 16, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(167, 11, 'PB-OB-JSS1', NULL, 'Jet Spray System for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(168, 11, 'PB-OB-JSS2', NULL, 'Jet Spray System for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(169, 11, 'PB-OB-JSS3', NULL, 'Jet Spray System for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(170, 11, 'PB-OB-JSS4', NULL, 'Jet Spray System for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(171, 11, 'PB-OB-LSL', NULL, 'Lifting Slings Set 12T (Container & Reel) for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(172, 11, 'PB-OB-LSS', NULL, 'Lifting Slings Set 2T (Power Pack) for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(173, 11, 'PB-OB-C1', NULL, '15 Feet Container for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(174, 11, 'PB-OB-C2', NULL, '15 Feet Container for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(175, 11, 'PB-OB-C3', NULL, '15 Feet Container for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(176, 11, 'PB-OB-C4', NULL, '15 Feet Container for HDB-N 1500', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(177, 11, 'PB-OB-SPKB1', NULL, 'Fabric 1500 x 2000 mm for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(178, 11, 'PB-OB-SPKB2', NULL, 'Hardener for HDB-N 1500', 4, 'Kg', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(179, 11, 'PB-OB-SPKB3', NULL, 'Rubber Adhesive for HDB-N 1500', 4, 'Kg', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(180, 11, 'PB-OB-SPKB4', NULL, 'Sand Paper 230 x 280 mm for HDB-N 1500', 24, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(181, 11, 'PB-OB-SPKB5', NULL, 'F1 Valve T-Tool Key for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(182, 11, 'PB-OB-SPKB6', NULL, 'Cutter Knife for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(183, 11, 'PB-OB-SPKB7', NULL, 'Allenkey 6 mm for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(184, 11, 'PB-OB-SPKB8', NULL, 'Spanner 17 mm for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(185, 11, 'PB-OB-SPKB9', NULL, 'F1 Valve Opening Closing Tool for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(186, 11, 'PB-OB-SPKB10', NULL, 'Connecting Link LL8 for HDB-N 1500', 8, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(187, 11, 'PB-OB-SPKB11', NULL, 'F1 Valve for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(188, 11, 'PB-OB-SPKB12', NULL, 'Quick Link KEPL 10 - SS316 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(189, 11, 'PB-OB-SPKB13', NULL, 'Stapler for Emergency Fixing of Boom for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(190, 11, 'PB-OB-SPKBR1', NULL, '1/2\" x 3/8\"Adapter SS316 for Boom Reel HSR 1717', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(191, 11, 'PB-OB-SPKBR2', NULL, '1/8\" x 1/4\" Adapter SS316 for Boom Reel HSR 1717', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(192, 11, 'PB-OB-SPKBR3', NULL, '3/8\" x 3/8\" Adapter SS316 for Boom Reel HSR 1717', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(193, 11, 'PB-OB-SPKBR4', NULL, '1/4\" x 3/8\" Adapter SS316 for Boom Reel HSR 1717', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(194, 11, 'PB-OB-SPKBR5', NULL, '3/8\" Dowty Washers - 404529 for Boom Reel HSR 1717', 20, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(195, 11, 'PB-OB-SPKBR6', NULL, '1/4\" Dowty Washers - 404930 for Boom Reel HSR 1717', 20, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(196, 11, 'PB-OB-SPKBR7', NULL, '1/2\" Dowty Washers - 404530 for Boom Reel HSR 1717', 20, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(197, 11, 'PB-OB-SPKHPP1', NULL, 'Kohler KD441 Engine Fuel Filter for Hydraulic Power Pack LPP 7 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(198, 11, 'PB-OB-SPKHPP2', NULL, 'Kohler KD441 Engine Air Filter for Hydraulic Power Pack LPP 7 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(199, 11, 'PB-OB-SPKHPP3', NULL, 'Kohler KD441 Engine Oil Filter for Hydraulic Power Pack LPP 7 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(200, 11, 'PB-OB-SPKHPP4', NULL, 'Hydraulic Oil Filter / Air Breather for Hydraulic Power Pack LPP 7 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(201, 11, 'PB-OB-SPKHPP5', NULL, '3/8\" QRC Connector for Hydraulic Power Pack LPP 7 for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(202, 11, 'PB-OB-SPKHPP6', NULL, '3/8\" Dowty Washers - 404529 for Hydraulic Power Pack LPP 7 for HDB-N 1500', 12, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(203, 11, 'PB-OB-SPKHPP7', NULL, '1\" Dowty Washers - 404930 for Hydraulic Power Pack LPP 7 for HDB-N 1500', 12, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(204, 11, 'PB-OB-SPKHPP8', NULL, '1/2\" Dowty Washers - 404530 for Hydraulic Power Pack LPP 7 for HDB-N 1500', 12, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(205, 11, 'PB-OB-SPKAB1', NULL, 'Sarover Engine Oil Filter for Air Blower DAB 200 CG for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(206, 11, 'PB-OB-SPKAB2', NULL, 'Sarover Engine Air Filter for Air Blower DAB 200 CG for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(207, 11, 'PB-OB-SPKAB3', NULL, 'Sarover Engine Fuel Filter for Air Blower DAB 200 CG for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(208, 11, 'PB-OB-SPKAB4', NULL, 'Sarover Engine Oil Drain Plug for Air Blower DAB 200 CG for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(209, 11, 'PB-OB-SPKAB5', NULL, 'V-Belt for Air Blower DAB 200 CG for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(210, 11, 'PB-OB-TK1', NULL, 'Toolbox - Taparia Plastic Tool Box with Organiser, PTB 16 for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(211, 11, 'PB-OB-TK2', NULL, 'Socket Set - TAPARIA S-23HXL Socket Set for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(212, 11, 'PB-OB-TK3', NULL, 'Adjustable Spanner - Taparia 1172-10, 10-Inch (255mm) Adjustable Spanner for HDB-N 1500', 4, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(213, 11, 'PB-OB-TK4', NULL, 'Allen Key Set - Taparia KM9V Allen Key Set (Black), Hex for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(214, 11, 'PB-OB-TK5', NULL, 'Screwdriver Set - TAPARIA Screw Driver Set with Bulb - 840 for HDB-N 1500', 4, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(215, 11, 'PB-NSB-BR1', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(216, 11, 'PB-NSB-BR2', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(217, 11, 'PB-NSB-BR3', NULL, 'Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(218, 11, 'PB-NSB-HPP1', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(219, 11, 'PB-NSB-HPP2', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(220, 11, 'PB-NSB-HPP3', NULL, 'Hydraulic Power Pack LPP 7 with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(221, 11, 'PB-NSB-AB1', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(222, 11, 'PB-NSB-AB2', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(223, 11, 'PB-NSB-AB3', NULL, 'Air Blower DAB 200 CG Electric with Chalwyn Valve, Spark Arrestor & Canvas Cover for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(224, 11, 'PB-NSB-HSS1', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(225, 11, 'PB-NSB-HSS2', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(226, 11, 'PB-NSB-HSS3', NULL, 'Hydraulic Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(227, 11, 'PB-NSB-AHS1', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(228, 11, 'PB-NSB-AHS2', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(229, 11, 'PB-NSB-AHS3', NULL, 'Air Hose Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(230, 11, 'PB-NSB-TS1', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(231, 11, 'PB-NSB-TS2', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(232, 11, 'PB-NSB-TS3', NULL, 'Towing Set for HDB-N 1000', 1, 'Set', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(233, 11, 'PB-NSB-AS', NULL, 'Anchoring Set (30 Kgs) for HDB-N 1000', 21, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(234, 11, 'PB-NSB-JSS1', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(235, 11, 'PB-NSB-JSS2', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(236, 11, 'PB-NSB-JSS3', NULL, 'Jet Spray System for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(237, 11, 'PB-NSB-LSL', NULL, 'Lifting Slings Set 12T (Container & Reel) for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(238, 11, 'PB-NSB-LSS', NULL, 'Lifting Slings Set 2T (Power Pack) for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(239, 11, 'PB-NSB-C1', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(240, 11, 'PB-NSB-C2', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(241, 11, 'PB-NSB-C3', NULL, '15 Feet Container for HDB-N 1000', 1, 'Pc', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(242, 11, 'PB-NSB-SPKB1', NULL, 'Fabric 1500 x 2000 mm for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(243, 11, 'PB-NSB-SPKB2', NULL, 'Hardener for HDB-N 1000', 3, 'Kg', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(244, 11, 'PB-NSB-SPKB3', NULL, 'Rubber Adhesive for HDB-N 1000', 3, 'Kg', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(245, 11, 'PB-NSB-SPKB4', NULL, 'Sand Paper 230 x 280 mm for HDB-N 1000', 18, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(246, 11, 'PB-NSB-SPKB5', NULL, 'F1 Valve T-Tool Key for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(247, 11, 'PB-NSB-SPKB6', NULL, 'Cutter Knife for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(248, 11, 'PB-NSB-SPKB7', NULL, 'Allenkey 6 mm for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(249, 11, 'PB-NSB-SPKB8', NULL, 'Spanner 17 mm for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(250, 11, 'PB-NSB-SPKB9', NULL, 'F1 Valve Opening Closing Tool for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(251, 11, 'PB-NSB-SPKB10', NULL, 'Connecting Link LL8 for HDB-N 1000', 6, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(252, 11, 'PB-NSB-SPKB11', NULL, 'F1 Valve for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(253, 11, 'PB-NSB-SPKB12', NULL, 'Quick Link KEPL 10 - SS316 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(254, 11, 'PB-NSB-SPKB13', NULL, 'Stapler for Emergency Fixing of Boom for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(255, 11, 'PB-NSB-SPKBR1', NULL, '1/2\" x 3/8\"Adapter SS316 for Boom Reel HSR 1712', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(256, 11, 'PB-NSB-SPKBR2', NULL, '1/8\" x 1/4\" Adapter SS316 for Boom Reel HSR 1712', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(257, 11, 'PB-NSB-SPKBR3', NULL, '3/8\" x 3/8\" Adapter SS316 for Boom Reel HSR 1712', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(258, 11, 'PB-NSB-SPKBR4', NULL, '1/4\" x 3/8\" Adapter SS316 for Boom Reel HSR 1712', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(259, 11, 'PB-NSB-SPKBR5', NULL, '3/8\" Dowty Washers - 404529 for Boom Reel HSR 1712', 15, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(260, 11, 'PB-NSB-SPKBR6', NULL, '1/4\" Dowty Washers - 404930 for Boom Reel HSR 1712', 15, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(261, 11, 'PB-NSB-SPKBR7', NULL, '1/2\" Dowty Washers - 404530 for Boom Reel HSR 1712', 15, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(262, 11, 'PB-NSB-SPKHPP1', NULL, 'Kohler KD441 Engine Fuel Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(263, 11, 'PB-NSB-SPKHPP2', NULL, 'Kohler KD441 Engine Air Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(264, 11, 'PB-NSB-SPKHPP3', NULL, 'Kohler KD441 Engine Oil Filter for Hydraulic Power Pack LPP 7 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(265, 11, 'PB-NSB-SPKHPP4', NULL, 'Hydraulic Oil Filter / Air Breather for Hydraulic Power Pack LPP 7 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(266, 11, 'PB-NSB-SPKHPP5', NULL, '3/8\" QRC Connector for Hydraulic Power Pack LPP 7 for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(267, 11, 'PB-NSB-SPKHPP6', NULL, '3/8\" Dowty Washers - 404529 for Hydraulic Power Pack LPP 7 for HDB-N 1000', 9, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(268, 11, 'PB-NSB-SPKHPP7', NULL, '1\" Dowty Washers - 404930 for Hydraulic Power Pack LPP 7 for HDB-N 1000', 9, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(269, 11, 'PB-NSB-SPKHPP8', NULL, '1/2\" Dowty Washers - 404530 for Hydraulic Power Pack LPP 7 for HDB-N 1000', 9, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(270, 11, 'PB-NSB-SPKAB1', NULL, 'Sarover Engine Oil Filter for Air Blower DAB 200 CG for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(271, 11, 'PB-NSB-SPKAB2', NULL, 'Sarover Engine Air Filter for Air Blower DAB 200 CG for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(272, 11, 'PB-NSB-SPKAB3', NULL, 'Sarover Engine Fuel Filter for Air Blower DAB 200 CG for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(273, 11, 'PB-NSB-SPKAB4', NULL, 'Sarover Engine Oil Drain Plug for Air Blower DAB 200 CG for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(274, 11, 'PB-NSB-SPKAB5', NULL, 'V-Belt for Air Blower DAB 200 CG for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(275, 11, 'PB-NSB-TK1', NULL, 'Toolbox - Taparia Plastic Tool Box with Organiser, PTB 16 for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(276, 11, 'PB-NSB-TK2', NULL, 'Socket Set - TAPARIA S-23HXL Socket Set for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(277, 11, 'PB-NSB-TK3', NULL, 'Adjustable Spanner - Taparia 1172-10, 10-Inch (255mm) Adjustable Spanner for HDB-N 1000', 3, 'Pcs', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(278, 11, 'PB-NSB-TK4', NULL, 'Allen Key Set - Taparia KM9V Allen Key Set (Black), Hex for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(279, 11, 'PB-NSB-TK5', NULL, 'Screwdriver Set - TAPARIA Screw Driver Set with Bulb - 840 for HDB-N 1000', 3, 'Sets', 'operational', '', NULL, '2026-04-09 10:03:23', '2026-04-09 10:03:23', NULL),
(280, 7, '121', NULL, 'demo12312', 10, 'pcs', 'operational', NULL, NULL, '2026-04-25 07:37:59', '2026-04-25 07:42:14', '2026-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Surat', '2026-03-14 02:01:51', '2026-03-14 02:01:51'),
(3, 'Mumbai', '2026-03-14 02:01:59', '2026-03-14 02:01:59'),
(4, 'Gujrat', '2026-03-14 02:02:12', '2026-03-14 02:02:12'),
(5, 'Campbell Bay', '2026-03-26 01:29:40', '2026-03-26 01:29:40'),
(6, 'Chennai', '2026-03-26 01:29:57', '2026-03-26 01:29:57'),
(7, 'Digilpur', '2026-03-26 01:30:17', '2026-03-26 01:30:17'),
(8, 'Goa', '2026-03-26 01:34:54', '2026-03-26 01:34:54'),
(9, 'Haldia', '2026-03-26 01:35:10', '2026-03-26 01:35:10'),
(10, 'Kavaratti', '2026-03-26 01:35:33', '2026-03-26 01:35:33'),
(11, 'Port Blair', '2026-04-09 09:58:33', '2026-04-09 09:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_14_064955_create_permission_tables', 2),
(5, '2026_03_14_072743_create_locations_table', 3),
(6, '2026_03_14_093341_add_location_id_to_users_table', 4),
(7, '2026_03_14_100311_create_notices_table', 5),
(8, '2026_03_26_063953_create_item_masters_table', 6),
(9, '2026_03_26_064334_add_item_master_permission', 7),
(10, '2026_03_26_064711_add_granular_item_master_permissions', 8),
(11, '2026_03_26_070911_add_import_permission_to_item_masters', 9),
(13, '2026_03_28_103209_create_tickets_table', 10),
(14, '2026_04_06_080000_create_ticket_replies_table', 11),
(15, '2026_04_06_095402_add_image_path_to_tickets_and_replies_table', 12),
(16, '2026_04_08_111938_create_user_manuals_table', 13),
(17, '2026_04_09_060142_add_status_and_reason_to_item_masters_table', 14),
(18, '2026_04_09_043745_add_contact_person_to_tickets_table', 15),
(19, '2026_04_10_104000_add_detailed_contact_to_tickets_table', 15),
(20, '2026_04_11_051946_add_notification_timestamps_to_users_table', 16),
(21, '2026_04_13_105109_add_equipment_status_to_tickets_table', 17),
(22, '2026_04_25_073337_add_serviced_date_to_item_masters_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General',
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `category`, `file_path`, `is_active`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'What are US officials saying?', 'The US government has not confirmed whether American soldiers would be deployed in Iran, but officials have also not ruled out the possibility.\r\n\r\nDefense Secretary Pete Hegseth told the CBS TV network this week that the US is “willing to go as far as we need to” and Washington will ensure Iran’s “nuclear ambitions are never achieved”.', 'General', 'notices/jql5bDyjcWwMROkhLndv0bFZomYKZ6LYOtav8udo.png', 1, '2026-03-14 10:07:00', '2026-03-14 04:39:58', '2026-03-14 04:39:58'),
(2, 'Which countries has the US invaded in recent decades?', 'The US has engaged in multiple combat operations since the end of the Cold War.\r\n\r\nWashington and its NATO allies invaded Afghanistan in October 2001 in the wake of the September 11 al-Qaeda attacks that year on New York and the Pentagon. Then-US President George W Bush stated that the aim was to dislodge al-Qaeda fighters and capture Osama bin Laden, the armed group’s leader.', 'Circular', 'notices/RfTHIkn5sXo0td3OQwmyjVnFkCki79CDoB3WOvMr.png', 1, '2026-03-15 12:12:00', '2026-03-14 04:41:23', '2026-03-14 04:41:23'),
(3, 'IRGC says it targeted US vessel off Oman’s coast', 'A spokesperson for IRGC’s Khatam al-Anbiya headquarters said Iranian forces targeted a US military support vessel “at a considerable distance from the port of Salalah in Oman”.', 'General', NULL, 1, '2026-03-28 09:32:00', '2026-03-28 04:02:52', '2026-03-28 04:02:52'),
(4, 'test', 'TEST', 'Circular', NULL, 1, '2026-04-08 12:06:00', '2026-04-08 06:37:06', '2026-04-08 06:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'web', '2026-03-14 01:27:12', '2026-03-14 01:27:12'),
(2, 'eidt_users', 'web', '2026-03-14 01:27:23', '2026-03-14 01:27:23'),
(3, 'view_my_profile', 'web', '2026-03-14 02:10:45', '2026-03-14 02:10:45'),
(4, 'view users', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(5, 'create users', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(6, 'edit users', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(7, 'delete users', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(8, 'view roles', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(9, 'create roles', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(10, 'edit roles', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(11, 'delete roles', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(12, 'view permissions', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(13, 'create permissions', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(14, 'edit permissions', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(15, 'delete permissions', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(16, 'view locations', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(17, 'create locations', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(18, 'edit locations', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(19, 'delete locations', 'web', '2026-03-14 02:12:52', '2026-03-14 02:12:52'),
(20, 'view notices', 'web', '2026-03-14 04:34:59', '2026-03-14 04:34:59'),
(21, 'create notices', 'web', '2026-03-14 04:34:59', '2026-03-14 04:34:59'),
(22, 'edit notices', 'web', '2026-03-14 04:34:59', '2026-03-14 04:34:59'),
(23, 'delete notices', 'web', '2026-03-14 04:34:59', '2026-03-14 04:34:59'),
(24, 'view item masters', 'web', '2026-03-26 01:13:49', '2026-03-26 01:13:49'),
(25, 'create item masters', 'web', '2026-03-26 01:17:28', '2026-03-26 01:17:28'),
(26, 'edit item masters', 'web', '2026-03-26 01:17:28', '2026-03-26 01:17:28'),
(27, 'delete item masters', 'web', '2026-03-26 01:17:28', '2026-03-26 01:17:28'),
(28, 'import item masters', 'web', '2026-03-26 01:42:39', '2026-03-26 01:42:39'),
(29, 'demo123', 'web', '2026-03-31 05:52:24', '2026-03-31 05:52:24'),
(30, 'ticket_raise', 'web', '2026-04-06 00:11:02', '2026-04-06 00:11:02'),
(31, 'raise tickets', 'web', '2026-04-06 01:07:21', '2026-04-06 01:07:21'),
(32, 'import_excel', 'web', '2026-04-10 05:54:33', '2026-04-10 05:54:33'),
(33, 'upload manual', 'web', '2026-04-11 04:38:58', '2026-04-11 04:38:58'),
(34, 'delete manual', 'web', '2026-04-11 04:39:09', '2026-04-11 04:39:09'),
(35, 'all_delete', 'web', '2026-04-24 10:35:05', '2026-04-24 10:49:14'),
(36, 'all_view', 'web', '2026-04-24 10:35:15', '2026-04-24 10:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2026-03-14 01:20:31', '2026-04-09 10:40:37'),
(3, 'Parallel Admin', 'web', '2026-03-14 01:29:12', '2026-03-14 01:29:12'),
(4, 'Location Users', 'web', '2026-04-09 09:53:02', '2026-04-09 09:53:02'),
(5, 'Super Admin', 'web', '2026-04-09 10:50:08', '2026-04-09 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(3, 3),
(4, 3),
(8, 3),
(12, 3),
(16, 3),
(20, 3),
(24, 3),
(3, 4),
(22, 4),
(24, 4),
(30, 4),
(31, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4TLXPh5NWr4o0gyGO38tHefIema67oGmQtXahNFE', 2, '103.198.99.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlYxMkxLNnFGd2dPZlNFRFI1ZE9qQk5sZUZIM3B4eG5jTWxmWUx5ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vY2FzYW5vdmFzaGVhdmVuLmNvbS9jb2FzdGd1YXJkL3B1YmxpYy9jb250YWN0LWRldGFpbHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1777121570),
('bKUc22SuodzvY1Dkcw5XyDv2sVEw0PkYusoctLsT', 4, '103.198.99.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOHo5cTBRSnUyT3lPbjJmWUJVWVF2VG5qeXRROGRhTUpPcFpRNEdtcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vY2FzYW5vdmFzaGVhdmVuLmNvbS9jb2FzdGd1YXJkL3B1YmxpYy9pdGVtLW1hc3RlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1777114531),
('W1cyRvwlwWbVRvjZIUu5mMU4kPrqHnc3c40xvyET', 4, '103.198.99.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmdxczVNTUtBTU1TcWZ6aVZFY0dseEt5YUZZZGROdzFLYWZ6eXhKdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vY2FzYW5vdmFzaGVhdmVuLmNvbS9jb2FzdGd1YXJkL3B1YmxpYy9jb250YWN0LWRldGFpbHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1777122085);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_master_id` bigint UNSIGNED NOT NULL,
  `raised_by` bigint UNSIGNED NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'damage',
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `equipment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operational',
  `equipment_status_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ref`, `item_master_id`, `raised_by`, `contact_person`, `contact_name`, `contact_email`, `contact_phone`, `title`, `issue_type`, `priority`, `description`, `image_path`, `assignee`, `status`, `equipment_status`, `equipment_status_reason`, `created_at`, `updated_at`) VALUES
(1, 'TKT-9270', 1, 4, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'low', 'wesasfd', NULL, 'Customs team', 'open', 'operational', NULL, '2026-04-06 01:25:01', '2026-04-06 01:25:01'),
(2, 'TKT-9036', 1, 4, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'low', 'werfasw', NULL, 'Warehouse team', 'open', 'operational', NULL, '2026-04-06 01:25:25', '2026-04-06 01:25:25'),
(3, 'TKT-9437', 72, 4, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'shortage', 'medium', 'demo123', NULL, 'Documentation team', 'closed', 'operational', NULL, '2026-04-06 01:40:36', '2026-04-06 02:19:02'),
(4, 'TKT-7616', 1, 4, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'asdasdfasfd', NULL, NULL, 'open', 'operational', NULL, '2026-04-06 01:41:32', '2026-04-06 01:41:32'),
(5, 'TKT-5283', 1, 1, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'ddemo12334344', NULL, NULL, 'open', 'operational', NULL, '2026-04-06 01:42:49', '2026-04-06 01:42:49'),
(6, 'TKT-7331', 1, 1, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'domljfaslhk', NULL, 'Documentation team', 'open', 'operational', NULL, '2026-04-06 01:50:09', '2026-04-06 01:50:09'),
(7, 'TKT-8948', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'customs', 'critical', 'sdfasdfasfasdfsadf', NULL, 'Documentation team', 'open', 'operational', NULL, '2026-04-06 02:00:10', '2026-04-06 02:00:10'),
(8, 'TKT-1628', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'low', 'sdfasfd', NULL, NULL, 'closed', 'operational', NULL, '2026-04-06 02:02:40', '2026-04-06 03:35:30'),
(9, 'TKT-3952', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'critical', 'dfasdfsdfsdf', NULL, 'Warehouse team', 'closed', 'operational', NULL, '2026-04-06 02:02:54', '2026-04-06 02:16:50'),
(10, 'TKT-5889', 73, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR2 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'critical', 'dsfgsdgfsdfg', NULL, NULL, 'open', 'operational', NULL, '2026-04-06 04:02:12', '2026-04-06 04:02:12'),
(11, 'TKT-8825', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'medium', 'erdtdfsgsdfg', 'tickets/oQb5IPii4s9bupRXSvL7mSwr8om0yF78wsJmzsQ2.jpg', 'Customs team', 'closed', 'operational', NULL, '2026-04-06 04:32:27', '2026-04-06 04:34:20'),
(12, 'TKT-2339', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'medium', 'demo123123', 'tickets/iDCFtOvEywWvml275ZKd9GmixOe5tc2K7J4A05xY.jpg', 'null', 'open', 'operational', NULL, '2026-04-06 04:35:38', '2026-04-06 04:35:38'),
(13, 'TKT-8311', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'medium', 'Hjjii', NULL, 'null', 'closed', 'operational', NULL, '2026-04-07 05:18:27', '2026-04-07 07:28:58'),
(14, 'TKT-7847', 1, 1, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'sdfsadfsdf', 'tickets/myzf0sCAF1nnQxhrrnijVDNFQyKAUu1Ji2eexMiG.png', 'Warehouse team', 'closed', 'operational', NULL, '2026-04-07 07:16:05', '2026-04-07 09:27:05'),
(15, 'TKT-8727', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'high', 'testing dumb', NULL, 'null', 'closed', 'operational', NULL, '2026-04-07 10:10:39', '2026-04-07 12:45:22'),
(16, 'TKT-9497', 72, 2, NULL, NULL, NULL, NULL, 'Issue with DI-NSB-BR1 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'high', 'test', NULL, 'null', 'closed', 'operational', NULL, '2026-04-08 06:42:18', '2026-04-08 12:54:46'),
(17, 'TKT-4790', 1, 7, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'asdfdasfsdafdasf', NULL, 'null', 'open', 'operational', NULL, '2026-04-10 05:53:54', '2026-04-10 05:53:54'),
(18, 'TKT-9950', 1, 1, NULL, NULL, NULL, NULL, 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'medium', 'gy', 'tickets/E50dQrpmhcX5CkcWqk8lVxDrlsBNKTiKhbweXddr.png', 'null', 'open', 'operational', NULL, '2026-04-11 07:30:05', '2026-04-11 07:30:05'),
(19, 'TKT-4004', 74, 1, NULL, 'Lamor', 'officer@indiancoastguard.gov.in', '8169223239', 'Issue with DI-NSB-BR3 – Heavy Duty Boom Neoprene HDB-N 1000 (200 Meters) with Boom Reel HSR 1712 with Canvas Cover', 'damage', 'medium', 'asdfdasf', 'tickets/21FCRptdeyHwCTYYUzKxPl6VVzrnWJrMEEQmfvEx.png', 'null', 'open', 'operational', NULL, '2026-04-13 11:24:18', '2026-04-13 11:24:18'),
(20, 'TKT-5835', 1, 1, NULL, 'sadf', 'super_admin@gmail.com', 'sdfsdf', 'Issue with PB-OB-BR1 – Heavy Duty Boom Neoprene HDB-N 1500 (200 Meters) with Boom Reel HSR 1717 with Canvas Cover', 'damage', 'critical', 'adsasd', NULL, NULL, 'open', 'operational', NULL, '2026-04-25 06:05:34', '2026-04-25 06:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `message`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'cxvbxcvb', NULL, '2026-04-06 01:41:09', '2026-04-06 01:41:09'),
(2, 2, 1, 'hellol;ldfkssdfkljlsdkfjlkskfjd', NULL, '2026-04-06 01:42:17', '2026-04-06 01:42:17'),
(3, 3, 1, 'NZ<CNx,nzxvxzv', NULL, '2026-04-06 01:48:58', '2026-04-06 01:48:58'),
(4, 3, 1, 'dsfasdf', NULL, '2026-04-06 01:49:03', '2026-04-06 01:49:03'),
(5, 6, 1, 'demo2q3124', NULL, '2026-04-06 01:50:47', '2026-04-06 01:50:47'),
(6, 6, 1, 'dzxgfdfg', NULL, '2026-04-06 01:51:11', '2026-04-06 01:51:11'),
(7, 7, 1, 'hello bhai', NULL, '2026-04-06 02:00:50', '2026-04-06 02:00:50'),
(8, 7, 2, 'dfsgsdfgsdfg', NULL, '2026-04-06 02:01:10', '2026-04-06 02:01:10'),
(9, 7, 1, 'dstrfgsdgsdfg', NULL, '2026-04-06 02:01:22', '2026-04-06 02:01:22'),
(10, 9, 1, 'dsaasdg', NULL, '2026-04-06 02:03:20', '2026-04-06 02:03:20'),
(11, 9, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-06 02:16:50', '2026-04-06 02:16:50'),
(12, 8, 1, 'dfgsdfg', NULL, '2026-04-06 02:17:24', '2026-04-06 02:17:24'),
(13, 3, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-06 02:19:02', '2026-04-06 02:19:02'),
(14, 8, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-06 03:35:30', '2026-04-06 03:35:30'),
(15, 11, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-06 04:34:20', '2026-04-06 04:34:20'),
(16, 12, 2, 'Jdjdjd', NULL, '2026-04-07 07:27:27', '2026-04-07 07:27:27'),
(17, 14, 1, 'hello', NULL, '2026-04-07 07:28:05', '2026-04-07 07:28:05'),
(18, 13, 1, 'helooo', NULL, '2026-04-07 07:28:29', '2026-04-07 07:28:29'),
(19, 13, 2, 'System: Ticket marked as closed by Ravish Kumar.', NULL, '2026-04-07 07:28:58', '2026-04-07 07:28:58'),
(20, 13, 1, 'hello', NULL, '2026-04-07 07:54:02', '2026-04-07 07:54:02'),
(21, 13, 1, 'dfsgdfgsdfg', NULL, '2026-04-07 07:56:16', '2026-04-07 07:56:16'),
(22, 13, 1, 'kllkhlkhklhklh', NULL, '2026-04-07 07:57:14', '2026-04-07 07:57:14'),
(23, 14, 1, 'gbhj3k4bn mnh', NULL, '2026-04-07 09:07:17', '2026-04-07 09:07:17'),
(24, 14, 1, 'hello', NULL, '2026-04-07 09:26:52', '2026-04-07 09:26:52'),
(25, 14, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-07 09:27:05', '2026-04-07 09:27:05'),
(26, 15, 1, 'hello', NULL, '2026-04-07 10:11:01', '2026-04-07 10:11:01'),
(27, 15, 2, 'yes', NULL, '2026-04-07 10:11:24', '2026-04-07 10:11:24'),
(28, 15, 1, 'ok', NULL, '2026-04-07 10:11:57', '2026-04-07 10:11:57'),
(29, 15, 2, 'thik hai', NULL, '2026-04-07 10:12:09', '2026-04-07 10:12:09'),
(30, 15, 1, 'sdfasdf', NULL, '2026-04-07 10:25:10', '2026-04-07 10:25:10'),
(31, 15, 1, 'hiii', NULL, '2026-04-07 12:19:14', '2026-04-07 12:19:14'),
(32, 15, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-07 12:45:22', '2026-04-07 12:45:22'),
(33, 15, 1, 'hello', NULL, '2026-04-08 05:39:49', '2026-04-08 05:39:49'),
(34, 16, 1, 'System: Ticket marked as closed by Lamor.', NULL, '2026-04-08 12:54:46', '2026-04-08 12:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  `notif_last_seen_at` timestamp NULL DEFAULT NULL,
  `notif_last_reply_seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `location_id`, `notif_last_seen_at`, `notif_last_reply_seen_at`) VALUES
(1, 'Lamor', 'super_admin', '2026-03-12 05:53:30', '$2y$12$B5fkug0GzV7wDhK.vHJG7e73SuNcd56J88EbwnjWb2chyV0iiRT6i', '8CZv25Ub7FDmWZgpJ6F0vvWGDOnX21FeXTtJwprjjgOfqv6ifUoirgyZ2zT1', '2026-03-12 05:53:30', '2026-04-15 05:05:43', 10, NULL, NULL),
(2, 'Ravish Kumar', 'paralled_admin', NULL, '$2y$12$fYWbHj7ZWeIs.xSI.XWV.udzStz6rCOstPW1rMA/NwCgkjJKvrw4W', NULL, '2026-03-14 01:43:20', '2026-04-15 04:58:33', 7, NULL, NULL),
(3, 'demo', 'officer123@indiancoastguard.gov.in', NULL, '$2y$12$q5HAGBCdsqwE4jbNu1xkqOlxFCBPDsSGIa1J/5tlVFgu4h6kOOMye', NULL, '2026-03-31 05:18:19', '2026-03-31 05:18:19', 3, NULL, NULL),
(4, 'Digilpur', 'digilpur', NULL, '$2y$12$fM/ufnJ5BsF7NcVOe8L0I.UHlszhiCNSSMPgLkoDy/Cwm46YPMVWS', NULL, '2026-04-09 09:57:16', '2026-04-15 04:59:04', 7, NULL, NULL),
(5, 'Port Blair', 'portblair@gmail.com', NULL, '$2y$12$KXUPc/Y0q5uOfK4A87tOGeKKm05lwvI2atkv3qs41NXKxJlryjEMy', NULL, '2026-04-09 09:59:07', '2026-04-09 09:59:07', 11, NULL, NULL),
(6, 'Lamor', 'officer123indiancoastguard11@gmail.com', NULL, '$2y$12$BkYEmJZ1h4WWVAjbXYvTXeSAU4ZLIcRX5ZnU6OejtfbIddNDabZ8O', NULL, '2026-04-09 11:21:00', '2026-04-09 11:42:01', 10, NULL, NULL),
(7, 'normal_suer', 'demo', NULL, '$2y$12$ZDld17rjS4GNnioSbedAQupf6TQR368kX/exd6zzqB0PzjLrZtE/W', NULL, '2026-04-09 11:51:35', '2026-04-09 11:51:35', 3, NULL, NULL),
(8, 'test', 'LICG123', NULL, '$2y$12$ANFKnUVbmeRqB4/7/ec33eMVoODcOaYA1fvIEHZgcMQ5QztSE8o12', NULL, '2026-04-11 07:27:06', '2026-04-11 07:27:06', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_manuals`
--

CREATE TABLE `user_manuals` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_manuals`
--

INSERT INTO `user_manuals` (`id`, `title`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'war lockdown', 'user_manuals/BsbPITD2YsfbpNKN7ZRfTHCKh7Fx1MWBH54znVxX.pdf', '2026-04-08 12:22:29', '2026-04-08 12:22:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_masters_code_unique` (`code`),
  ADD KEY `item_masters_location_id_foreign` (`location_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ref_unique` (`ref`),
  ADD KEY `tickets_item_master_id_foreign` (`item_master_id`),
  ADD KEY `tickets_raised_by_foreign` (`raised_by`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_location_id_foreign` (`location_id`);

--
-- Indexes for table `user_manuals`
--
ALTER TABLE `user_manuals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_manuals`
--
ALTER TABLE `user_manuals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_masters`
--
ALTER TABLE `item_masters`
  ADD CONSTRAINT `item_masters_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_item_master_id_foreign` FOREIGN KEY (`item_master_id`) REFERENCES `item_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_raised_by_foreign` FOREIGN KEY (`raised_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
