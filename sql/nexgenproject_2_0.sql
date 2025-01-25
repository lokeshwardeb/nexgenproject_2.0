-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 06:32 PM
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
-- Database: `nexgenproject_2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `documentation_id` int(11) NOT NULL,
  `documentation_name` varchar(255) NOT NULL,
  `documentation_desc` varchar(255) NOT NULL,
  `documentation_file_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `documentations`
--

INSERT INTO `documentations` (`documentation_id`, `documentation_name`, `documentation_desc`, `documentation_file_name`, `datetime`) VALUES
(1, 'jai sri ganesh', 'jai sri ganesh', 'hw_id_32_hw_title_jai_sri_ganesh_hw_file_name_Hw_3.pdf', '0000-00-00 00:00:00'),
(2, 'hi', 'fdf', 'homework_36_new_main_test_hw__7days_hw_all (1).pdf', '0000-00-00 00:00:00'),
(3, 'hi', 'this is the test', 'homework_32_t_jai_sri_ganesh_f_n_Hw_3.pdf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meeting_id` int(11) NOT NULL,
  `meeting_code` varchar(255) NOT NULL,
  `meeting_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meeting_id`, `meeting_code`, `meeting_status`, `datetime`) VALUES
(1, 'v8winrukpg095mfa7dqoy3j462sbzhcetl1x_id_1', '', '2024-08-28 01:35:57'),
(2, '2hldq5u0fjaebt9ys8k6v7xwpr3c4nomigz1_id_1', '', '2024-08-28 01:41:24'),
(3, 'qd8gckm74ifwrhzxal9ny6po03j2ebut1s5v_id_2', '', '2024-08-28 01:41:29'),
(4, 'g90wmjruc2n6ayd3xek4f81tozbip7sql5vh_id_3', '', '2024-08-28 01:42:10'),
(5, 'i4x2gqvfzah3rptl7sedk1cmuy5o9j68bw0n_id_4', '', '2024-08-28 01:42:15'),
(6, 'j1m0q7knygdberistplu34zho2a65xvcw98f_id_5', '', '2024-08-28 01:42:20'),
(7, 'uj0v2lrwzm1hat8d5gb9kf3nx6qp7si4cyeo_id_6', '', '2024-08-28 01:47:25'),
(8, '5z8x0j3q9oiurldgbyhkms4tan7ec62wpvf1_id_7', '', '2024-08-28 01:47:31'),
(9, 'dfyug0wtcz6k42sbihqonrlmj3x7a9p5v18e_id_8', '', '2024-08-28 01:47:36'),
(30, 'qkwi3g8m64n2cjpoafbd1hve5zxult7rs9y0_id_9', 'running', '2025-01-24 14:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_inbox_files`
--

CREATE TABLE `personal_inbox_files` (
  `file_id` int(11) NOT NULL,
  `msg_id` varchar(255) NOT NULL,
  `file_sender_id` varchar(255) NOT NULL,
  `file_receiver_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_inbox_files`
--

INSERT INTO `personal_inbox_files` (`file_id`, `msg_id`, `file_sender_id`, `file_receiver_id`, `file_name`, `datetime`) VALUES
(1, '', '3', '1', 'stack_choosing_guidelines.pdf', '2025-01-14 21:44:36'),
(2, '', '3', '1', 'stack_choosing_guidelines.pdf', '2025-01-14 23:59:23'),
(3, '', '3', '1', 'project_completing_guidelines_2.pdf', '2025-01-14 23:59:47'),
(4, '', '3', '1', 'stack_choosing_guidelines.pdf', '2025-01-15 00:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_inbox_msg`
--

CREATE TABLE `personal_inbox_msg` (
  `msg_id` int(11) NOT NULL,
  `msg_sender_id` varchar(255) NOT NULL,
  `msg_receiver_id` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `msg_seen_by_receiver_status` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_upload_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_inbox_msg`
--

INSERT INTO `personal_inbox_msg` (`msg_id`, `msg_sender_id`, `msg_receiver_id`, `msg`, `msg_seen_by_receiver_status`, `file_name`, `file_upload_status`, `datetime`) VALUES
(8, '2', '3', 'hi', '', '', '', '2025-01-15 01:01:40'),
(9, '2', '4', 'dfd', '', '', '', '2025-01-15 01:02:10'),
(18, '3', '1', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 10:45:13'),
(19, '3', '1', '', '', 'project_completing_guidelines.pdf', 'file_uploaded', '2025-01-16 10:57:19'),
(20, '3', '1', 'f', '', '', '', '2025-01-16 10:57:34'),
(21, '3', '1', 'd', '', '', '', '2025-01-16 11:05:44'),
(22, '3', '1', 'dd', '', '', '', '2025-01-16 11:06:30'),
(23, '3', '1', 'dfdfdf', '', '', '', '2025-01-16 11:08:23'),
(24, '3', '1', 'check', '', '', '', '2025-01-16 11:09:01'),
(25, '3', '1', 'fdfd', '', '', '', '2025-01-16 11:10:18'),
(26, '1', '3', 'dfdfdfdf', '', '', '', '2025-01-16 11:13:22'),
(27, '3', '1', 'dfdf', '', '', '', '2025-01-16 11:18:54'),
(28, '1', '3', 'hi', '', '', '', '2025-01-16 11:39:26'),
(30, '3', '1', 'df', '', '', '', '2025-01-16 11:51:16'),
(31, '1', '3', 'd', '', '', '', '2025-01-16 11:52:01'),
(32, '1', '3', 'dfdfdf', '', '', '', '2025-01-16 11:56:12'),
(33, '3', '1', 'hgh', '', '', '', '2025-01-16 11:58:08'),
(34, '3', '1', 'dfdff', '', '', '', '2025-01-16 11:59:47'),
(35, '1', '3', 'fdfdf', '', '', '', '2025-01-16 12:02:30'),
(36, '1', '3', 'fdfd', '', '', '', '2025-01-16 12:04:58'),
(38, '3', '1', 'f', '', '', '', '2025-01-16 12:07:38'),
(39, '3', '1', 'dfdfdf', '', '', '', '2025-01-16 12:11:13'),
(40, '3', '1', 'dfdffdfd', '', '', '', '2025-01-16 12:13:06'),
(41, '1', '3', 'fdfd', '', '', '', '2025-01-16 12:15:41'),
(42, '3', '2', 'hello birt', '', '', '', '2025-01-16 12:17:41'),
(43, '2', '3', 'fdfd', '', '', '', '2025-01-16 12:20:52'),
(44, '3', '2', 'dfdffccc', '', '', '', '2025-01-16 12:23:26'),
(45, '3', '2', 'dfdfdfdergte3g34t4', '', '', '', '2025-01-16 12:25:17'),
(46, '3', '2', 'ct', '', '', '', '2025-01-16 12:27:27'),
(47, '3', '2', 'c', '', '', '', '2025-01-16 12:32:08'),
(48, '2', '3', 'fdfdfdf', '', '', '', '2025-01-16 12:32:15'),
(65, '3', '2', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 13:32:29'),
(68, '3', '2', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 13:36:22'),
(69, '3', '2', 'fdfd', '', '', '', '2025-01-16 13:36:42'),
(71, '2', '3', 'dsdsds', '', '', '', '2025-01-16 13:40:54'),
(72, '3', '2', 'dsdsswww', '', '', '', '2025-01-16 13:41:12'),
(75, '2', '3', '', '', 'project_completing_guidelines_2.pdf', 'file_uploaded', '2025-01-16 13:43:58'),
(76, '3', '2', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 13:44:56'),
(77, '3', '2', 'ghgh', '', '', '', '2025-01-16 13:46:26'),
(80, '2', '3', 'efeege', '', '', '', '2025-01-16 13:50:20'),
(81, '2', '3', 'fergrgrg', '', '', '', '2025-01-16 13:51:31'),
(84, '2', '3', 'fdfeegege4ge4', '', '', '', '2025-01-16 13:54:42'),
(85, '2', '3', 'fdfdfdf', '', '', '', '2025-01-16 14:25:27'),
(86, '3', '2', 'gfgf', '', '', '', '2025-01-16 14:26:13'),
(87, '2', '3', 'gfgf', '', '', '', '2025-01-16 14:57:57'),
(88, '3', '2', 'fdfd', '', '', '', '2025-01-16 14:59:20'),
(91, '3', '2', 'gfgfgf', '', '', '', '2025-01-16 15:02:42'),
(93, '3', '2', '', '', 'project_completing_guidelines_2.pdf', 'file_uploaded', '2025-01-16 15:03:08'),
(97, '2', '3', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 16:28:16'),
(98, '2', '3', 'hi', '', '', '', '2025-01-18 14:04:23'),
(99, '2', '3', 'check', '', '', '', '2025-01-18 14:04:56'),
(100, '1', '3', 'fdfd', '', '', '', '2025-01-18 22:01:56'),
(101, '1', '3', 'jai sri ganesh', '', '', '', '2025-01-18 22:02:19'),
(102, '3', '1', 'jai sri ganesh\r\n', '', '', '', '2025-01-18 22:02:32'),
(103, '2', '3', 'hi c', '', '', '', '2025-01-19 00:50:52'),
(109, '2', '1', 'hihihi', '', '', '', '2025-01-20 13:36:19'),
(111, '2', '3', 'klhkl', '', '', '', '2025-01-20 13:37:08'),
(114, '2', '3', 'hgugbujgbjkb ', '', '', '', '2025-01-20 13:38:39'),
(117, '2', '3', 'vhyjvjhvh vh j', '', '', '', '2025-01-20 13:39:13'),
(119, '2', '3', 'k;jk;lk;lk', '', '', '', '2025-01-20 13:39:47'),
(120, '2', '3', 'hi', '', '', '', '2025-01-20 13:43:23'),
(123, '2', '3', 'hghg', '', '', '', '2025-01-20 21:53:42'),
(131, '3', '2', 'hi', '', '', '', '2025-01-21 01:52:26'),
(132, '3', '2', 'hi', '', '', '', '2025-01-21 02:08:31'),
(133, '3', '2', 'gklf;kg', '', '', '', '2025-01-21 02:10:30'),
(134, '3', '2', 'hhtg', '', '', '', '2025-01-21 02:12:06'),
(135, '3', '2', 'fdk;ljf', '', '', '', '2025-01-21 02:13:24'),
(136, '3', '2', 'fdufhdkhf', '', '', '', '2025-01-21 02:14:48'),
(137, '3', '2', 'fdfd', '', '', '', '2025-01-21 02:17:28'),
(138, '3', '2', 'fdfdfdfefefefee', '', '', '', '2025-01-21 02:18:17'),
(139, '3', '2', 'fdfd', '', '', '', '2025-01-21 02:18:48'),
(140, '3', '2', 'gfgrfgg', '', '', '', '2025-01-21 02:19:30'),
(141, '3', '2', 'dfdfdfdfedfe', '', '', '', '2025-01-21 02:20:38'),
(142, '3', '2', 'fdfdfdf', '', '', '', '2025-01-21 02:22:31'),
(143, '3', '2', 'fdfdfdfefeeeerfer', '', '', '', '2025-01-21 02:23:07'),
(144, '3', '2', 'fddfegegegege', '', '', '', '2025-01-21 02:23:46'),
(145, '3', '2', 'fdfegeghegehgeghhgh', '', '', '', '2025-01-21 02:25:41'),
(146, '3', '2', 'fdfdghrhrh', '', '', '', '2025-01-21 02:28:56'),
(147, '3', '2', 'fdfdfegeggg', '', '', '', '2025-01-21 02:31:44'),
(148, '3', '2', 'fdfegeg', '', '', '', '2025-01-21 02:36:48'),
(149, '3', '2', 'jai sri ganesh', '', '', '', '2025-01-21 02:39:09'),
(150, '3', '2', 'hjgj', '', '', '', '2025-01-22 10:40:23'),
(151, '3', '2', 'fdfdf', '', '', '', '2025-01-22 11:51:42'),
(152, '3', '2', 'gfgf', '', '', '', '2025-01-22 11:52:07'),
(153, '2', '3', 'fdfd', '', '', '', '2025-01-22 13:52:40'),
(154, '3', '2', 'check', '', '', '', '2025-01-22 13:55:51'),
(155, '3', '2', 'jai sri ganesh jai maa durga', '', '', '', '2025-01-22 14:49:34'),
(156, '3', '2', 'ffd', '', '', '', '2025-01-22 14:50:25'),
(157, '3', '2', 'fdfd', '', '', '', '2025-01-22 14:52:31'),
(158, '3', '2', 'fdfdf', '', '', '', '2025-01-22 14:53:21'),
(159, '3', '2', 'fdfd', '', '', '', '2025-01-22 14:54:30'),
(160, '3', '2', 'fdfd', '', '', '', '2025-01-22 14:55:32'),
(161, '3', '2', 'jai jagannath', '', '', '', '2025-01-22 14:56:13'),
(162, '3', '2', 'fdfd', '', '', '', '2025-01-22 14:59:38'),
(163, '3', '2', 'fdfdf', '', '', '', '2025-01-22 15:03:06'),
(164, '3', '2', 'fdf', '', '', '', '2025-01-22 15:03:49'),
(165, '3', '2', 'fdfdf', '', '', '', '2025-01-22 15:11:29'),
(166, '3', '2', 'fdf', '', '', '', '2025-01-22 15:11:35'),
(167, '3', '2', 'fdfdf', '', '', '', '2025-01-22 15:13:42'),
(168, '3', '2', 'check', '', '', '', '2025-01-22 15:14:49'),
(169, '3', '2', 'the new', '', '', '', '2025-01-22 15:14:57'),
(170, '2', '3', 'checks', '', '', '', '2025-01-22 15:15:07'),
(171, '3', '2', 'hi', '', '', '', '2025-01-22 15:54:29'),
(172, '3', '2', 'fdf', '', '', '', '2025-01-22 15:54:34'),
(173, '3', '2', 'fdfdf', '', '', '', '2025-01-22 15:54:47'),
(174, '3', '2', 'fdfjkjlkjf', '', '', '', '2025-01-22 15:56:40'),
(175, '3', '2', 'dfkdfj', '', '', '', '2025-01-22 15:59:22'),
(176, '3', '2', 'fdf', '', '', '', '2025-01-22 16:01:07'),
(177, '3', '2', 'fdfdf', '', '', '', '2025-01-22 16:01:36'),
(178, '3', '2', 'fdfdff', '', '', '', '2025-01-22 16:01:42'),
(179, '3', '2', 'gggg', '', '', '', '2025-01-22 16:01:51'),
(180, '3', '2', 'fdfdff', '', '', '', '2025-01-22 16:01:56'),
(181, '3', '2', 'fdfdff', '', '', '', '2025-01-22 16:02:09'),
(182, '3', '2', 'gfg', '', '', '', '2025-01-22 16:05:07'),
(183, '3', '2', 'hi hello ??', '', '', '', '2025-01-22 16:05:29'),
(184, '3', '2', 'hihi', '', '', '', '2025-01-22 16:05:39'),
(185, '3', '2', 'fdf', '', '', '', '2025-01-22 16:06:15'),
(186, '3', '2', 'fv', '', '', '', '2025-01-22 16:06:40'),
(187, '3', '2', 'hi', '', '', '', '2025-01-22 16:12:24'),
(188, '3', '2', 'gg', '', '', '', '2025-01-22 16:12:57'),
(189, '3', '2', 'hi', '', '', '', '2025-01-22 16:13:14'),
(190, '2', '3', 'hello', '', '', '', '2025-01-22 16:13:31'),
(191, '2', '3', 'how are you ??', '', '', '', '2025-01-22 16:13:39'),
(192, '2', '3', 'and yeah whats happning ??', '', '', '', '2025-01-22 16:13:55'),
(193, '3', '2', 'hi bro', '', '', '', '2025-01-22 16:18:21'),
(194, '2', '3', 'hey what&#039;s up !!', '', '', '', '2025-01-22 16:18:38'),
(195, '2', '3', 'jj', '', '', '', '2025-01-22 16:18:59'),
(196, '3', '2', 'test', '', '', '', '2025-01-22 16:20:52'),
(197, '2', '3', 'test2', '', '', '', '2025-01-22 16:21:05'),
(198, '2', '3', 'te', '', '', '', '2025-01-22 16:21:29'),
(199, '2', '3', 'hello', '', '', '', '2025-01-22 16:25:19'),
(200, '2', '3', 'hi', '', '', '', '2025-01-22 16:28:43'),
(201, '2', '3', 'fdfd', '', '', '', '2025-01-22 16:29:08'),
(202, '3', '2', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-22 16:30:31'),
(203, '2', '3', '', '', 'download (1).jpg', 'file_uploaded', '2025-01-22 16:30:45'),
(204, '2', '3', 'fdfd', '', '', '', '2025-01-22 16:32:26'),
(205, '2', '3', 'frf', '', '', '', '2025-01-22 16:32:47'),
(206, '2', '3', 'fjkfj', '', '', '', '2025-01-22 16:33:30'),
(207, '2', '3', 'ff', '', '', '', '2025-01-22 16:33:38'),
(208, '2', '3', '', '', 'download (1).jpg', 'file_uploaded', '2025-01-22 16:33:57'),
(209, '2', '3', 'gg', '', '', '', '2025-01-22 16:40:06'),
(210, '2', '3', 'fdf', '', '', '', '2025-01-22 16:40:19'),
(211, '2', '3', 'fdf', '', '', '', '2025-01-22 16:41:28'),
(212, '2', '3', 'hghg', '', '', '', '2025-01-22 16:41:45'),
(213, '2', '3', 'fdfd', '', '', '', '2025-01-22 16:50:39'),
(214, '2', '3', 'ff', '', '', '', '2025-01-22 17:02:46'),
(215, '2', '3', '  bbvbb', '', '', '', '2025-01-22 17:04:36'),
(216, '3', '2', 'fdfdff', '', '', '', '2025-01-22 17:05:26'),
(217, '3', '2', 'nn', '', '', '', '2025-01-22 17:05:58'),
(218, '3', '2', 'fdfdf', '', '', '', '2025-01-22 17:10:14'),
(219, '3', '2', 'fdf', '', '', '', '2025-01-22 17:12:24'),
(220, '3', '2', 'fdfdfdf', '', '', '', '2025-01-22 17:14:18'),
(221, '3', '2', 'check', '', '', '', '2025-01-22 17:15:36'),
(222, '2', '3', 'fdf', '', '', '', '2025-01-22 17:18:24'),
(223, '2', '3', 'fdfdf', '', '', '', '2025-01-22 17:18:59'),
(224, '2', '3', 'fdf', '', '', '', '2025-01-22 17:20:51'),
(225, '2', '3', 'fdf', '', '', '', '2025-01-22 17:23:38'),
(226, '2', '3', 'hh', '', '', '', '2025-01-22 17:35:13'),
(227, '3', '2', 'gg', '', '', '', '2025-01-22 17:36:43'),
(228, '3', '2', 'ff', '', '', '', '2025-01-22 17:37:16'),
(229, '3', '2', 'll', '', '', '', '2025-01-22 17:37:36'),
(230, '2', '3', 'jkuku', '', '', '', '2025-01-22 17:48:09'),
(231, '2', '3', 'h', '', '', '', '2025-01-22 17:48:21'),
(232, '2', '3', 'jhjh', '', '', '', '2025-01-22 17:48:28'),
(233, '2', '3', 'f', '', '', '', '2025-01-22 17:48:46'),
(234, '2', '3', 'fdf', '', '', '', '2025-01-22 17:49:29'),
(235, '2', '3', 'fdf', '', '', '', '2025-01-22 17:49:37'),
(236, '2', '3', 'o[o[o', '', '', '', '2025-01-22 17:59:22'),
(237, '2', '3', 'jj', '', '', '', '2025-01-22 17:59:31'),
(238, '2', '3', 'jai sri ram', '', '', '', '2025-01-22 18:00:55'),
(239, '2', '3', 'tggrf', '', '', '', '2025-01-22 18:02:22'),
(240, '2', '3', 'fdfdf', '', '', '', '2025-01-22 18:03:08'),
(241, '2', '3', 'fdfdf', '', '', '', '2025-01-22 18:05:00'),
(242, '2', '3', 'fdfdfdfd', '', '', '', '2025-01-22 18:05:34'),
(243, '2', '3', 'fdf', '', '', '', '2025-01-22 18:05:45'),
(244, '2', '3', 'fdff', '', '', '', '2025-01-22 18:05:49'),
(245, '2', '3', 'fdfdfdf', '', '', '', '2025-01-22 18:09:52'),
(246, '2', '3', 'fdfdfdf', '', '', '', '2025-01-22 18:10:01'),
(247, '2', '3', 'gfgfg', '', '', '', '2025-01-22 18:11:03'),
(248, '2', '3', 'gfg', '', '', '', '2025-01-22 18:11:10'),
(249, '2', '3', 'fd', '', '', '', '2025-01-22 18:11:18'),
(250, '2', '3', 'fd', '', '', '', '2025-01-22 18:11:28'),
(251, '2', '3', 'ff', '', '', '', '2025-01-22 18:11:32'),
(252, '2', '3', 'hhfh', '', '', '', '2025-01-22 18:12:43'),
(253, '2', '3', 'ff', '', '', '', '2025-01-22 18:13:16'),
(254, '2', '3', 'fdf', '', '', '', '2025-01-22 18:15:39'),
(255, '2', '3', 'fdfdff', '', '', '', '2025-01-22 18:15:43'),
(256, '2', '3', 'll', '', '', '', '2025-01-22 18:17:23'),
(257, '2', '3', 'fdf', '', '', '', '2025-01-22 18:18:16'),
(258, '2', '3', 'fdfdf', '', '', '', '2025-01-22 18:18:23'),
(259, '2', '3', 'gg', '', '', '', '2025-01-22 18:18:29'),
(260, '2', '3', 'hi', '', '', '', '2025-01-22 20:57:59'),
(261, '2', '3', 'l', '', '', '', '2025-01-22 20:58:15'),
(262, '2', '3', 'jhyjyhj', '', '', '', '2025-01-22 20:59:11'),
(263, '2', '3', 'fdf', '', '', '', '2025-01-22 21:00:14'),
(264, '2', '3', 'ff', '', '', '', '2025-01-22 21:01:10'),
(265, '2', '3', 'fdf', '', '', '', '2025-01-22 21:01:24'),
(266, '2', '3', 'fdf', '', '', '', '2025-01-22 21:01:28'),
(267, '2', '3', 'ffdd', '', '', '', '2025-01-22 21:01:33'),
(268, '2', '3', 'fdfftegteg', '', '', '', '2025-01-22 21:01:42'),
(269, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:02:10'),
(270, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:02:17'),
(271, '2', '3', 'fwegeg', '', '', '', '2025-01-22 21:02:49'),
(272, '2', '3', 'fdf', '', '', '', '2025-01-22 21:03:12'),
(273, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:04:28'),
(274, '2', '3', 'hi', '', '', '', '2025-01-22 21:06:31'),
(275, '2', '3', 'g', '', '', '', '2025-01-22 21:06:44'),
(276, '2', '3', 'hhghg', '', '', '', '2025-01-22 21:06:49'),
(277, '2', '3', 'hf', '', '', '', '2025-01-22 21:07:34'),
(278, '2', '3', 'jkhjhjh', '', '', '', '2025-01-22 21:09:45'),
(279, '2', '3', 'gfgfg', '', '', '', '2025-01-22 21:10:19'),
(280, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:11:24'),
(281, '2', '3', 'f', '', '', '', '2025-01-22 21:11:33'),
(282, '2', '3', 'f', '', '', '', '2025-01-22 21:11:41'),
(283, '2', '3', 'fdfdfd', '', '', '', '2025-01-22 21:14:19'),
(284, '2', '3', 'nhh', '', '', '', '2025-01-22 21:14:42'),
(285, '2', '3', 'jiij', '', '', '', '2025-01-22 21:14:49'),
(286, '2', '3', 'hikh', '', '', '', '2025-01-22 21:14:56'),
(287, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:16:53'),
(288, '2', '3', 'fdf', '', '', '', '2025-01-22 21:20:38'),
(289, '2', '3', 'ftyr', '', '', '', '2025-01-22 21:21:52'),
(290, '2', '3', 'fdf', '', '', '', '2025-01-22 21:23:13'),
(291, '2', '3', 'ff', '', '', '', '2025-01-22 21:23:22'),
(292, '2', '3', 'o[p-ol', '', '', '', '2025-01-22 21:23:43'),
(293, '2', '3', 'fdff', '', '', '', '2025-01-22 21:25:56'),
(294, '2', '3', 'gfgf', '', '', '', '2025-01-22 21:27:49'),
(295, '2', '3', 'nngn', '', '', '', '2025-01-22 21:27:57'),
(296, '2', '3', 'jai ganesh', '', '', '', '2025-01-22 21:28:22'),
(297, '2', '3', 'fdfdf', '', '', '', '2025-01-22 21:28:26'),
(298, '2', '3', 'gfgf', '', '', '', '2025-01-22 21:30:48'),
(299, '2', '3', 'fdf', '', '', '', '2025-01-22 21:31:27'),
(300, '2', '3', 'hiohiknikhn', '', '', '', '2025-01-22 21:31:44'),
(301, '2', '3', 'n', '', '', '', '2025-01-22 21:31:54'),
(302, '2', '3', 'jj', '', '', '', '2025-01-22 21:32:01'),
(303, '2', '3', 'jhioh', '', '', '', '2025-01-22 21:33:39'),
(304, '2', '3', 'fdf', '', '', '', '2025-01-22 21:34:39'),
(305, '2', '3', 'kk', '', '', '', '2025-01-22 21:35:55'),
(306, '2', '3', ';;', '', '', '', '2025-01-22 21:36:59'),
(307, '2', '3', 'gfgf', '', '', '', '2025-01-22 21:40:32'),
(308, '2', '3', 'gfgf', '', '', '', '2025-01-22 21:40:40'),
(309, '2', '3', 'jhjhj', '', '', '', '2025-01-22 21:40:48'),
(310, '2', '3', '\r\n\r\nkjk', '', '', '', '2025-01-22 21:40:55'),
(311, '3', '2', 'fdfdf', '', '', '', '2025-01-22 21:41:27'),
(312, '3', '2', 'hjhjhjhjkhk', '', '', '', '2025-01-22 21:41:33'),
(313, '3', '2', 'hiojho', '', '', '', '2025-01-22 21:41:53'),
(314, '3', '2', 'hi', '', '', '', '2025-01-22 21:43:11'),
(315, '3', '2', ' kljlkjlkjkljljk', '', '', '', '2025-01-22 21:43:19'),
(316, '3', '2', 'fdfd', '', '', '', '2025-01-22 21:44:07'),
(317, '3', '2', 'fdfdf', '', '', '', '2025-01-22 21:44:10'),
(318, '3', '2', 'hh', '', '', '', '2025-01-22 21:44:18'),
(319, '3', '2', 'ff', '', '', '', '2025-01-22 21:46:04'),
(320, '3', '2', 'fdfdfdf', '', '', '', '2025-01-22 21:46:09'),
(321, '3', '2', 'dfdfdf', '', '', '', '2025-01-22 21:46:16'),
(322, '2', '3', 'fdf', '', '', '', '2025-01-22 21:47:12'),
(323, '2', '3', 'hghgh', '', '', '', '2025-01-22 21:47:25'),
(324, '2', '3', 'ffdfdf', '', '', '', '2025-01-22 21:47:37'),
(325, '2', '3', 'jklj', '', '', '', '2025-01-22 21:50:26'),
(326, '2', '3', 'oll', '', '', '', '2025-01-22 21:50:33'),
(327, '2', '3', 'jujj', '', '', '', '2025-01-22 21:50:41'),
(328, '3', '2', 'fdf', '', '', '', '2025-01-22 21:51:13'),
(329, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:51:19'),
(330, '2', '3', 'uu', '', '', '', '2025-01-22 21:51:24'),
(331, '2', '3', 'ff', '', '', '', '2025-01-22 21:51:43'),
(332, '2', '3', 'fdfdff', '', '', '', '2025-01-22 21:51:48'),
(333, '2', '3', 'ffdfd', '', '', '', '2025-01-22 21:52:03'),
(334, '2', '3', 'fdfd', '', '', '', '2025-01-22 21:52:09'),
(335, '2', '3', 'fdf', '', '', '', '2025-01-22 21:57:53'),
(336, '2', '3', 'fdfdf', '', '', '', '2025-01-22 21:58:01'),
(337, '3', '2', 'fdf', '', '', '', '2025-01-22 21:58:23'),
(338, '2', '3', 'fdfdff', '', '', '', '2025-01-22 21:58:28'),
(339, '3', '2', 'hi', '', '', '', '2025-01-22 21:59:22'),
(340, '2', '3', 'hello\r\n', '', '', '', '2025-01-22 21:59:36'),
(341, '2', '3', 'hi', '', '', '', '2025-01-22 21:59:47'),
(342, '2', '3', 'fdfd', '', '', '', '2025-01-22 22:00:01'),
(343, '2', '3', 'check', '', '', '', '2025-01-22 22:00:12'),
(344, '2', '3', 'the main', '', '', '', '2025-01-22 22:02:30'),
(345, '2', '3', 'the main', '', '', '', '2025-01-22 22:02:37'),
(346, '2', '3', 'fdfdfdf', '', '', '', '2025-01-22 22:03:04'),
(347, '2', '3', 'ffdf', '', '', '', '2025-01-22 22:04:17'),
(348, '2', '3', 'fdfdf', '', '', '', '2025-01-22 22:04:59'),
(349, '2', '3', 'gg', '', '', '', '2025-01-22 22:05:25'),
(350, '2', '3', 'fdfdf', '', '', '', '2025-01-22 22:07:33'),
(351, '3', '2', 'ff', '', '', '', '2025-01-22 22:07:48'),
(352, '2', '3', 'ghiuhuihiuh', '', '', '', '2025-01-22 22:07:55'),
(353, '2', '3', 'h', '', '', '', '2025-01-22 22:09:36'),
(354, '2', '3', 'fgdfd', '', '', '', '2025-01-22 22:10:12'),
(355, '2', '3', 'this', '', '', '', '2025-01-22 22:10:25'),
(356, '2', '3', 'fdf', '', '', '', '2025-01-22 22:10:40'),
(357, '2', '3', 'fdfd', '', '', '', '2025-01-22 22:10:50'),
(358, '2', '3', 'tgg', '', '', '', '2025-01-22 22:11:30'),
(359, '3', '2', 'hello', '', '', '', '2025-01-22 22:11:53'),
(360, '3', '2', 'fdf', '', '', '', '2025-01-22 22:20:22'),
(361, '3', '2', 'FDF', '', '', '', '2025-01-22 22:23:20'),
(362, '3', '2', 'G', '', '', '', '2025-01-22 22:23:38'),
(363, '3', '2', 'gfg', '', '', '', '2025-01-22 22:25:07'),
(364, '3', '2', 'ff', '', '', '', '2025-01-22 22:27:35'),
(365, '3', '2', 'hihi', '', '', '', '2025-01-22 22:28:33'),
(366, '3', '2', 'fdf', '', '', '', '2025-01-22 22:42:04'),
(367, '3', '2', 'fdf', '', '', '', '2025-01-23 00:01:43'),
(368, '3', '2', 'gggg', '', '', '', '2025-01-23 00:16:58'),
(369, '3', '2', 'ff', '', '', '', '2025-01-23 00:17:25'),
(370, '3', '2', 'ff', '', '', '', '2025-01-23 00:22:41'),
(371, '3', '2', 'fdfd', '', '', '', '2025-01-23 00:26:31'),
(372, '3', '2', 'fdff', '', '', '', '2025-01-23 00:26:41'),
(373, '3', '2', 'fdf', '', '', '', '2025-01-23 00:29:23'),
(374, '3', '2', 'fdf', '', '', '', '2025-01-23 00:29:37'),
(375, '3', '2', 'fdff', '', '', '', '2025-01-23 00:29:50'),
(376, '3', '2', 'fdfdff', '', '', '', '2025-01-23 00:29:58'),
(377, '3', '2', 'fffff', '', '', '', '2025-01-23 22:42:29'),
(378, '3', '2', 'hi check', '', '', '', '2025-01-23 22:43:54'),
(379, '3', '2', 'fdfd', '', '', '', '2025-01-23 22:44:19'),
(380, '3', '2', 'fdfdff', '', '', '', '2025-01-23 22:44:48'),
(381, '3', '2', 'ffdfdf', '', '', '', '2025-01-23 22:44:58'),
(382, '3', '2', 'vfgfgg', '', '', '', '2025-01-23 22:45:14'),
(383, '3', '2', 'fdf', '', '', '', '2025-01-23 22:45:33'),
(384, '3', '2', 'ttret', '', '', '', '2025-01-23 22:45:52'),
(385, '3', '2', 'fdfd', '', '', '', '2025-01-23 22:46:04'),
(386, '3', '2', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-23 22:46:04'),
(387, '2', '3', 'hi', '', '', '', '2025-01-23 22:48:20'),
(388, '2', '3', 'ikl;k;lk;lkl;', '', '', '', '2025-01-23 22:48:28'),
(389, '2', '3', 'p', '', '', '', '2025-01-23 22:48:38'),
(390, '2', '3', 'fdfdf', '', '', '', '2025-01-23 22:49:07'),
(391, '2', '3', 'fdf', '', '', '', '2025-01-23 22:49:54'),
(392, '2', '3', ';;iioio', '', '', '', '2025-01-23 22:50:46'),
(393, '2', '3', 'fdfdf', '', '', '', '2025-01-23 22:53:28'),
(394, '2', '3', 'fdfd', '', '', '', '2025-01-23 22:54:06'),
(395, '2', '3', 'fdf', '', '', '', '2025-01-23 22:59:29'),
(396, '2', '3', 'fdfd', '', '', '', '2025-01-23 22:59:38'),
(397, '2', '3', 'fdfdf', '', '', '', '2025-01-23 22:59:59'),
(398, '2', '3', 'kk', '', '', '', '2025-01-23 23:00:14'),
(399, '2', '3', 'hjkhk', '', '', '', '2025-01-23 23:00:37'),
(400, '3', '2', 'dfdfdf', '', '', '', '2025-01-23 23:14:16'),
(401, '2', '3', 'fdf', '', '', '', '2025-01-23 23:33:47'),
(402, '2', '3', 'fdf', '', '', '', '2025-01-23 23:35:32'),
(403, '2', '3', 'fdfdf', '', '', '', '2025-01-24 00:36:22'),
(404, '2', '3', 'fdfffff', '', '', '', '2025-01-24 00:36:59'),
(405, '2', '3', 'fdf', '', '', '', '2025-01-24 00:37:22'),
(406, '2', '3', 'hello', '', '', '', '2025-01-24 00:37:29'),
(407, '2', '3', 'welcome to the message', '', '', '', '2025-01-24 00:38:00'),
(408, '2', '3', 'fdf', '', '', '', '2025-01-24 00:38:07'),
(409, '2', '3', 'fdf', '', '', '', '2025-01-24 00:38:22'),
(410, '2', '3', 'testing', '', '', '', '2025-01-24 00:38:28'),
(411, '3', '2', 'hi birt', '', '', '', '2025-01-24 00:39:01'),
(412, '2', '3', 'ff', '', '', '', '2025-01-24 00:45:41'),
(413, '2', '3', 'fdfd', '', '', '', '2025-01-24 00:50:43'),
(414, '2', '3', 'fdfdfdfdffdfdfd', '', '', '', '2025-01-24 00:52:28'),
(415, '2', '3', 'fdf', '', '', '', '2025-01-24 00:53:33'),
(416, '2', '3', 'dsdsd', '', '', '', '2025-01-24 00:53:49'),
(417, '2', '3', 'fdf', '', '', '', '2025-01-24 00:54:39'),
(418, '2', '3', 'fdf', '', '', '', '2025-01-24 00:54:44'),
(419, '2', '3', 'ff', '', '', '', '2025-01-24 00:54:47'),
(420, '2', '3', 'fdfd', '', '', '', '2025-01-24 00:55:21'),
(421, '2', '3', 'fdeerf', '', '', '', '2025-01-24 00:55:27'),
(422, '2', '3', 'fd', '', '', '', '2025-01-24 00:55:45'),
(423, '2', '3', 'fefefefe', '', '', '', '2025-01-24 00:55:55'),
(424, '2', '3', 'fdfd', '', '', '', '2025-01-24 00:56:36'),
(425, '2', '3', 'hhtht', '', '', '', '2025-01-24 00:56:43'),
(426, '2', '3', 'ggf', '', '', '', '2025-01-24 14:15:40'),
(427, '2', '3', 'hdd', '', '', '', '2025-01-24 14:15:58'),
(428, '2', '3', 'ff', '', '', '', '2025-01-24 14:16:04'),
(429, '2', '3', 'jk', '', '', '', '2025-01-24 14:26:00'),
(430, '2', '3', 'f', '', '', '', '2025-01-24 14:26:47'),
(431, '2', '3', 'this is ', '', '', '', '2025-01-24 15:14:54'),
(432, '2', '3', 'ff', '', '', '', '2025-01-24 15:16:05'),
(433, '2', '3', 'dd', '', '', '', '2025-01-24 15:16:38'),
(434, '2', '3', 'gfgf', '', '', '', '2025-01-24 15:23:29'),
(435, '2', '3', 'ff', '', '', '', '2025-01-24 15:23:57'),
(436, '2', '3', 'ff', '', '', '', '2025-01-24 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_desc` varchar(255) NOT NULL,
  `project_submission_datetime` varchar(255) NOT NULL,
  `project_github_repo_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_desc`, `project_submission_datetime`, `project_github_repo_name`, `datetime`) VALUES
(1, 'jai sri ganesh', 'jai sri ganesh', 'fkjflj', '', '2024-08-10 15:29:42'),
(2, 'jai sri ganesh2', 'jai sri ganesh2', 'jai sri ganesh2', '', '2024-08-10 17:10:33'),
(3, 'jai sri ganesh3', 'jai sri ganesh3', 'jai sri ganesh3', '', '2024-08-10 17:10:33'),
(4, 'jai sri ganesh4', 'jai sri ganesh4', 'jai sri ganesh4', '', '2024-08-10 17:10:53'),
(6, 'First new project', 'This is the main project description', '2024-08-10T19:28', '', '2024-08-10 19:28:09'),
(7, 'Wireflow', 'the test project', '2025-01-31T00:16', 'wireflow', '2025-01-18 00:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `projects_file_repository`
--

CREATE TABLE `projects_file_repository` (
  `repository_msg_id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `repository_msg_code` varchar(255) NOT NULL,
  `repository_msg` varchar(255) NOT NULL,
  `repository_msg_status` varchar(255) NOT NULL,
  `msg_sender_user_id` varchar(255) NOT NULL,
  `msg_sender_user_name` varchar(255) NOT NULL,
  `file_upload_status` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `msg_show_status` varchar(255) NOT NULL,
  `file_show_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects_file_repository`
--

INSERT INTO `projects_file_repository` (`repository_msg_id`, `project_id`, `repository_msg_code`, `repository_msg`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`, `msg_show_status`, `file_show_status`, `datetime`) VALUES
(239, '6', 'pronex_repo_msg_1', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:09'),
(241, '6', 'pronex_repo_msg_241', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:25'),
(283, '6', 'pronex_repo_msg_283', 'fdjfldjfd', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 02:41:29'),
(287, '6', 'pronex_repo_msg_284', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 03:00:41'),
(296, '6', 'pronex_repo_msg_288', 'jai sri ganesh', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-22 14:12:46'),
(301, '6', 'pronex_repo_msg_297', '', 'file_and_message', '3', 'c', 'file_uploaded', 'stack_choosing_guidelines.pdf', '', '', '2025-01-15 00:36:12'),
(302, '3', 'pronex_repo_msg_302', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-19 22:39:57'),
(310, '2', 'pronex_repo_msg_303', 'fdijklfjdklfjldkfjlkj', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2025-01-20 22:02:02'),
(312, '3', 'pronex_repo_msg_311', 'fdf', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2025-01-22 13:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `project_discussions`
--

CREATE TABLE `project_discussions` (
  `repository_msg_id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `repository_msg_code` varchar(255) NOT NULL,
  `repository_msg` varchar(255) NOT NULL,
  `repository_msg_status` varchar(255) NOT NULL,
  `msg_sender_user_id` varchar(255) NOT NULL,
  `msg_sender_user_name` varchar(255) NOT NULL,
  `file_upload_status` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `msg_show_status` varchar(255) NOT NULL,
  `file_show_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project_discussions`
--

INSERT INTO `project_discussions` (`repository_msg_id`, `project_id`, `repository_msg_code`, `repository_msg`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`, `msg_show_status`, `file_show_status`, `datetime`) VALUES
(239, '6', 'pronex_repo_msg_1', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:09'),
(241, '6', 'pronex_repo_msg_241', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:25'),
(283, '6', 'pronex_repo_msg_283', 'fdjfldjfd', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 02:41:29'),
(287, '6', 'pronex_repo_msg_284', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 03:00:41'),
(296, '6', 'pronex_repo_msg_288', 'jai sri ganeshhh', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-22 14:12:46'),
(303, '6', 'pronex_repo_msg_303', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-25 23:26:42'),
(307, '3', 'pronex_repo_msg_304', 'hi', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-27 22:24:51'),
(308, '', 'pronex_repo_msg_308', 'dfd', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:05:15'),
(309, '', 'pronex_repo_msg_309', 'fdfd', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:06:17'),
(310, '', 'pronex_repo_msg_310', 'hghgh', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:10:44'),
(311, '', 'pronex_repo_msg_311', 'fdfdfd', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:12:51'),
(312, '', 'pronex_repo_msg_312', 'fdfdfdf', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:14:32'),
(313, '', 'pronex_repo_msg_313', 'gdfgfg', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:17:06'),
(314, '', 'pronex_repo_msg_314', 'gfg', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:17:58'),
(315, '', 'pronex_repo_msg_315', 'gfgf', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:18:27'),
(317, '2', 'pronex_repo_msg_316', 'fdfdfd', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2025-01-20 22:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `task_file_name` varchar(255) NOT NULL,
  `task_file_upload_status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `user_id`, `task_name`, `task_desc`, `task_file_name`, `task_file_upload_status`, `datetime`) VALUES
(1, '6', '[value-3]', 'The first task', 'the first new task', '$task_file', 'task_file_uploaded', '0000-00-00 00:00:00'),
(2, 'g', 'fgfg', 'fgfg', 'gfg', '', '', '2025-01-11 18:38:20'),
(3, '', '', 'Jai sri ganesh', 'the checking new', '', '', '2025-01-11 18:41:51'),
(4, '', '', 'The task is checking ', 'Hello this is a task check with file', '', '', '2025-01-11 20:05:44'),
(5, '', '', 'test check with file', 'test with file', '', '', '2025-01-11 20:06:51'),
(6, '', '', 'ty', 'tyest', '', '', '2025-01-11 20:10:11'),
(7, '', '', 'fdf', 'dfergergregrg', '', '', '2025-01-11 20:51:24'),
(8, '', '', 'dfddfe', 'dfdfdfdf', '', '', '2025-01-11 20:52:34'),
(9, '', '', 'fefe', 'fefe', '', '', '2025-01-11 20:53:51'),
(10, '', '', 'fdfdfdf', 'dfdfefefe', '', '', '2025-01-11 20:55:33'),
(11, '', '', 'fdfdfed', 'fedfe', '', '', '2025-01-11 20:56:11'),
(12, '', '', 'fdeefefefe', 'dfdfdfdfdf', 'stack_choosing_guidelines.pdf', 'task_file_uploaded', '2025-01-11 21:03:35'),
(13, '', '', 'fdfdf', 'fdfd', '', '', '2025-01-11 21:07:13'),
(14, '6', '', 'the new task', 'the best task', '', '', '2025-01-11 23:00:57'),
(15, '6', '', 'the again file task', 'the again file task for first new project', 'stack_choosing_guidelines.pdf', 'task_file_uploaded', '2025-01-11 23:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `task_assigned_users`
--

CREATE TABLE `task_assigned_users` (
  `task_assigned_id` int(11) NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `task_assigned_user_id` varchar(255) NOT NULL,
  `task_assigned_datetime` datetime NOT NULL,
  `task_last_submission_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `task_assigned_users`
--

INSERT INTO `task_assigned_users` (`task_assigned_id`, `task_id`, `task_assigned_user_id`, `task_assigned_datetime`, `task_last_submission_datetime`) VALUES
(2, '15', '1', '2025-01-14 11:42:00', '2025-01-14 11:52:00'),
(3, '15', '2', '2025-01-14 11:42:00', '2025-01-14 11:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `datetime`) VALUES
(1, 'Jai sri ganesh', 'jaisriganesh@ganesh.ganesh', '$2y$10$Q6FebBlc92Jiwy8WRdrqo.dhiwJVZVLE/LaQtIRRJnhNkHYxWcTm6', '2024-08-09 21:56:18'),
(2, 'birt', 'birt@birt.birt', '$2y$10$Yf9XDcv31RMVDhK0YPaUT.A/j.mHYf75OeI2rY/wb8VxtXQFZJn06', '2024-08-09 22:00:58'),
(3, 'c', 'c@c.c', '$2y$10$qj52OKEKb0nCt5mwXBoTS.0FaQQBDjrZkrFihKQ3KjQcMU65QBFtm', '2024-08-09 22:05:50'),
(4, 'checkof', 'checkof@ofcheck.ofcheck', '$2y$10$XYVeKhNt.IDlQTWa2H2xJeghQNr1zVpqKEv.zucC55tkw8hyxPia2', '2024-08-09 22:06:48'),
(5, 'checkname', 'checkname@checkname.checkname', '$2y$10$NTnIVPAbQhNA92VVnEZNYundto7X3scQQLYRkXf4nFiUytYni.zoC', '2024-08-12 02:00:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`documentation_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `personal_inbox_files`
--
ALTER TABLE `personal_inbox_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `personal_inbox_msg`
--
ALTER TABLE `personal_inbox_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `projects_file_repository`
--
ALTER TABLE `projects_file_repository`
  ADD PRIMARY KEY (`repository_msg_id`);

--
-- Indexes for table `project_discussions`
--
ALTER TABLE `project_discussions`
  ADD PRIMARY KEY (`repository_msg_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_assigned_users`
--
ALTER TABLE `task_assigned_users`
  ADD PRIMARY KEY (`task_assigned_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `documentation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_inbox_files`
--
ALTER TABLE `personal_inbox_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_inbox_msg`
--
ALTER TABLE `personal_inbox_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects_file_repository`
--
ALTER TABLE `projects_file_repository`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `project_discussions`
--
ALTER TABLE `project_discussions`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task_assigned_users`
--
ALTER TABLE `task_assigned_users`
  MODIFY `task_assigned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
