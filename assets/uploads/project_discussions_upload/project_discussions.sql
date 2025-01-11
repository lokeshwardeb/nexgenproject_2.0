-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:24 PM
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
-- Table structure for table `personal_inbox`
--

CREATE TABLE `personal_inbox_messages` (
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
-- Dumping data for table `personal_inbox`
--

INSERT INTO `personal_inbox` (`repository_msg_id`, `project_id`, `repository_msg_code`, `repository_msg`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`, `msg_show_status`, `file_show_status`, `datetime`) VALUES
(239, '6', 'pronex_repo_msg_1', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:09'),
(241, '6', 'pronex_repo_msg_241', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-21 22:51:25'),
(283, '6', 'pronex_repo_msg_283', 'fdjfldjfd', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 02:41:29'),
(287, '6', 'pronex_repo_msg_284', 'jai sri ganesh', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-22 03:00:41'),
(296, '6', 'pronex_repo_msg_288', 'jai sri ganeshhh', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-22 14:12:46'),
(301, '6', 'pronex_repo_msg_297', 'hi check', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-25 23:15:36'),
(302, '6', 'pronex_repo_msg_302', 'this is test', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-25 23:26:21'),
(303, '6', 'pronex_repo_msg_303', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-08-25 23:26:42'),
(307, '3', 'pronex_repo_msg_304', 'hi', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-08-27 22:24:51'),
(308, '6', 'pronex_repo_msg_308', 'hi', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-12-20 19:43:27'),
(309, '6', 'pronex_repo_msg_309', 'how are you ??', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-12-20 19:43:55'),
(310, '6', 'pronex_repo_msg_310', 'hello what are you doing &gt;&lt;', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-12-20 19:44:22'),
(311, '6', 'pronex_repo_msg_311', 'it is running without online', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-12-20 19:45:12'),
(312, '6', 'pronex_repo_msg_312', 'hi', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-12-20 19:48:07'),
(313, '6', 'pronex_repo_msg_313', 'hwllo', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-12-20 19:48:22'),
(314, '6', 'pronex_repo_msg_314', 'how are you ??', 'file_and_message', '3', 'c', 'file_not_uploaded', '', '', '', '2024-12-20 19:48:35'),
(315, '6', 'pronex_repo_msg_315', 'good and you ??', 'file_and_message', '2', 'birt', 'file_not_uploaded', '', '', '', '2024-12-20 19:48:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_inbox`
--
ALTER TABLE `personal_inbox`
  ADD PRIMARY KEY (`repository_msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_inbox`
--
ALTER TABLE `personal_inbox`
  MODIFY `repository_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
