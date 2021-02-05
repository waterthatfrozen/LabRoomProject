-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2018 at 11:40 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admn_path` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางผู้ควบคุมหรือครูผู้สอนที่ใช้งานห้องปฏิบัติการ';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`, `admin_name`, `admin_email`, `admin_mobile`, `admn_path`) VALUES
('admin01', '1234', 'Payden', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `std_id` char(10) DEFAULT NULL,
  `eq_id` char(10) DEFAULT NULL,
  `b_amount` int(5) DEFAULT NULL,
  `b_code` char(10) DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `send_date` date DEFAULT NULL,
  `recive_date` date DEFAULT NULL,
  `b_status` int(1) DEFAULT '0',
  `check_dup` int(1) DEFAULT '0',
  `lb_id` char(10) DEFAULT NULL,
  `lb_id2` char(10) DEFAULT NULL,
  `send_date2` datetime DEFAULT NULL,
  `b_damage` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `std_id`, `eq_id`, `b_amount`, `b_code`, `b_date`, `send_date`, `recive_date`, `b_status`, `check_dup`, `lb_id`, `lb_id2`, `send_date2`, `b_damage`) VALUES
(1, '00001', '160', 1, 'Anptv3', '2018-02-16', '2018-02-21', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 05:25:00', 1),
(2, '00001', '26', 1, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(3, '00001', '61', 5, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(4, '00001', '40', 3, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(5, '00001', '41', 3, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(6, '00001', '171', 5, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(7, '00001', '135', 2, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(8, '00001', '172', 2, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(9, '00001', '5', 2, 'Vcdeh6', '2018-02-16', '2018-02-21', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 02:35:59', 0),
(10, '00001', '161', 1, 'Bbel69', '2018-02-16', '2018-02-28', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 08:13:52', 0),
(11, '00001', '63', 3, 'OQagh1', '2018-02-16', '2018-02-23', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-03-14 01:54:20', 0),
(12, '00001', '179', 1, 'Chjlw2', '2018-02-16', '2018-02-27', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 11:25:41', 1),
(13, '00001', '64', 3, 'Chjlw2', '2018-02-16', '2018-02-27', '2018-02-16', 1, 0, 'lb01', NULL, NULL, NULL),
(14, '00001', '163', 5, 'Chjlw2', '2018-02-16', '2018-02-27', '2018-02-16', 1, 0, 'lb01', NULL, NULL, NULL),
(15, '00001', '162', 1, 'RXils7', '2018-02-16', '2018-02-27', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 09:58:15', 1),
(16, '00001', '163', 4, 'OPYcel', '2018-02-16', '2018-02-27', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 09:57:49', 0),
(17, '00001', '178', 1, 'OPYcel', '2018-02-16', '2018-02-27', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-02-16 09:57:49', 0),
(18, '00001', '179', 1, 'HMVYZ7', '2018-02-16', '2018-02-22', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-02-16 11:26:50', 1),
(19, '00001', '64', 3, 'HMVYZ7', '2018-02-16', '2018-02-22', '2018-02-16', 1, 0, 'lb01', NULL, NULL, NULL),
(20, '00001', '163', 7, 'HMVYZ7', '2018-02-16', '2018-02-22', '2018-02-16', 1, 0, 'lb01', NULL, NULL, NULL),
(22, '00001', '179', 1, 'CGbeo7', '2018-02-16', '2018-02-23', '2018-02-16', 2, 1, 'lb01', 'lb01', '2018-03-14 01:54:16', 0),
(23, '00001', '64', 3, 'CGbeo7', '2018-02-16', '2018-02-23', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-03-14 01:54:16', 0),
(24, '00001', '163', 4, 'CGbeo7', '2018-02-16', '2018-02-23', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-03-14 01:54:16', 0),
(25, '00001', '26', 2, 'CGbeo7', '2018-02-16', '2018-02-23', '2018-02-16', 2, 0, 'lb01', 'lb01', '2018-03-14 01:54:16', 0),
(26, '00001', '27', 2, 'DUW248', '2018-03-13', '2018-03-14', '2018-03-13', 2, 1, 'lb01', 'lb01', '2018-03-14 01:54:04', 1),
(27, '00001', '163', 5, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(28, '00001', '163', 5, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(29, '00001', '165', 1, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(30, '00001', '166', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(31, '00001', '167', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(32, '00001', '168', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(33, '00001', '169', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(34, '00001', '170', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(35, '00001', '4', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(36, '00001', '15', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(37, '00001', '19', 2, 'CXjq49', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 01:53:53', 0),
(38, '00001', '162', 1, 'ciors2', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:08:42', 0),
(39, '00001', '161', 1, 'T02368', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:57:50', 0),
(40, '00001', '162', 1, 'AQloqy', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:57:50', 0),
(41, '00001', '161', 1, 'GHYwy2', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:57:49', 0),
(42, '00001', '179', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(43, '00001', '178', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(44, '00001', '166', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(45, '00001', '173', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(46, '00001', '176', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(47, '00001', '175', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(48, '00001', '48', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(49, '00001', '42', 3, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(50, '00001', '64', 4, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(51, '00001', '66', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(52, '00001', '163', 9, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(53, '00001', '180', 1, 'CLOWh5', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 02:57:48', 0),
(54, '00001', '162', 1, 'FHRht6', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 02:57:45', 0),
(55, '00001', '5', 2, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(56, '00001', '172', 2, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(57, '00001', '135', 2, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(58, '00001', '171', 5, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(59, '00001', '41', 3, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(60, '00001', '40', 3, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(61, '00001', '61', 5, 'AMUaps', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 03:04:06', 0),
(62, '00001', '55', 1, 'Bbept0', '2018-03-14', '2018-03-16', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:06', 0),
(63, '00001', '5', 2, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(64, '00001', '172', 2, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(65, '00001', '135', 2, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(66, '00001', '171', 5, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(67, '00001', '41', 3, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(68, '00001', '40', 3, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(69, '00001', '61', 5, 'FPTUpu', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:04', 0),
(70, '00001', '162', 1, 'KUas37', '2018-03-14', '2018-03-16', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:05', 0),
(71, '00001', '19', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(72, '00001', '15', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(73, '00001', '4', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(74, '00001', '170', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(75, '00001', '169', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(76, '00001', '168', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(77, '00001', '167', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(78, '00001', '166', 2, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(79, '00001', '165', 1, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(80, '00001', '163', 5, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(81, '00001', '163', 5, 'UZalr7', '2018-03-14', '2018-03-16', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(82, '00001', '19', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(83, '00001', '15', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(84, '00001', '4', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(85, '00001', '170', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(86, '00001', '169', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(87, '00001', '168', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(88, '00001', '167', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(89, '00001', '166', 2, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(90, '00001', '165', 1, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(91, '00001', '163', 5, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(92, '00001', '163', 5, 'CRch47', '2018-03-14', '2018-03-15', '2018-03-14', 2, 0, 'lb01', 'lb01', '2018-03-14 06:25:03', 0),
(93, '00001', '55', 1, 'abhnv1', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:02', 0),
(94, '00001', '26', 1, 'HJVWao', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:25:00', 0),
(95, '00001', '162', 1, 'HNORt7', '2018-03-14', '2018-03-15', '2018-03-14', 2, 1, 'lb01', 'lb01', '2018-03-14 06:24:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chemdetail`
--

CREATE TABLE `chemdetail` (
  `chm_id` int(11) NOT NULL,
  `chm_form` varchar(50) NOT NULL,
  `chm_name` varchar(100) NOT NULL,
  `chm_MW` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chemdetail`
--

INSERT INTO `chemdetail` (`chm_id`, `chm_form`, `chm_name`, `chm_MW`) VALUES
(1, 'CH3COOH', 'Acetic Acid', 60.05),
(2, 'C3H6O', 'Acetone', 58.08),
(3, 'NH3', 'Ammonia', 17.03),
(4, 'NH4SCN', 'Ammonium Thiocyanate', 76.12),
(5, 'NH4OH', 'Ammonia hydroxide', 35.04),
(6, 'C4H10O', 'Butanol', 74.12),
(7, 'C6H12', 'Cyclohexane', 84.16),
(8, 'C4H8O2', 'Ethyl Acetate', 88.11),
(9, 'C2H6O', 'Ethyl alcohol', 46.07),
(10, 'CH2O2', 'Formic acid', 46.03),
(11, 'C6H14', 'Hexane', 86.18),
(12, 'HCl', 'Hydrochloric acid', 36.46),
(13, 'H2O2', 'Hydrogen peroxide', 34.02);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `eq_id` int(11) NOT NULL,
  `eq_code` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_amount` int(11) DEFAULT NULL,
  `eq_total` int(5) DEFAULT NULL,
  `eq_counter` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_damage` int(11) DEFAULT '0',
  `eq_detail` text COLLATE utf8_unicode_ci,
  `eq_danger` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_type` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eq_path` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางอุปกรณ์การทดลองทั้งหมด';

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`eq_id`, `eq_code`, `eq_name`, `eq_amount`, `eq_total`, `eq_counter`, `eq_damage`, `eq_detail`, `eq_danger`, `eq_type`, `eq_path`) VALUES
(1, 'CHE001', 'Acetic acid 6M', 2, 2, 'ขวด', 0, 'Acetic acid 6M', 'Yes', 'che', 'img/chemsub.png'),
(2, 'CHE002', 'Acetic acid 12M', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(3, 'CHE003', 'Acetic acid cone 98%', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(4, 'CHE004', 'Acetone', 14, 8, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(5, 'CHE005', 'Ammonia 27% (NH3)', 4, -2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(6, 'CHE006', 'Ammonium Thiocyanate', 6, 6, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(7, 'CHE007', 'Acetocarmine', 2, 2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(8, 'CHE008', 'Ammonia hydroxid', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(9, 'CHE009', 'Benedic Sol.', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(10, 'CHE010', 'Bromothymol Blue', 10, 10, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(11, 'CHE011', 'Butanol', 6, 6, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(12, 'CHE012', 'Coconut Oil', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(13, 'CHE013', 'Cyclohexane', 2, 2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(14, 'CHE014', 'Ethyl Acetate', 7, 7, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(15, 'CHE015', 'Ethyl alcohol', 3, -3, 'แกลลอน', 0, '', 'No', 'che', 'img/chemsub.png'),
(16, 'CHE016', 'Formic acid', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(17, 'CHE017', 'Glycerol', 6, 6, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(18, 'CHE018', 'Hexane', 11, 11, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(19, 'CHE019', 'Hydrochloric acid 6M', 11, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(20, 'CHE020', 'Hydrochloric acid cone 12M', 12, 12, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(21, 'CHE021', 'Hydrogen peroxide 35%', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(22, 'CHE022', 'Iodine sol. 1%', 9, 9, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(23, 'CHE023', 'Iron(III)chloride', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(24, 'CHE024', 'Iron(III)chloride', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(25, 'CHE025', 'Lithium Chloride 1M', 2, 2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(26, 'CHM001', 'pH แบบพกพา', 6, 6, 'ตัว', 0, '', 'No', 'chm', 'img/chm.png'),
(27, 'CHM002', 'Wet and Dry thermometer', 3, 2, 'อัน', 1, '', 'No', 'chm', 'img/chm.png'),
(28, 'CHM003', 'Aluminium foil (AI)', 3, 3, 'ม้วน', 0, '', 'No', 'chm', 'img/chm.png'),
(29, 'CHM004', 'กรวยกรอง แก้ว', 9, 9, 'อัน', 0, '', 'No', 'chm', 'img/chm.png'),
(30, 'CHM005', 'กรวยกรอง พลาสติก', 9, 9, 'อัน', 0, '', 'No', 'chm', 'img/chm.png'),
(31, 'CHM006', 'กรวยแยก 125 ml.', 5, 5, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(32, 'CHM007', 'กระจกนาฬิกา', 12, 12, 'อัน', 0, '', 'No', 'chm', 'img/chm.png'),
(33, 'CHM008', 'กระดาษ Label', 5, 5, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(34, 'CHM009', 'กระดาษ pH (ยูนิเวอร์แซล)', 4, 4, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(35, 'CHM010', 'กระดาษแก้วเซลโลเฟน', 10, 10, 'แผ่น', 0, '', 'No', 'chm', 'img/chm.png'),
(39, 'CHM012', 'กระดาษทราย เบอร์ 0', 6, 6, 'แผ่น', 0, '', 'No', 'chm', 'img/chm.png'),
(38, 'CHM011', 'กระดาษโครมาโตกราฟฟี่', 4, 4, 'แผ่น', 0, '', 'No', 'chm', 'img/chm.png'),
(40, 'CHM013', 'กระดาษลิตมัส สีแดง', 5, 5, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(41, 'CHM014', 'กระดาษลิตมัส สีน้ำเงิน', 5, 5, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(42, 'CHM015', 'กระบอกตวง 10 ml.', 12, 12, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(43, 'CHM016', 'กระบอกตวง 100 ml.', 13, 13, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(44, 'CHM017', 'กระบอกตวง 25 ml.', 7, 7, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(45, 'CHM018', 'กระบะถ่าน รางเดียว', 7, 7, 'อัน', 0, '', 'No', 'chm', 'img/chm.png'),
(46, 'CHM019', 'กล่องปริศนา', 13, 13, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(47, 'CHM020', 'กล่องแสง', 9, 9, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(48, 'CHM021', 'โกร่งพร้อมที่บด', 12, 12, 'ชุด', 0, '', 'No', 'chm', 'img/chm.png'),
(49, 'CHM022', 'ขวดเก็บสารละลาย 1000 ml. แก้ว', 5, 5, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(50, 'CHM023', 'ขวดเก็บสารละลาย 250 ml. แก้ว', 8, 8, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(51, 'CHM024', 'ขวดเก็บสารละลาย 125 ml.แก้ว', 6, 6, 'ใบ', 0, '', 'No', 'chm', 'img/chm.png'),
(52, 'CHM025', 'ขวดน้ำกลั่น ใหญ่', 7, 7, 'ขวด', 0, '', 'No', 'chm', 'img/chm.png'),
(56, 'BIO002', 'กล้องส่องทางไกล', 5, 5, 'อัน', 0, '', 'No', 'bio', 'img/bio.png'),
(55, 'BIO001', 'กระจกสไลด์', 4, 4, 'อัน', 0, '', 'No', 'bio', 'img/bio.png'),
(57, 'BIO003', 'ขวดเพาะเลี้ยงเนื้อเยื้อ', 7, 7, 'ขวด', 0, '', 'No', 'bio', 'img/bio.png'),
(58, 'BIO004', 'ลูปเขี่ยเชื้อ', 5, 5, 'ชิ้น', 0, '', 'No', 'bio', 'img/bio.png'),
(59, 'BIO005', 'จานเพาะเชื้อ', 6, 6, 'ใบ', 0, '', 'No', 'bio', 'img/bio.png'),
(60, 'BIO006', 'ตู้อบลมร้อน', 1, 1, 'ตู้', 0, '', 'No', 'bio', 'img/bio.png'),
(61, 'BIO007', 'แท่งแก้ว', 12, 12, 'ชิ้น', 0, '', 'No', 'bio', 'img/bio.png'),
(62, 'BIO008', 'กล้องจุลทรรศน์', 18, 18, 'ตัว', 0, '', 'No', 'bio', 'img/bio.png'),
(63, 'BIO009', 'กล้องจุลทรรศน์สเตอริโอ', 12, 12, 'ตัว', 0, '', 'No', 'bio', 'img/bio.png'),
(64, 'BIO010', 'หลอดหยด', 16, 10, 'อัน', 0, '', 'No', 'bio', 'img/bio.png'),
(65, 'BIO011', 'ปิเปต', 6, 6, 'ตัว', 0, '', 'No', 'bio', 'img/bio.png'),
(66, 'BIO012', 'บีกเกอร์', 15, 15, 'ใบ', 0, '', 'No', 'bio', 'img/bio.png'),
(67, 'BIO013', 'ขวดรูปชมพู่', 13, 13, 'ใบ', 0, '', 'No', 'bio', 'img/bio.png'),
(69, 'BIO014', 'ปากคีบ', 5, 5, 'อัน', 0, '', 'No', 'bio', 'img/bio.png'),
(70, 'BIO015', 'บิวเรตต์', 6, 6, 'อัน', 0, '', 'No', 'bio', 'img/bio.png'),
(71, 'PHY001', 'สายไฟปากจรเข้', 17, 17, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(72, 'PHY002', 'กระบะถ่าน', 5, 5, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(73, 'PHY003', 'หม้อแปลงโวลท์ต่ำ', 6, 6, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(74, 'PHY004', 'ชุดไฟฟ้าสถิต', 10, 10, 'อัน', 0, '', 'No', 'phy', 'img/phy.png'),
(75, 'PHY005', 'แผงต่อวงจรไฟฟ้า', 8, 8, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(76, 'PHY006', 'ชุดทดลองสนามไฟฟ้า', 6, 6, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(77, 'PHY007', 'เครื่องควบคุมกระแสไฟฟ้า', 4, 4, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(78, 'PHY008', 'เครื่องกำเนิดไฟฟ้า 3 เฟส ITL', 5, 5, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(79, 'PHY009', 'ชุดทดสอบแรงเสียดทานพร้อมรางไม้และอุปกรณ์', 8, 8, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(80, 'PHY010', 'ชุดทดลองแรงตึงผิว', 7, 7, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(81, 'PHY011', 'เครื่องกลฟิสิกส์', 3, 3, 'อัน', 0, '', 'No', 'phy', 'img/phy.png'),
(82, 'PHY012', 'ถาดคลื่น', 4, 4, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(83, 'PHY013', 'สปริงสาธิตคลื่น', 3, 3, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(84, 'PHY014', 'ชุดนำความร้อน', 4, 4, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(85, 'PHY015', 'ชุดการทดลองแสง', 4, 4, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(86, 'PHY016', 'ชุดทดสอบโพลาไรเซชั่นของแสง', 5, 5, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(87, 'PHY017', 'แท่งเหล็กมวล 500 กรัม', 9, 9, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(88, 'PHY018', 'สนามแม่เหล็กจากขดลวดไฟฟ้า', 4, 4, 'ชิ้น', 0, '', 'No', 'phy', 'img/phy.png'),
(89, 'PHY019', 'เครื่องเคาะสัญญาณเวลา', 3, 3, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(90, 'CHE026', 'Methyl salicylate (น้ำมันระกา)', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(91, 'CHE027', 'Methyl Alcohol 70%', 6, 6, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(92, 'CHE028', 'Methyl Orange 0.1%', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(93, 'CHE029', 'Methyl spirit (แอลกอฮอล์จุดไฟ) 3.8 L', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(94, 'CHE030', 'Methlene Blue 0.1%', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(95, 'CHE031', 'Methyl red', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(96, 'CHE032', 'Nitric acid 12M', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(97, 'CHE033', 'Nitric acid 7M', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(98, 'CHE034', '์Nitric acid conc.', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(99, 'CHE035', 'N - Pentanol', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(100, 'CHE036', 'N - Butanol', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(101, 'CHE037', 'Oleic acid', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(102, 'CHE038', 'Paraffin Liquid Medicinal', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(103, 'CHE039', 'Pentanal', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(104, 'CHE040', 'Phenolpthalin 0.1%', 15, 15, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(105, 'CHE041', 'Safranin', 8, 8, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(106, 'CHE042', 'Sodium metal', 8, 8, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(107, 'CHE043', 'Sulfuric acid 18M', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(108, 'CHE044', 'Sulfuric acid 6M', 9, 9, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(109, 'CHE045', 'Toluene', 7, 7, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(110, 'CHE046', 'Universal indicator', 13, 13, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(111, 'CHE047', 'น้ำมันยูคาลิปตัส', 5, 5, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(112, 'CHE048', 'น้ำมันรำ', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(113, 'CHE049', 'น้ำกลั่น', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(114, 'CHE050', 'Gentian violet', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(115, 'CHE051', 'Formalin', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(116, 'CHE052', 'น้ำยาชุบเงิน', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(117, 'CHE053', 'คริสตัลไวโอเลต', 4, 4, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(118, 'CHE054', 'Ammonium chloride 450 g.', 6, 6, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(119, 'CHE055', 'Ammonium Ferric 100g.', 2, 2, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(120, 'CHE056', 'Ammonium Molybdata 50 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(121, 'CHE057', 'Ammonium Iron (II) sulphate', 2, 2, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(122, 'CHE058', 'Ammonium Sulphate 450 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(123, 'CHE059', 'Antimony 450 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(124, 'CHE060', 'Ascobic acid 50 g. (วิตามิน C)', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(125, 'CHE061', 'Barium chloride 450 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(126, 'CHE062', 'Barium hydroxide 100 g.', 6, 6, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(127, 'CHE063', 'Barium Nitrate 100 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(128, 'CHE064', 'Benzoic acid 450 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(129, 'CHE065', 'Borex', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(130, 'CHE066', 'ผงตะไบเหล็ก 100 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(131, 'CHE067', 'Calcium chloride 450 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(132, 'CHE068', 'Calcium carbide', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(133, 'CHE069', 'Calcium carbonate chip (เม็ด) 450 g.', 6, 6, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(134, 'CHE070', 'Calcium cabonate powder 450 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(135, 'CHE071', 'Calcium hydroxide 250 g.', 6, 0, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(136, 'CHE072', 'Calcium sulphate', 6, 6, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(137, 'CHE073', 'Camphor (การบูร) 450 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(138, 'CHE074', 'Cobalt chloride 50g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(139, 'CHE075', 'Copper (II) Chloride 450 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(140, 'CHE076', 'Copper (II) oxide', 2, 2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(141, 'CHE077', 'Copper (II) sulphate 450 g.', 11, 11, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(142, 'CHE078', 'Copper carbonate 100 g.', 7, 7, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(143, 'CHE079', 'Disodium hydrogen phosphate 450 g.', 6, 6, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(144, 'CHE080', 'Gelatin 50 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(145, 'CHE081', 'Glucose 250 g.', 8, 8, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(146, 'CHE082', 'Iodine crystal', 3, 3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(147, 'CHE083', 'Iron (II) sulfate 100 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(148, 'CHE084', 'Lanolin (ไขขนแกะ) 100 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(149, 'CHE085', 'Leal (II) nitrate 100 g.', 2, 2, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(150, 'CHE086', 'Maganess Diozide 450 g.', 5, 5, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(151, 'CHE087', 'Maganess sulphate 450 g.', 7, 7, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(152, 'CHE088', 'Magnesium chloride 450 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(153, 'CHE089', 'Mental', 2, 2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(154, 'CHE090', 'Magnesium sulphate 450 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(155, 'CHE091', 'Napthalien (ลูกเหม็น) 250 g.', 4, 4, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(156, 'CHE092', 'Nikel sulphate 450 g.', 3, 3, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(157, 'CHE093', 'Oxalic acid 100 g.', 11, 11, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(158, 'CHE094', 'Potassium bromied 100 g.', 2, 2, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(159, 'CHE095', 'Potassium chloride 100 g.', 8, 8, 'กป.', 0, '', 'No', 'che', 'img/chemsub.png'),
(160, 'PHY020', 'ชุดอิเล็กโทรสโคป', 3, 2, 'ชุด', 1, '', 'No', 'phy', 'img/phy.png'),
(161, 'PHY021', 'ชุดการทดลองกฏของบอยล์', 6, 6, 'ชุด', 0, '', 'No', 'phy', 'img/phy.png'),
(162, 'PHY022', 'ชุดหม้อแปลงไฟฟ้า', 5, 4, 'ชุด', 1, '', 'No', 'phy', 'img/phy.png'),
(163, 'CHM026', 'หลอดทดลอง 10 ลบ.ซม.', 20, 8, 'ชิ้น', 0, '', 'No', 'chm', 'img/chm.png'),
(164, 'CHM027', 'หลอดทดลอง 20 ลบ.ซม.', 12, 12, 'ชิ้น', 0, '', 'No', 'chm', 'img/chm.png'),
(165, 'CHM028', 'เทอร์โมมิเตอร์', 14, 14, 'ชิ้น', 0, '', 'No', 'chm', 'img/chm.png'),
(166, 'CHM029', 'กระดาษกรอง', 9, 9, 'ชิ้น', 0, '', 'No', 'chm', 'img/chm.png'),
(167, 'CHE096', 'CoCl2.6H20', 7, 1, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(168, 'CHE097', 'Co(NO3)2.6H2O', 6, 0, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(169, 'CHE098', 'CoCl2', 3, -3, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(170, 'CHE099', 'Co(NO3)2', 4, -2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(171, 'BIO016', 'จานแก้ว', 20, 20, 'ใบ', 0, '', 'No', 'bio', 'img/bio.png'),
(172, 'CHE100', 'Sodium Hydrogen Carbonate', 4, -2, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(173, 'CHM030', 'ที่ตั้งหลอดทดลอง', 16, 16, 'อัน', 0, '', 'No', 'chm', 'img/chm.png'),
(174, 'CHM031', 'ชุดทดสอบการนำไฟฟ้า', 3, 3, 'ชุด', 0, '', 'No', 'chm', 'img/chm.png'),
(175, 'CHM032', 'ชุดตะเกียงแอลกอฮอล์', 24, 24, 'ชุด', 0, '', 'No', 'chm', 'img/chm.png'),
(177, 'CHM033', 'ไม้ขีดไฟ', 8, 8, 'กล่อง', 0, '', 'No', 'chm', 'img/chm.png'),
(178, 'CHE101', 'สารละลายน้ำตาลกลูโคส 1%', 2, 0, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png'),
(179, 'CHE102', 'สารละลายไอโอดีน 1%', 3, -1, 'ขวด', 1, '', 'No', 'che', 'img/chemsub.png'),
(180, 'CHE103', 'สารละลายเบเนดิกต์', 2, 1, 'ขวด', 0, '', 'No', 'che', 'img/chemsub.png');

-- --------------------------------------------------------

--
-- Table structure for table `incart`
--

CREATE TABLE `incart` (
  `cart_id` int(11) NOT NULL,
  `std_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสอุปกรณ์หรือสารเคมี',
  `eq_id` int(10) DEFAULT NULL COMMENT 'จำนวนที่ขอยืม',
  `cart_amount` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(5) NOT NULL,
  `lab_code` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lab_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lab_path` text COLLATE utf8_unicode_ci,
  `lab_type` char(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `lab_code`, `lab_name`, `lab_path`, `lab_type`) VALUES
(1, 'LAB-001', 'ชุดทดลองไฟฟ้าสถิต', 'img/phy.png', 'phy'),
(2, 'LAB-002', 'การทดลองกฏของบอยล์', 'img/phy.png', 'phy'),
(3, 'LAB-003', 'การทดลองหม้อแปลงไฟฟ้า', 'img/phy.png', 'phy'),
(4, 'LAB-004', 'สมดุลเคมี', 'img/che.png', 'che'),
(5, 'LAB-005', 'การจำแนกความเป็นกรด - เบสของสารละลาย', 'img/che.png', 'che'),
(6, 'LAB-006', 'สมบัติบางประการของสารละลาย', 'img/che.png', 'che'),
(7, 'LAB-007', 'การทดสอบอาหาร', 'img/bio.png', 'bio'),
(8, 'LAB-008', 'การทดสอบวิตามินซี', 'img/bio.png', 'bio'),
(9, 'LAB-009', 'การทดสอบเบเนดิก', 'img/bio.png', 'bio');

-- --------------------------------------------------------

--
-- Table structure for table `labboy`
--

CREATE TABLE `labboy` (
  `lb_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `lb_pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lb_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lb_mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lb_email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lb_path` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางผู้ควบคุมหรือครูผู้สอนที่ใช้งานห้องปฏิบัติการ';

--
-- Dumping data for table `labboy`
--

INSERT INTO `labboy` (`lb_id`, `lb_pass`, `lb_name`, `lb_mobile`, `lb_email`, `lb_path`) VALUES
('lb01', '1234', 'John Doe', NULL, 'john.doe@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labroom`
--

CREATE TABLE `labroom` (
  `lab_id` int(11) NOT NULL,
  `lab_code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `lab_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lab_floor` int(1) NOT NULL,
  `lab_building` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lab_type` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางห้องปฎิบัติการ';

--
-- Dumping data for table `labroom`
--

INSERT INTO `labroom` (`lab_id`, `lab_code`, `lab_name`, `lab_floor`, `lab_building`, `lab_type`) VALUES
(1, '1203', 'bio lab1', 2, '1', 'bio'),
(2, '1205', 'bio lab2', 2, '1', 'bio'),
(3, '1206', 'chemistry lab1', 2, '1', 'chm'),
(4, '1208', 'chemistry lab 2', 2, '1', 'chm'),
(5, '1210', 'physics lab1', 2, '1', 'phy'),
(6, '1302', 'physics lab2', 3, '1', 'phy'),
(7, '1303', 'bio lab3', 3, '1', 'bio');

-- --------------------------------------------------------

--
-- Table structure for table `packet_lab`
--

CREATE TABLE `packet_lab` (
  `p_id` int(10) NOT NULL,
  `eq_id` int(5) DEFAULT NULL,
  `pack_amount` int(5) DEFAULT NULL,
  `lab_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packet_lab`
--

INSERT INTO `packet_lab` (`p_id`, `eq_id`, `pack_amount`, `lab_id`) VALUES
(1, 160, 1, 1),
(2, 161, 1, 2),
(3, 162, 1, 3),
(4, 163, 5, 4),
(5, 163, 5, 4),
(6, 165, 1, 4),
(7, 166, 2, 4),
(8, 167, 2, 4),
(9, 168, 2, 4),
(10, 169, 2, 4),
(11, 170, 2, 4),
(12, 4, 2, 4),
(13, 15, 2, 4),
(14, 19, 2, 4),
(15, 61, 5, 5),
(16, 40, 3, 5),
(17, 41, 3, 5),
(18, 171, 5, 5),
(19, 135, 2, 5),
(20, 172, 2, 5),
(21, 5, 2, 5),
(22, 172, 1, 6),
(23, 42, 6, 6),
(24, 163, 6, 6),
(25, 174, 1, 6),
(26, 61, 1, 6),
(27, 40, 3, 6),
(28, 41, 3, 6),
(29, 113, 1, 6),
(30, 163, 9, 7),
(31, 66, 1, 7),
(32, 64, 4, 7),
(33, 42, 3, 7),
(34, 48, 1, 7),
(35, 175, 1, 7),
(36, 176, 1, 7),
(37, 173, 1, 7),
(38, 166, 1, 7),
(40, 178, 1, 7),
(41, 179, 1, 7),
(42, 180, 1, 7),
(43, 163, 5, 8),
(44, 64, 3, 8),
(45, 179, 1, 8),
(46, 178, 1, 9),
(47, 163, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `std_pass` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_level` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_room` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_line` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_grade` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางข้อมูลนักเรียน';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_pass`, `std_name`, `std_level`, `std_room`, `std_line`, `std_email`, `std_grade`) VALUES
('00001', '1234', 'Jane Doe', '4', '5', 'qwerty', 'jane.doe@gmail.com', 1.02),
('00002', '1234', 'Patrick Doe', '5', '5', 'ฟหก', 'patrick.doe@gmail.com', 3.75),
('00003', '1234', 'Alice Doe', '5', '4', NULL, 'alice.doe@gmail.com', 2.75),
('00009', '12345678', 'Tanya Doe', '5', '4', 'cream', 'tanya.doe@gmail.com', 3.99),
('00010', '98765', 'Anna Doe', '4', '5', 'apichat', 'anna.doe@gmail.com', 2.01),
('02561', '9866', 'Tris Doe', '4', '6', 'saudy', 'tris.doe@gmail.com', 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `use_room`
--

CREATE TABLE `use_room` (
  `use_id` int(11) NOT NULL,
  `std_id` varchar(5) NOT NULL,
  `lab_code` varchar(4) NOT NULL,
  `use_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `use_status` varchar(3) NOT NULL DEFAULT 'no',
  `use_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `use_room`
--

INSERT INTO `use_room` (`use_id`, `std_id`, `lab_code`, `use_date`, `start_time`, `end_time`, `use_status`, `use_detail`) VALUES
(4, '00001', '1203', '2018-03-15', '15:00:00', '16:00:00', 'no', 'ทำการทดลอง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `chemdetail`
--
ALTER TABLE `chemdetail`
  ADD PRIMARY KEY (`chm_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `incart`
--
ALTER TABLE `incart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `labboy`
--
ALTER TABLE `labboy`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `labroom`
--
ALTER TABLE `labroom`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `packet_lab`
--
ALTER TABLE `packet_lab`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `use_room`
--
ALTER TABLE `use_room`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `chemdetail`
--
ALTER TABLE `chemdetail`
  MODIFY `chm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `incart`
--
ALTER TABLE `incart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `labroom`
--
ALTER TABLE `labroom`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `packet_lab`
--
ALTER TABLE `packet_lab`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `use_room`
--
ALTER TABLE `use_room`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
