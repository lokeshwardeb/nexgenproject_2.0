-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 11:11 PM
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
(10, '0t5q6hvwkpcmno7sl9bej4riuf32y81dzgax_id_9', 'running', '2024-08-28 01:48:47');

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
(296, '6', 'pronex_repo_msg_288', 'jai sri ganesh', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-22 14:12:46');

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
(301, '6', 'pronex_repo_msg_297', 'hi check', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-25 23:15:36'),
(302, '6', 'pronex_repo_msg_302', 'this is test', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-25 23:26:21'),
(303, '6', 'pronex_repo_msg_303', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-25 23:26:42'),
(307, '3', 'pronex_repo_msg_304', 'hi', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-27 22:24:51');

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
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects_file_repository`
--
ALTER TABLE `projects_file_repository`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `project_discussions`
--
ALTER TABLE `project_discussions`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
