-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 06:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 0, 7, 'hi', '2020-07-10 13:19:25', 1),
(2, 7, 6, 'hi', '2020-07-10 13:22:52', 0),
(3, 6, 7, 'hello', '2020-07-10 13:26:07', 0),
(4, 6, 7, 'hi', '2020-07-10 13:31:57', 0),
(5, 6, 7, 'sagar jha', '2020-07-10 13:43:31', 0),
(6, 6, 8, 'hi', '2020-07-10 13:54:39', 0),
(7, 6, 9, 'I am idiot', '2020-07-10 14:18:23', 0),
(8, 9, 6, 'yess you are', '2020-07-10 14:19:06', 0),
(9, 6, 9, 'hello', '2020-07-10 15:00:18', 1),
(10, 8, 6, 'hi', '2020-07-10 15:02:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `created_at`) VALUES
(6, 'sagar', '$2y$10$vid9PKXR/1P04fyC9Vm6peM5OqGUZm./rjVIhUnIJKLRXx.0BYWeS', '2020-07-10 17:10:25'),
(7, 'Augest walker', '$2y$10$kLJRNejkY44c/JX/vXuks.Edviw5jwOSTTheNQv5H9qedTDVJI4dO', '2020-07-10 17:42:14'),
(8, 'akash', '$2y$10$klSLAUBrm8fEQXAoomK7cOamJqPjpMO0J74Vpgv4/fmL8KoDibq1e', '2020-07-10 19:21:46'),
(9, 'kanchan', '$2y$10$krWjvRl7xTpBrEmJVgInmOferc9vAD6KYAuwuFh8ccITs5QVQSrDi', '2020-07-10 19:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 4, '2020-07-10 10:16:58', 'no'),
(2, 5, '2020-07-10 10:18:50', 'no'),
(3, 4, '2020-07-10 10:19:06', 'no'),
(4, 5, '2020-07-10 10:27:17', 'no'),
(5, 4, '2020-07-10 10:32:22', 'no'),
(6, 5, '2020-07-10 10:53:28', 'no'),
(7, 4, '2020-07-10 11:10:36', 'no'),
(8, 6, '2020-07-10 11:40:45', 'no'),
(9, 6, '2020-07-10 12:10:58', 'no'),
(10, 7, '2020-07-10 13:19:49', ''),
(11, 6, '2020-07-10 13:23:03', 'no'),
(12, 7, '2020-07-10 13:44:32', 'no'),
(13, 6, '2020-07-10 13:51:23', 'no'),
(14, 8, '2020-07-10 14:01:51', 'no'),
(15, 8, '2020-07-10 14:11:06', 'no'),
(16, 9, '2020-07-10 14:16:04', 'no'),
(17, 9, '2020-07-10 14:18:26', 'no'),
(18, 6, '2020-07-10 14:19:11', 'no'),
(19, 9, '2020-07-10 15:00:31', 'no'),
(20, 6, '2020-07-10 15:04:11', 'no'),
(21, 9, '2020-07-10 15:06:47', 'no'),
(22, 9, '2020-07-10 16:44:01', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
