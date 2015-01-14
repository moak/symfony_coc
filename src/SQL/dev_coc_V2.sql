-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 10:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_coc`
--

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_583D1F3E5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_user`
--

CREATE TABLE IF NOT EXISTS `fos_user_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_C560D76199E6F5DF` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `player_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
(1, 1, 'seyaa', 'seyaa', 'barbot.max@gmail.com', 'barbot.max@gmail.com', 1, 'i3syfi1jths8c44gg0cgkgo0800wcc0', 'zVZayv0CwNMGOi1D1V/YNMIIyN4OVs0QSr8QWwGjbhy/XjZdEfuqYRowKQh+VSR7Zlf0/M9EV012+OPt/ROFJA==', '2015-01-14 18:25:51', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2015-01-14 17:42:25', '2015-01-14 18:25:51', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(2, 3, 'ludox', 'ludox', 'lchervel@gmail.fr', 'lchervel@gmail.fr', 1, '1dixoovi0n8k800c8kk080s4o8s4ww4', '1yZwA/Jl7HlfF0Dz04cnfImgetDTQTh9luflv7ukGFZ6deuG6BEZnp7z2iWTa1ISHXr8WVfCW7pdguUUPK8Upg==', '2015-01-14 18:28:55', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2015-01-14 18:19:33', '2015-01-14 18:28:55', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(3, 2, 'saiyya', 'saiyya', 'christianba27@orange.fr', 'christianba27@orange.fr', 1, '59mo7kowet4wgwskwk4sk4kws44c8so', 'jmJt9/hd/PtxYA/azNfKprke8wA444MT9IwxYtXF74cxEVMKxtG8wMObJwkQQGpqTMu2LUK/AHx/mcNGp3wqlA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-01-14 19:10:54', '2015-01-14 19:10:54', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_B3C77447A76ED395` (`user_id`),
  KEY `IDX_B3C77447FE54D947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagebase`
--

CREATE TABLE IF NOT EXISTS `imagebase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `hall_town` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F7F61A55A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `imagebestattack`
--

CREATE TABLE IF NOT EXISTS `imagebestattack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `gold` int(11) NOT NULL,
  `elixir` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B9BCD432A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `imagebestattack`
--

INSERT INTO `imagebestattack` (`id`, `user_id`, `gold`, `elixir`, `path`) VALUES
(1, NULL, 14, 3, NULL),
(2, NULL, 452453, 45343, 'Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hall_town` int(11) NOT NULL,
  `troop_received` int(11) DEFAULT NULL,
  `troop_sent` int(11) DEFAULT NULL,
  `attack_won` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `trophy` int(11) DEFAULT NULL,
  `canon1` int(11) DEFAULT NULL,
  `canon2` int(11) DEFAULT NULL,
  `canon3` int(11) DEFAULT NULL,
  `canon4` int(11) DEFAULT NULL,
  `canon5` int(11) DEFAULT NULL,
  `canon6` int(11) DEFAULT NULL,
  `tower_archer1` int(11) DEFAULT NULL,
  `tower_archer2` int(11) DEFAULT NULL,
  `tower_archer3` int(11) DEFAULT NULL,
  `tower_archer4` int(11) DEFAULT NULL,
  `tower_archer5` int(11) DEFAULT NULL,
  `tower_archer6` int(11) DEFAULT NULL,
  `tower_magic1` int(11) DEFAULT NULL,
  `tower_magic2` int(11) DEFAULT NULL,
  `tower_magic3` int(11) DEFAULT NULL,
  `tower_magic4` int(11) DEFAULT NULL,
  `mortar1` int(11) DEFAULT NULL,
  `mortar2` int(11) DEFAULT NULL,
  `mortar3` int(11) DEFAULT NULL,
  `mortar4` int(11) DEFAULT NULL,
  `tesla1` int(11) DEFAULT NULL,
  `tesla2` int(11) DEFAULT NULL,
  `tesla3` int(11) DEFAULT NULL,
  `inferno1` int(11) DEFAULT NULL,
  `inferno2` int(11) DEFAULT NULL,
  `king` int(11) DEFAULT NULL,
  `queen` int(11) DEFAULT NULL,
  `arcx1` int(11) DEFAULT NULL,
  `arcx2` int(11) DEFAULT NULL,
  `arcx3` int(11) DEFAULT NULL,
  `archer` int(11) DEFAULT NULL,
  `barbar` int(11) DEFAULT NULL,
  `gobelin` int(11) DEFAULT NULL,
  `geant` int(11) DEFAULT NULL,
  `wall_breaker` int(11) DEFAULT NULL,
  `ballon` int(11) DEFAULT NULL,
  `wizard` int(11) DEFAULT NULL,
  `healer` int(11) DEFAULT NULL,
  `dragon` int(11) DEFAULT NULL,
  `pekka` int(11) DEFAULT NULL,
  `potion_heal` int(11) DEFAULT NULL,
  `potion_boost` int(11) DEFAULT NULL,
  `potion_damage` int(11) DEFAULT NULL,
  `potion_green` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9FB57F534EC001D1` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `season_id`, `name`, `hall_town`, `troop_received`, `troop_sent`, `attack_won`, `level`, `trophy`, `canon1`, `canon2`, `canon3`, `canon4`, `canon5`, `canon6`, `tower_archer1`, `tower_archer2`, `tower_archer3`, `tower_archer4`, `tower_archer5`, `tower_archer6`, `tower_magic1`, `tower_magic2`, `tower_magic3`, `tower_magic4`, `mortar1`, `mortar2`, `mortar3`, `mortar4`, `tesla1`, `tesla2`, `tesla3`, `inferno1`, `inferno2`, `king`, `queen`, `arcx1`, `arcx2`, `arcx3`, `archer`, `barbar`, `gobelin`, `geant`, `wall_breaker`, `ballon`, `wizard`, `healer`, `dragon`, `pekka`, `potion_heal`, `potion_boost`, `potion_damage`, `potion_green`, `updated_at`) VALUES
(1, NULL, 'Seyaa', 8, 100, 250, 62, 65, 1164, 9, 9, 9, 9, 9, 0, 8, 8, 8, 8, 8, 0, 5, 5, 6, 0, 6, 6, 6, 6, 3, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 5, NULL, 5, 4, 3, 5, 3, 2, 1, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Saiyya', 8, 80, 25, 41, 60, 1238, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 7, 0, 4, 4, 5, 0, 6, 5, 5, 4, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, NULL, 4, 3, 1, 4, 2, 3, 0, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Lu', 8, 694, 929, 77, 69, 1291, 8, 9, 9, 9, 8, 0, 8, 8, 8, 8, 8, 0, 5, 4, 4, 0, 5, 5, 6, 6, 2, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, NULL, 4, 4, 4, 5, 3, 3, 0, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `name`, `start`, `end`) VALUES
(1, 'Season 1', '2014-12-22 06:00:00', '2014-12-29 06:00:00'),
(2, 'Season 2', '2014-12-29 06:00:00', '2015-01-05 06:00:00'),
(3, 'Season 3', '2015-01-05 06:00:00', '2015-01-19 06:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_id`, `season_id`, `name`, `hall_town`, `troop_received`, `troop_sent`, `attack_won`, `level`, `trophy`) VALUES
(1, NULL, 1, 'Lu', 8, 669, 1340, 116, 60, 1340),
(2, NULL, 1, 'NINJA', 8, 20, 20, 1, 75, 1936),
(3, NULL, 1, 'Seer lously', 7, 40, 98, 12, 57, 1520),
(4, NULL, 1, 'Salemsalam', 8, 75, 61, 2, 62, 1352),
(5, NULL, 1, 'alien', 7, 410, 393, 161, 46, 1319),
(6, NULL, 1, 'Saiyya', 7, 120, 181, 83, 54, 1312),
(7, NULL, 1, 'jb', 7, 255, 74, 6, 46, 1256),
(8, NULL, 1, 'MOMO', 7, 560, 181, 55, 48, 1240),
(9, NULL, 1, 'MOUSS le barbar', 7, 80, 40, 30, 48, 1220),
(10, NULL, 1, 'sapeur coco', 6, 255, 110, 11, 43, 1187),
(11, NULL, 1, 'kingrom', 24, 229, 49, 10, 39, 1170),
(12, NULL, 1, 'Léonie', 6, 55, 0, 3, 36, 1085),
(13, NULL, 1, 'guitouman', 8, 280, 129, 16, 65, 1085),
(14, NULL, 1, 'the moine eau', 8, 386, 764, 11, 71, 1081),
(15, NULL, 1, 'Zeus', 6, 218, 141, 22, 33, 1079),
(16, NULL, 1, 'le seur', 5, 30, 30, 16, 33, 1052),
(17, NULL, 1, 'Ragnar', 7, 244, 35, 30, 45, 1046),
(18, NULL, 1, 'arachati', 9, 60, 69, 63, 67, 970),
(19, NULL, 1, 'Pullin', 5, 75, 6, 9, 27, 910),
(20, NULL, 1, 'RakHaMO', 5, 0, 0, 45, 23, 855),
(21, NULL, 1, 'Seyaa', 8, 240, 575, 89, 60, 1324),
(22, NULL, 2, 'Seyaa', 8, 445, 674, 78, 64, 1139),
(23, NULL, 2, 'Lu', 8, 1612, 1840, 172, 67, 1371),
(24, NULL, 2, 'NINJA', 8, 0, 0, 1, 76, 1870),
(25, NULL, 2, 'alien', 7, 344, 274, 143, 51, 1349),
(26, NULL, 2, 'Saiyya', 7, 103, 181, 94, 58, 1312),
(27, NULL, 2, 'MOMO', 7, 894, 367, 63, 53, 1268),
(28, NULL, 2, 'MOUSS le barbar', 81, 49, 40, 48, 52, 1274),
(29, NULL, 2, 'sapeur coco', 6, 243, 84, 18, 46, 1164),
(30, NULL, 2, 'kingrom', 6, 229, 228, 34, 42, 1172),
(31, NULL, 2, 'Léonie', 7, 55, 45, 102, 45, 1402),
(32, NULL, 2, 'Guitouman', 8, 1645, 1712, 59, 70, 1335),
(33, NULL, 2, 'the moine eau', 8, 246, 191, 18, 74, 1095),
(34, NULL, 2, 'Zeus', 7, 218, 36, 41, 37, 1184),
(35, NULL, 2, 'le seur', 6, 45, 26, 79, 41, 1115),
(36, NULL, 2, 'Ragnar', 7, 187, 123, 48, 50, 1326),
(37, NULL, 2, 'arachati', 9, 35, 18, 61, 69, 1228),
(38, NULL, 2, 'RakHaMO', 5, 30, 15, 87, 33, 1025);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `war`
--

CREATE TABLE IF NOT EXISTS `war` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `result` int(11) NOT NULL,
  `opponent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `war`
--

INSERT INTO `war` (`id`, `start`, `end`, `result`, `opponent`) VALUES
(1, '2015-01-12 23:00:00', '2015-01-14 23:00:00', 0, 'PALOMOS');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fos_user_user`
--
ALTER TABLE `fos_user_user`
  ADD CONSTRAINT `FK_C560D76199E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_user_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `imagebase`
--
ALTER TABLE `imagebase`
  ADD CONSTRAINT `FK_F7F61A55A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`);

--
-- Constraints for table `imagebestattack`
--
ALTER TABLE `imagebestattack`
  ADD CONSTRAINT `FK_B9BCD432A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_9FB57F534EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `FK_34B0844E4EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  ADD CONSTRAINT `FK_34B0844EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
