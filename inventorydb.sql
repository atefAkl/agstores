-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2023 at 04:53 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(150) NOT NULL,
  `e_name` varchar(150) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `parent_cat` bigint(20) UNSIGNED NOT NULL,
  `brief` varchar(1024) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `short_name` char(32) NOT NULL,
  `serial` char(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `parent_cat` (`parent_cat`),
  KEY `measuring_unit` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_categories`
--

DROP TABLE IF EXISTS `accounts_categories`;
CREATE TABLE IF NOT EXISTS `accounts_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(150) NOT NULL,
  `e_name` varchar(150) NOT NULL,
  `brief` varchar(1024) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_categories`
--

INSERT INTO `accounts_categories` (`id`, `a_name`, `e_name`, `brief`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'الصناديق', 'Treasuries', 'A main of saving cash money or tools', 1, 1, 1, '2023-06-02 20:32:46', '2023-06-02 20:34:04'),
(3, 'بنوك', 'Banks', 'All accounts in Outside or internal banks and owned by the company', 1, 1, NULL, '2023-06-02 20:33:44', '2023-06-02 20:33:44'),
(4, 'شيكات', 'Ckeques', 'Financial Docs hold by the account receivables', 1, 1, NULL, '2023-06-02 20:39:13', '2023-06-02 20:39:13'),
(5, 'عام', 'General', 'General Account Category', 1, 1, NULL, '2023-06-02 20:40:11', '2023-06-02 20:40:11'),
(6, 'مصاريف', 'Expenses', 'All purchases for none sale use', 1, 1, NULL, '2023-06-02 20:41:00', '2023-06-02 20:41:00'),
(7, 'ايرادات', 'Revenues', 'the money generated from normal business operations, calculated as the average sales price times the number of units sold', 1, 1, NULL, '2023-06-02 20:43:11', '2023-06-02 20:43:11'),
(8, 'ذمم', 'Financial receivables', 'Financial receivables', 1, 1, NULL, '2023-06-02 20:52:21', '2023-06-02 20:52:21'),
(12, 'موجودات ثابتة', 'Fixed assets', 'assets which are purchased for long-term use and are not likely to be converted quickly into cash, such as land, buildings, and equipment.', 1, 1, NULL, '2023-06-16 14:19:54', '2023-06-16 14:19:54'),
(13, 'مطلوبات', 'Liabilities', 'debt or obligation that a company owes to another entity. Liabilities are classified as current liabilities if they are due within one year, and long-term liabilities if they are due after one year', 1, 1, NULL, '2023-06-16 15:52:16', '2023-06-16 15:52:16'),
(14, 'ضرائب', 'Taxes', 'A tax is a mandatory financial charge or some other type of levy imposed on a taxpayer by a government to fund various public expenditures.', 1, 1, NULL, '2023-06-16 15:54:03', '2023-06-16 15:54:03'),
(15, 'مستودعات', 'Stores', 'مستودعات', 1, 1, NULL, '2023-06-16 15:54:51', '2023-06-16 15:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_info`
--

DROP TABLE IF EXISTS `accounts_info`;
CREATE TABLE IF NOT EXISTS `accounts_info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `cr` char(16) DEFAULT NULL,
  `vat` char(16) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` char(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `website` char(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` char(16) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `accounts_info_ibfk_2` (`updated_by`),
  KEY `accounts_info_ibfk_4` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_info`
--

INSERT INTO `accounts_info` (`id`, `company`, `state`, `city`, `street`, `country`, `cr`, `vat`, `email`, `website`, `phone`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'مخازن أيمن الغماس للتخزين', 'القصيم', 'البصر', 'طريق الملك فهد', NULL, '1131305092', '3506565326500003', 'thalagat@gmail.com', 'www.thalagat.com', '00966509314449', '2023-08-13 12:37:47', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_types`
--

DROP TABLE IF EXISTS `accounts_types`;
CREATE TABLE IF NOT EXISTS `accounts_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(150) NOT NULL,
  `e_name` varchar(150) NOT NULL,
  `brief` varchar(1024) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_types`
--

INSERT INTO `accounts_types` (`id`, `a_name`, `e_name`, `brief`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'الاصول', 'Assets', 'All liquid and non-liquid assets', 1, 1, NULL, '2023-06-03 06:05:16', '2023-06-03 06:05:16'),
(3, 'الالتزامات', 'Liabilities', 'Liabilities', 1, 1, NULL, '2023-06-03 06:07:57', '2023-06-03 06:07:57'),
(4, 'حقوق الملكية', 'Owners Equity', '(Owners’ equity) أو حقوق المساهمين (Stockholders\' Equity)، وهو المال الذي يتم إرجاعه إلى مساهمي الشركة عند تصفية جميع الأصول وعند التأكد من أن جميع ديون الشركة قد تم سدادها،', 1, 1, 1, '2023-06-03 06:10:06', '2023-06-03 10:40:22'),
(5, 'المشتريات', 'Purchaces', 'Purchaces\r\nالمشتريات', 1, 1, NULL, '2023-06-03 06:10:55', '2023-06-03 06:10:55'),
(6, 'المصروفات', 'Expenses', 'Expenses\r\nالمصروفات', 1, 1, NULL, '2023-06-03 06:14:01', '2023-06-03 06:14:01'),
(7, 'الايرادات', 'Revenues', 'Revenues\r\nالايرادات', 1, 1, NULL, '2023-06-03 06:16:06', '2023-06-03 06:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(2) DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iqama` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `userName`, `email`, `password`, `company`, `role`, `phone`, `iqama`, `created_at`, `updated_at`, `company_name`) VALUES
(1, 'عاطف سعد الدين محمد ', 'admin', 'admin@gmail.com', '$2y$10$ytRz7P/Tw4w.vIGy625kTuCFQFkZmwslxfEVxPf4o4YsEHXp8VIwG', '1', NULL, NULL, NULL, '2022-09-23 12:24:42', '2022-09-23 12:26:03', 'مخازن أيمن الغماس للتخزين\r\n'),
(2, 'ايمن محمد الغماس', 'Ayman Alghamas', 'ayman@gmail.com', '$2y$10$ytRz7P/Tw4w.vIGy625kTuCFQFkZmwslxfEVxPf4o4YsEHXp8VIwG', '1', 2, '009665031131119', '10203050406', '2022-09-23 12:24:42', '2023-08-17 21:00:00', 'مخازن أيمن الغماس للتخزين\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `business_brands`
--

DROP TABLE IF EXISTS `business_brands`;
CREATE TABLE IF NOT EXISTS `business_brands` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `brief` char(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_brands`
--

INSERT INTO `business_brands` (`id`, `name`, `brief`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'AEICO', 'Brand Keda', 1, NULL, '2023-01-12 13:08:41', '2023-01-12 13:08:41'),
(2, 'AKLSOFT', 'Modifications', 1, NULL, '2023-01-13 06:19:21', '2023-01-13 06:19:21'),
(3, 'SYNDA', 'erurtiriurtiirut', 1, NULL, '2023-01-13 06:20:25', '2023-01-13 06:20:25'),
(4, 'gateval', 'nono frdk lo', 1, NULL, '2023-01-13 06:24:57', '2023-01-13 06:24:57'),
(10, 'Anderson Negele', 'Established in 1930, Anderson Negele A division of CNRG Energy India Pvt. Ltd. is the leading Manufacturer of Temperature Sensors, Level Sensors, Flow Sensors and much more. Immensely acclaimed in the industry owing to their preciseness.', 1, NULL, '2023-02-12 12:01:33', '2023-02-12 12:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL,
  `scope` char(100) DEFAULT NULL,
  `s_number` char(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `mobile` char(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `state` char(20) DEFAULT NULL,
  `city` char(20) DEFAULT '0',
  `street` char(100) DEFAULT NULL,
  `cr` char(14) DEFAULT NULL,
  `vat` varchar(16) DEFAULT NULL,
  `logo` char(72) DEFAULT NULL,
  `files` varchar(1023) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `person` char(100) NOT NULL,
  `iqama` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `scope`, `s_number`, `website`, `phone`, `mobile`, `email`, `state`, `city`, `street`, `cr`, `vat`, `logo`, `files`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`, `person`, `iqama`) VALUES
(3, 'شركة احمد المحيمد للتجارة', '1', '1000101', 'defs.com', '00966548676841', NULL, 'mohamedali@gmail.com', 'المدينة المنورة', 'البكور', 'شارع حسان بن ثابت', '1131004346', '3100055885580003', NULL, NULL, 1, 1, 1, '2023-08-13 16:37:13', '2023-08-29 10:32:34', 'محمد البكري شتيوى', '102456025253'),
(4, 'حمد ابو عمار التويجرى', '1', '1000102', 'abcd.com', '00966548676841', NULL, 'hamad@abcd.com', 'القصيم', 'بريدة', 'حى النور', '13310013134', '3100055856580003', NULL, NULL, 1, 1, NULL, '2023-08-28 17:42:05', '2023-08-28 17:42:05', 'معتصم التويجرى', '10458786522'),
(5, 'مزرعة أحمد المسلم', '5', '1000103', 'mslm-dates.com', '00966548145241', NULL, 'ahmedmosallam@gmail.com', 'عيون الجوار', 'تندرة', '25 شارع الظافر', '1131004346', '3100055568580003', NULL, NULL, 1, 1, 1, '2023-08-28 18:15:25', '2023-08-28 18:33:32', 'أحمد عبد الرحمن المسلم', '102423235253'),
(6, 'الشيخ أبو حمد الغماس', '1', '1000104', NULL, '05520202035', NULL, NULL, 'القصيم', 'البصر', 'حى النور', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-09-13 11:55:58', '2023-09-13 11:55:58', 'محمد عبد الكريم سلطان', '105254254254');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shortName` char(100) NOT NULL,
  `logo` char(100) NOT NULL,
  `longName` char(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `shortName`, `logo`, `longName`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'SYNDA', 'Logo_230116_032847.png', 'Synds Steel Pipes International Corporation', 1, NULL, '2023-01-16 15:47:28', '2023-01-16 15:47:28'),
(2, 'IndiaMART InterMESH Ltd', 'Logo_230212_125117.png', 'IndiaMART InterMESH Ltd', 1, NULL, '2023-02-12 12:17:51', '2023-02-12 12:17:51'),
(3, 'AEICO', 'Logo_230212_124440.png', 'AEICO', 1, NULL, '2023-02-12 12:40:44', '2023-02-12 12:40:44'),
(4, 'AEICO', 'Logo_230212_123253.png', 'Al Ghamas Factory Company for Advanced Electromechanical Industries', 1, NULL, '2023-02-12 12:53:32', '2023-02-12 12:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(20) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `start_period` int(2) UNSIGNED NOT NULL,
  `renew_period` int(2) UNSIGNED NOT NULL,
  `in_day_greg` date NOT NULL,
  `in_day_hij` char(20) NOT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `starts_in_greg` date NOT NULL,
  `starts_in_hij` char(20) NOT NULL,
  `ends_in_greg` date NOT NULL,
  `ends_in_hij` char(20) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `s_number` char(20) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `code`, `brief`, `start_period`, `renew_period`, `in_day_greg`, `in_day_hij`, `client`, `starts_in_greg`, `starts_in_hij`, `ends_in_greg`, `ends_in_hij`, `status`, `s_number`, `type`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '230829-003-1-1', NULL, 3, 1, '2023-08-29', '١٣‏/٢‏/١٤٤٥ هـ', 3, '2023-08-29', '١٣‏/٢‏/١٤٤٥ هـ', '2023-11-26', '١٢‏/٥‏/١٤٤٥ هـ', 0, '1000101', 1, 1, 1, 1, '2023-08-29 04:31:27', '2023-09-01 16:28:27'),
(2, '230829-003-1-2', NULL, 3, 1, '2023-08-29', '١٣‏/٢‏/١٤٤٥ هـ', 3, '2023-08-29', '١٣‏/٢‏/١٤٤٥ هـ', '2023-08-29', '١٣‏/٢‏/١٤٤٥ هـ', 0, '1000102', 1, 1, 1, NULL, '2023-08-29 04:32:15', '2023-08-29 04:32:15'),
(6, '230829-003-1-3', NULL, 3, 1, '2023-09-02', '١٧‏/٢‏/١٤٤٥ هـ', 5, '2023-09-02', '١٧‏/٢‏/١٤٤٥ هـ', '2023-11-30', '١٦‏/٥‏/١٤٤٥ هـ', 0, '1000103', 1, 1, 1, NULL, '2023-09-02 18:53:27', '2023-09-02 18:53:27'),
(7, '230903-003-3-1', NULL, 3, 1, '2023-09-03', '١٨‏/٢‏/١٤٤٥ هـ', 3, '2023-09-03', '١٨‏/٢‏/١٤٤٥ هـ', '2023-12-01', '١٧‏/٥‏/١٤٤٥ هـ', 1, '1000104', 1, 1, 1, NULL, '2023-09-03 20:22:23', '2023-09-03 20:22:23'),
(8, '230903-003-6-1', 'تخزين تمور من مزرعة العصودة', 3, 1, '2023-09-13', '٢٨‏/٢‏/١٤٤٥ هـ', 6, '2023-09-13', '٢٨‏/٢‏/١٤٤٥ هـ', '2023-12-11', '٢٧‏/٥‏/١٤٤٥ هـ', 1, '1000105', 1, 1, 1, 1, '2023-09-13 18:34:36', '2023-09-14 02:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `contract_items`
--

DROP TABLE IF EXISTS `contract_items`;
CREATE TABLE IF NOT EXISTS `contract_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(7,2) NOT NULL,
  `contract` bigint(20) UNSIGNED NOT NULL,
  `barcode` char(16) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `parent_cat` (`unit`),
  KEY `measuring_unit` (`contract`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract_items`
--

INSERT INTO `contract_items` (`id`, `item`, `qty`, `unit`, `unit_price`, `contract`, `barcode`, `status`, `company`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 1, 20, 8, '80.00', 7, NULL, 0, 1, '2023-09-04 11:14:32', 1, '2023-09-04 11:14:32', NULL),
(7, 2, 30, 8, '100.00', 7, NULL, 0, 1, '2023-09-04 20:38:59', 1, '2023-09-04 20:38:59', NULL),
(9, 1, 20, 8, '75.00', 8, NULL, 0, 1, '2023-09-13 19:00:45', 1, '2023-09-13 19:00:45', NULL),
(10, 2, 8, 8, '90.00', 8, NULL, 0, 1, '2023-09-13 19:01:25', 1, '2023-09-13 19:01:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_payment_schedule_entries`
--

DROP TABLE IF EXISTS `contract_payment_schedule_entries`;
CREATE TABLE IF NOT EXISTS `contract_payment_schedule_entries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ratio` int(3) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `amount` decimal(7,2) DEFAULT NULL,
  `contract` bigint(20) UNSIGNED NOT NULL,
  `ordering` tinyint(2) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract_payment_schedule_entries`
--

INSERT INTO `contract_payment_schedule_entries` (`id`, `ratio`, `brief`, `amount`, `contract`, `ordering`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 50, 'دفعة مقدمة مع توقيع العقد', '7935.00', 7, 1, 1, 1, NULL, '2023-09-06 12:27:16', '2023-09-06 12:27:16'),
(6, 25, 'تستحق عند اكتمال استهلاك 10% من الطبالى بالعقد', '3967.50', 7, 2, 1, 1, 1, '2023-09-06 18:57:02', '2023-09-06 19:34:27'),
(7, 25, 'تستحق عند اكتمال استهلاك 25% من الطبالى بالعقد', '3967.50', 7, 3, 1, 1, NULL, '2023-09-06 19:35:55', '2023-09-06 19:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `contract_receipts`
--

DROP TABLE IF EXISTS `contract_receipts`;
CREATE TABLE IF NOT EXISTS `contract_receipts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `contract` bigint(20) UNSIGNED NOT NULL,
  `driver` char(20) DEFAULT NULL,
  `client` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(2) NOT NULL,
  `serial` int(6) UNSIGNED ZEROFILL NOT NULL,
  `iqama` char(14) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `shift` tinyint(1) NOT NULL,
  `day_in_greg` char(14) NOT NULL,
  `day_in_hijri` char(14) NOT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract_receipts`
--

INSERT INTO `contract_receipts` (`id`, `contract`, `driver`, `client`, `status`, `serial`, `iqama`, `notes`, `shift`, `day_in_greg`, `day_in_hijri`, `type`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'أحمد العبيط', 3, 1, 000001, '102423235253', 'مزرعة العصودة', 1, '2023-9-1', '١٦‏/٢‏/١٤٤٥ هـ', 1, 1, 1, NULL, '2023-09-01 20:59:57', '2023-09-01 20:59:57'),
(2, 2, 'أحمد العبيط', 3, 1, 000002, '102423235253', 'مزرعة العصودة', 1, '2023-9-2', '١٧‏/٢‏/١٤٤٥ هـ', 1, 1, 1, NULL, '2023-09-01 21:02:53', '2023-09-01 21:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) DEFAULT NULL,
  `e_name` varchar(50) NOT NULL,
  `iso` varchar(10) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=454 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `a_name`, `e_name`, `iso`, `code`) VALUES
(214, 'أفغانستان', 'Afghanista', 'AF', '93'),
(215, 'ألبانيا', 'Albania', 'AL', '355'),
(216, 'الجزائر', 'Algeria', 'DZ', '213'),
(217, 'ساموا الأمريكية', 'American S', 'AS', '1-684'),
(218, 'أندورا', 'Andorra', 'AD', '376'),
(219, 'أنجولا', 'Angola', 'AO', '244'),
(220, 'أنغيلا', 'Anguilla', 'AI', '1-264'),
(221, 'القارة القطبية الجنوبية', 'Antarctica', 'AQ', '672'),
(222, 'انتيغوا وبربودا', 'Antigua an', 'AG', '1-268'),
(223, 'الأرجنتين', 'Argentina', 'AR', '54'),
(224, 'أرمينيا', 'Armenia', 'AM', '374'),
(225, 'أروبا', 'Aruba', 'AW', '297'),
(226, 'أستراليا', 'Australia', 'AU', '61'),
(227, 'النمسا', 'Austria', 'AT', '43'),
(228, 'أذربيجان', 'Azerbaijan', 'AZ', '994'),
(229, 'جزر البهاما', 'Bahamas', 'BS', '1-242'),
(230, 'البحرين', 'Bahrain', 'BH', '973'),
(231, 'بنغلاديش', 'Bangladesh', 'BD', '880'),
(232, 'بربادوس', 'Barbados', 'BB', '1-246'),
(233, 'روسيا البيضاء', 'Belarus', 'BY', '375'),
(234, 'بلجيكا', 'Belgium', 'BE', '32'),
(235, 'بليز', 'Belize', 'BZ', '501'),
(236, 'بنين', 'Benin', 'BJ', '229'),
(237, 'برمودا', 'Bermuda', 'BM', '1-441'),
(238, 'بوتان', 'Bhutan', 'BT', '975'),
(239, 'بوليفيا', 'Bolivia', 'BO', '591'),
(240, 'البوسنة والهرسك', 'Bosnia and', 'BA', '387'),
(241, 'بوتسوانا', 'Botswana', 'BW', '267'),
(242, 'البرازيل', 'Brazil', 'BR', '55'),
(243, 'إقليم المحيط الهندي البريطاني', 'British In', 'IO', '246'),
(244, 'جزر فيرجن البريطانية', 'British Vi', 'VG', '1-284'),
(245, 'بروناي دار السلام', 'Brunei', 'BN', '673'),
(246, 'بلغاريا', 'Bulgaria', 'BG', '359'),
(247, 'بوركينا فاسو', 'Burkina Fa', 'BF', '226'),
(248, 'بوروندي', 'Burundi', 'BI', '257'),
(249, 'كمبوديا', 'Cambodia', 'KH', '855'),
(250, 'الكاميرون', 'Cameroon', 'CM', '237'),
(251, 'كندا', 'Canada', 'CA', '1'),
(252, 'الرأس الأخضر', 'Cape Verde', 'CV', '238'),
(253, 'جزر كايمان', 'Cayman Isl', 'KY', '1-345'),
(254, 'جمهورية أفريقيا الوسطى', 'Central Af', 'CF', '236'),
(255, 'تشاد', 'Chad', 'TD', '235'),
(256, 'تشيلي', 'Chile', 'CL', '56'),
(257, 'الصين', 'China', 'CN', '86'),
(258, 'جزيرة كريسماس', 'Christmas ', 'CX', '61'),
(259, 'جزر كوكوس (كيلينغ)', 'Cocos Isla', 'CC', '61'),
(260, 'كولومبيا', 'Colombia', 'CO', '57'),
(261, 'جزر القمر', 'Comoros', 'KM', '269'),
(262, 'جزر كوك', 'Cook Islan', 'CK', '682'),
(263, 'كوستاريكا', 'Costa Rica', 'CR', '506'),
(264, 'كرواتيا', 'Croatia', 'HR', '385'),
(265, 'كوبا', 'Cuba', 'CU', '53'),
(266, 'كوراكاو', 'Curacao', 'CW', '599'),
(267, 'قبرص', 'Cyprus', 'CY', '357'),
(268, 'الجمهورية التشيكية', 'Czech Repu', 'CZ', '420'),
(269, 'جمهورية الكونغو الديمقراطية', 'Democratic', 'CD', '243'),
(270, 'الدنمرك', 'Denmark', 'DK', '45'),
(271, 'جيبوتي', 'Djibouti', 'DJ', '253'),
(272, 'دومينيكا', 'Dominica', 'DM', '1-767'),
(273, 'جمهورية الدومينيكان', 'Dominican ', 'DO', '1-809,'),
(274, 'تيمور الشرقية', 'East Timor', 'TL', '670'),
(275, 'الإكوادور', 'Ecuador', 'EC', '593'),
(276, 'مصر', 'Egypt', 'EG', '20'),
(277, 'السلفادور', 'El Salvado', 'SV', '503'),
(278, 'غينيا الاستوائية', 'Equatorial', 'GQ', '240'),
(279, 'إريتريا', 'Eritrea', 'ER', '291'),
(280, 'استونيا', 'Estonia', 'EE', '372'),
(281, 'أثيوبيا', 'Ethiopia', 'ET', '251'),
(282, 'جزر فوكلاند (مالفيناس)', 'Falkland I', 'FK', '500'),
(283, 'جزر فارو', 'Faroe Isla', 'FO', '298'),
(284, 'فيجي', 'Fiji', 'FJ', '679'),
(285, 'فنلندا', 'Finland', 'FI', '358'),
(286, 'فرنسا', 'France', 'FR', '33'),
(287, 'بولينيزيا الفرنسية', 'French Pol', 'PF', '689'),
(288, 'الجابون', 'Gabon', 'GA', '241'),
(289, 'جامبيا', 'Gambia', 'GM', '220'),
(290, 'جورجيا', 'Georgia', 'GE', '995'),
(291, 'ألمانيا', 'Germany', 'DE', '49'),
(292, 'غانا', 'Ghana', 'GH', '233'),
(293, 'جبل طارق', 'Gibraltar', 'GI', '350'),
(294, 'اليونان', 'Greece', 'GR', '30'),
(295, 'جرينلند', 'Greenland', 'GL', '299'),
(296, 'جرينادا', 'Grenada', 'GD', '1-473'),
(297, 'جوام', 'Guam', 'GU', '1-671'),
(298, 'جواتيمالا', 'Guatemala', 'GT', '502'),
(299, 'جيرنسي', 'Guernsey', 'GG', '44-148'),
(300, 'غينيا', 'Guinea', 'GN', '224'),
(301, 'غينيا بيساو', 'Guinea-Bis', 'GW', '245'),
(302, 'غيانا', 'Guyana', 'GY', '592'),
(303, 'هايتي', 'Haiti', 'HT', '509'),
(304, 'هندوراس', 'Honduras', 'HN', '504'),
(305, 'هونج كونج', 'Hong Kong', 'HK', '852'),
(306, 'المجر', 'Hungary', 'HU', '36'),
(307, 'أيسلندا', 'Iceland', 'IS', '354'),
(308, 'الهند', 'India', 'IN', '91'),
(309, 'إندونيسيا', 'Indonesia', 'ID', '62'),
(310, 'إيران', 'Iran', 'IR', '98'),
(311, 'العراق', 'Iraq', 'IQ', '964'),
(312, 'ايرلندا', 'Ireland', 'IE', '353'),
(313, 'جزيرة آيل أوف مان', 'Isle of Ma', 'IM', '44-162'),
(314, 'غير مخصص', 'Israel', 'IL', '972'),
(315, 'إيطاليا', 'Italy', 'IT', '39'),
(316, 'كوت ديفوار', 'Ivory Coas', 'CI', '225'),
(317, 'جامايكا', 'Jamaica', 'JM', '1-876'),
(318, 'اليابان', 'Japan', 'JP', '81'),
(319, 'جيرسي', 'Jersey', 'JE', '44-153'),
(320, 'الأردن', 'Jordan', 'JO', '962'),
(321, 'كازاخستان', 'Kazakhstan', 'KZ', '7'),
(322, 'كينيا', 'Kenya', 'KE', '254'),
(323, 'كيريباتي', 'Kiribati', 'KI', '686'),
(324, 'كوسوفو', 'Kosovo', 'XK', '383'),
(325, 'الكويت', 'Kuwait', 'KW', '965'),
(326, 'قيرغيزستان', 'Kyrgyzstan', 'KG', '996'),
(327, 'لاوس', 'Laos', 'LA', '856'),
(328, 'لاتفيا', 'Latvia', 'LV', '371'),
(329, 'لبنان', 'Lebanon', 'LB', '961'),
(330, 'ليسوتو', 'Lesotho', 'LS', '266'),
(331, 'ليبيريا', 'Liberia', 'LR', '231'),
(332, 'ليبيا', 'Libya', 'LY', '218'),
(333, 'ليختنشتاين', 'Liechtenst', 'LI', '423'),
(334, 'ليتوانيا', 'Lithuania', 'LT', '370'),
(335, 'لوكسمبورغ', 'Luxembourg', 'LU', '352'),
(336, 'ماكاو', 'Macao', 'MO', '853'),
(337, 'مقدونيا', 'Macedonia', 'MK', '389'),
(338, 'مدغشقر', 'Madagascar', 'MG', '261'),
(339, 'مالاوي', 'Malawi', 'MW', '265'),
(340, 'ماليزيا', 'Malaysia', 'MY', '60'),
(341, 'جزر المالديف', 'Maldives', 'MV', '960'),
(342, 'مالي', 'Mali', 'ML', '223'),
(343, 'مالطا', 'Malta', 'MT', '356'),
(344, 'جزر مارشال', 'Marshall I', 'MH', '692'),
(345, 'موريتانيا', 'Mauritania', 'MR', '222'),
(346, 'موريشيوس', 'Mauritius', 'MU', '230'),
(347, 'جزيرة مايوت', 'Mayotte', 'YT', '262'),
(348, 'المكسيك', 'Mexico', 'MX', '52'),
(349, 'ولايات ميكرونيزيا الموحدة', 'Micronesia', 'FM', '691'),
(350, 'مولدوفيا', 'Moldova', 'MD', '373'),
(351, 'موناكو', 'Monaco', 'MC', '377'),
(352, 'منغوليا', 'Mongolia', 'MN', '976'),
(353, 'الجبل الأسود', 'Montenegro', 'ME', '382'),
(354, 'مونتسيرات', 'Montserrat', 'MS', '1-664'),
(355, 'مغربي', 'Morocco', 'MA', '212'),
(356, 'موزمبيق', 'Mozambique', 'MZ', '258'),
(357, 'بورما', 'Myanmar', 'MM', '95'),
(358, 'ناميبيا', 'Namibia', 'NA', '264'),
(359, 'ناورو', 'Nauru', 'NR', '674'),
(360, 'نيبال', 'Nepal', 'NP', '977'),
(361, 'هولندا', 'Netherland', 'NL', '31'),
(362, 'جزر الانتيل الهولندية', 'Netherland', 'AN', '599'),
(363, 'كاليدونيا الجديدة', 'New Caledo', 'NC', '687'),
(364, 'نيوزيلندا', 'New Zealan', 'NZ', '64'),
(365, 'نيكاراغوا', 'Nicaragua', 'NI', '505'),
(366, 'النيجر', 'Niger', 'NE', '227'),
(367, 'نيجيريا', 'Nigeria', 'NG', '234'),
(368, 'نيوي', 'Niue', 'NU', '683'),
(369, 'كوريا الشمالية', 'North Kore', 'KP', '850'),
(370, 'جزر ماريانا الشمالية', 'Northern M', 'MP', '1-670'),
(371, 'النرويج', 'Norway', 'NO', '47'),
(372, 'سلطنة عمان', 'Oman', 'OM', '968'),
(373, 'باكستان', 'Pakistan', 'PK', '92'),
(374, 'بالاو', 'Palau', 'PW', '680'),
(375, 'فلسطين', 'Palestine', 'PS', '970'),
(376, 'بنما', 'Panama', 'PA', '507'),
(377, 'بابوا غينيا الجديدة', 'Papua New ', 'PG', '675'),
(378, 'باراغواي', 'Paraguay', 'PY', '595'),
(379, 'بيرو', 'Peru', 'PE', '51'),
(380, 'الفلبين', 'Philippine', 'PH', '63'),
(381, 'جزر بيتكيرن', 'Pitcairn', 'PN', '64'),
(382, 'بولندا', 'Poland', 'PL', '48'),
(383, 'البرتغال', 'Portugal', 'PT', '351'),
(384, 'بويرتو ريكو', 'Puerto Ric', 'PR', '1-787,'),
(385, 'قطر', 'Qatar', 'QA', '974'),
(386, 'جمهورية الكونغو', 'Republic o', 'CG', '242'),
(387, 'رينيون', 'Reunion', 'RE', '262'),
(388, 'رومانيا', 'Romania', 'RO', '40'),
(389, 'الاتحاد الروسي', 'Russia', 'RU', '7'),
(390, 'رواندا', 'Rwanda', 'RW', '250'),
(391, 'سانت بارتيليمي', 'Saint Bart', 'BL', '590'),
(392, 'سانت هيلانة', 'Saint Hele', 'SH', '290'),
(393, 'سانت كيتس ونيفيس', 'Saint Kitt', 'KN', '1-869'),
(394, 'سانت لوسيا', 'Saint Luci', 'LC', '1-758'),
(395, 'سانت مارتن', 'Saint Mart', 'MF', '590'),
(396, 'سان بيار وميكلون', 'Saint Pier', 'PM', '508'),
(397, 'سانت فنسنت وغرينادين', 'Saint Vinc', 'VC', '1-784'),
(398, 'ساموا', 'Samoa', 'WS', '685'),
(399, 'سان مارينو', 'San Marino', 'SM', '378'),
(400, 'سانت تومي وبرينسبل', 'Sao Tome a', 'ST', '239'),
(401, 'المملكة العربية السعودية', 'Saudi Arab', 'SA', '966'),
(402, 'السنغال', 'Senegal', 'SN', '221'),
(403, 'صربيا', 'Serbia', 'RS', '381'),
(404, 'سيشيل', 'Seychelles', 'SC', '248'),
(405, 'سيراليون', 'Sierra Leo', 'SL', '232'),
(406, 'سنغافورة', 'Singapore', 'SG', '65'),
(407, 'سينت مارتن', 'Sint Maart', 'SX', '1-721'),
(408, 'سلوفاكيا', 'Slovakia', 'SK', '421'),
(409, 'سلوفينيا', 'Slovenia', 'SI', '386'),
(410, 'جزر سليمان', 'Solomon Is', 'SB', '677'),
(411, 'الصومال', 'Somalia', 'SO', '252'),
(412, 'جنوب أفريقيا', 'South Afri', 'ZA', '27'),
(413, 'كوريا الجنوبية', 'South Kore', 'KR', '82'),
(414, 'جنوب السودان', 'South Suda', 'SS', '211'),
(415, 'إسبانيا', 'Spain', 'ES', '34'),
(416, 'سريلانكا', 'Sri Lanka', 'LK', '94'),
(417, 'السودان', 'Sudan', 'SD', '249'),
(418, 'سورينام', 'Suriname', 'SR', '597'),
(419, 'سفالبارد', 'Svalbard a', 'SJ', '47'),
(420, 'سوازيلاند', 'Swaziland', 'SZ', '268'),
(421, 'السويد', 'Sweden', 'SE', '46'),
(422, 'سويسرا', 'Switzerlan', 'CH', '41'),
(423, 'سوريا', 'Syria', 'SY', '963'),
(424, 'تايوان', 'Taiwan', 'TW', '886'),
(425, 'طاجيكستان', 'Tajikistan', 'TJ', '992'),
(426, 'تنزانيا', 'Tanzania', 'TZ', '255'),
(427, 'تايلاند', 'Thailand', 'TH', '66'),
(428, 'توجو', 'Togo', 'TG', '228'),
(429, 'توكيلاو', 'Tokelau', 'TK', '690'),
(430, 'تونجا', 'Tonga', 'TO', '676'),
(431, 'ترينيداد وتوباجو', 'Trinidad a', 'TT', '1-868'),
(432, 'تونس', 'Tunisia', 'TN', '216'),
(433, 'تركيا', 'Turkey', 'TR', '90'),
(434, 'تركمانستان', 'Turkmenist', 'TM', '993'),
(435, 'جزر تركس وكايكوس', 'Turks and ', 'TC', '1-649'),
(436, 'توفالو', 'Tuvalu', 'TV', '688'),
(437, 'جزر فيرجن', 'U.S. Virgi', 'VI', '1-340'),
(438, 'أوغندا', 'Uganda', 'UG', '256'),
(439, 'أوكرانيا', 'Ukraine', 'UA', '380'),
(440, 'الإمارات العربية المتحدة', 'United Ara', 'AE', '971'),
(441, 'المملكة المتحدة', 'United Kin', 'GB', '44'),
(442, 'الولايات المتحدة', 'United Sta', 'US', '1'),
(443, 'أوروجواي', 'Uruguay', 'UY', '598'),
(444, 'أوزبكستان', 'Uzbekistan', 'UZ', '998'),
(445, 'فانواتو', 'Vanuatu', 'VU', '678'),
(446, 'الكرسي الرسولي (الفاتيكان)', 'Vatican', 'VA', '379'),
(447, 'فنزويلا', 'Venezuela', 'VE', '58'),
(448, 'فيتنام', 'Vietnam', 'VN', '84'),
(449, 'واليس وفوتونا', 'Wallis and', 'WF', '681'),
(450, 'الصحراء الغربية', 'Western Sa', 'EH', '212'),
(451, 'اليمن', 'Yemen', 'YE', '967'),
(452, 'زامبيا', 'Zambia', 'ZM', '260'),
(453, 'زيمبابوي', 'Zimbabwe', 'ZW', '263');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_settings`
--

DROP TABLE IF EXISTS `dashboard_settings`;
CREATE TABLE IF NOT EXISTS `dashboard_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `general_alert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_settings`
--

INSERT INTO `dashboard_settings` (`id`, `name`, `icon`, `code`, `status`, `general_alert`, `address`, `phone`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'أيمن الغماس للتخزين', 'uploads/logo/dashboard_logo_1_20230522_163258.jpg', '1', 1, 'none', 'Elqassim Buraydah', '0554545454', 1, 1, '2022-09-29 14:11:47', '2023-05-22 13:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `client` bigint(20) UNSIGNED DEFAULT NULL,
  `type` bigint(20) NOT NULL,
  `number` varchar(14) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `Updated_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `discount` decimal(7,2) DEFAULT NULL,
  `VAT` decimal(5,2) DEFAULT NULL,
  `TAX` decimal(5,2) DEFAULT NULL,
  `claiming_at` datetime DEFAULT NULL,
  `account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `invoices_ibfk_1` (`created_by`),
  KEY `invoices_ibfk_2` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(150) NOT NULL,
  `e_name` varchar(150) NOT NULL,
  `parent_cat` bigint(20) UNSIGNED NOT NULL,
  `brief` varchar(1024) DEFAULT NULL,
  `unit` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode` char(16) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `parent_cat` (`parent_cat`),
  KEY `measuring_unit` (`unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `a_name`, `e_name`, `parent_cat`, `brief`, `unit`, `barcode`, `status`, `company`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'طبلية صغيرة', 'Small Table', 21, NULL, 8, NULL, 1, 1, '2023-08-28 12:26:22', 1, '2023-08-28 12:26:22', NULL),
(2, 'طبلية كبيرة', 'Mass Table', 21, NULL, 8, NULL, 1, 1, '2023-08-28 12:27:44', 1, '2023-08-28 12:27:44', NULL),
(3, 'غرفة كبيرة', 'Mass Room', 22, NULL, 8, NULL, 1, 1, '2023-08-28 12:29:35', 1, '2023-08-28 12:30:53', 1),
(4, 'غرفة صغيرة', 'Small Room', 22, NULL, 8, NULL, 1, 1, '2023-08-28 12:31:57', 1, '2023-08-28 12:31:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_cats`
--

DROP TABLE IF EXISTS `items_cats`;
CREATE TABLE IF NOT EXISTS `items_cats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(150) NOT NULL,
  `e_name` varchar(100) DEFAULT NULL,
  `brief` varchar(1024) DEFAULT NULL,
  `parent_cat` bigint(20) UNSIGNED DEFAULT NULL,
  `code` char(14) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `status` char(16) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `items_cats_ibfk_1` (`parent_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_cats`
--

INSERT INTO `items_cats` (`id`, `a_name`, `e_name`, `brief`, `parent_cat`, `code`, `level`, `status`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'جذر', 'root', 'Root Category', NULL, 'S', 0, '1', 1, 1, NULL, '2023-08-21 11:55:47', '2023-08-21 11:55:47'),
(12, 'الخدمات', 'Services', 'مجموعة الخدمات التى تقدمها الشركة للعملاء مقابل اشتراكات شهرية أو حسب العقود', 1, 'ROOT', 1, '1', 1, 1, 1, '2023-08-28 10:32:10', '2023-08-28 11:33:15'),
(15, 'التجميد', 'Freezing', 'استقبال وتجميد التمور والمواد الغذائية لفترات محددة', 12, 'S-FR', 2, '1', 1, 1, 1, '2023-08-28 11:12:54', '2023-08-28 11:13:04'),
(20, 'التبريد', 'Cooling', 'استقبال ومعالجة وتبريد المواد الغذائية لفترات قصيرة', 12, 'S-CO', 2, '1', 1, 1, 1, '2023-08-28 11:31:10', '2023-08-28 11:32:54'),
(21, 'تأجير طبالى', 'Rent Tables', 'طبليات حديد لرص الكراتين والصناديق سعة', 15, 'S-TR', 3, '1', 1, 1, 1, '2023-08-28 11:41:28', '2023-08-28 11:58:38'),
(22, 'تأجير غرف', 'Rooms Renting', 'تأجير غرفة بلوازم التخزين من طبليات وعمليات الادخال والاخراج', 15, 'S-RE-RR', 3, '1', 1, 1, NULL, '2023-08-28 12:03:43', '2023-08-28 12:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `measuring_units`
--

DROP TABLE IF EXISTS `measuring_units`;
CREATE TABLE IF NOT EXISTS `measuring_units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(120) NOT NULL,
  `e_name` varchar(120) DEFAULT '0',
  `is_master` tinyint(1) DEFAULT '0',
  `a_label` varchar(20) DEFAULT NULL,
  `e_label` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `cashier` tinyint(1) DEFAULT '1',
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`a_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `measuring_units`
--

INSERT INTO `measuring_units` (`id`, `a_name`, `e_name`, `is_master`, `a_label`, `e_label`, `created_at`, `updated_at`, `created_by`, `updated_by`, `company`, `cashier`, `status`) VALUES
(4, 'كيلوجرام', 'Kilogram', NULL, 'كجم', 'Kg', '2023-05-12 00:30:08', '2023-05-12 00:33:44', 1, 1, 1, 1, 0),
(5, 'متر', 'Meter', 1, 'م', 'Mtr', '2023-05-22 18:26:16', '2023-05-22 18:26:16', 1, NULL, 1, 1, 0),
(6, 'طبلية', 'Table', 1, 'طبلية', 'Table', '2023-08-22 17:04:50', '2023-08-22 17:04:50', 1, NULL, 1, 1, 0),
(7, 'حبة', 'Piece', 1, 'حبة', 'Piece', '2023-08-22 17:05:56', '2023-08-22 17:05:56', 1, NULL, 1, 1, 0),
(8, 'وحدة', 'unit', 1, 'وحدة', 'unit', '2023-08-22 17:06:18', '2023-08-22 17:06:18', 1, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_23_145349_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `money_pass_rules`
--

DROP TABLE IF EXISTS `money_pass_rules`;
CREATE TABLE IF NOT EXISTS `money_pass_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treasury_id` int(11) NOT NULL,
  `push_to` int(11) DEFAULT NULL,
  `pull_from` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `money_pass_rules`
--

INSERT INTO `money_pass_rules` (`id`, `treasury_id`, `push_to`, `pull_from`, `created_by`, `created_at`, `updated_at`, `updated_by`, `company`, `status`) VALUES
(1, 10, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(2, 11, 11, 11, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(3, 12, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(4, 13, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(5, 14, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(6, 15, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(7, 16, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(8, 17, 11, NULL, 1, '2022-10-16 11:09:49', NULL, NULL, 1, 0),
(9, 19, 11, NULL, 1, '2022-10-22 09:00:45', NULL, NULL, 1, 0),
(10, 18, 14, NULL, 1, '2022-10-22 06:48:35', '2022-10-22 06:48:35', NULL, 1, 0),
(16, 14, 18, NULL, 1, '2022-10-22 11:24:16', '2022-10-22 11:24:16', NULL, 1, 0),
(17, 18, 11, NULL, 1, '2022-10-22 11:25:20', '2022-10-22 11:25:20', NULL, 1, 0),
(18, 10, 18, NULL, 1, '2022-10-22 11:31:04', '2022-10-22 11:31:04', NULL, 1, 0),
(19, 18, NULL, 10, 1, '2022-10-22 11:31:04', '2022-10-22 11:31:04', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '1',
  `greg_date` date NOT NULL,
  `hij_date` char(20) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `farm` char(50) DEFAULT NULL,
  `driver` char(50) DEFAULT NULL,
  `notes` char(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `s_number` char(10) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_number` (`s_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `type`, `greg_date`, `hij_date`, `client_id`, `contract_id`, `farm`, `driver`, `notes`, `status`, `s_number`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2023-09-08', '١٠‏/٣‏/١٤٤٥ هـ', 6, 8, 'الحارثية', 'عبيدة', 'مشتريات اليوم الوطنى من بنغاليين', 1, '230000001', '2023-09-25 17:43:26', 2, '2023-09-25 17:43:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_entries`
--

DROP TABLE IF EXISTS `receipt_entries`;
CREATE TABLE IF NOT EXISTS `receipt_entries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `table_size` tinyint(1) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `box_size` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `receipt_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `date` char(20) DEFAULT NULL,
  `store_point_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `item_id` (`item_id`),
  KEY `box_size` (`box_size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(120) NOT NULL,
  `e_name` varchar(120) NOT NULL,
  `store` tinyint(1) NOT NULL,
  `size` tinyint(1) NOT NULL,
  `serial` varchar(15) DEFAULT NULL,
  `code` char(14) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`a_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `a_name`, `e_name`, `store`, `size`, `serial`, `code`, `company`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'الغرفة - A1', 'Room A1', 2, 1, '10001', 'A-1', 1, 0, '2023-08-25 17:59:32', 1, '2023-08-25 17:59:32', NULL),
(2, 'الغرفة - A2', 'Room A2', 2, 1, '10002', 'A-2', 1, 0, '2023-08-25 17:54:11', 1, '2023-08-25 17:54:11', NULL),
(3, 'الغرفة - A3', 'Room A3', 2, 1, '10003', 'A-3', 1, 0, '2023-08-25 18:25:53', 1, '2023-08-25 18:25:53', NULL),
(4, 'الغرفة - A4', 'Room A4', 2, 1, '10004', 'A-4', 1, 0, '2023-08-26 19:44:28', 1, '2023-08-26 19:44:28', NULL),
(5, 'الغرفة - A5', 'Room A5', 2, 3, '10005', 'A-5', 1, 0, '2023-08-26 19:56:48', 1, '2023-08-26 19:56:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_categories`
--

DROP TABLE IF EXISTS `sales_categories`;
CREATE TABLE IF NOT EXISTS `sales_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_categories`
--

INSERT INTO `sales_categories` (`id`, `name`, `parent`, `created_at`, `updated_at`, `created_by`, `updated_by`, `company`, `status`) VALUES
(1, 'Root', NULL, '2022-10-28 12:55:23', '2022-10-28 12:55:23', 1, 1, 1, 1),
(2, 'Poly Ethiline -2', 1, '2022-10-28 13:00:15', '2022-10-29 09:53:16', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `unit` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `company` bigint(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `brief`, `price`, `unit`, `status`, `company`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'تأجير طبلية صغيرة', 'تأجير طبلية صغيرة سعة 208 كرتونة صغيرة لمدة شهر والاحتفاظ بها داخل مخازن الشركة', '0.00', 0, 1, 1, 1, NULL, '2023-08-15 04:41:16', '2023-08-15 04:41:16'),
(5, 'تأجير طبلية كبيرة', 'تأجير طبلية صغيرة سعة 273 كرتونة صغيرة لمدة شهر والاحتفاظ بها داخل مخازن الشركة', '0.00', 0, 1, 1, 1, NULL, '2023-08-15 07:39:37', '2023-08-15 07:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slideImage` char(50) NOT NULL,
  `slideTitle` varchar(255) NOT NULL,
  `slideParagraph` varchar(1024) NOT NULL,
  `slideUrl` varchar(1024) DEFAULT NULL,
  `page` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slideImage`, `slideTitle`, `slideParagraph`, `slideUrl`, `page`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'carousel_slide_230105_115820.jpg', 'Image Number 1', 'TuxCare Extended Lifecycle Support. An SLA Guarantee for Critical CVEs. Talk to an Expert! System Administrators Keep Infrastructure Always-on. Benefit from the Expertise of a Team. 24/7 Expert Support. Linux Kernel Live Patches. No annual commitment. No Server Reboots.', 'contact.view', NULL, 1, NULL, '2023-01-05 11:20:58', '2023-01-05 11:20:58'),
(2, 'carousel_slide_230108_063700.jpg', 'Slide Number 2', 'JavaScript animations are done by programming gradual changes in an element\'s style. The changes are called by a timer. When the timer interval is small, the ...', 'contactrus', NULL, 1, NULL, '2023-01-08 06:00:37', '2023-01-08 06:00:37'),
(3, 'carousel_slide_230108_062301.bmp', 'Slide No 3', 'JavaScript animations are done by programming gradual changes in an element\'s style. The changes are called by a timer. When the timer interval is small, the ...', 'About', NULL, 1, NULL, '2023-01-08 06:01:23', '2023-01-08 06:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_name` varchar(120) NOT NULL,
  `e_name` varchar(120) NOT NULL,
  `brief` varchar(1024) NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `code` char(14) DEFAULT NULL,
  `admin` bigint(20) UNSIGNED DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`a_name`),
  KEY `repositories_ibfk_3` (`updated_by`),
  KEY `repositories_ibfk_1` (`admin`),
  KEY `repositories_ibfk_2` (`created_by`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `a_name`, `e_name`, `brief`, `parent`, `code`, `admin`, `company`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'جذر', 'Root', 'فرع القصيم', 1, '0', 1, 1, 1, '2023-04-20 21:01:58', 1, NULL, NULL),
(2, 'المستودع A', 'REPO-A', '', 1, 'Repo-00', 1, 1, 0, '2023-04-20 21:30:13', 1, '2023-04-20 21:30:13', NULL),
(3, 'المستودع B', 'REPO-B', '', 2, 'RAW-A-1', NULL, 1, 0, '2023-04-21 00:21:23', 1, '2023-04-21 00:21:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_boxes`
--

DROP TABLE IF EXISTS `store_boxes`;
CREATE TABLE IF NOT EXISTS `store_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `short` char(10) DEFAULT NULL,
  `pic` char(72) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_boxes`
--

INSERT INTO `store_boxes` (`id`, `name`, `short`, `pic`, `company`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'كرتون 1 كيلو', '1ك', 'none', 1, '2023-08-31 19:18:21', 1, '2023-08-31 19:18:21', NULL),
(2, 'كرتون 3 كيلو', '3 ك', 'none', 1, '2023-08-31 19:19:34', 1, '2023-08-31 19:19:34', NULL),
(3, 'كرتون موز', 'ك موز', 'none', 1, '2023-08-31 19:20:59', 1, '2023-08-31 19:20:59', NULL),
(4, 'كرتون 5 كيلو', '5 ك', 'none', 1, '2023-08-31 19:21:36', 1, '2023-08-31 19:21:36', NULL),
(5, 'كرتون 8 كيلو', '8 ك', 'none', 1, '2023-08-31 19:31:47', 1, '2023-08-31 19:31:47', NULL),
(6, 'كرتون 2ك', NULL, 'none', 1, '2023-09-10 21:12:30', 1, '2023-09-10 21:12:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `short` char(10) DEFAULT NULL,
  `pic` char(72) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `name`, `short`, `pic`, `company`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'صقعي', NULL, 'none', 1, '2023-08-31 18:53:17', 1, '2023-08-31 18:53:17', NULL),
(3, 'مفتل', NULL, 'none', 1, '2023-08-31 18:53:31', 1, '2023-08-31 18:53:31', NULL),
(4, 'مفتل رقم 1', NULL, 'none', 1, '2023-08-31 18:58:00', 1, '2023-08-31 18:58:00', NULL),
(5, 'مفتل رقم 2', NULL, 'none', 1, '2023-08-31 18:58:16', 1, '2023-08-31 18:58:16', NULL),
(6, 'مفتل ملكى', NULL, 'none', 1, '2023-08-31 18:58:39', 1, '2023-08-31 18:58:39', NULL),
(7, 'رطب', NULL, 'none', 1, '2023-08-31 18:58:47', 1, '2023-08-31 18:58:47', NULL),
(8, 'رطب رقم 1', NULL, 'none', 1, '2023-08-31 18:58:54', 1, '2023-08-31 18:58:54', NULL),
(9, 'رطب رقم 2', NULL, 'none', 1, '2023-08-31 18:59:01', 1, '2023-08-31 18:59:01', NULL),
(10, 'رطب رقم 3', NULL, 'none', 1, '2023-08-31 18:59:09', 1, '2023-08-31 18:59:09', NULL),
(11, 'جلاكسى', NULL, 'none', 1, '2023-08-31 18:59:16', 1, '2023-08-31 18:59:16', NULL),
(12, 'جلاكسى رقم 1', NULL, 'none', 1, '2023-08-31 18:59:27', 1, '2023-08-31 18:59:27', NULL),
(13, 'جلاكسى رقم 2', NULL, 'none', 1, '2023-08-31 18:59:35', 1, '2023-08-31 18:59:35', NULL),
(14, 'جلاكسى ملكى', NULL, 'none', 1, '2023-08-31 18:59:42', 1, '2023-08-31 18:59:42', NULL),
(15, 'نبتة على', NULL, 'none', 1, '2023-08-31 19:04:46', 1, '2023-08-31 19:04:46', NULL),
(16, 'عجوة المدينة', NULL, 'none', 1, '2023-08-31 19:04:53', 1, '2023-08-31 19:04:53', NULL),
(17, 'نواشف', NULL, 'none', 1, '2023-08-31 19:04:57', 1, '2023-08-31 19:04:57', NULL),
(18, 'مشكلات', NULL, 'none', 1, '2023-08-31 19:05:04', 1, '2023-08-31 19:05:04', NULL),
(20, 'مجدول', NULL, 'none', 1, '2023-08-31 19:05:45', 1, '2023-08-31 19:05:45', NULL),
(21, 'عسيلة', NULL, 'none', 1, '2023-08-31 19:06:59', 1, '2023-08-31 19:06:59', NULL),
(22, 'شيشى', NULL, 'none', 1, '2023-08-31 19:07:03', 1, '2023-08-31 19:07:03', NULL),
(23, 'رشودية', NULL, 'none', 1, '2023-08-31 19:07:31', 1, '2023-08-31 19:07:31', NULL),
(24, 'ونانة', NULL, 'none', 1, '2023-08-31 19:08:05', 1, '2023-08-31 19:08:05', NULL),
(25, 'لبانة', NULL, 'none', 1, '2023-09-10 21:04:57', 1, '2023-09-10 21:04:57', NULL),
(26, 'برنى', NULL, 'none', 1, '2023-09-10 21:05:04', 1, '2023-09-10 21:05:04', NULL),
(27, 'مفتل رقم 3', NULL, 'none', 1, '2023-09-10 21:10:06', 1, '2023-09-10 21:10:06', NULL),
(28, 'رطب فاخر', NULL, 'none', 1, '2023-09-10 21:10:34', 1, '2023-09-10 21:10:34', NULL),
(29, 'مشكلات', NULL, 'none', 1, '2023-09-10 21:11:19', 1, '2023-09-10 21:11:19', NULL),
(30, 'صقعى', NULL, 'none', 1, '2023-09-10 21:11:37', 1, '2023-09-10 21:11:37', NULL),
(31, 'ضميد 1ك', NULL, 'none', 1, '2023-09-10 21:11:56', 1, '2023-09-10 21:11:56', NULL),
(32, 'ضميد 2ك', NULL, 'none', 1, '2023-09-10 21:12:02', 1, '2023-09-10 21:12:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_points`
--

DROP TABLE IF EXISTS `store_points`;
CREATE TABLE IF NOT EXISTS `store_points` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `room` bigint(20) UNSIGNED NOT NULL,
  `store` bigint(20) UNSIGNED NOT NULL,
  `position` char(20) NOT NULL,
  `code` char(14) NOT NULL,
  `company` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `size` tinyint(1) NOT NULL,
  `capacity` int(3) NOT NULL,
  `serial` char(10) NOT NULL,
  `company` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_point_id` bigint(20) UNSIGNED DEFAULT NULL,
  `the_load` int(3) DEFAULT '0',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `contract_id` (`contract_id`),
  KEY `store_point_id` (`store_point_id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `size`, `capacity`, `serial`, `company`, `status`, `contract_id`, `store_point_id`, `the_load`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '1', 1, 221, '4500001', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:17:06', NULL, '2023-09-10 20:17:06'),
(2, '2', 1, 221, '4500002', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:11:35', NULL, '2023-08-31 20:11:35'),
(3, '3', 1, 221, '4500003', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:11:35', NULL, '2023-08-31 20:11:35'),
(4, '4', 1, 221, '4500004', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:11:35', NULL, '2023-08-31 20:11:35'),
(5, '5', 1, 221, '4500005', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:11:35', NULL, '2023-08-31 20:11:35'),
(6, '6', 1, 208, '4500006', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:11:18', NULL, '2023-08-31 20:11:18'),
(7, '7', 1, 221, '4500007', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:25:22', NULL, '2023-08-31 20:25:22'),
(8, '8', 1, 221, '4500008', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:25:49', NULL, '2023-08-31 20:25:49'),
(9, '9', 1, 221, '4500009', 1, 0, NULL, NULL, 0, 1, '2023-08-31 20:26:46', NULL, '2023-08-31 20:26:46'),
(10, '10', 1, 221, '4500010', 1, 1, 7, NULL, 0, 1, '2023-09-10 20:17:17', 2, '2023-09-23 06:20:34'),
(11, '11', 1, 221, '4500011', 1, 1, 8, NULL, 221, 1, '2023-09-10 20:17:24', 2, '2023-09-23 05:39:34'),
(12, '12', 1, 221, '4500012', 1, 1, 8, NULL, 186, 1, '2023-09-13 04:35:08', 2, '2023-09-23 18:29:20'),
(13, '13', 1, 221, '4500013', 1, 1, 7, NULL, 0, 1, '2023-09-10 20:17:46', 2, '2023-09-23 06:24:06'),
(14, '14', 1, 221, '4500014', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:17:56', NULL, '2023-09-10 20:17:56'),
(15, '15', 1, 221, '4500015', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:18:03', NULL, '2023-09-10 20:18:03'),
(16, '16', 1, 221, '4500016', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:18:10', NULL, '2023-09-10 20:18:10'),
(17, '17', 1, 221, '4500017', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:18:25', NULL, '2023-09-10 20:18:25'),
(18, '18', 1, 221, '4500018', 1, 0, NULL, NULL, 0, 1, '2023-09-10 19:15:51', NULL, '2023-09-10 19:15:51'),
(19, '19', 1, 221, '4500019', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:31:26', NULL, '2023-09-10 20:31:26'),
(20, '20', 1, 221, '4500020', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:31:18', NULL, '2023-09-10 20:31:18'),
(40, '21', 1, 221, '4500021', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:32:59', NULL, '2023-09-10 20:32:59'),
(41, '22', 1, 221, '4500022', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:33:05', NULL, '2023-09-10 20:33:05'),
(42, '23', 1, 221, '4500023', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:33:19', NULL, '2023-09-10 20:33:19'),
(43, '24', 1, 221, '4500024', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:33:23', NULL, '2023-09-10 20:33:23'),
(44, '25', 1, 221, '4500025', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:33:29', NULL, '2023-09-10 20:33:29'),
(45, '26', 1, 221, '4500026', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:24', NULL, '2023-09-10 20:36:24'),
(46, '27', 1, 221, '4500027', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:27', NULL, '2023-09-10 20:36:27'),
(47, '28', 1, 221, '4500028', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:29', NULL, '2023-09-10 20:36:29'),
(48, '29', 1, 221, '4500029', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:32', NULL, '2023-09-10 20:36:32'),
(49, '30', 1, 221, '4500030', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:37', NULL, '2023-09-10 20:36:37'),
(50, '31', 1, 221, '4500031', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:36:47', NULL, '2023-09-10 20:36:47'),
(51, '32', 1, 221, '4500032', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:37:18', NULL, '2023-09-10 20:37:18'),
(52, '33', 1, 221, '4500033', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:37:22', NULL, '2023-09-10 20:37:22'),
(53, '34', 1, 221, '4500034', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:37:24', NULL, '2023-09-10 20:37:24'),
(54, '35', 1, 221, '4500035', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:43:01', NULL, '2023-09-10 20:43:01'),
(55, '36', 1, 221, '4500036', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:37:30', NULL, '2023-09-10 20:37:30'),
(56, '37', 1, 221, '4500037', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:37:32', NULL, '2023-09-10 20:37:32'),
(57, '38', 1, 221, '4500038', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:08', NULL, '2023-09-10 20:48:08'),
(58, '39', 1, 221, '4500039', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:12', NULL, '2023-09-10 20:48:12'),
(59, '40', 1, 221, '4500040', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:14', NULL, '2023-09-10 20:48:14'),
(60, '41', 1, 221, '4500041', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:15', NULL, '2023-09-10 20:48:15'),
(61, '42', 1, 221, '4500042', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:17', NULL, '2023-09-10 20:48:17'),
(62, '43', 1, 221, '4500043', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:24', NULL, '2023-09-10 20:48:24'),
(63, '44', 1, 221, '4500044', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:26', NULL, '2023-09-10 20:48:26'),
(64, '45', 1, 221, '4500045', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:29', NULL, '2023-09-10 20:48:29'),
(65, '46', 1, 221, '4500046', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:31', NULL, '2023-09-10 20:48:31'),
(66, '47', 1, 221, '4500047', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:32', NULL, '2023-09-10 20:48:32'),
(67, '48', 1, 221, '4500048', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:34', NULL, '2023-09-10 20:48:34'),
(68, '49', 1, 221, '4500049', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:35', NULL, '2023-09-10 20:48:35'),
(69, '50', 1, 221, '4500050', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:41', NULL, '2023-09-10 20:48:41'),
(70, '53', 2, 286, '4500053', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:54', NULL, '2023-09-10 20:50:54'),
(71, '54', 1, 221, '4500054', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:47', NULL, '2023-09-10 20:48:47'),
(72, '55', 1, 221, '4500055', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:48', NULL, '2023-09-10 20:48:48'),
(73, '56', 1, 221, '4500056', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:49', NULL, '2023-09-10 20:48:49'),
(74, '57', 1, 221, '4500057', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:50', NULL, '2023-09-10 20:48:50'),
(75, '58', 1, 221, '4500058', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:51', NULL, '2023-09-10 20:48:51'),
(76, '59', 1, 221, '4500059', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:48:52', NULL, '2023-09-10 20:48:52'),
(77, '60', 1, 221, '4500060', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:01', NULL, '2023-09-10 20:50:01'),
(78, '61', 1, 221, '4500061', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:02', NULL, '2023-09-10 20:50:02'),
(79, '62', 1, 221, '4500062', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:04', NULL, '2023-09-10 20:50:04'),
(80, '63', 1, 221, '4500063', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:05', NULL, '2023-09-10 20:50:05'),
(81, '64', 1, 221, '4500064', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:07', NULL, '2023-09-10 20:50:07'),
(82, '65', 1, 221, '4500065', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:08', NULL, '2023-09-10 20:50:08'),
(83, '66', 1, 221, '4500066', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:09', NULL, '2023-09-10 20:50:09'),
(84, '67', 1, 221, '4500067', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:10', NULL, '2023-09-10 20:50:10'),
(85, '68', 1, 221, '4500068', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:12', NULL, '2023-09-10 20:50:12'),
(86, '69', 1, 221, '4500069', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:13', NULL, '2023-09-10 20:50:13'),
(87, '70', 1, 221, '4500070', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:50:15', NULL, '2023-09-10 20:50:15'),
(88, '51', 1, 221, '4500051', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:13', NULL, '2023-09-10 20:51:13'),
(89, '52', 1, 221, '4500052', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:15', NULL, '2023-09-10 20:51:15'),
(90, '71', 1, 221, '4500071', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:25', NULL, '2023-09-10 20:51:25'),
(91, '72', 1, 221, '4500072', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:27', NULL, '2023-09-10 20:51:27'),
(92, '73', 1, 221, '4500073', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:29', NULL, '2023-09-10 20:51:29'),
(93, '74', 1, 221, '4500074', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:30', NULL, '2023-09-10 20:51:30'),
(94, '75', 1, 221, '4500075', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:32', NULL, '2023-09-10 20:51:32'),
(95, '76', 1, 221, '4500076', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:33', NULL, '2023-09-10 20:51:33'),
(96, '77', 1, 221, '4500077', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:34', NULL, '2023-09-10 20:51:34'),
(97, '78', 1, 221, '4500078', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:35', NULL, '2023-09-10 20:51:35'),
(98, '79', 1, 221, '4500079', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:37', NULL, '2023-09-10 20:51:37'),
(99, '80', 1, 221, '4500080', 1, 0, NULL, NULL, 0, 1, '2023-09-10 20:51:38', NULL, '2023-09-10 20:51:38'),
(100, '6522', 2, 286, '450006522', 1, 0, NULL, NULL, 0, 1, '2023-09-12 04:23:25', NULL, '2023-09-12 04:23:25'),
(101, '342', 1, 221, '45000342', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:17:57', NULL, '2023-09-14 12:17:57'),
(102, '547', 1, 221, '45000547', 1, 0, NULL, NULL, 0, 1, '2023-09-15 07:47:01', NULL, '2023-09-15 07:47:01'),
(103, '1000', 1, 221, '450001000', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:11', NULL, '2023-09-14 12:18:11'),
(104, '968', 1, 221, '45000968', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:17', NULL, '2023-09-14 12:18:17'),
(105, '999', 1, 221, '45000999', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:23', NULL, '2023-09-14 12:18:23'),
(106, '123', 1, 221, '45000123', 1, 1, 8, NULL, 47, 1, '2023-09-15 05:08:30', 2, '2023-09-22 19:59:56'),
(107, '769', 1, 221, '45000769', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:43', NULL, '2023-09-14 12:18:43'),
(108, '1169', 1, 221, '450001169', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:53', NULL, '2023-09-14 12:18:53'),
(109, '530', 1, 221, '45000530', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:18:56', NULL, '2023-09-14 12:18:56'),
(110, '681', 1, 221, '45000681', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:19:09', NULL, '2023-09-14 12:19:09'),
(111, '450', 1, 221, '45000450', 1, 0, NULL, NULL, 0, 1, '2023-09-14 12:19:30', NULL, '2023-09-14 12:19:30'),
(112, '5222', 2, 286, '45005222', 1, 0, NULL, NULL, 0, 1, '2023-09-21 10:30:42', NULL, '2023-09-21 10:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `table_contents`
--

DROP TABLE IF EXISTS `table_contents`;
CREATE TABLE IF NOT EXISTS `table_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `store_item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(3) UNSIGNED NOT NULL,
  `box_size_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `table_id` (`table_id`),
  KEY `store_item_id` (`store_item_id`),
  KEY `box_size_id` (`box_size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treasuries`
--

DROP TABLE IF EXISTS `treasuries`;
CREATE TABLE IF NOT EXISTS `treasuries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `type` tinyint(1) DEFAULT '0',
  `parent` bigint(20) UNSIGNED NOT NULL,
  `last_money_out` decimal(10,2) DEFAULT '0.00',
  `last_money_in` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `company` bigint(20) NOT NULL,
  `cashier` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treasuries`
--

INSERT INTO `treasuries` (`id`, `name`, `type`, `parent`, `last_money_out`, `last_money_in`, `created_at`, `updated_at`, `created_by`, `updated_by`, `company`, `cashier`, `status`) VALUES
(10, 'El Qassim 2', 3, 11, '0.00', '0.00', '2022-10-08 19:48:25', '2022-10-22 11:31:04', 1, 1, 1, 1, 0),
(11, 'Mulidaa', 1, 0, '0.00', '0.00', '2022-10-08 20:02:27', '2022-10-14 04:33:59', 1, 1, 1, 1, 0),
(12, 'Riyadh Tr 1', 3, 11, '0.00', '0.00', '2022-10-14 05:16:37', '2022-10-14 05:16:37', 1, NULL, 1, 1, 0),
(13, 'Treasury No 138 - Qassim', 3, 12, '0.00', '0.00', '2022-10-14 05:55:22', '2022-10-16 05:44:37', 1, 1, 1, 1, 0),
(14, 'asdrft', 2, 12, '0.00', '0.00', '2022-10-15 19:24:20', '2022-10-22 11:24:16', 1, 1, 1, 1, 0),
(15, 'huytgk', 3, 12, '0.00', '0.00', '2022-10-15 19:25:12', '2022-10-16 05:36:51', 1, 1, 1, 1, 1),
(16, 'tyyrt', 3, 10, '0.00', '0.00', '2022-10-16 07:47:12', '2022-10-16 07:47:12', 1, NULL, 1, 1, 0),
(17, 'tyyrt2', 2, 10, '0.00', '0.00', '2022-10-16 07:52:07', '2022-10-28 04:38:55', 1, NULL, 1, 1, 1),
(18, 'Branche Treasury', 2, 12, '0.00', '0.00', '2022-10-22 04:59:21', '2022-10-28 04:38:54', 1, 1, 1, 1, 1),
(19, 'New Branche Treasury', 2, 12, '0.00', '0.00', '2022-10-22 04:59:21', '2022-10-28 04:38:51', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts_info`
--
ALTER TABLE `accounts_info`
  ADD CONSTRAINT `accounts_info_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_info_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_info_ibfk_3` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_info_ibfk_4` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`parent_cat`) REFERENCES `items_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_4` FOREIGN KEY (`unit`) REFERENCES `measuring_units` (`id`);

--
-- Constraints for table `items_cats`
--
ALTER TABLE `items_cats`
  ADD CONSTRAINT `items_cats_ibfk_1` FOREIGN KEY (`parent_cat`) REFERENCES `items_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_cats_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_cats_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt_entries`
--
ALTER TABLE `receipt_entries`
  ADD CONSTRAINT `receipt_entries_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `store_items` (`id`),
  ADD CONSTRAINT `receipt_entries_ibfk_2` FOREIGN KEY (`box_size`) REFERENCES `store_boxes` (`id`);

--
-- Constraints for table `sales_categories`
--
ALTER TABLE `sales_categories`
  ADD CONSTRAINT `sales_categories_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `sales_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stores_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stores_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stores_ibfk_4` FOREIGN KEY (`parent`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tables_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tables_ibfk_3` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`),
  ADD CONSTRAINT `tables_ibfk_4` FOREIGN KEY (`store_point_id`) REFERENCES `store_points` (`id`);

--
-- Constraints for table `table_contents`
--
ALTER TABLE `table_contents`
  ADD CONSTRAINT `table_contents_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_contents_ibfk_2` FOREIGN KEY (`store_item_id`) REFERENCES `store_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_contents_ibfk_3` FOREIGN KEY (`box_size_id`) REFERENCES `store_boxes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
