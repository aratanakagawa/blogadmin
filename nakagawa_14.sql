-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2018 at 02:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nakagawa_14`
--

-- --------------------------------------------------------

--
-- Table structure for table `nakagawa_14_content`
--

CREATE TABLE IF NOT EXISTS `nakagawa_14_content` (
`content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `regi_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nakagawa_14_content`
--

INSERT INTO `nakagawa_14_content` (`content_id`, `user_id`, `title`, `content`, `regi_date`, `modified_date`) VALUES
(5, 2, '財布を', '無くした', '2018-03-07 19:30:35', '2018-03-09 22:26:38'),
(9, 2, '昨日は', '疲れた', '2018-03-08 23:37:56', '2018-03-09 22:26:20'),
(10, 2, '今日は', '晴れだった', '2018-03-08 23:42:20', '2018-03-09 22:26:08'),
(11, 19, '0307', 're', '2018-03-09 00:27:01', NULL),
(13, 2, 'なかがわ', 'coffee', '2018-03-09 20:46:47', '2018-03-09 20:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `nakagawa_14_user_master`
--

CREATE TABLE IF NOT EXISTS `nakagawa_14_user_master` (
`user_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pword` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `regi_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nakagawa_14_user_master`
--

INSERT INTO `nakagawa_14_user_master` (`user_id`, `name`, `pword`, `regi_date`) VALUES
(1, 'なかがわ', 'arata', '2018-03-04 18:35:02'),
(2, 'なかがわ', 'ara', '2018-03-04 18:35:30'),
(3, 'なかがわ', 'xxx', '2018-03-04 18:43:44'),
(4, 'なかがわ', 'oooo', '2018-03-04 18:47:49'),
(5, 'なかがわ', 'tttt', '2018-03-04 18:52:31'),
(6, 'やまなか', 'rrr', '2018-03-05 19:03:44'),
(7, 'harada', 'yprtk', '2018-03-05 20:47:00'),
(8, '1258144', 'rea', '2018-03-05 20:48:41'),
(9, '1258144', 'ra', '2018-03-05 20:49:44'),
(10, '1258144', '', '2018-03-05 20:50:10'),
(11, 'Naka', 'yrtr', '2018-03-06 23:12:24'),
(12, 're', 'yr', '2018-03-06 23:14:21'),
(13, 'kato', 'kato', '2018-03-08 23:47:15'),
(14, '125777_3', '125777_3', '2018-03-08 23:52:12'),
(15, '1', '1', '2018-03-08 23:59:18'),
(16, '2', '2', '2018-03-09 00:00:25'),
(17, 'e', 'e', '2018-03-09 00:21:21'),
(18, 'r', 'r', '2018-03-09 00:22:08'),
(19, 'q', 'q', '2018-03-09 00:22:51'),
(20, 'yoshi', 'yoshi', '2018-03-09 20:47:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nakagawa_14_content`
--
ALTER TABLE `nakagawa_14_content`
 ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `nakagawa_14_user_master`
--
ALTER TABLE `nakagawa_14_user_master`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nakagawa_14_content`
--
ALTER TABLE `nakagawa_14_content`
MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nakagawa_14_user_master`
--
ALTER TABLE `nakagawa_14_user_master`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
