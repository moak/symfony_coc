-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2015 at 01:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoryimage`
--

CREATE TABLE IF NOT EXISTS `categoryimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `categoryimage`
--

INSERT INTO `categoryimage` (`id`, `name`) VALUES
(77, 'Best attacks'),
(78, 'Worst attacks'),
(79, 'Funny images');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4FC2B5BA76ED395` (`user_id`),
  KEY `IDX_4FC2B5B8ADFA116` (`category_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `path`, `alt`, `user_id`, `category_image_id`) VALUES
(18, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSE0LF-OQQHIgiyPvU4M-5N1cBHPdgxqD7k6K5dMKOe5UbR4N2v5w', 'best attack ever', 58, 77);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `name`, `start`, `end`) VALUES
(77, 'Season 1', '2014-12-22 06:00:00', '2014-12-29 06:00:00'),
(78, 'Season 2', '2014-12-29 06:00:00', '2015-01-05 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hall_town` int(11) NOT NULL,
  `troop_received` int(11) NOT NULL,
  `troop_sent` int(11) NOT NULL,
  `attack_won` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `trophy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34B0844EA76ED395` (`user_id`),
  KEY `IDX_34B0844E4EC001D1` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_id`, `season_id`, `name`, `hall_town`, `troop_received`, `troop_sent`, `attack_won`, `level`, `trophy`) VALUES
(1, NULL, 77, 'Seyaa', 8, 240, 575, 92, 60, 1139),
(2, NULL, 77, 'Lu', 8, 669, 1340, 116, 60, 1340),
(3, NULL, 77, 'NINJA', 8, 20, 20, 1, 75, 1936),
(4, NULL, 77, 'Seer lously', 7, 40, 98, 12, 57, 1520),
(5, NULL, 77, 'Salemsalam', 8, 75, 61, 2, 62, 1352),
(6, NULL, 77, 'alien', 7, 410, 393, 161, 46, 1319),
(7, NULL, 77, 'Saiyya', 7, 120, 181, 83, 54, 1312),
(8, NULL, 77, 'jb', 7, 255, 74, 6, 46, 1256),
(9, NULL, 77, 'MOMO', 7, 560, 181, 55, 48, 1240),
(10, NULL, 77, 'MOUSS le barbar', 7, 80, 40, 30, 48, 1220),
(11, NULL, 77, 'sapeur coco', 6, 255, 110, 11, 43, 1187),
(12, NULL, 77, 'kingrom', 24, 229, 49, 10, 39, 1170),
(13, NULL, 77, 'Léonie', 6, 55, 0, 3, 36, 1085),
(14, NULL, 77, 'guitouman', 8, 280, 129, 16, 65, 1085),
(15, NULL, 77, 'the moine eau', 8, 386, 764, 11, 71, 1081),
(16, NULL, 77, 'Zeus', 6, 218, 141, 22, 33, 1079),
(17, NULL, 77, 'le seur', 5, 30, 30, 16, 33, 1052),
(18, NULL, 77, 'Ragnar', 7, 244, 35, 30, 45, 1046),
(19, NULL, 77, 'arachati', 9, 60, 69, 63, 67, 970),
(20, NULL, 77, 'Pullin', 5, 75, 6, 9, 27, 910),
(21, NULL, 77, 'RakHaMO', 5, 0, 0, 45, 23, 855),
(22, NULL, 78, 'Seyaa', 8, 564, 4563, 89, 87, 1324);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(58, 'admin', 'admin', 'barbot.max@gmail.com', 'barbot.max@gmail.com', 1, 'k1d2k8d3u8gcwo8sg0w4s0ggowckccs', 'L5ffsf54g2i3U3TR7faGgZ1D5sASu2Hh7fwTmddJ7vwebh04xJCECMzYiDtJNmtApp0hA9cKkVxfkG3iOX5rtw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL),
(59, 'System', 'system', 'system@example.com', 'system@example.com', 1, 'bacn7b4xwxwggogs4wgoogkg0w8g0g', 'p7pjQRbGVnY9EdOHJin1ytz9U2uUEoh7eA0P0Flbcrb1dYPGTwlqGegAYpDN49bXOFnIDW/qXb5QZWRayRJecQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_4FC2B5B8ADFA116` FOREIGN KEY (`category_image_id`) REFERENCES `categoryimage` (`id`),
  ADD CONSTRAINT `FK_4FC2B5BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `FK_34B0844E4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  ADD CONSTRAINT `FK_34B0844EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
