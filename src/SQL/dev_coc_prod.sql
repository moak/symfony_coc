-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2015 at 09:05 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.36-0+deb7u3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `clan`
--

CREATE TABLE IF NOT EXISTS `clan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clan`
--

INSERT INTO `clan` (`id`, `created_at`, `name`, `description`) VALUES
(1, '2014-12-01 00:00:00', 'CSP', 'Clan de ouf !!!'),
(2, NULL, 'Zizi dur clan', 'Allez paris dimanche les gars !!'),
(3, NULL, NULL, NULL);

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
  `clan_id` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `clanName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_C560D76199E6F5DF` (`player_id`),
  KEY `IDX_C560D761BEAF84C8` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `player_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `clan_id`, `phone`, `clanName`) VALUES
(1, 1, 'seyaa', 'seyaa', 'seyaa@seyaa.com', 'seyaa@seyaa.com', 1, 'e725cv4602ok8gcw44c880swgckskgk', 'kLH8vJYoKVtJZWhyxMj0HJ1pY1R9sC2a6wwtWsmmMJhqMbrP8bxHr0fvV+4fGvSajUjJIW86hBOcttTW2pX+rw==', '2015-02-10 01:43:17', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:10:"ROLE_ADMIN";i:1;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, 1, NULL, NULL),
(2, 2, 'ludox', 'ludox', 'lchervel@gmail.com', 'lchervel@gmail.com', 1, '22udm7ro0aqsw44040cw4ggc08o8c8k', 'FjQsR4vcs6SRKHsrJ7KLHaUJ8iHVu/gCe2GPMJ5L3KWVjDYD8L8KVrg9YDirjisfn6mYUKEcWiLAKua+7/6LLw==', '2015-02-14 18:48:29', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:10:"ROLE_ADMIN";i:1;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, 1, NULL, NULL),
(3, 3, 'saiyya', 'saiyya', 'christianba27@orange.fr', 'christianba27@orange.fr', 1, 'ib1jwrpmcf4k4ggw4gc4kowc0ooksow', 'LJcNSBA2XXRi2jkbJ2K5VgGkli6gsgzVrzzhGrN1rl4zDKFIU32G59rNsfphMRXonjt9Zc6GW9Vo8nE/AIpoag==', '2015-02-16 16:24:21', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(4, 13, 'simon', 'simon', 'le_seur@hotmail.fr', 'le_seur@hotmail.fr', 1, 'qjid7hhbu7ko04gk0480gsc0ogwsg0o', 'pZsiiE3nz37cYOqQwknvJrVcHLazZP/ipbQ1NRZC4pTEYzxxld6BysEqEy3FdRbDVdQ2SJ59wPcWKm1a9nTGVA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(5, 7, 'Tom', 'tom', 'thomas.courte@yahoo.fr', 'thomas.courte@yahoo.fr', 1, 'ix29do4ibz4gkgksg0g0wog8c8gg4wg', 'KSfbaBDBESqSIDhDVi3ilN775ty8qGT4PIsrNZNTbDWhO8j+jRrt7ICpW+tpcj8B1o5eVUXBfvfeyxIx0UVl8Q==', '2015-02-10 19:46:24', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(6, 17, 'Coucou lapinou', 'coucou lapinou', 'leboucher.a@gmail.com', 'leboucher.a@gmail.com', 1, '254z318b60pw0wkoowk088osw8k0gow', 'M9paV82EA+95kASyK2U7bOyKVbqKlvIvRjZgIyZ9dl+L1hc3YpNlZ7PdvuG02jc8FP/HNVNWwEuN0VjUNtA+lg==', '2015-02-16 00:21:45', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(7, 9, 'Sapeur-coco27', 'sapeur-coco27', 'degrolard.aurelien@orange.fr', 'degrolard.aurelien@orange.fr', 1, '9nm5bogry6sc4w88os0w88s84c4wswo', 'u461m2M43v1ZOaWLY4ZKXF8slpGrd6oXZvyDbcdRQV7bxu2D3z8vPyuHP52Gp845C8+IqUuG57ZNrVHsLtDWpg==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(8, 6, 'Arachati', 'arachati', 'luka3@hotmail.fr', 'luka3@hotmail.fr', 1, '6dmglo373rkscogsok0k844o84gs80g', 'qlr+j2oRqeG3bYt02/AlyuMpEUEgLFHmodJeEYuX944LWaAmYVC+7G4X6uboAKKTWcyoUPvKJxHx87dRN6H5DA==', '2015-01-20 08:43:03', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(9, 19, 'guitouman', 'guitouman', 'guillaume6199@gmail.com', 'guillaume6199@gmail.com', 1, 'h6evhq0k4w840g0gwgoc84skkcsog00', '4sjl6Nzhfdw9RNLqYEDT+lyW7piHOz6qEdtoXgqGTG9yz86lEak7A20nHd4q1TM2ETNJbhWRNoAu67RCmYhfZQ==', '2015-01-26 20:59:46', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 1, NULL, NULL),
(10, 14, 'Rakhamo', 'rakhamo', 'Thomas.grenier27250@gmail.com', 'thomas.grenier27250@gmail.com', 1, 'bomdu08b2jcckwc8wg8ccok4csc4cwg', 'r74pfb9NstORk3kAVHFTnxbzyf0QsFZPuBOoO7PA9UvOfrPhrFUwYvQ9UFhVJ8sYf7bdJBHiu42wG7A42HRPAw==', '2015-02-10 21:08:18', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 1, NULL, NULL),
(11, 18, 'dragma', 'dragma', 'florent@bejina.fr', 'florent@bejina.fr', 1, 'swjnrp8oym8wskgs0og8wwgg48wc808', 'mJ7424k8bfhVllvh6iq+mReqFWqu0L+KfWU7WQMzduyriHVxxWwHVdxMP6BMCpzYZP4V6dGTb+0v2kGXQOW3Kg==', '2015-02-09 16:32:51', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 1, NULL, NULL),
(12, 11, 'The Moine Eau', 'the moine eau', 'romino61@hotmail.fr', 'romino61@hotmail.fr', 1, 'd44ofx0ndiosgwwg8ocogcogscc8sks', '84O1SSeA0FsFuTFrf6624qLdInX2rGF0/ZeuLiEnDGGMMOkaKDqI0BiI9IZtt7a/6OD9CPh2IPFFdIlPhnZgDg==', '2015-02-13 11:29:19', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL),
(13, 8, 'momo', 'momo', 'momo@momo.momo', 'momo@momo.momo', 1, 'cn43c3f3jio8s80ck408gos88so4k8g', '6ZTEj18W6yAiCEVyj2M+avsczjawrl0a2JzlvP+rkqZ2kZ4aaEc+nrXqhxQ/WIMWg7tV9VgzcE+mq20Lz6yWuA==', '2015-01-31 15:24:35', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 1, NULL, NULL);

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
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `updated_at`, `path`) VALUES
(1, '2015-02-05 04:22:41', '202f26ed3335c2caeec0ea840e9e1e4b0272f592.png'),
(2, '2015-02-10 21:30:00', '7c535a5afaf349d7c50328a47ad1b7a2d9b40d86.jpeg'),
(3, '2015-02-11 02:22:20', '37dbd0165b6bfce13f2821023b2a3b98a50209bc.png'),
(4, '2015-02-11 02:53:29', 'b5870399815447ed4dbf8eaca9348e9cd72d497a.png');

-- --------------------------------------------------------

--
-- Table structure for table `imagebase`
--

CREATE TABLE IF NOT EXISTS `imagebase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `hall_town` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D53537C83DA5256D` (`image_id`),
  KEY `IDX_D53537C8A76ED395` (`user_id`),
  KEY `IDX_D53537C8BEAF84C8` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `imagebase`
--

INSERT INTO `imagebase` (`id`, `user_id`, `hall_town`, `image_id`, `clan_id`) VALUES
(1, 1, 6, 1, NULL),
(2, 1, 8, 2, NULL),
(3, 1, 7, 3, NULL),
(4, 1, 7, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imagebestattack`
--

CREATE TABLE IF NOT EXISTS `imagebestattack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `gold` int(11) NOT NULL,
  `elixir` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7988EC4A3DA5256D` (`image_id`),
  KEY `IDX_7988EC4AA76ED395` (`user_id`),
  KEY `IDX_7988EC4ABEAF84C8` (`clan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `imagebonus`
--

CREATE TABLE IF NOT EXISTS `imagebonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3087E5FF3DA5256D` (`image_id`),
  KEY `IDX_3087E5FFA76ED395` (`user_id`),
  KEY `IDX_3087E5FFBEAF84C8` (`clan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hall_town` int(11) DEFAULT NULL,
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
  `air_defence1` int(11) DEFAULT NULL,
  `air_defence2` int(11) DEFAULT NULL,
  `air_defence3` int(11) DEFAULT NULL,
  `air_defence4` int(11) DEFAULT NULL,
  `minion` int(11) DEFAULT NULL,
  `rider` int(11) DEFAULT NULL,
  `valkyrie` int(11) DEFAULT NULL,
  `golem` int(11) DEFAULT NULL,
  `witch` int(11) DEFAULT NULL,
  `lava` int(11) DEFAULT NULL,
  `tower_archer7` int(11) DEFAULT NULL,
  `tesla4` int(11) DEFAULT NULL,
  `potion_freeze` int(11) DEFAULT NULL,
  `gold1` int(11) DEFAULT NULL,
  `gold2` int(11) DEFAULT NULL,
  `gold3` int(11) DEFAULT NULL,
  `gold4` int(11) DEFAULT NULL,
  `gold5` int(11) DEFAULT NULL,
  `gold6` int(11) DEFAULT NULL,
  `gold7` int(11) DEFAULT NULL,
  `elixir1` int(11) DEFAULT NULL,
  `elixir2` int(11) DEFAULT NULL,
  `elixir3` int(11) DEFAULT NULL,
  `elixir4` int(11) DEFAULT NULL,
  `elixir5` int(11) DEFAULT NULL,
  `elixir6` int(11) DEFAULT NULL,
  `elixir7` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_98197A65A76ED395` (`user_id`),
  KEY `IDX_98197A65BEAF84C8` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `user_id`, `updated_at`, `name`, `hall_town`, `troop_received`, `troop_sent`, `attack_won`, `level`, `trophy`, `canon1`, `canon2`, `canon3`, `canon4`, `canon5`, `canon6`, `tower_archer1`, `tower_archer2`, `tower_archer3`, `tower_archer4`, `tower_archer5`, `tower_archer6`, `tower_magic1`, `tower_magic2`, `tower_magic3`, `tower_magic4`, `mortar1`, `mortar2`, `mortar3`, `mortar4`, `tesla1`, `tesla2`, `tesla3`, `inferno1`, `inferno2`, `king`, `queen`, `arcx1`, `arcx2`, `arcx3`, `archer`, `barbar`, `gobelin`, `geant`, `wall_breaker`, `ballon`, `wizard`, `healer`, `dragon`, `pekka`, `potion_heal`, `potion_boost`, `potion_damage`, `potion_green`, `air_defence1`, `air_defence2`, `air_defence3`, `air_defence4`, `minion`, `rider`, `valkyrie`, `golem`, `witch`, `lava`, `tower_archer7`, `tesla4`, `potion_freeze`, `gold1`, `gold2`, `gold3`, `gold4`, `gold5`, `gold6`, `gold7`, `elixir1`, `elixir2`, `elixir3`, `elixir4`, `elixir5`, `elixir6`, `elixir7`, `clan_id`) VALUES
(1, 1, '2015-02-11 14:35:37', 'Seyaa', 7, NULL, NULL, 3, 70, 1288, 10, 10, 10, 10, 10, 0, 9, 9, 9, 9, 9, 0, 6, 6, 6, 0, 6, 6, 6, 6, 3, 3, 3, 0, 0, 7, 0, 0, 0, 0, 5, 5, 3, 5, 5, 5, 5, 3, 2, 1, 5, 4, 2, 0, 6, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 2, '2015-02-12 12:37:54', 'lu', 7, 85, 158, 6, 77, 1377, 10, 10, 10, 10, 10, 0, 10, 10, 9, 9, 9, 0, 6, 6, 6, 0, 6, 6, 6, 6, 4, 4, 4, 0, 0, 5, 0, 0, 0, 0, 5, 5, 4, 5, 5, 4, 5, 3, 3, 0, 5, 4, 3, 0, 6, 6, 6, 0, 1, 3, 1, 1, 0, 0, 0, 0, 0, 9, 10, 10, 10, 10, 10, 0, 10, 10, 10, 11, 10, 10, 0, 1),
(3, 3, '2015-02-16 16:25:24', 'Saiyya', 7, 0, 0, 0, 67, 1145, 10, 10, 10, 10, 10, 8, 9, 9, 9, 8, 8, 0, 6, 6, 6, 0, 6, 6, 6, 6, 1, 1, 1, 0, 0, 5, 0, 0, 0, 0, 5, 4, 3, 5, 4, 1, 4, 3, 3, 0, 3, 3, 3, 0, 4, 4, 5, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, 10, 10, 10, 10, 10, 11, 0, 10, 10, 10, 10, 10, 10, 0, 1),
(4, NULL, '2015-01-26 19:28:55', 'ninja', 7, NULL, NULL, NULL, 77, 1699, 10, 10, 10, 10, 10, 0, 9, 9, 9, 9, 9, 0, 5, 5, 5, 0, 6, 6, 6, 6, 3, 3, 3, 0, 0, 7, 0, 0, 0, 0, 5, 5, 3, 4, 2, 3, 5, 3, 2, 1, 3, 3, 4, 0, 5, 5, 5, 0, 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, NULL, '2015-02-08 18:09:37', 'Léonie', 7, NULL, NULL, NULL, 55, 1470, 8, 8, 8, 8, 8, 0, 7, 6, 7, 7, 7, 0, 4, 3, 3, 0, 4, 4, 3, 3, 1, 1, 1, 0, 0, 5, 0, 0, 0, 0, 4, 4, 3, 4, 3, 3, 3, 1, 3, 0, 1, 1, 1, 0, 4, 4, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 10, 7, 8, 7, 9, 8, 0, 9, 7, 7, 8, 8, 7, 0, 1),
(6, 8, '2015-02-09 04:56:16', 'arachati', 8, 45, 5, 12, 74, 1, 10, 9, 9, 9, 9, 0, 8, 8, 8, 7, 7, 7, 3, 3, 3, 3, 6, 6, 6, 6, 2, 1, 1, 0, 0, 5, 3, 1, 1, 0, 4, 5, 4, 4, 3, 4, 4, 2, 3, 0, 4, 4, 2, 1, 5, 5, 5, 4, 1, 1, 0, 0, 0, 0, 0, 1, 0, 12, 12, 12, 12, 11, 11, 0, 12, 12, 11, 11, 11, 11, 0, 1),
(7, 5, '2015-02-08 18:18:23', 'alien', 7, 30, 47, 7, 62, 1404, 10, 10, 10, 9, 9, 0, 7, 9, 10, 9, 8, 0, 4, 4, 2, 2, 6, 6, 5, 4, 2, 2, 1, 0, 0, 5, 0, 0, 0, 0, 4, 5, 4, 5, 4, 3, 4, 2, 2, 0, 4, 3, 2, 0, 5, 5, 6, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 10, 8, 8, 8, 9, 0, 9, 7, 7, 8, 8, 7, 0, 1),
(8, 13, '2015-02-08 18:24:01', 'momo', 7, NULL, NULL, NULL, 63, 1357, 9, 9, 9, 9, 9, 0, 8, 8, 8, 8, 8, 0, 4, 4, 3, 0, 5, 5, 5, 3, 2, 1, 3, 0, 0, 3, 0, 0, 0, 0, 4, 5, 3, 4, 4, 3, 5, 3, 1, 0, 3, 3, 3, 0, 4, 5, 5, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 10, 10, 10, 9, 9, 9, 0, 1),
(9, 7, '2015-02-08 18:19:45', 'sapeur coco', 5, NULL, NULL, NULL, 48, 1287, 7, 7, 7, 0, 0, 0, 7, 7, 7, 0, 0, 0, 3, 3, 0, 0, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 0, 3, 0, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, NULL, '2015-02-08 18:21:35', 'kingrom', 6, NULL, NULL, NULL, 49, 1224, 8, 8, 8, 8, 8, 0, 8, 7, 7, 7, 0, 0, 3, 3, 0, 0, 4, 4, 3, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 4, 4, 3, 4, 3, 3, 4, 1, 1, 0, 3, 0, 3, 0, 3, 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 12, '2015-02-08 18:26:57', 'the moine eau', 8, NULL, NULL, NULL, 79, 0, 10, 10, 10, 10, 10, 0, 9, 9, 9, 9, 8, 9, 4, 4, 4, 4, 5, 5, 5, 5, 2, 2, 2, 0, 0, 6, 1, 1, 0, 0, 5, 5, 4, 5, 5, 3, 6, 3, 2, 1, 5, 5, 4, 1, 5, 5, 5, 4, 1, 1, 0, 0, 0, 0, 0, 2, 0, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 1),
(12, NULL, '2015-02-08 18:38:02', 'chamboul', 5, NULL, NULL, NULL, 47, 0, 7, 7, 7, 0, 0, 0, 7, 7, 7, 0, 0, 0, 1, 2, 0, 0, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 0, 3, 0, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(13, 4, '2015-02-08 18:40:55', 'le seur', 7, NULL, NULL, NULL, 54, 1150, 8, 8, 8, 8, 7, 0, 8, 8, 8, 8, 0, 0, 4, 4, 0, 0, 4, 4, 4, 0, 2, 3, 0, 0, 0, 1, 0, 0, 0, 0, 4, 3, 3, 4, 3, 3, 3, 2, 2, 0, 4, 3, 3, 0, 5, 4, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(14, 10, '2015-02-16 04:27:25', 'Rakhamo', 6, NULL, NULL, 0, 48, 0, 7, 7, 7, 6, 5, 0, 7, 7, 7, 5, 0, 0, 3, 3, 0, 0, 4, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 1, 3, 1, 1, 0, 2, 0, 3, 0, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 10, 10, 8, 8, 6, 0, 10, 10, 10, 10, 8, 7, 0, 1),
(15, NULL, '2015-01-26 19:21:56', 'mouss le babar', 6, NULL, NULL, NULL, 56, 0, 8, 8, 8, 8, 8, 0, 8, 8, 8, 8, 0, 0, 4, 4, 0, 0, 5, 5, 5, 0, 2, 3, 0, 0, 0, 1, 0, 0, 0, 0, 4, 4, 4, 4, 4, 2, 3, 2, 1, 0, 3, 3, 3, 0, 5, 5, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(16, NULL, '2015-02-08 18:47:39', 'Ragnar', 7, NULL, NULL, NULL, 60, 0, 9, 9, 9, 9, 9, 0, 8, 8, 8, 8, 8, 0, 3, 4, 4, 0, 6, 6, 5, 5, 1, 2, 2, 0, 0, 2, 0, 0, 0, 0, 4, 4, 3, 5, 3, 2, 4, 2, 2, 0, 4, 3, 3, 0, 3, 4, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(17, 6, '2015-02-16 00:25:51', 'coucou lapinou', 8, NULL, NULL, NULL, 74, 0, 10, 10, 9, 9, 9, 0, 9, 9, 8, 8, 8, 8, 5, 4, 4, 4, 6, 6, 6, 6, 2, 2, 2, 0, 0, 5, 1, 0, 0, 0, 5, 5, 4, 5, 5, 3, 5, 3, 3, 1, 5, 4, 3, 1, 5, 5, 5, 5, 1, 1, 0, 0, 0, 0, 0, 1, 0, 12, 12, 12, 12, 11, 11, 0, 12, 12, 11, 11, 11, 11, 0, 1),
(18, 11, '2015-01-26 19:33:49', 'jacky', 5, NULL, NULL, NULL, 43, 0, 7, 7, 7, 0, 0, 0, 6, 6, 6, 0, 0, 0, 1, 2, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 0, 0, 0, 2, 0, 3, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(19, 9, '2015-01-24 13:41:55', 'guitouman', 7, 230, 160, 9, 74, 1420, 10, 10, 10, 10, 10, 0, 10, 9, 9, 9, 9, 0, 5, 5, 5, 0, 6, 6, 6, 6, 3, 3, 4, 0, 0, 7, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 3, 3, 1, 5, 5, 4, 0, 5, 5, 6, 0, 3, 1, 1, 1, 0, 0, 0, 0, 0, 12, 12, 12, 12, 12, 12, 0, 12, 12, 12, 12, 11, 11, 0, 1),
(20, NULL, '2015-02-08 18:50:22', 'Jrm', 7, NULL, NULL, NULL, 67, NULL, 9, 9, 9, 9, 9, 0, 8, 8, 8, 8, 8, 0, 4, 4, 4, 0, 6, 6, 6, 5, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 5, 5, 4, 5, 4, 3, 4, 2, 1, 0, 3, 2, 4, 0, 4, 4, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(21, NULL, '2015-02-09 02:13:09', 'Jyvaaitta', 5, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `playerhistory`
--

CREATE TABLE IF NOT EXISTS `playerhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clan_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hall_town` int(11) DEFAULT NULL,
  `troop_received` int(11) DEFAULT NULL,
  `troop_sent` int(11) DEFAULT NULL,
  `attack_won` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `trophy` int(11) DEFAULT NULL,
  `canon1` int(11) DEFAULT NULL,
  `air_defence1` int(11) DEFAULT NULL,
  `air_defence2` int(11) DEFAULT NULL,
  `air_defence3` int(11) DEFAULT NULL,
  `air_defence4` int(11) DEFAULT NULL,
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
  `tower_archer7` int(11) DEFAULT NULL,
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
  `tesla4` int(11) DEFAULT NULL,
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
  `minion` int(11) DEFAULT NULL,
  `rider` int(11) DEFAULT NULL,
  `valkyrie` int(11) DEFAULT NULL,
  `golem` int(11) DEFAULT NULL,
  `witch` int(11) DEFAULT NULL,
  `lava` int(11) DEFAULT NULL,
  `potion_heal` int(11) DEFAULT NULL,
  `potion_boost` int(11) DEFAULT NULL,
  `potion_damage` int(11) DEFAULT NULL,
  `potion_green` int(11) DEFAULT NULL,
  `potion_freeze` int(11) DEFAULT NULL,
  `gold1` int(11) DEFAULT NULL,
  `gold2` int(11) DEFAULT NULL,
  `gold3` int(11) DEFAULT NULL,
  `gold4` int(11) DEFAULT NULL,
  `gold5` int(11) DEFAULT NULL,
  `gold6` int(11) DEFAULT NULL,
  `gold7` int(11) DEFAULT NULL,
  `elixir1` int(11) DEFAULT NULL,
  `elixir2` int(11) DEFAULT NULL,
  `elixir3` int(11) DEFAULT NULL,
  `elixir4` int(11) DEFAULT NULL,
  `elixir5` int(11) DEFAULT NULL,
  `elixir6` int(11) DEFAULT NULL,
  `elixir7` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_418901164EC001D1` (`season_id`),
  KEY `IDX_41890116BEAF84C8` (`clan_id`),
  KEY `IDX_4189011699E6F5DF` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
(1, 'Saison 1 - Janvier', '2015-01-05 06:00:00', '2015-01-19 06:00:00'),
(2, 'Saison 2 - Janvier', '2015-01-19 06:00:00', '2015-02-02 06:00:00'),
(3, 'Saison 1 - Fevrier', '2015-02-02 06:00:00', '2015-02-16 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `troop_received` int(11) NOT NULL,
  `troop_sent` int(11) NOT NULL,
  `attack_won` int(11) NOT NULL,
  `trophy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6DF4492699E6F5DF` (`player_id`),
  KEY `IDX_6DF449264EC001D1` (`season_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CA76ED395` (`user_id`),
  KEY `IDX_7CC7DA2CBEAF84C8` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user_id`, `created_at`, `published`, `title`, `url`, `clan_id`) VALUES
(1, 1, '2015-01-19 19:26:47', 1, 'Spain jah', 'https://www.youtube.com/watch?v=GAbclsAUzkg&list=RDJyTVjxPNfns&index=2', NULL),
(2, 2, '2015-01-19 19:29:54', 1, 'music', 'https://www.youtube.com/watch?v=6CBBAcP5WZY', NULL),
(3, 3, '2015-01-19 19:30:54', 1, 'base de defence', 'https://www.youtube.com/watch?v=JdyRhHRC0fM', NULL),
(4, 2, '2015-01-20 22:27:32', NULL, 'Ca rigole..', 'https://www.youtube.com/watch?v=lYMZD0qa-nw', NULL);

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
  `image_id` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6C12ED313DA5256D` (`image_id`),
  KEY `IDX_6C12ED31BEAF84C8` (`clan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `war`
--

INSERT INTO `war` (`id`, `start`, `end`, `result`, `opponent`, `image_id`, `clan_id`) VALUES
(1, '2015-01-23 22:30:00', '2015-01-25 22:30:00', 2, 'BraveHeart', NULL, NULL),
(3, '2015-01-26 23:00:00', '2015-01-28 23:00:00', 0, '51/50', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fos_user_user`
--
ALTER TABLE `fos_user_user`
  ADD CONSTRAINT `FK_C560D761BEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`),
  ADD CONSTRAINT `FK_C560D76199E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Constraints for table `imagebase`
--
ALTER TABLE `imagebase`
  ADD CONSTRAINT `FK_D53537C83DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_D53537C8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  ADD CONSTRAINT `FK_D53537C8BEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `imagebestattack`
--
ALTER TABLE `imagebestattack`
  ADD CONSTRAINT `FK_7988EC4A3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_7988EC4AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  ADD CONSTRAINT `FK_7988EC4ABEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `imagebonus`
--
ALTER TABLE `imagebonus`
  ADD CONSTRAINT `FK_3087E5FF3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_3087E5FFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  ADD CONSTRAINT `FK_3087E5FFBEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_98197A65A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  ADD CONSTRAINT `FK_98197A65BEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `playerhistory`
--
ALTER TABLE `playerhistory`
  ADD CONSTRAINT `FK_418901164EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`),
  ADD CONSTRAINT `FK_4189011699E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `FK_41890116BEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`),
  ADD CONSTRAINT `FK_7CC7DA2CBEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

--
-- Constraints for table `war`
--
ALTER TABLE `war`
  ADD CONSTRAINT `FK_6C12ED313DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_6C12ED31BEAF84C8` FOREIGN KEY (`clan_id`) REFERENCES `clan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
