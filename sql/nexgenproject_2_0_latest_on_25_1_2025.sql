-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 04:40 AM
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
(29, '48o2nyu1t5aiw69mqh7zk0gpr3vsjldcxfeb_id_9', 'running', '2024-08-30 22:34:38');

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
(97, '2', '3', '', '', 'stack_choosing_guidelines.pdf', 'file_uploaded', '2025-01-16 16:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_desc` varchar(255) NOT NULL,
  `project_submission_datetime` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_desc`, `project_submission_datetime`, `datetime`) VALUES
(1, 'jai sri ganesh', 'jai sri ganesh', 'fkjflj', '2024-08-10 15:29:42'),
(2, 'jai sri ganesh2', 'jai sri ganesh2', 'jai sri ganesh2', '2024-08-10 17:10:33'),
(3, 'jai sri ganesh3', 'jai sri ganesh3', 'jai sri ganesh3', '2024-08-10 17:10:33'),
(4, 'jai sri ganesh4', 'jai sri ganesh4', 'jai sri ganesh4', '2024-08-10 17:10:53'),
(6, 'First new project', 'This is the main project description', '2024-08-10T19:28', '2024-08-10 19:28:09');

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
(301, '6', 'pronex_repo_msg_297', '', 'file_and_message', '3', 'c', 'file_uploaded', 'stack_choosing_guidelines.pdf', '', '', '2025-01-15 00:36:12');

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
(315, '', 'pronex_repo_msg_315', 'gfgf', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2025-01-14 14:18:27');

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
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_inbox_files`
--
ALTER TABLE `personal_inbox_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_inbox_msg`
--
ALTER TABLE `personal_inbox_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects_file_repository`
--
ALTER TABLE `projects_file_repository`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `project_discussions`
--
ALTER TABLE `project_discussions`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

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
