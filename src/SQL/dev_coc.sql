-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 03:14 AM
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
-- Table structure for table `categoryimage`
--

CREATE TABLE IF NOT EXISTS `categoryimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categoryimage`
--

INSERT INTO `categoryimage` (`id`, `name`) VALUES
(1, 'test category'),
(2, 'test category'),
(3, 'categoiry 2');

-- --------------------------------------------------------

--
-- Table structure for table `chatmessage`
--

CREATE TABLE IF NOT EXISTS `chatmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `channel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_61735696F675F31B` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
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
  `player_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A647999E6F5DF` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `player_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_C560D76199E6F5DF` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`, `player_id`) VALUES
(4, 'admin', 'admin', 'admin@admin.com', 'admin@admin.com', 1, 'bdnb0gjkoa8s4ckk888cosgsww0sg80', '2dCOhjClUClJMwW9Pa85xa9T5MITXOn+cGnxNexLkShSKxri7zNnIKov5wHu66aU0/MNfNkodY5QmUnSQ40reQ==', '2015-01-11 05:03:10', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2015-01-06 23:50:39', '2015-01-11 05:03:10', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 1),
(5, 'test', 'test', 'tets@test.com', 'tets@test.com', 1, 'qooonmaqtu8804go0cko0gcwk4w0880', 'tlPsDTkkqVVktKCi/Az53kHRdo/+7tCaOW/szYcs8+YKeFnKcYLG8wKA58vA2vB2q254AWtOVuENfO0TlLqztg==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-01-10 14:12:29', '2015-01-10 14:12:29', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, NULL),
(6, 'saiyya', 'saiyya', 'christianba27@orange.fr', 'christianba27@orange.fr', 1, 'oe8g3tsji9wg0gsws8g8k4cg0oos4s', 'BDaOeRcUgzLExk5fNe5PCXX8bKeWICdZc9mod+LJRurC7ZynbBf4LKzSzHridUhP/nBd0nHeXm2q3DmIaBetwg==', '2015-01-10 15:48:07', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-01-10 15:38:24', '2015-01-10 15:48:07', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 2);

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
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6DC044C55E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_image_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4FC2B5BA76ED395` (`user_id`),
  KEY `IDX_4FC2B5B8ADFA116` (`category_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `user_id`, `category_image_id`, `name`, `path`) VALUES
(1, NULL, 1, 'test image', NULL),
(2, NULL, 1, 'dfgdfg', '2014-08-01 16.48.07.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `imagebase`
--

INSERT INTO `imagebase` (`id`, `user_id`, `hall_town`, `path`) VALUES
(1, NULL, 8, 'base2.jpg'),
(2, NULL, 8, 'base3.jpg'),
(3, NULL, 8, 'base1.jpg'),
(4, NULL, 7, '2014-11-27 16.54.46.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `imagebestattack`
--

INSERT INTO `imagebestattack` (`id`, `user_id`, `gold`, `elixir`, `path`) VALUES
(2, NULL, 351212, 2, '2014-12-24 18.03.27.png'),
(4, NULL, 277, 279, 'Screenshot_2015-01-06-19-38-30.png'),
(5, NULL, 500000000, 1000000, 'fond-ecran-3d-abstrait-692.jpg'),
(6, NULL, 14, 41, NULL),
(7, NULL, 900000000, 900000000, 'Lighthouse.jpg');

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
  `canon1` int(11) DEFAULT NULL,
  `canon2` int(11) DEFAULT NULL,
  `canon3` int(11) DEFAULT NULL,
  `canon4` int(11) DEFAULT NULL,
  `canon5` int(11) DEFAULT NULL,
  `canon6` int(11) DEFAULT NULL,
  `inferno1` int(11) DEFAULT NULL,
  `inferno2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9FB57F534EC001D1` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `season_id`, `name`, `hall_town`, `troop_received`, `troop_sent`, `attack_won`, `level`, `trophy`, `tower_archer1`, `tower_archer2`, `tower_archer3`, `tower_archer4`, `tower_archer5`, `tower_archer6`, `tower_magic1`, `tower_magic2`, `tower_magic3`, `tower_magic4`, `mortar1`, `mortar2`, `mortar3`, `mortar4`, `tesla1`, `tesla2`, `tesla3`, `king`, `queen`, `arcx1`, `arcx2`, `arcx3`, `archer`, `barbar`, `gobelin`, `geant`, `wall_breaker`, `ballon`, `wizard`, `healer`, `dragon`, `pekka`, `potion_heal`, `potion_boost`, `potion_damage`, `potion_green`, `canon1`, `canon2`, `canon3`, `canon4`, `canon5`, `canon6`, `inferno1`, `inferno2`) VALUES
(1, 3, 'Seyaa', 7, 132, 1651, 5, 78, 1232, 8, 8, 8, 8, 8, 0, 5, 5, 5, 0, 6, 6, 6, 5, 3, 3, 2, 0, 0, 0, 0, 0, 4, 4, 0, 5, 4, 3, 5, 3, 2, 1, 0, 0, 0, 0, 10, 9, 9, 9, 9, 0, 0, 0),
(2, 3, 'Saiyya', 8, 20, 25, 28, 59, 1267, 8, 8, -188888, 8, 8, 7, 3, 4, 5, 0, 5, 5, 5, 4, 1, 1, 1, 0, 0, 0, 0, 0, 4, 4, 0, 4, 3, 1, 4, 2, 2, 0, 0, 0, 0, 0, 8, 8, 8, 8, 8, 8, 0, 0),
(3, NULL, 'ghjghj', 14, 41, 41, 41, 41, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
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
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `url`, `title`) VALUES
(8, '<iframe width=''100%'' height=''200'' src="//www.youtube.com/embed/ndt9_295HfY" allowfullscreen></iframe>', 'eeeeeee'),
(9, '<iframe width=''100%'' height=''200'' src="//www.youtube.com/embed/ndt9_295HfY" allowfullscreen></iframe>', 'lolilol'),
(10, '<iframe width=''100%'' height=''200'' src="//www.youtube.com/embed/Il0DZ7h1VQY" allowfullscreen></iframe>', 'alfa'),
(11, '<iframe width=''100%'' height=''200'' src="//www.youtube.com/embed/1-I7S8nZeEE" allowfullscreen></iframe>', 'le dragster'),
(12, '<iframe width=''100%'' height=''200'' src="//www.youtube.com/embed/1-I7S8nZeEE" allowfullscreen></iframe>', 'le dragster');

-- --------------------------------------------------------

--
-- Table structure for table `war`
--

CREATE TABLE IF NOT EXISTS `war` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `war`
--

INSERT INTO `war` (`id`, `start`, `end`, `result`) VALUES
(7, '2015-01-09 23:00:00', '2015-01-11 23:00:00', 0),
(21, '2015-01-14 00:00:00', '2015-01-16 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chatmessage`
--
ALTER TABLE `chatmessage`
  ADD CONSTRAINT `FK_61735696F675F31B` FOREIGN KEY (`author_id`) REFERENCES `fos_user_user` (`id`);

--
-- Constraints for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A647999E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

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
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_4FC2B5B8ADFA116` FOREIGN KEY (`category_image_id`) REFERENCES `categoryimage` (`id`),
  ADD CONSTRAINT `FK_4FC2B5BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`);

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
