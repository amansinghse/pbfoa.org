-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: mariadb-100.wc2:3306
-- Generation Time: Dec 14, 2016 at 05:08 AM
-- Server version: 10.0.27-MariaDB-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1007558_jdhflora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admingroup_permissions`
--

CREATE TABLE IF NOT EXISTS `admingroup_permissions` (
`per_id` int(18) NOT NULL,
  `form_id` int(18) DEFAULT NULL,
  `group_id` int(18) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admingroup_permissions`
--

INSERT INTO `admingroup_permissions` (`per_id`, `form_id`, `group_id`) VALUES
(169, 21, 2),
(284, 36, 1),
(283, 35, 1),
(282, 34, 1),
(281, 33, 1),
(280, 31, 1),
(279, 28, 1),
(278, 40, 1),
(277, 26, 1),
(276, 25, 1),
(275, 24, 1),
(274, 23, 1),
(273, 29, 1),
(272, 20, 1),
(271, 19, 1),
(270, 17, 1),
(269, 13, 1),
(268, 39, 1),
(267, 21, 1),
(266, 15, 1),
(265, 7, 1),
(264, 6, 1),
(263, 14, 1),
(262, 5, 1),
(261, 10, 1),
(260, 3, 1),
(259, 2, 1),
(258, 37, 1),
(257, 30, 1),
(256, 4, 1),
(255, 27, 1),
(254, 9, 1),
(168, 15, 2),
(167, 7, 2),
(166, 6, 2),
(165, 14, 2),
(164, 5, 2),
(253, 22, 1),
(252, 18, 1),
(251, 16, 1),
(163, 10, 2),
(162, 3, 2),
(161, 2, 2),
(160, 4, 2),
(159, 9, 2),
(158, 32, 2),
(157, 11, 2),
(156, 1, 2),
(170, 13, 2),
(171, 33, 2),
(172, 34, 2),
(173, 35, 2),
(174, 36, 2),
(250, 32, 1),
(249, 11, 1),
(248, 1, 1),
(285, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
`admin_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `userpass` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `usertype` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `full_name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`admin_id`, `email`, `userpass`, `usertype`, `full_name`, `group_id`) VALUES
(6, 'jake.developer@aol.com', 'tdji5ePT6c2ang==', NULL, 'Jake Dev', 1),
(2, 'admin1', 'lqmipqGa', 'A', 'Admin', 1),
(4, 'aman', 'mVypev6D.HOpY', 'A', 'Administrator', 1),
(5, 'Editor@gmail.com', 'lqmipqGa', 'C', 'Editor', 2),
(7, 'Peter@familyofficenetworks.com', '19zTttHF2w==', NULL, 'Peter M. Apostol', 1),
(8, 'devon@familyofficenetworks.com', 'sNjj67zJ6dvd', NULL, 'Devon', 1),
(9, 'gregg@familyofficenetworks.com', 'qNzi4tHI3NyVlqc=', NULL, 'Gregg', 1),
(10, 'mark@familyofficenetworks.com', 'rObb1tnJ5MvJ1w==', NULL, 'Mark Golden', 1),
(11, 'michelle@familyofficenetworks.com', '0dzc4drF25w=', NULL, 'Michelle Fandozzi', 1),
(12, 'stephanie@familyofficenetworks.com', '19zTxNvX3Jo=', NULL, 'Stephanie Cardie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser_forms`
--

CREATE TABLE IF NOT EXISTS `adminuser_forms` (
`form_id` int(18) NOT NULL,
  `parent_id` int(18) DEFAULT NULL,
  `form_name` varchar(50) DEFAULT NULL,
  `form_code` varchar(50) DEFAULT NULL,
  `display_order` int(11) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser_forms`
--

INSERT INTO `adminuser_forms` (`form_id`, `parent_id`, `form_name`, `form_code`, `display_order`) VALUES
(1, 0, 'Manage Home Page', '#', 1),
(2, 1, 'Home Slider', 'home-banners.php', 1),
(3, 1, 'Manage Home Content', 'home_content.php', 2),
(4, 0, 'Website Settings', '#', 7),
(5, 4, 'Manage Logo', 'website-logo.php', 1),
(6, 4, 'Change Your Password', 'change-password.php', 3),
(7, 4, 'Admin Settings', 'mail-settings.php', 4),
(9, 0, 'Manage Team', '#', 5),
(10, 1, 'Manage Members', 'members.php', 4),
(11, 0, 'Manage Pages', '#', 2),
(14, 4, 'Manage Menus', 'menus.php', 2),
(13, 11, 'Manage Pages', 'pages.php', 2),
(15, 4, 'Manage Footer', 'footer_settings.php', 5),
(16, 0, 'Events', '#', 3),
(17, 16, 'Manage Events', 'events.php', 1),
(18, 0, 'Manage News', '#', 4),
(19, 18, 'News Category', 'news-category.php', 1),
(20, 18, 'News List', 'news.php', 2),
(21, 9, 'Team Members', 'home_team.php', 1),
(22, 0, 'Manage Membership', '#', 5),
(23, 22, 'Family office', 'family_office.php', 1),
(24, 22, 'Asset Manager', 'asset_manager.php', 2),
(25, 22, 'Service Providers', 'service_providers.php', 3),
(26, 22, 'Other Membership', 'other_membership.php', 4),
(27, 0, 'Manage Sponsorship', '#', 6),
(28, 27, 'List of Sponsorship', 'sponsorship.php', 1),
(29, 18, 'FON News List', 'fon_news.php', 3),
(30, 0, 'Manage Contact', '#', 7),
(31, 30, 'Contact List', 'contact_us.php', 1),
(32, 0, 'Manage Admin Users', '#', 3),
(33, 32, 'Admin Forms', 'adminforms.php', 1),
(34, 32, 'Admin Group Permission', 'admingrouppermission.php', 2),
(35, 32, 'Admin Groups', 'admingroups.php', 3),
(36, 32, 'Admin Users', 'adminusers.php', 4),
(37, 0, 'Manage Emails', '#', 9),
(38, 37, 'Admin Thank you Email', 'emails.php', 1),
(39, 9, 'Manage Team Page', 'manageteampage.php', 2),
(40, 22, 'Add New Membership', 'addmemships.php', 5);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser_groups`
--

CREATE TABLE IF NOT EXISTS `adminuser_groups` (
`group_id` bigint(20) NOT NULL,
  `group_title` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser_groups`
--

INSERT INTO `adminuser_groups` (`group_id`, `group_title`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `asset_manager`
--

CREATE TABLE IF NOT EXISTS `asset_manager` (
`id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_des` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `marketing_material` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `descrbe` varchar(255) NOT NULL,
  `raisecapital` varchar(255) NOT NULL,
  `aum` varchar(255) NOT NULL,
  `raisehow` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `Date` text NOT NULL,
  `Createdby` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_manager`
--

INSERT INTO `asset_manager` (`id`, `fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `company_logo`, `marketing_material`, `videos`, `descrbe`, `raisecapital`, `aum`, `raisehow`, `website`, `url`, `notes`, `Date`, `Createdby`) VALUES
(12, 'Erich', 'Weber', 'eweber@onecapdev.com', '5613529786', 'ONE Development', '245 Barbados Drive', 'Jupiter', 'Florida', '33458', 'United States', 'REIT Advisory & Asset Management Group \r\n\r\n"Specializing in Designing & Executing Private REIT Strategies"', '', '', '', 'Rest Estate', 'No', '25-100 Mil', '', 'Yes', 'www.onecapdev.com', '', '2016-11-29 10:57:16am', ''),
(11, 'asdfg', 'hk', 'hk', 'hk', 'hjk', 'hkj', 'hk', 'Hawaii', 'khj', 'Kazakhstan', 'kjh', '', '', '', 'Hedge Funds', 'Yes', '', '1-10 Mil', 'Yes', '', '', '2016-11-23 12:02:37am', ''),
(4, 'afgtest', 'gjhjk1', 'gl@gmail.com', 'gl', 'g', 'ljg', 'lj', 'Georgia', 'gl', 'Georgia', ' ', '', '', '', '', 'Yes', '', '1-10 Mil', 'Yes', '', 'This', '2016-11-23 01:19:36am', ''),
(5, 'zfdsd', 'fhhf', 'qwerty@gmail.com', '9876543210', 'ssIT', 'patila', 'qwertyui', 'Pennsylvania', '123456', 'United States', 'qwertyui\r\nasdfghjkl\r\nzxcvbnm', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'iuytrewq', 'asdfghj', 'qwedft@gmail.com', '765432', 'asdfgh', 'sdfgkjhc', 'sdfghjhg', 'Georgia', '432123', 'United States', 'asdgfds', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'test', 'gjhjk', 'gl@gmail.com', 'gl', 'g', 'ljg', 'lj', 'Georgia', 'gl', 'Jamaica', ' ', '', '', '', 'Hedge Funds', 'Yes', '1-25 Mil', '1-10 Mil', 'Yes', 'www.smartsolutionsit.com', 'dfg', '', ''),
(8, 'mnbvcxz', 'lkjhgfds', 'mnz@gmail.com', '8765432109', 'asdfgh', 'jhgfd', 'zxcvbnm', 'Hawaii', '12345', 'United States', '', '', '', '', 'Hedge Funds', 'Yes', '1-25 Mil', '1-10 Mil', '', '', '', '2016-11-22 12:42:00am', ''),
(9, 'test', 'gjhjk', 'gl@gmail.com', 'gl', 'g', 'ljg', 'lj', 'Georgia', 'gl', 'Jamaica', ' ', '', '', '', 'Hedge Funds', 'Yes', '1-25 Mil', '1-10 Mil', 'Yes', 'www.smartsolutionsit.com', 'dfg', '2016-11-22 12:43:44am', ''),
(10, 'tt', 'jf', 'jf', 'jhf', 'jf', 'jf', 'jhf', '', 'jf', 'Jamaica', 'j', '', '', '', 'Hedge Funds,Venture Capital', 'Yes', '', '1-10 Mil', 'Yes', '', '', '2016-11-22 01:12:03am', ''),
(13, 'Chad', 'Pennington', 'chad.pennington@gmail.com', '561-575-9852', 'self employed', '1313 Emulsion Ave.', 'Palm Beach', 'Florida', '33411', 'United States', 'Single Family office', '', '', '', 'Others', 'No', '500+', '', 'No', '', '', '2016-11-30 01:35:18pm', ''),
(14, 'Fred ', 'Lucier', 'flucier@303capital.com', '561-758-0430', '303 Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', 'Nice Guy \r\nsome what boring \r\nstructure notes / structure products\r\nAndrew needs to speak to partner RJ\r\nwants to rent office space\r\n', '2016-12-06 02:26:21pm', ''),
(15, 'Drew', 'Shrint', '', '', 'Myschyf ', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '', '2016-12-07 07:56:34am', ''),
(16, 'Leo', 'Peicher', '', ' 954-454-9001', 'Point One Holdings', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', 'Interesting\r\nManages 350 million \r\nMulti Family Housing + commercial\r\nnot looking 4 money but deals', '2016-12-07 08:12:01am', ''),
(17, 'Bryan', 'Guadagno ', '', '', 'QPlum', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', 'not qualified with interactiver \r\nQuent Strategy\r\nwaste of time \r\nnot kosher ', '2016-12-07 09:14:12am', ''),
(18, 'rtytjg', 'fhgj', 'hghjkjh@yahoo.com', 'gbjhj', 'hjhjj', 'bhjgjhj', 'vhjgbjh', 'Hawaii', '544646', 'Nambia', 'bnmb', '', '', '', 'RIA', 'No', '25-100 Mil', '10-15 Mil', 'No', '', '2016-12-08 04:01:42am Admin - hi<br>2016-12-08 05:12:45am Admin - hello there', '2016-12-08 12:33:36am', 'pbfoa.org'),
(19, 'g', 'h', 'singh.amrit21292@gmail.com', 'gh', 'gh', 'g', 'hg', 'Hawaii', 'g', 'Hawaii', 'hg', '', '', '', '', 'Yes', '', '1-10 Mil', 'Yes', '', '2016-12-08 05:29:40am Admin - mynew', '2016-12-08 05:29:40am', 'Team'),
(20, 'j', 'jg', 'singh.amrit21292@gmail.com', 'jg', 'jg', 'jg', 'j', 'Hawaii', 'hgj', 'Gabon', 'gj', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:38:15am', 'pbfoa.org'),
(21, 'hkjh', 'kj', 'singh.amrit21292@gmail.com', 'hk', 'jhk', 'jhk', 'jk', '', 'jhk', 'Jamaica', 'h', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:39:48am', 'pbfoa.org'),
(22, 'kjh', 'kjh', 'singh.amrit21292@gmail.com', 'kjh', 'kjh', 'kjh', 'kjh', 'Kansas', 'kjh', 'Kazakhstan', 'dvf', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:42:10am', 'pbfoa.org'),
(23, 'j', 'kj', 'singh.amrit21292@gmail.com', 'kg', 'kj', 'kjg', 'kj', 'Kansas', 'kj', 'Haiti', 'hkj', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:44:10am', 'pbfoa.org'),
(24, 'jhk', 'jhk', 'singh.amrit21292@gmail.com', 'hk', 'hk', 'hk', 'hk', 'Hawaii', 'jhk', 'Jamaica', 'jhk', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:45:05am', 'pbfoa.org'),
(25, 'gjk', 'gki', 'singh.amrit21292@gmail.com', 'gk', 'd', 'gk', 'gk', 'Georgia', 'gjk', 'Gabon', 'g', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:46:45am', 'pbfoa.org'),
(26, 'gjgh', 'jgj', 'singh.amrit21292@gmail.com', 'jhg', 'jg', 'jg', 'jg', '', 'hgj', 'Haiti', 'hg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:49:29am', 'pbfoa.org'),
(27, 'hkjh', 'kj', 'singh.amrit21292@gmail.com', 'hkj', 'hkj', 'hk', 'jhk', '', 'jhk', 'United States', 'jh', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:53:59am', 'pbfoa.org'),
(28, 'g', 'jkgj', 'singh.amrit21292@gmail.com', 'gj', 'gj', 'hgj', 'hgj', 'Hawaii', 'hgj', 'Haiti', 'gh', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:54:36am', 'pbfoa.org'),
(29, 'dgfdg', 'gsdfg', 'singh.amrit21292@gmail.com', 'dgsdfgdsgd', 'sdfsgsdfg', 'fg', 'jhfg', '', 'kjf', 'Kazakhstan', 'kjfh', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:55:48am', 'pbfoa.org'),
(30, 'gjkg', 'jg', 'singh.amrit21292@gmail.com', 'gjh', 'gj', 'hgj', 'hgj', 'Hawaii', 'hgj', 'Haiti', 'hgj', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:56:55am', 'pbfoa.org'),
(31, 'gg', 'g', 'singh.amrit21292@gmail.com', 'jgfj', 'hgj', 'gj', 'gj', 'Hawaii', 'hgj', 'Haiti', 'hgj', '', '', '', '', '', '', '', '', '', '', '2016-12-08 05:59:23am', 'pbfoa.org'),
(32, 'jhkgjkG', 'KJG', 'singh.amrit21292@gmail.com', 'GK', 'JGK', 'JGK', 'JG', 'Kansas', 'KJG', 'Kazakhstan', 'KJG', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:01:18am', 'pbfoa.org'),
(33, 'jg', 'jh', 'singh.amrit21292@gmail.com', 'ghj', 'ghj', 'hgj', 'hgj', 'Hawaii', 'hgj', 'Haiti', 'jhg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:02:34am', 'pbfoa.org'),
(34, 'gjk', 'gk', 'singh.amrit21292@gmail.com', 'jg', 'kg', 'kg', 'kgj', 'Kansas', 'kj', 'Gabon', 'jgk', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:03:40am', 'pbfoa.org'),
(35, 'jkg', 'kgj', 'singh.amrit21292@gmail.com', 'kg', 'kg', 'kg', 'kg', 'Kansas', 'kg', 'Kazakhstan', 'jkjg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:04:29am', 'pbfoa.org'),
(36, 'kg', 'kg', 'singh.amrit21292@gmail.com', 'kgk', 'g', 'kg', 'kg', 'Kansas', 'kg', 'Kazakhstan', 'kjg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:06:24am', 'pbfoa.org'),
(37, 'jhgfj', 'hgj', 'singh.amrit21292@gmail.com', 'jg', 'jhg', 'jhg', 'jhg', '', 'jgh', 'Jamaica', 'jhg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:08:22am', 'pbfoa.org'),
(38, 'jh', 'jgj', 'singh.amrit21292@gmail.com', 'hg', 'jhg', 'jhg', 'jgh', '', 'jhgj', 'Haiti', 'hg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:10:32am', 'pbfoa.org'),
(39, 'hgj', 'gj', 'singh.amrit21292@gmail.com', 'gj', 'hgj', 'g', 'jgh', '', 'jg', 'Jamaica', 'jg', '', '', '', '', '', '', '', '', '', '', '2016-12-08 06:12:14am', 'pbfoa.org'),
(40, 'hkjh', 'kj', 'amrit0292@gmail.com', 'hk', 'hk', 'hk', 'hk', 'Hawaii', 'jhk', 'Haiti', 'kjh', '', '', '', '', '', '', '', '', '', '', '2016-12-08 10:06:04am', 'pbfoa.org'),
(41, 'singh', 'jf', 'amrit0292@gmail.com', 'fhf', 'h', 'fh', 'fh', 'Florida', 'gfh', 'Gabon', 'hgf', '', '', '', '', '', '', '', '', '', '', '2016-12-08 10:09:54am', 'pbfoa.org'),
(42, 'Cris ', 'Blackman', '', '', 'empirical Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 08:05:43am Michelle Fandozzi - 2016-12-12 08:02:45am Michelle Fandozzi - \r\nSemi Strange man \r\nfrom tennesse \r\nfund- empirical \r\nLong only- value play \r\nspoke about trading \r\n15 yr tract record\r\n\r\n* Wackman \r\nAndrew had call with 3 other partners asking strange questions', '2016-12-12 08:05:43am', 'Team'),
(43, 'Colin ', 'Rennich ', '', '', 'Appleseed Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 08:15:05am Michelle Fandozzi - 2016-12-12 08:14:10am Michelle Fandozzi - 2016-12-12 08:13:17am Michelle Fandozzi - \r\nKosher\r\nValue shop\r\nuses Weeden  \r\nSpoke about doing trades with Us', '2016-12-12 08:15:05am', 'Team'),
(44, 'Dennis', 'Ledd', '', '', 'Game Creek Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 08:21:34am Michelle Fandozzi - 2016-12-12 08:20:05am Michelle Fandozzi - \r\nInteresting Guy\r\n900 Thousand in Commission\r\nwith Morgan\r\nLong Value that trades', '2016-12-12 08:21:34am', 'Team'),
(45, 'Stan', 'Sakar ', '', '', 'Abaris', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 08:36:04am Michelle Fandozzi - 2016-12-12 08:26:41am Michelle Fandozzi -  has a bunch of trading stategy\r\ne.t.f.\r\nrefered by Irwin\r\nNeeds C cpitwl', '2016-12-12 08:36:04am', 'Team'),
(46, 'Gunter ', 'Freystaetter', '', '', '', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 03:39:25pm Michelle Fandozzi - 2016-12-12 03:37:55pm Michelle Fandozzi - \r\nreal estate leading pllatform\r\nlooking for f.o.\r\nMark went over everything and provided references.', '2016-12-12 03:39:25pm', 'Team'),
(47, 'Roberto', 'Roffo', '', '', 'Braintee Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 03:42:26pm Michelle Fandozzi - 2016-12-12 03:41:19pm Michelle Fandozzi - \r\nKosher \r\nGave to Mark - \r\nHas product municipal bond that would be perfect for f.o. \r\n', '2016-12-12 03:42:26pm', 'Team'),
(48, 'David ', 'Rich', 'david@galileepartners.com', '1-516-514-3589', '', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 03:51:34pm Michelle Fandozzi - 2016-12-12 03:49:08pm Michelle Fandozzi - \r\nKnown for 4-5 yrs\r\ndoes alot of trading\r\nhelped raised money for him\r\nnow works for 3rd party marketer\r\nraising money from Israeli penchant funds', '2016-12-12 03:51:34pm', 'Team'),
(49, 'Richard ', 'Friedberg', '', '', 'Trusted Advisory', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '', '2016-12-12 03:54:00pm Michelle Fandozzi - 2016-12-12 03:52:48pm Michelle Fandozzi - \r\nWants to move forward\r\nSend him wire Instructions ', '2016-12-12 03:54:00pm', 'Team');

-- --------------------------------------------------------

--
-- Table structure for table `bannerads`
--

CREATE TABLE IF NOT EXISTS `bannerads` (
`advertisement_id` int(25) NOT NULL,
  `advertisement_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `advertisement_img_one` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `advertisement_caption` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `advertisement_url_one` text COLLATE utf8_unicode_ci NOT NULL,
  `orderid` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bannerads`
--

INSERT INTO `bannerads` (`advertisement_id`, `advertisement_title`, `advertisement_img_one`, `advertisement_caption`, `advertisement_url_one`, `orderid`) VALUES
(1, '', '1370858683-12751b5a4bb1c9d3.png', '', 'http://branddemos.com/worldwidefoam/index.php', 0),
(2, '', '1371814752-97851c43b60d5078.jpg', '', 'https://www.google.co.in/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL,
  `yourname` varchar(255) NOT NULL,
  `youremail` varchar(255) NOT NULL,
  `yourphone` varchar(255) NOT NULL,
  `yoursubject` varchar(255) NOT NULL,
  `yoursmessage` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `yourname`, `youremail`, `yourphone`, `yoursubject`, `yoursmessage`) VALUES
(1, 'Emily Zeng', 'emilyzeng113@gmail.com', '6609981323', 'Career Opportunities ', 'My name is Emily Zeng, as a detail-oriented investment management professional with 3 years of relevant experience in the private investments, alternative investments, and equity sectors, I am looking for opportunities at in FL. \r\n\r\nAs my work history dem');

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE IF NOT EXISTS `content_table` (
  `content_title` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `page_title` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `content_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `footer_title` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `footer_desc` text COLLATE latin1_general_ci NOT NULL,
  `content_image` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'c'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`content_title`, `page_title`, `content_desc`, `footer_title`, `footer_desc`, `content_image`, `orderid`, `status`) VALUES
('company', 'About us', '<p>This is Photoshop''s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat,<span class="fontcolor"> velit mauris egestas</span> quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>\r\n                <div class="destitle">Lorem Ipsum Dolor Sit Amet</div>\r\n<p>This is Photoshop''s version  of Lorem Ipsum. Proin gravida <strong>nibh vel velit auctor</strong> aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.This is Photoshop''s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio.<br/><br/>\r\nTincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut <span class="fontcolor">imperdiet nisi.</span> Proin condimentum fermentum nunc. <strong>Etiam pharetra, erat sed fermentum feugiat,</strong> velit mauris egestas quam, ut aliquam massa nisl quis neque. <span class="fontcolor">Suspendisse</span> in orci enim.</p>\r\n				<div class="destitle">Lorem Ipsum Dolor </div>\r\n<p>This is Photoshop''s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himll</p>', '', '', 'content_table-company-slider_banner_03.jpg', 0, 'c'),
('requestquote', 'Request Quote', 'This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.', '', '', '', 0, 'c'),
('welcome', 'A Leader in Web', 'Brand Labs Media is quickly \r\nbecoming a leader in the Web Management Industry - providing such \r\nservices as: custom web design, development and web marketing industry. \r\nWe are constantly looking for ways to continue improving on our already \r\nfail proof process and tools to make our clients experience the best \r\nthey will ever have. We work directly with business owners and in house \r\nmarketing teams, as well as serving as a white labeled vendor to other \r\nweb management agencies.<br>Brand Labs Media is quickly \r\nbecoming a leader in the Web Management Industry - providing such \r\nservices as: custom web design, development and web marketing industry. \r\nWe are constantly looking for ways to continue improving on our already \r\nfail proof process and tools to make our clients experience the best \r\nthey will ever have. We work directly with business owners and in house \r\nmarketing teams, as well as serving as a white labeled vendor to other \r\nweb management agencies.<br>', '', '', '', 0, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(11) NOT NULL,
  `event_title` varchar(300) NOT NULL,
  `event_slug` varchar(255) NOT NULL,
  `event_location` text NOT NULL,
  `event_contact` text NOT NULL,
  `event_url` text NOT NULL,
  `event_gallery` text NOT NULL,
  `event_secondary` varchar(255) NOT NULL,
  `event_creative` text NOT NULL,
  `event_active` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_des` text NOT NULL,
  `event_date` date NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_slug`, `event_location`, `event_contact`, `event_url`, `event_gallery`, `event_secondary`, `event_creative`, `event_active`, `meta_title`, `meta_des`, `event_date`, `orderid`) VALUES
(10, 'The State of the Economy and when it means for Monetary Policy and the Election', 'the-state-of-the-economy-and-when-it-means-for-monetary-policy-and-the-election', 'test', 'test', 'http://familyofficenetworks.yourwaytech.com/events/', '1477404203-699580f662b37cd8.jpg', '1478881125-8945825ef65d170c.jpg', '1478881001-1515825eee90245f.jpg', 'Yes', 'test event', 'test<br>', '2016-11-18', 1),
(24, 'The Paradox of Timeless Event Driving', 'the-paradox-of-timeless-event-driving', '135 E 55th St, New York, NY 10022', 'Stephanie@nycfoa.org', 'http://familyofficenetworks.yourwaytech.com/events/', '', '1479241258-465582b6e2a251f5.jpg', '', 'Yes', 'Paradox', '<br>', '2016-12-01', 3),
(23, 'A Plan for All Seasons', 'a-plan-for-all-seasons', '3 West 51st St New York, NY 10019', 'Stephanie@nycfoa.org', '#', '', '1479239020-788582b656cc0944.jpg', '', 'Yes', 'A Plan For All Seasons', 'A Plan For All Seasons', '2016-11-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `family_office`
--

CREATE TABLE IF NOT EXISTS `family_office` (
`id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `marketing_material` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `net_worth` varchar(255) NOT NULL,
  `invest` varchar(255) NOT NULL,
  `transactions` varchar(255) NOT NULL,
  `invest_equity` varchar(255) NOT NULL,
  `transactions_equity` varchar(255) NOT NULL,
  `equity_size` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `Date` text NOT NULL,
  `Createdby` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `family_office`
--

INSERT INTO `family_office` (`id`, `fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_logo`, `marketing_material`, `videos`, `interest`, `net_worth`, `invest`, `transactions`, `invest_equity`, `transactions_equity`, `equity_size`, `notes`, `Date`, `Createdby`) VALUES
(157, 'Ken', 'Green', '', '', 'Private Investor', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Very Kosher\r\nF.O.\r\nInvest in software companies that deal with CRM', '2016-12-06 02:57:19pm', ''),
(156, 'Joe', 'Lambert', 'lambertfunds@gmail.com', '', 'Lambert Funds', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'good guy...very receptive...has a Cannabis Fund...also has interest in setting up Santa Barbara FOA....waiting to hear back on proposal\r\n\r\npress release on launch of Santa Barbara\r\nwent over type of event for them\r\nfind out about press release date', '2016-12-06 12:18:42pm', ''),
(155, 'Cris ', 'Blackman', '', '', 'Empirical Capital', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Semi Strange man \r\nfrom Tennessee \r\nfund- empirical \r\nLong only- value play \r\nspoke about trading \r\n15 yr tract record\r\n\r\n90 million\r\nland 20 Jefferey Michael\r\nalicar admidistrators\r\n17 yr. tract record \r\nspoke about moving training business\r\n\r\n12/7/2016\r', '2016-12-07 02:02:56pm', ''),
(154, 'Nicolas De', 'Croisset', 'nicolas.croisset@rothschild.com', '2124033506', 'Rothschild', '1251 Avenue of americas ', 'New Yrk', 'New York', '10020', 'United States', '', '', '', '', '1 Billion+', '', '', '', ' , ', '', 'I/B  m/b \r\nasset management\r\n60 billion dollar fund- private equity funds- fund of funds\r\nintroduced thru matt luciano\r\npeter needs to send email\r\nF.O', '2016-12-05 12:40:35pm', ''),
(153, 'Andrew ', 'Leu', 'andrew.leu@outlook.com', '', 'XIST Capital', '', '', '', '', 'United States', '', '', '', 'Hedge Funds', '', '', '', '', ' , ', '', 'Hedge Fund\r\nStarting with 15 million January 17th\r\n1/2 15 percent \r\nlooking at converge\r\nI referred to peter Rosenthal', '2016-12-02 11:29:48am', ''),
(140, 'Jason', 'Gentry', 'jgentry@svnsouth.com', '484-336-9184', 'SVN', '', '', 'Florida', '33126', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'not kosher', '2016-11-30 02:48:59pm', ''),
(139, 'Justin ', 'Piasecki', 'Justin.piasecki@avisonyoung.com', '212-729-3964', 'Avison Young', '623 Fifth Avenue', 'New York', 'New York', '10022', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Kosher \r\nPete met @ wedding in Bahamas\r\nPlayed Basket Ball with Mitch Garrett College\r\ncurrently doing real estate development fiancing', '2016-11-30 02:45:45pm', ''),
(138, 'Sun', 'Man', 'imdashit@gamail.com', '561-555-1212', 'self', 'TBA', 'WPB', 'Florida', '33401', 'United States', '', '', '', 'Others', '1 Billion+', 'Yes', ' ,Commercial', 'Yes', ' , ,Technology', '1 Mil - 10 Mil', '', '2016-11-30 01:47:20pm', ''),
(137, 'test', 'test', 'test@test.com', '0987654398', 'testing inc', '', '', '', '', 'United States', '', '', '', 'Art', '1 Billion+', 'Yes', 'Income Producing', 'Yes', ' , ,Financial Services', '10 Mil - 50 Mil', '2016-12-12 09:00:27am Admin - tester', '2016-11-30 01:44:55pm', ''),
(98, 'Ravi', 'Ugale', 'Ravi.Ugale@genspring.com', '561.746.8444', 'GenSpring', '', '', '', '', 'United States', '', '', '', '', '', 'No', '', 'Yes', ' , ', '', '$9Billion MFO\r\n<br>2016-12-12 08:58:52am Admin - Test Note<br>2016-12-12 08:59:29am Admin - This is a test note to check date and time funtionality', '2016-11-30 08:59:08am', ''),
(99, 'Michael', 'Zeuner', 'Michael.Zeuner@WEFamilyOffices.com', '', 'WE Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$7Billion MFO, Spoke to Julie (Expecting email)', '2016-11-28 01:02:03pm', ''),
(100, 'Julie', 'Neitzel', 'Julie.Neitzel@WeFamlyOffices.com', '305-921-2161', 'WE Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$7Billion MFO', '2016-11-28 01:02:03pm', ''),
(101, 'Doug', 'Bookbinder', 'Douglas.Bookbinder@lighthousepartners.com', '', 'Lighthouse Partners', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$10Billion Fund of Funds', '2016-11-28 01:02:03pm', ''),
(102, 'Jay', 'Steinle', 'Jay.Steinle@lighthousepartners.com', '561-472-9685', 'Lighthouse Partners', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$10Billion Fund of Funds', '2016-11-28 01:02:03pm', ''),
(103, 'Victoria', 'Karasin', 'vrkarasin@gmail.com', '561-862-7195', 'AM Global', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$500Million MFO- Invest in HFs & Alternatives', '2016-11-28 01:02:03pm', ''),
(104, 'Steve', 'Barimo', 'sbarimo@amglobalfio.com', '', 'AM Global', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$500Million MFO- Invest in HFs & Alternatives', '2016-11-28 01:02:03pm', ''),
(105, 'Andrew', 'Mehalko', 'andrew@amglobalfio.com', '561-249-6826', 'AM Global', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$500Million MFO- Invest in HFs & Alternatives', '2016-11-28 01:02:03pm', ''),
(106, 'Mark', 'Elhilow', '', '561-659-3301', 'Blue Ocean Capital', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$500Million MFO', '2016-11-28 01:02:03pm', ''),
(107, 'Mark', 'Renz', 'mrenz@sociusfamilyoffice.com', '', 'Socius Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'MFO- former GenSpring', '2016-11-28 01:02:03pm', ''),
(108, 'John', 'Tassone', 'jt@simonbakerpartners.com', '561-962-2361', 'SimoneBaker & Partners', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Formerly Genspring Asset Mgt Firm', '2016-11-28 01:02:03pm', ''),
(109, 'Brent Fykes', 'Fykes', 'bfykes@atlantictrust.com', '561-714-5131', 'Atlantic Trust', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Formerly Genspring Asset Mgt Firm', '2016-11-28 01:02:03pm', ''),
(110, 'Joe', 'Umbach', '', '', 'Umbach Financial Group', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Mystic Iced Tea', '2016-11-28 01:02:03pm', ''),
(111, 'James', 'Donaghy', 'jdonaghy@holdingcapital.com', '212-486-6670 ext. 209', 'Holding Capitlal Group of Key Biscayne', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Invest in early stage funds', '2016-11-28 01:02:03pm', ''),
(112, 'Ed', 'Mullen', 'emullen@jatemcapital.com', '', 'Jatem Capital', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'SFO', '2016-11-28 01:02:03pm', ''),
(113, 'Howard', 'Cooper', 'howcoop@gmail.com', '561-470-0855', 'Cooper Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(114, 'Rick', 'Stone', '', '', 'Palm Beach Research Institure', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Partners with Howard Cooper', '2016-11-28 01:02:03pm', ''),
(115, 'Carter', 'Potash', 'toacp@aol.com', '917-710-4117', 'Potash SFO', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(116, 'Leah', 'Zveglich', '', '', 'Aster Family Advisors', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(117, 'Patti', 'Travis', 'ptravis@firstrepublic.com', '561-803-1029', 'First Republic', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(118, 'Anthony', 'Ritossa', 'anthony@ritossafamilyoffice.com', '', 'Ritossa Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'SFO', '2016-11-28 01:02:03pm', ''),
(119, 'Sidney', 'Karabel', 'skarabel@aol.com', '954-562-2252', 'Karabel Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(120, 'Matt', 'Wilson', 'mrw9599@comcast.net', '609-903-9400', 'Seamless', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(121, 'Mike', 'Murgio', 'MMurgio@clineres.com', '', 'Clineres', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(122, 'Chris', 'Streit', 'chrisstreit@streitfamilyoffice.com', '203-952-5173', 'Streit Family Limited Partnership', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'SFO', '2016-11-28 01:02:03pm', ''),
(123, 'Brett', 'Rubenstein', 'brubinson@veritablelp.com', '', 'Vertable LP', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(124, 'Don', 'Weidenfield', 'd.weidenfeld@magnumes.com', '(561)702-9000', 'Weidenfeld Financial Group of Raymond James', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'SFO- Built Hotels in South Beach, Miami', '2016-11-28 01:02:03pm', ''),
(125, 'Adam', 'Shapiro', 'adam.shapiro@the22hundredgroup.com', '', 'Shapiro Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '~$1Billion SFO (Food & Healthcare Distribution)', '2016-11-28 01:02:03pm', ''),
(126, 'Darren', 'Rabenou', 'DRabenou@terrapinpartners.com', '212-710-4117', 'Terrapin Asset Management', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'SFO', '2016-11-28 01:02:03pm', ''),
(127, 'Robert', 'Marrone III', 'rmarrone@kislak.com', '305-364-4217', 'Kislak Family Office', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(128, 'Karen', 'Landry', 'klandry@silverleafpartners.com', '415-602-5427', 'Silver Lear Partners', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(129, 'Joe', 'Lawerence', 'joe.lawrence@nb.com', '561-805-6008', 'Nuberger Berman', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '$50Billion AUM', '2016-11-28 01:02:03pm', ''),
(130, 'Johnathan', 'Greene', 'Jonathan.Greene@RaymondJames.com', '(561)981-3683', 'Weidenfeld Financial Group of Raymond James', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', 'Works with Don Weidenfield', '2016-11-28 01:02:03pm', ''),
(131, 'Brendan', 'Holt Dunn', 'bdunn@holdun.com', '242-421-9802', 'Holdun Family Services', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Bahamas based FO, Met in Miami at IMN Conference on Real Estate 11/2016', '2016-11-28 01:10:13pm', ''),
(132, 'Rui', 'Falcon', 'Rfalcon@PrincetonAM.com', '', 'Princeton Asset Management', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(133, 'Arthur', 'Weissman', 'aweissman@wealthforge.com', '', 'LDJ Capital MFO', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(134, 'John', 'Jenrette', 'jon.jenrette@gmail.com', '', 'SFO', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(135, 'Laura', 'Moore', 'lm@sandalwoodsecurities.com', '973-860-8080', 'Moore-Tanne SFO', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(136, 'Fred', 'Tanne', 'ftanne@mac.com', '914 552 2580', 'Moore-Tanne SFO', '', '', '', '', 'USA', '', '', '', '', '', '', '', '', '', '', '', '2016-11-28 01:02:03pm', ''),
(141, 'Jerry', 'Haney', 'jerry@allindiamission.com', '8168354042', 'all india mission', '', '', 'Kansas', '66063', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Raising money for full on philanthropy (non profit)\r\nIndia hospital', '2016-11-30 03:00:25pm', ''),
(142, 'Joseph ', 'Gilor', 'hrz@hrzpartners.com', '972-4-855-0888', 'Herzliya Partners ', '', '', 'Idaho', '3190500', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Kosher \r\nIsraeli private equity firm \r\nIsraeli direct investing\r\n', '2016-11-30 03:17:09pm', ''),
(143, 'Vince ', 'Edwards ', 'Vedwards@pinnaclesuccessgroup.com', '859-396-7399', 'Pinnale Success Group ', '', '', '', '40502', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'early stage tech fiancier', '2016-11-30 03:15:19pm', ''),
(144, 'Robert ', 'Bahen', 'Robertbahen@gmail.com', '925-765-0652', 'Exec West Properties', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Not Kosher \r\nHotel Developer \r\nSouth Cali and Vegas', '2016-11-30 03:19:33pm', ''),
(145, 'Alan', 'Mason ', 'alan@newprov.com', '917-287-0078', 'New Providence Asset Management ', '', '', 'New York', '10022', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Glatt Koshr\r\n3 billion dollars AUM / asset manager firm/ all outside managers\r\nconnected with steven  via Email\r\nPeter meet him in miami', '2016-11-30 03:39:57pm', ''),
(146, 'Conrad', 'Carney', 'ccarney@xooker.com', '859-983-2604', 'Xooker', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Not Kosher partners with Vince Edwards \r\ndeveloping some sort of app\r\nworked w/ bill slattery\r\n', '2016-11-30 03:43:21pm', ''),
(147, 'Gunter', 'Freystaetter', 'gunter@usdv.com', '954-391-5321', 'USDV', '', '', 'Florida', '33401', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'semi Kosher \r\nreal estate development financing company', '2016-11-30 03:38:37pm', ''),
(148, 'william', 'Slattery', 'wslattery@n2a.biz', '917-438-4355', 'Nieuw Amsterdam Advisors', '', '', 'New York', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'Semi kosher \r\ndeals guy\r\nlong time family friend of peter \r\nconnected with steven', '2016-11-30 03:44:15pm', ''),
(149, 'Alison', 'Hoornbeek', 'a.hoornbeek@djkcommercialrealty.com', '212-367-0498', 'DJK', '', '', 'New York', '', 'United States', '', '', '', '', '', '', '', '', ' , ', '', 'not kosher \r\nreal estate / artist / from NY', '2016-11-30 03:37:58pm', ''),
(150, 'Paul ', 'Papi', 'paulpapi@gmail.com', '508-444-6790', '', '', '', '', '', 'United States', '', '', '', 'Bio Tech', '', '', '', '', ' , ', '', 'From Boston\r\nWorks with Biotech\r\nraises money for biotechs\r\nNo Connections', '2016-12-02 10:51:52am', ''),
(151, 'Michael', 'Huer', 'michael.huber@quadrandlegroup.com', '', 'Quadrangle Group', '', '', '', '', 'United States', '', '', '', 'Hedge Funds', '', '', '', '', ' , ', '', 'Hedge Funds\r\nReferred by Irwin Latner \r\n2 private Equity fund in Media and telecom funds\r\nL/S H.F. 15 million\r\n4 years cowen now\r\nspoke about switching over', '2016-12-02 11:00:02am', ''),
(152, 'Bill', 'Robbins ', 'brobbins@WealthForge.com', '', 'Wealth Forge', '', '', '', '', 'United States', '', '', '', 'Others', '', '', '', '', ' , ', '', 'Fin Tech\r\ntechnology to help fill out sub docs\r\ncharge set up 5 thousand/ charge for license is 1-5 thousand a month\r\nget paid in success\r\nwealth forge has BD RIA FO', '2016-12-02 11:24:31am', ''),
(158, 'akshay', 'garg', 'er.kunal2006@gmail.com', '9646569430', 'membeship', 'polo ground', 'sDS', 'Connecticut', '124596', 'Afganistan', '', '', '', 'Hedge Funds', '', 'Yes', ' ,Commercial', 'No', ' , ,Financial Services', '1 Mil - 10 Mil', '2016-12-08 03:49:56am Admin - Hi<br>2016-12-08 03:50:16am Admin - there<br>2016-12-08 04:01:13am Admin - hi<br>2016-12-08 04:01:58am Admin - hijk', '2016-12-08 12:30:14am', 'pbfoa.org');

-- --------------------------------------------------------

--
-- Table structure for table `fon_news`
--

CREATE TABLE IF NOT EXISTS `fon_news` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `remain` varchar(255) NOT NULL,
  `textmsg` varchar(255) NOT NULL,
  `marketing_material` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fon_news`
--

INSERT INTO `fon_news` (`id`, `name`, `email`, `phone`, `url`, `remain`, `textmsg`, `marketing_material`) VALUES
(10, 'test', 'info@test.com', '1234567890', 'http://test.com', 'I want my name listed on the news', 'testing', ''),
(11, 'fgh', 'hfd@gmail.com', 'df', 'fd', 'I wish to remain anonymous', '', ''),
(12, 're', 're@gmail.com', '323', 'fds', 'I wish to remain anonymous', 'sds', ''),
(13, 'jhd', 'kg@gmail.com', 'gjghg', 'hgjhgq', 'I wish to remain anonymous', 'jgh;gj', ''),
(14, 'teste', 'teste@gmail.com', '4565', 'google', 'I wish to remain anonymous', 'gg', ''),
(15, 'jhgj', 'ghj@gmail.com', 'hgj', 'hgj', 'I wish to remain anonymous', 'jhg', ''),
(16, 'kj', 'hk@gmail.com', 'hk', 'jhk', 'I wish to remain anonymous', 'jhk', ''),
(17, 'fj', 'gjg@gmail.com', 'jg', 'j', 'I wish to remain anonymous', 'ghj', ''),
(18, 'j', 'gj@gmail.com', 'g', 'g', 'I wish to remain anonymous', 'j', '');

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE IF NOT EXISTS `footer_settings` (
  `id` int(11) NOT NULL,
  `footer1` text NOT NULL,
  `footer2` text NOT NULL,
  `footer3` text NOT NULL,
  `footer4` text NOT NULL,
  `footer5` text NOT NULL,
  `footer6` text NOT NULL,
  `footer7` text NOT NULL,
  `footer8` text NOT NULL,
  `bottom_footer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `footer1`, `footer2`, `footer3`, `footer4`, `footer5`, `footer6`, `footer7`, `footer8`, `bottom_footer`) VALUES
(1, '<nav class="register"><h6>Membership</h6>\r\n		<li style="text-align: left;"><a href="membership" http:="" "="" .="" $_server[''server_name''];="" ?="" title="" target="">Membership</a></li><li><br></li>\r\n		</nav>', '<nav class="locations">\r\n		<h6>Our Locations</h6>\r\n			<li><a href="http://nycfoa.org">New York FON</a></li>\r\n			<li><a href="http://hongkongfoa.org">Hong Kong FON</a></li>\r\n			<li><a href="http://canadafoa.org">Canada FON</a></li>\r\n			<li><a href="http://londonfoa.org/">London FON</a></li>\r\n			<li><a href="http://pbfoa.org/">Palm Beach FON</a></li>\r\n		</nav>', '<nav class="events">\r\n		<h6>Events</h6>\r\n			<li><a href="events" title="" target="">Event Calendar</a></li>\r\n			<li><a href="upcoming-events" title="" target="">Current Events</a></li>\r\n			<li><a href="event-photos-and-videos" title="" target="">Event Photos &amp; Videos</a></li>\r\n			<!---<li><a href="page.php?page_id=46">Member Benefits</a></li>-->\r\n			<!--<li><a href="http://japanfoa.org/sponsorship">Sponsorship</a></li>\r\n		</nav>--></nav>', '<nav class="events">\r\n		<h6>News</h6>\r\n			<li><a href="family-office-news" title="" target="">Family Office News</a></li>\r\n								<li><a href="whitepapers" title="" target="">White Papers</a></li>\r\n								<li><a href="press-releases" title="" target="">Press Releases</a></li>\r\n								<li><a href="luxury" title="" target="">Luxury News</a></li>\r\n								<li><a href="submit-to-fon-news" title="" target="">Submit to FON News</a></li>\r\n		</nav>', '<nav class="service">\r\n			<h6>Service Provider</h6>\r\n			<li><a href="list-your-company" title="" target="">List Your Company</a></li>\r\n		</nav>', '<nav class="luxury">\r\n		<h6>Luxury</h6>\r\n	\r\n		</nav>', '<nav class="about">\r\n			<h6>About</h6>\r\n			<li><a href="our-team" title="" target="">Our Team</a><a></a></li><a>\r\n			</a><li><a></a><a href="in-the-news" title="" target="">In The News</a></li>\r\n			<li><a href="our-members" title="" target="">Our Members</a><a></a></li><a>\r\n			</a><li><a></a><a href="http://familyofficenetworks.com/?page_id=962" target="_blank">Blog</a></li>\r\n			<li><a href="faq" title="" target="">FAQ</a><a></a></li><a>\r\n		</a></nav>', '<nav class="contact">\r\n			<h6>Contact Us</h6>\r\n			<li><a href="contact-us" title="" target="">Contact Us</a></li>\r\n		</nav>', '<figure class="footer-logo" style="text-align: center;">\r\n				<img src="http://jdhflora.com/images/pbfoa-footer-logo.jpg" alt="Pbfoa logo">\r\n				<a href="http://www.familyofficenetworks.com" target="_blank"><img src="http://jdhflora.com/images/fon-footer-logo.jpg" alt="FON logo">\r\n			</a></figure><a href="http://www.familyofficenetworks.com" target="_blank">\r\n			</a><figure class="copyright"><a href="http://www.familyofficenetworks.com" target="_blank">\r\n				</a><figcaption style="text-align: center;"><a href="http://www.familyofficenetworks.com" target="_blank">\r\n					</a><a href="https://www.facebook.com/FamilyOfficeNetworks" target="_blank"><img src="http://jdhflora.com/images/facebook.jpg" alt="icon"></a>\r\n					<a href="https://www.linkedin.com/company/the-family-office-networks" target="_blank"><img src="http://jdhflora.com/images/linkedin.jpg" alt="icon"></a>\r\n					<a href="https://twitter.com/FamilyOfficeNet" target="_blank"><img src="http://jdhflora.com/images/twitter.jpg" alt="icon"></a>\r\n					<a href="#"><img src="http://jdhflora.com/images/googleplus.jpg" alt="icon"></a>\r\n				</figcaption>\r\n				<figcaption>\r\n				<p style="text-align: center;">Â© 2016 Family Office Networks. All Rights Reserved</p>\r\n				</figcaption>\r\n			</figure>');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE IF NOT EXISTS `home_banners` (
`id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_desc` varchar(3000) NOT NULL,
  `image` text NOT NULL,
  `image_type` int(11) NOT NULL,
  `imagefull` varchar(300) NOT NULL,
  `url` text NOT NULL,
  `apply_order` int(1) NOT NULL,
  `order_link` text NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `banner_title`, `banner_desc`, `image`, `image_type`, `imagefull`, `url`, `apply_order`, `order_link`, `orderid`) VALUES
(40, 'Home Banner', 'Family Office Networks is dedicated to bringing family offices together throughout the world by leveraging our technology, personal introductions, events and news.  Our platform allows Family Offices to comfortably share; unique deal flow, capital preservation strategies, philanthropic strategies, alpha generating alternative investments and best in class service providers.', '', 1, 'home_banners-40-home-banner-2.jpg', 'http://pbfoa.org/membership', 1, '', 2),
(41, 'Home Banner 2', 'Family Office Networks is dedicated to bringing family offices together throughout the\r\nworld by leveraging our technology, personal introductions, events and news. Â Our\r\nplatform allows Family Offices to comfortably share; unique deal flow, capital preservation\r\nstrategies, philanthropic strategies, alpha generating alternative investments and best in\r\nclass service providers.', '', 1, 'home_banners-41-home-banner-1.jpg', 'http://pbfoa.org/membership', 0, '', 1),
(42, 'Home Banner 3', 'Family Office Networks is dedicated to bringing family offices together throughout the world by leveraging our technology, personal introductions, events and news.  Our platform allows Family Offices to comfortably share; unique deal flow, capital preservation strategies, philanthropic strategies, alpha generating alternative investments and best in class service providers.', '', 1, 'home_banners-42-home-banner-3.jpg', 'http://pbfoa.org/membership', 1, '', 3),
(43, 'Home Banner 4', 'Family Office Networks is dedicated to bringing family offices together throughout the world by leveraging our technology, personal introductions, events and news.  Our platform allows Family Offices to comfortably share; unique deal flow, capital preservation strategies, philanthropic strategies, alpha generating alternative investments and best in class service providers.', '', 1, 'home_banners-43-home-banner-4.jpg', '', 1, '', 5),
(44, 'Home Banner 5', 'Family Office Networks is dedicated to bringing family offices together throughout the world by leveraging our technology, personal introductions, events and news.  Our platform allows Family Offices to comfortably share; unique deal flow, capital preservation strategies, philanthropic strategies, alpha generating alternative investments and best in class service providers.', '', 1, 'home_banners-44-home-banner-5.jpg', '', 1, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE IF NOT EXISTS `home_content` (
`id` int(25) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `interview` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_des` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `img_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oderid` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `title`, `url`, `description`, `interview`, `meta_title`, `meta_des`, `image`, `img_alt`, `img_title`, `oderid`) VALUES
(1, 'Home page', '', '<article id="services_wrapper">\r\n<section class="container">\r\n<figure class="left_content">\r\n<figcaption class="service_provider">\r\n<h4>Our Service Provider Listing</h4><p>Our Service Provider Directory is one of Family Office Networkâ€™s most visited areas! Over 25,000 High Networth Families, hedge fund managers frequent this section in order to locate third party providers. Legal services, administrators, accountants and marketing experts that specifically deal with Family office are in high demand! By listing your business with us, you are placing your company directly in front of your target audience.</p>\r\n\r\n<p><a class="red-btn" href="http://pbfoa.org/membership" title="" target="">Add Your Company</a></p>\r\n</figcaption>\r\n<figcaption class="events_photos">\r\n<h4>FON Events Photos / Videos</h4>\r\n<div class="event-gallery">\r\n<p><a href=""><img alt="" src="http://pbfoa.org/images//15369351d.jpg" style="width: 230px; height: 164px;"></a><a href=""><img alt="" src="http://pbfoa.org/images//1548b0b39.jpg" style="width: 375px; height: 164px;"></a><a href=""><img alt="" src="http://pbfoa.org/images//155fb8be4.jpg" style="width: 375px; height: 164px;"></a><a href=""><img alt="" src="http://pbfoa.org/images//156a3a99f.jpg" style="width: 230px; height: 164px;"></a></p>\r\n</div>\r\n\r\n</figcaption>\r\n</figure>\r\n<figure class="right_content">\r\n<figcaption class="newsletter-subs">\r\n<img src="images/fon-newsletter-head.jpg" alt="FON Newsletter">\r\n\r\n<li><input value="" placeholder="Your Email.." onfocus="this.placeholder = ''''" onblur="this.placeholder = ''Your Email..''" name="email" reqiured="" type="email">\r\n</li>\r\n<li><input value="" placeholder="Your Name.." onfocus="this.placeholder = ''''" onblur="this.placeholder = ''Your Name..''" name="name" reqiured="" type="text"></li>\r\n<li><input value="Subscribe Now!" class="red-btn" name="newsletter" type="submit"></li>\r\n\r\n<p><img src="images/lock-icon.jpg" alt="icon" align="absmiddle"> We will NEVER share or sell your info.</p>\r\n</figcaption>\r\n\r\n<figcaption class="newsletter-subs">\r\n<img src="images/fon-luxury-newsletter-head.jpg" alt="FON Newsletter">\r\n\r\n<li><input value="" placeholder="Your Email.." onfocus="this.placeholder = ''''" onblur="this.placeholder = ''Your Email..''" name="email" reqiured="" type="email">\r\n</li>\r\n<li><input value="" placeholder="Your Name.." onfocus="this.placeholder = ''''" onblur="this.placeholder = ''Your Name..''" name="name" reqiured="" type="text"></li>\r\n<li><input value="Subscribe Now!" class="red-btn" name="luxurynewsletter" type="submit"></li>\r\n\r\n\r\n\r\n<p><img src="images/lock-icon.jpg" alt="icon" align="absmiddle"> We will NEVER share or sell your info.</p>\r\n</figcaption>\r\n</figure>\r\n</section>\r\n</article>', '<h2>Interview with<br><span>Andrew Schneider / CEO &amp; Founder of FON</span></h2>\r\n	  <figcaption><p><iframe allowfullscreen="" src="https://www.youtube.com/embed/kMDJGlLPstE?rel=0&amp;showinfo=0" width="578" height="352" frameborder="0"></iframe></p>\r\n', 'Palm Beach Family Office Association', '', '', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_member`
--

CREATE TABLE IF NOT EXISTS `home_member` (
`id` int(25) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `des` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `orderid` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_member`
--

INSERT INTO `home_member` (`id`, `title`, `image`, `image_title`, `image_alt`, `des`, `date`, `active`, `orderid`) VALUES
(1, 'Access to all Associations', '1476007372-28057fa15ccb7829.jpg', 'Accsess to all Associations', 'Associations', 'Lorem<br>', '2016-10-09', '1', 1),
(2, 'Discounts to <br/> Industry Events', '1476154328-63257fc53d8a74c0.jpg', 'Discounts to Industry Events', 'Discounts to Industry Events', 'Discounts to Industry Events', '2016-10-20', '1', 2),
(3, 'Free admision to all exclusive PBFOA Events', '1476978266-6815808e65a058dd.jpg', 'Free admission', 'Free admission', 'Free admission to all exclusive PBFOA Events<br>', '2016-10-20', '1', 3),
(4, 'Receive personal introductions', '1476978410-1005808e6eaba377.jpg', 'Personal Introduction', 'Personal Introduction', 'Receive personal introductions<br>', '2016-10-20', '1', 4),
(5, 'Discounts to best in class industry professionals', '1476978523-5585808e75b36cc0.jpg', 'Discounts', 'Discounts', 'Discounts to best in class industry professionals<br>', '2016-10-20', '1', 5),
(6, 'Receive educational material and whitepapers', '1476978614-7835808e7b6381ac.jpg', 'Educational Material', 'Educational Material', 'Receive educational material and whitepapers<br>', '2016-10-20', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `home_team`
--

CREATE TABLE IF NOT EXISTS `home_team` (
`id` int(25) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `display_home` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `des` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `orderid` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_team`
--

INSERT INTO `home_team` (`id`, `title`, `tag`, `display_home`, `image`, `image_title`, `image_alt`, `des`, `date`, `active`, `orderid`) VALUES
(8, 'Howard Glynn', 'Howard', '', '1481692215-9125850d43747cfe.jpg', 'Howard Glynn', 'Howard Glynn', 'Howard Glynn, is a 18 year Wall Street veteran with experience in Institutional Sales and Trading working with Family Offices, Hedge Funds and Foundations at such firms as SG Cowen,<br>', '2016-12-13', '1', 1),
(9, 'Steven Saltzstein', 'Steven', '', '1481692226-2815850d4420a8c8.jpg', 'Steven Saltzstein', 'Steven Saltzstein', 'Mr. Saltzstein has worked in the alternative investment industry since 1996 where he served as a portfolio manager of both equity and credit strategies. He has invested in such industries.<br>', '2016-12-13', '1', 2),
(12, 'Andrew Schneider', 'Andrew Schneider', '', '1481692235-2935850d44b018a2.jpg', 'Andrew Schneider', 'Andrew Schneider', '<span open="" sans",="" sans-serif;="" font-size:="" 13px;="" text-align:="" center;="" background-color:="" rgb(221,="" 221,="" 221);"="">Andrew Schneider Founded The Family Office Networks in 2012 after realizing the benefits of a family office network from running his own family office, the Schneider Family Office.</span>', '2016-12-13', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
`link_id` int(11) NOT NULL,
  `link_title` varchar(300) NOT NULL,
  `link_url` text NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE IF NOT EXISTS `mail_settings` (
  `email` varchar(200) NOT NULL,
  `news_inquiry` text NOT NULL,
  `contact_inquiry` text NOT NULL,
  `quick_contact` varchar(100) NOT NULL,
  `user_inquiry` text NOT NULL,
  `testimonial_status` varchar(1) NOT NULL,
  `package_inquiry` text NOT NULL,
  `package_status` varchar(1) NOT NULL,
  `footer_contact` text NOT NULL,
  `quick_contact_title` varchar(300) NOT NULL,
  `copyright_title` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`email`, `news_inquiry`, `contact_inquiry`, `quick_contact`, `user_inquiry`, `testimonial_status`, `package_inquiry`, `package_status`, `footer_contact`, `quick_contact_title`, `copyright_title`) VALUES
('info@test.com', '', 'Thank you! \r\nYour sample request has been submitted successfully.', '123456690', '', 'N', 'Thank you! \r\nYour Product Inquiry has been submitted successfully.', 'N', '', 'Call For More Info!', 'Â© 2016 PBfoa. All rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`menu_id` int(11) NOT NULL,
  `menu_title` varchar(300) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_title`, `menu_slug`, `parent`, `orderid`) VALUES
(1, 'Membership', 'membership', '0', 1),
(2, 'Events', 'events', '0', 2),
(3, 'News', 'news', '0', 3),
(5, 'Current Events', 'current-events', 'Events', 5),
(7, 'Service Providers', 'service-providers', '0', 7),
(8, 'Sponsorship', 'sponsorship', 'Events', 8),
(9, 'Luxury', 'luxury', '0', 9),
(10, 'Locations', 'locations', '0', 10),
(11, 'About Us', 'about-us', '0', 11),
(12, 'Contact us', 'contact-us', '0', 12),
(13, 'Family Office News', 'family-office-news', 'News', 13),
(14, 'Whitepapers', 'whitepapers', 'News', 14),
(15, 'Press Releases', 'press-releases', 'News', 15),
(17, 'Submit to FON News', 'submit-to-fon-news', 'News', 17),
(18, 'Our Mission', 'our-mission', 'About Us', 18),
(19, 'Team', 'team', 'About Us', 19),
(20, 'In the News', 'in-the-news', 'About Us', 20),
(21, 'Blog', 'blog', 'About Us', 21),
(22, 'FAQ', 'faq', 'About Us', 22);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_title` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `news_image` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `news_url` varchar(300) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `blog_tags` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `news_date` date NOT NULL,
  `news_description` longtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `category_id`, `news_title`, `news_image`, `news_url`, `blog_tags`, `news_date`, `news_description`, `url`, `orderid`) VALUES
(1, 1, 'ghl', '', '', '', '2016-11-17', 'kjg', '', 0),
(2, 1, 'ghl', '', '', '', '2016-11-17', 'kjg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
`category_id` tinyint(4) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `orderid` int(11) NOT NULL,
  `bgcolor` varchar(300) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`category_id`, `category_name`, `orderid`, `bgcolor`) VALUES
(1, 'Demo', 0, ''),
(2, 'test1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `other_membership`
--

CREATE TABLE IF NOT EXISTS `other_membership` (
`id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_des` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `Date` text NOT NULL,
  `Createdby` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other_membership`
--

INSERT INTO `other_membership` (`id`, `fname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `notes`, `Date`, `Createdby`) VALUES
(14, 'Gennaro Petruzzelli', 'gennarop@insiteus.com', '9542942924', 'InSite Group', '910 SE 17th Street', 'Fort Lauderdale', 'Florida', '33316', 'United States', 'Participate at events', '', '', ''),
(24, 'Dr. Juliet  ', '', '', 'Global Strategic Medical', '', '', '', '', 'United States', '', 'waste of time \r\nfound her through waypoint\r\ncoming to our events to find a boyfriend ', '2016-12-06 02:54:12pm', ''),
(20, 'david levy', 'dlevy@blueskyjets.net', '5615128055', 'BlueSky Jets', '500 S Australian Ave', 'West Palm Beach', 'Florida', '33401', 'United States', 'We are a private jet charter organization.', '', '2016-11-28 02:14:19pm', ''),
(21, 'Anne-Marie Rouse', 'annemarie.rouse@commandscape.com', '5616358292', 'CommandScape', '9678 Shepard Place', 'Wellington', 'Florida', '33414', 'United States', '', '', '2016-12-01 02:13:11pm', ''),
(22, 'Richard ', 'Libliner', '', '', '', '', '', '', 'United States', 'Attorney', 'go to his office dec 7th \r\nhanding your law suits', '2016-12-06 11:15:45am', ''),
(23, 'Liana', 'Gillooly', '', 'ArcView Group', '', '', '', '', 'United States', '600 investors \r\n125 deals \r\nno b/d\r\nCharges Investors \r\nDiscount to FON members to all upcoming events\r\ncall with CEO 12/2', '', '2016-12-06 12:27:21pm', ''),
(25, 'gjhgjghjk', 'ghjggj@gmail.com', 'jkhnjkhnkj', 'hjghj', 'vhjbhjb', 'jhvhjbj', '', '24345356', 'Bahamas', 'bvvjhbhjbhj', '2016-12-08 04:02:25am Admin - roop<br>2016-12-08 04:03:06am Admin - hj<br>2016-12-08 04:04:08am Admin - hj', '2016-12-08 12:35:39am', 'pbfoa.org'),
(26, 'Bill Robbins ', 'brobbins@wealthforge.com', '', '', '', '', '', '', 'United States', '', '2016-12-09 11:31:45am Michelle Fandozzi - Interested in speaking with \r\nWants to show andrew his website', '2016-12-09 11:31:45am', 'Team');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`page_id` int(11) NOT NULL,
  `page_title` varchar(300) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_detail` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_des` text NOT NULL,
  `page_date` date NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_slug`, `page_detail`, `meta_title`, `meta_des`, `page_date`, `orderid`) VALUES
(1, 'Membership', 'membership', '<h5 style="color:#0059b2;font-family:Open Sans;font-weight:500;font-size:24px;margin-bottom:60px;">\r\nWhich one best describes you?\r\n<span style="color:#d32841">*</span>\r\n</h5>', 'Membership', 'Lorem ipsum is dummy text for the testing purpose<br>', '2016-10-25', 3),
(2, 'Events', 'events', '<h3>Family Office Networks hosts many events</h3>\r\n<p>\r\n</p><p>Family Office Networks hosts many events throughout the year including; mixers, symposiums, cocktail receptions, polo, golf outings, poker tournaments, conferences, luncheons, cigar parties, fashion shows, caviar tastings, yacht parties, and more. Feel comfortable about sharing your ideas and expanding your network as youâ€™re giving back to your community.</p>\r\n<p>More information about our events is available upon request.</p>\r\n<ul class="calendar-list-content">\r\n<li>Mixers</li>\r\n<li>Symposiums</li>\r\n<li>Cocktail Receptions</li>\r\n<li>Polo Outings</li>\r\n<li>Golf Outings</li>\r\n<li>Charity Events</li>\r\n<li>Poker Tournaments</li>\r\n<li>Conferences</li>\r\n<li>Luncheons</li>\r\n<li>Cigar Parties</li>\r\n<li>Fashion Shows</li>\r\n<li>Caviar Tastings</li>\r\n<li>Yacht Parties</li>\r\n</ul>\r\n<p></p>', 'Events', 'Lorem ipsum is dummy text for the testing purpose Events Page J was here messing with stuff<br>', '2016-10-25', 1),
(3, 'News', 'news', '<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Lamborghini_news29july.jpg">\r\n<h2>2018 Lamborghini Aventador Roadster spy spots</h2>\r\n<p>The Aventador has been a stunning success for Lamborghini, with combined sales of all the separate variants already exceeding the 4,099-unit mark achieved by the car''s predecessor, the MurciÃ©lago.</p>\r\n<p>\r\n<a target="_blank" href="http://www.motorauthority.com/news/1057322_2018-lamborghini-aventador-roadster-spy-shots#image=100558616">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Trusts_news29july.jpg">\r\n<h2>Trusts in Estate, Succession Planning Can Help a Business Survive</h2>\r\n<p>As a business owner, you may be more like Prince than you think. The rock idol left no will, or plan so that his multimillion dollar empire and legacy would carry on when he died.</p>\r\n<p>\r\n<a target="_blank" href="http://www.northbaybusinessjournal.com/industrynews/law/5840514-181/trusts-estate-succession-business-planning?artslide=0">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Real_news29july.jpg">\r\n<h2>Real Estate is Top Investing Choice, With Stocks Only Tied for Third, Survey Finds</h2>\r\n<p>Given the recent record highs in the S&amp;P 500 and the Dow Jones industrial average, you might think Americans would feel excited about the future of the stock market. But you''d be wrong, a Bankrate national survey has found.</p>\r\n<p>\r\n<a target="_blank" href="http://www.bankrate.com/finance/consumer-index/financial-security-charts-0716.aspx">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/private-equity _news29july.jpg">\r\n<h2>Private-Equity (Finally) Finding Value in the Oil Patch </h2>\r\n<p>Private-equity firms are beginning to pump money into the oil patch, signaling that Wall Street is gaining confidence that the worst of the energy bust is past.</p>\r\n<p>\r\n<a target="_blank" href="http://blogs.wsj.com/moneybeat/2016/07/18/private-equity-firms-finally-finding-value-in-the-oil-patch/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/merged_news29july.jpg">\r\n<h2>Merged RBC, City National Roll Out Pilot Offices</h2>\r\n<p>After closing a $5 billion deal to acquire City National Bank last November, Royal Bank of Canada (ticker: RY) is bringing in Michael Armstrong as the wealth management unit''s new CEO. He was formerly the global head of wealth management at Jefferies &amp; Co. RBC says Armstrong is not able to discuss his new position at this time, so we asked Tom Sagissor, the newly promoted president of the wealth management arm in the U.S., to share some post-acquisition details.</p>\r\n<p>\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/07/26/merged-rbc-city-national-roll-out-pilot-offices/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/conversations_news29july.jpg">\r\n<h2>Family Offices Are Looking for Conversations Not Speeches </h2>\r\n<p>Dov Baron is a leadership expert who works with c-suite executive groups around the world. So, when recently preparing for a group of high net worth family office principals, at historic Scone Palace in Scotland, he did what he always does for groups like this. Baron designed his presentation with the specific audience, and for this event, the grand setting in mind.</p>\r\n<p>\r\n<a target="_blank" href="http://newswire.net/newsroom/pr/00093143-dov-baron-family-office-leadership.html">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/trouble_news.jpg">\r\n<h2>Trouble for the 1 percent-and a disaster for de Blasio </h2>\r\n<p>Mayor de Blasio doesn''t like inequality. Yet his first three years'' worth of city budgets have made New York even more dependent on the top 1 percent.</p>\r\n<p>\r\n<a target="_blank" href="http://nypost.com/2016/07/24/trouble-for-the-1-percent-and-a-disaster-for-de-blasio/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newss8767698239.jpg">\r\n<h2>In New York, a Falling Market for Trophy Homes in the Sky</h2>\r\nNew York City''s ultraluxury real estate frenzy - with its sky-piercing condominium towers and $100 million price tags - has finally come to an end.\r\n<a target="_blank" href="http://www.nytimes.com/2016/07/12/realestate/luxury/slow-times-on-billionaires-row-as-the-8-digit-boom-fizzles.html?_r=1">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news342893942.png">\r\n<h2>Custody Market''s Evolution Leaving Private Wealth Managers Behind</h2>\r\nTen months ago, our family office made a decision to become part of the family office community. During that time I have had the chance to attend nine different conferences put on by seven different conference organizers, and I have had the chance to meet close to three hundred families. By going through this process I have learned a number of things. The most important item and one that makes 100 percent sense to me is that there is a major family office investment trend.\r\n<a target="_blank" href="http://wealthmanagement.com/technology/custody-markets-evolution-leaving-private-wealth-managers-behind">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newss87698239.jpg">\r\n<h2>Direct Investing A Growing Family Office Trend</h2>\r\nTen months ago, our family office made a decision to become part of the family office community. During that time I have had the chance to attend nine different conferences put on by seven different conference organizers, and I have had the chance to meet close to three hundred families. By going through this process I have learned a number of things. The most important item and one that makes 100 percent sense to me is that there is a major family office investment trend.\r\n<a target="_blank" href="http://www.fa-mag.com/news/direct-investing-a-growing-family-office-trend-27926.html">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newssfsdf42398239.jpg">\r\n<h2>Private Equity Firms Fear Broker-dealer Registration</h2>\r\nOnce a loosely regulated bunch, private equity firms might have to register as broker-dealers or find their ability to charge transaction fees or provide bank-like services impaired. These are the very services that help them attract portfolio companies.\r\n<a target="_blank" href="http://www.pionline.com/article/20160711/PRINT/307119983/private-equity-firms-fear-broker-dealer-registration">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news4fdsadfsadf2398239.jpg">\r\n<h2>Uncle Sam Widens Hunt for Tax Cheats</h2>\r\nThere''s nowhere to hide. If you''re living abroad and think you can get away with not paying taxes on your foreign accounts, ponder again.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/07/12/uncle-sam-widens-hunt-for-tax-cheats/?mod=BOLBlog">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news42398239.jpg">\r\n<h2>Hedge Funds Are Far From Dead </h2>\r\nHedge funds are down, but far from out. The New York state pension is among the big-money investors pumping more money into hedge funds and other "alternative investments" despite bad publicity and public pressure.\r\n<a target="_blank" href="http://nypost.com/2016/07/12/hedge-funds-are-far-from-dead/">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed4.jpg">\r\n<h2>The New Status Symbol of the Super Rich</h2>\r\n<p>\r\nNever mind the yacht, you''re nothing without your own custom-built island. From super-subs to A.I. butlers, Richard Godwin reports on the new status symbols of the super-rich\r\n<a target="_blank" href="http://www.standard.co.uk/lifestyle/esmagazine/the-new-status-symbols-of-the-superrich-from-mark-zuckerberg-s-ai-butlers-to-dubai-s-custombuilt-a3282971.html">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed3.png">\r\n<h2>Slowdown in Merger Deals Attributed to Political Uncertainty</h2>\r\n<p>\r\nIt can be largely blamed for a string of declines in acquisitions announced during the first half of the year in almost every sector, location and size compared with the same period in 2015. Many executives were hesitant to pull the trigger.\r\n<a target="_blank" href="http://www.nytimes.com/2016/07/01/business/dealbook/slowdown-in-merger-deals-attributed-to-political-uncertainty.html?ref=business&amp;_r=0">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed2.jpg">\r\n<h2>How Community Property States Are Different </h2>\r\n<p>\r\nIf you are married and living in the U.S., it''s likely you and your spouse own assets separately in the eyes of the law. Your business, equities, and chattels purchased in your name are solely yours. That''s because most states'' laws treat married individuals as financially unrelated to their spouse, excepting joint accounts or specifications built into a will. However, there are a handful of states-called community property states-that follow another set of rules. These are important to know in case you move to one, or are already living in one.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/06/28/how-community-property-states-are-different/?mod=BOLBlog">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnameds.jpg">\r\n<h2>Life,Love and Legacy </h2>\r\n<p>Whoever first said "where there''s a will there''s a way," was likely referring to humankind''s ability to achieve a positive result through rigid resolve. Through comprehensive estate planning, however, many have found a way to exert some measure of control even after their final days on Earth. While we would like to imagine that a family member''s will is a clear reflection and fulfillment of their wishes and desires, most fall short of that standard.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1163">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/counting.jpg">\r\n<h2>Counting The Super-Rich And Single-Family Offices</h2>\r\n<p>I am regularly asked about the size of the private wealth market, especially the number of people or families with hundreds of millions of dollars. Along the same lines, I am asked about the number of single-family offices.</p>\r\n<p>\r\n<a target="_blank" href="http://www.forbes.com/sites/russalanprince/2016/06/27/counting-the-super-rich-and-single-family-offices/#626a21a3610c">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/balancing.jpg">\r\n<h2>Family office: balancing the ebb and flow</h2>\r\n<p>Buddy Enterprises was founded in 2011 to develop digital health tools in collaboration with the National Health Service. Rooted in social impact, the initiative was designed to support mental health patients and take the pressure off the understaffed and overstretched NHS.</p>\r\n<p>\r\n<a target="_blank" href="http://www.ft.com/cms/s/5d8a2d48-2d51-11e6-bf8d-26294ad519fc,Authorised=false.html?siteedition=uk&amp;_i_location=http%3A%2F%2Fwww.ft.com%2Fcms%2Fs%2F0%2F5d8a2d48-2d51-11e6-bf8d-26294ad519fc.html%3Fsiteedition%3Duk&amp;_i_referer=&amp;classification=conditional_standard&amp;iab=barrier-app#axzz4Cyizoola">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/concept.png">\r\n<h2>The Rolls-Royce Vision 100 concept is completely, irredeemably ridiculous</h2>\r\n<p>Rolls-Royce is a marque known for being exceptional, and today it truly lived up to its name with the unveiling of a new Vision 100 concept car. It''s part of parent company BMW''s centenary celebrations, envisioning what the future of mobility will look like in another 20 or 30 years. The RR answer is simply staggering in the extremism of its opulence and swagger. I witnessed it rolling in to the stage here in London this morning, and it felt like I was attending the inauguration of a giant cruise ship. Measuring nearly 20 feet in length (5.9m) and five feet tall, the Vision 100 dwarfs its occupants and nearby attendants in a way that even the grandest present-day Rolls-Royces can''t quite match.</p>\r\n<p>\r\n<a target="_blank" href="http://www.theverge.com/2016/6/16/11952304/rolls-royce-vision-100-concept-car-photos">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/richkids.jpg">\r\n<h2>Can Rich Kids Learn the Value of Money?</h2>\r\nCan wealthy parents instill a sense of respect for hard-earned riches? It''s not easy but it can be done, sometimes by accident, sometimes by design. That was our takeaway from an exclusive look inside UBS''s Young Successors Program, a boot camp for wealth management for the children of ultra-high-net-worth clients.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/06/24/can-rich-kids-learn-the-value-of-money/?mod=BOLBlog">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/paying.jpg">\r\n<h2>Who''s Paying for All This? </h2>\r\n<p>Achieving balance amid a dizzying array of financial, business and family obligations is impossible if budgeting and spending are also a moving target. To simply focus on bottom-line wealth is only part of the battle. If there is no accountability around cash flow and changes in asset value, a family''s decision-making process can be adversely impacted. For many wealthy families, eliminating complexity and reducing family friction begins with business management.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1165">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/hedge_funds_rent.jpg">\r\n<h2>Collaborative Office Space Available for Hedge Funds, Real Estate Firms, Private Equity and RIAâ€™s</h2>\r\n<p>\r\nLocated in the Center of West Palm Beachâ€™s Business District\r\n<br>\r\n<strong>Monthly Rent : $250 to $2500</strong>\r\n</p>\r\n<p>\r\n<strong>Large Private Offices, Cubicles and Virtual Offices</strong>\r\n</p>\r\n<p>We are proud to offer Hedge Funds, Real Estate Firms, Private Equity and RIAâ€™s located in the Florida area and Around the country the Opportunity to be part of a collaborative financial industry eco-system.</p>\r\n<p>Our 5000 Sq Feet of Space is being rented by Hedge Funds and those in the financial industry community in order to be part of a an environment where everyone can meet and share their :</p>\r\n<p>Intellectual Capital, Deal Flow, Entrepreneurial experience, Best in class service providers, Hedge fund internal dynamics and solutions, Business Experience, etc.</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/shutterstock_70186621(1).jpg">\r\n<h2>Exclusive Guest Article: Jersey Finance On The Rise Of Socially-Responsible Wealth Management</h2>\r\n<p>A noticeable trend in recent years has been that of investing in order to achieve social and other non-financial goals as well as earn returns. Approaches vary: some forms of investment model screen out areas considered undesirable while others seek out companies for their positive qualities.</p>\r\n<p>\r\n<a target="_blank" href="http://www.wealthbriefing.com/html/article.php?id=168247#.VwdZ06KSfIW">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/workshops-chalkboard.jpg">\r\n<h2>FOX Offering Unique Workshop on Designing a Family Office</h2>\r\n<p>Family Office Exchange (FOX), a global membership organization of enterprise families and their key advisors, will be offering its one-of-a-kind Family Office Design Workshop on June 8-9 in Chicago. The Workshop is for business-owning families and families with new liquidity who are setting up a family office or reviewing an existing family office. It provides participants with the knowledge and perspective they need to determine whether a family office is right for them, and the basic structural and background information on how to run one should they decide to do so-including detailed information on family office structures and fees.</p>\r\n<p>\r\n<a target="_blank" href="http://www.einnews.com/pr_news/320117675/fox-offering-unique-workshop-on-designing-a-family-office">Read More </a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/assets.sourcemedia.com.png">\r\n<h2>Behind the Curtain: Best Pay at Single Family Offices</h2>\r\n<p>Single family offices are probably the most opaque segment of the financial advisory business.</p>\r\n<p>\r\n<a target="_blank" href="http://www.bankinvestmentconsultant.com/gallery/fp/practice/behind-the-curtain-best-pay-at-single-family-offices-2696265-1.html">Read More</a>\r\n</p>\r\n</figure>', 'news', 'THIS IS A TEST<br>', '2016-10-22', 2),
(4, 'Service Providers', 'service-providers', '<section class="container">\r\n<p>Our Service Provider Directory is one of Family Office Networkâ€™s most visited areas. &nbsp;More than 25,000 High Net Worth Families and asset, managers frequent this section in order to locate third party providers. Legal services, administrators, accountants and marketing experts that specifically deal with family offices are in high demand. By listing your business with us, you are placing your company directly in front of your target</p><p>audience.</p>\r\n<li class="list_company_btn">\r\n<a href="http://pbfoa.org/directory/?page_id=63">LIST YOUR COMPANY</a>\r\n</li>\r\n<section id="directory-left">\r\n<ul>\r\n<li>\r\n<a href="?page_id=64">Accounting Firms</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=66">Administrators</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=67">Futures/Forex Brokerage</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=68">Advertising</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=71">Govt/Regulatory/Agency/Assoc</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=72">Asset Valuation Services</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=73">Health Insurance</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=74">Attorneys/Lawyers</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=76">Automated Fund Tax Calculations</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=77">Incubators &amp; Financing</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=78">Banks</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=83">Insurance Brokers</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=84">Cash Management</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=85">Insurance Companies</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=88">Charitable Organizations</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=89">IRA Custodian</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=90">Class Action Services</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=93">Life Settlements / Life Insurance</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=95">Luxury Products</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=96">Compliance</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=98">Concentrator</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=100">Conference / Seminar Providers</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=102">Consultants</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=104">Custodians</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=105">Office Space</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=109">Prime Brokers</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=110">Due Diligence</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=114">Email and Messaging Compliance</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=122">Family Office</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=123">Risk Management</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=126">Financial Publishers</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=128">Structured Products</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=131">Workshops/Seminars/Courses</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=132">Third Party Marketing</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=133">Estate Planning</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=135">Trading and Execution</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=137">Multi Family Office</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=139">Valuation</a>\r\n</li>\r\n<li>\r\n<a href="?page_id=141">Wealth Management Services</a></li></ul></section></section>', 'Service providers', 'Service Providers For Family offices', '2016-12-07', 4),
(6, 'Current Events', 'current-events', '<section class="container">\r\n<div class="col-md-12" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; position: relative; min-height: 1px; float: left; width: 1150px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 60px; padding-top: 0px; padding-bottom: 0px;">Family Office Networks hosts many events throughout the year including; mixers, symposiums, cocktail receptions, polo, golf outings, poker tournaments, conferences, luncheons, cigar parties, fashion shows, caviar tastings, yacht parties, and more. Feel comfortable about sharing your ideas and expanding your network as youâ€™re giving back to your community.</p></div><div class="col-md-12" style="box-sizing: border-box; margin: 25px 0px; padding: 0px 15px; position: relative; min-height: 1px; float: left; width: 1150px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><hr style="box-sizing: content-box; height: 0px; margin: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: solid; border-top-color: rgb(238, 238, 238); padding: 0px;"></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:stephanie@nycfoa.org?subject=A%C2%A0Plan%C2%A0for%C2%A0All%C2%A0Seasons" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"><img width="600" class="img-responsive" src="http://familyofficenetworks.yourwaytech.com/events/images/Realestate_Event_duval_stachenfeld.jpg" alt="" style="box-sizing: border-box; border-width: 0px; border-style: initial; vertical-align: middle; max-width: 100%; height: auto; display: block;"></a></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:stephanie@nycfoa.org?subject=The%C2%A0Paradox%C2%A0of%C2%A0Timeless%C2%A0Event%C2%A0Driven%C2%A0Investing" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"><img width="600" class="img-responsive" src="http://familyofficenetworks.yourwaytech.com/events/images/Burton_event4.jpg" alt="" style="box-sizing: border-box; border-width: 0px; border-style: initial; vertical-align: middle; max-width: 100%; height: auto; display: block;"></a></div><div class="col-md-12" style="box-sizing: border-box; margin: 25px 0px; padding: 0px 15px; position: relative; min-height: 1px; float: left; width: 1150px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><hr style="box-sizing: content-box; height: 0px; margin: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: solid; border-top-color: rgb(238, 238, 238); padding: 0px;"></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:peter@pbfoa.org?subject=Communication%C2%A0Equals%C2%A0Capital" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"><img width="600" class="img-responsive" src="http://familyofficenetworks.yourwaytech.com/events/images/genspring.png" alt="" style="box-sizing: border-box; border-width: 0px; border-style: initial; vertical-align: middle; max-width: 100%; height: auto; display: block;"></a></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:stepahnie@nycfoa.org?subject=private%C2%A0debt%C2%A0equals%C2%A0opportunity" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"><img width="600" class="img-responsive" src="http://familyofficenetworks.yourwaytech.com/events/images/Private-Debt-Opportunity.png" alt="" style="box-sizing: border-box; border-width: 0px; border-style: initial; vertical-align: middle; max-width: 100%; height: auto; display: block;"></a></div><div class="col-md-12" style="box-sizing: border-box; margin: 25px 0px; padding: 0px 15px; position: relative; min-height: 1px; float: left; width: 1150px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><hr style="box-sizing: content-box; height: 0px; margin: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px; border-image: initial; border-top-style: solid; border-top-color: rgb(238, 238, 238); padding: 0px;"></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:stephanie@nycfoa.org?subject=Family%C2%A0Offices%C2%A0Investing%C2%A0In%C2%A0the%C2%A0Cannabis%C2%A0Industry" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"><img width="600" class="img-responsive" src="http://familyofficenetworks.yourwaytech.com/events/images/Social_Cannabis_new.jpg" alt="" style="box-sizing: border-box; border-width: 0px; border-style: initial; vertical-align: middle; max-width: 100%; height: auto; display: block;"></a></div><div class="col-md-6 text-center" style="box-sizing: border-box; margin: 0px; padding: 0px 15px; text-align: center; position: relative; min-height: 1px; float: left; width: 575px; color: rgb(52, 52, 52); font-family: " open="" sans",="" sans-serif;="" font-size:="" 16px;="" background-color:="" rgb(255,="" 255,="" 255);"=""><a href="mailto:stephanie@nycfoa.org?subject=Investing%C2%A0in%C2%A0the%C2%A0Peninsula%C2%A0Family%C2%A0Office%C2%A0Opportunities%C2%A0in%C2%A0South%C2%A0Korea" style="box-sizing: border-box; background-color: transparent; color: rgb(51, 122, 183); text-decoration: none;"></a></div>\r\n</section>', 'Current Events', 'This are FON''s Current Events', '2016-11-15', 6),
(7, 'Event Photos and Videos', 'event-photos-and-videos', 'Check Back Soon', 'Event Photos and Videos', 'Check out Photos and Videos from our previous events', '2016-11-15', 7),
(9, 'Sponsorship', 'sponsorship', '<section class="container"><p>Sponsoring a Family Office Networksâ€™ event gives you the exclusive opportunity to connect with family offices within your region and throughout the world. Our platform allows you to position yourself as a thought leader, build your brand awareness, and share your intellectual capital. This positions your firm to in front of both single family offices and multi-family offices in an entertaining and upscale environment.</p></section>', 'Sponsorship', 'Sponsorship', '2016-10-26', 9),
(10, 'Family Office News', 'family-office-news', '<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Lamborghini_news29july.jpg">\r\n<h2>2018 Lamborghini Aventador Roadster spy spots</h2>\r\n<p>The Aventador has been a stunning success for Lamborghini, with combined sales of all the separate variants already exceeding the 4,099-unit mark achieved by the car''s predecessor, the MurciÃ©lago.</p>\r\n<p>\r\n<a target="_blank" href="http://www.motorauthority.com/news/1057322_2018-lamborghini-aventador-roadster-spy-shots#image=100558616">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Trusts_news29july.jpg">\r\n<h2>Trusts in Estate, Succession Planning Can Help a Business Survive</h2>\r\n<p>As a business owner, you may be more like Prince than you think. The rock idol left no will, or plan so that his multimillion dollar empire and legacy would carry on when he died.</p>\r\n<p>\r\n<a target="_blank" href="http://www.northbaybusinessjournal.com/industrynews/law/5840514-181/trusts-estate-succession-business-planning?artslide=0">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Real_news29july.jpg">\r\n<h2>Real Estate is Top Investing Choice, With Stocks Only Tied for Third, Survey Finds</h2>\r\n<p>Given the recent record highs in the S&amp;P 500 and the Dow Jones industrial average, you might think Americans would feel excited about the future of the stock market. But you''d be wrong, a Bankrate national survey has found.</p>\r\n<p>\r\n<a target="_blank" href="http://www.bankrate.com/finance/consumer-index/financial-security-charts-0716.aspx">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/private-equity _news29july.jpg">\r\n<h2>Private-Equity (Finally) Finding Value in the Oil Patch </h2>\r\n<p>Private-equity firms are beginning to pump money into the oil patch, signaling that Wall Street is gaining confidence that the worst of the energy bust is past.</p>\r\n<p>\r\n<a target="_blank" href="http://blogs.wsj.com/moneybeat/2016/07/18/private-equity-firms-finally-finding-value-in-the-oil-patch/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/merged_news29july.jpg">\r\n<h2>Merged RBC, City National Roll Out Pilot Offices</h2>\r\n<p>After closing a $5 billion deal to acquire City National Bank last November, Royal Bank of Canada (ticker: RY) is bringing in Michael Armstrong as the wealth management unit''s new CEO. He was formerly the global head of wealth management at Jefferies &amp; Co. RBC says Armstrong is not able to discuss his new position at this time, so we asked Tom Sagissor, the newly promoted president of the wealth management arm in the U.S., to share some post-acquisition details.</p>\r\n<p>\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/07/26/merged-rbc-city-national-roll-out-pilot-offices/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/conversations_news29july.jpg">\r\n<h2>Family Offices Are Looking for Conversations Not Speeches </h2>\r\n<p>Dov Baron is a leadership expert who works with c-suite executive groups around the world. So, when recently preparing for a group of high net worth family office principals, at historic Scone Palace in Scotland, he did what he always does for groups like this. Baron designed his presentation with the specific audience, and for this event, the grand setting in mind.</p>\r\n<p>\r\n<a target="_blank" href="http://newswire.net/newsroom/pr/00093143-dov-baron-family-office-leadership.html">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/trouble_news.jpg">\r\n<h2>Trouble for the 1 percent-and a disaster for de Blasio </h2>\r\n<p>Mayor de Blasio doesn''t like inequality. Yet his first three years'' worth of city budgets have made New York even more dependent on the top 1 percent.</p>\r\n<p>\r\n<a target="_blank" href="http://nypost.com/2016/07/24/trouble-for-the-1-percent-and-a-disaster-for-de-blasio/">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newss8767698239.jpg">\r\n<h2>In New York, a Falling Market for Trophy Homes in the Sky</h2>\r\nNew York City''s ultraluxury real estate frenzy - with its sky-piercing condominium towers and $100 million price tags - has finally come to an end.\r\n<a target="_blank" href="http://www.nytimes.com/2016/07/12/realestate/luxury/slow-times-on-billionaires-row-as-the-8-digit-boom-fizzles.html?_r=1">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news342893942.png">\r\n<h2>Custody Market''s Evolution Leaving Private Wealth Managers Behind</h2>\r\nTen months ago, our family office made a decision to become part of the family office community. During that time I have had the chance to attend nine different conferences put on by seven different conference organizers, and I have had the chance to meet close to three hundred families. By going through this process I have learned a number of things. The most important item and one that makes 100 percent sense to me is that there is a major family office investment trend.\r\n<a target="_blank" href="http://wealthmanagement.com/technology/custody-markets-evolution-leaving-private-wealth-managers-behind">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newss87698239.jpg">\r\n<h2>Direct Investing A Growing Family Office Trend</h2>\r\nTen months ago, our family office made a decision to become part of the family office community. During that time I have had the chance to attend nine different conferences put on by seven different conference organizers, and I have had the chance to meet close to three hundred families. By going through this process I have learned a number of things. The most important item and one that makes 100 percent sense to me is that there is a major family office investment trend.\r\n<a target="_blank" href="http://www.fa-mag.com/news/direct-investing-a-growing-family-office-trend-27926.html">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/newssfsdf42398239.jpg">\r\n<h2>Private Equity Firms Fear Broker-dealer Registration</h2>\r\nOnce a loosely regulated bunch, private equity firms might have to register as broker-dealers or find their ability to charge transaction fees or provide bank-like services impaired. These are the very services that help them attract portfolio companies.\r\n<a target="_blank" href="http://www.pionline.com/article/20160711/PRINT/307119983/private-equity-firms-fear-broker-dealer-registration">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news4fdsadfsadf2398239.jpg">\r\n<h2>Uncle Sam Widens Hunt for Tax Cheats</h2>\r\nThere''s nowhere to hide. If you''re living abroad and think you can get away with not paying taxes on your foreign accounts, ponder again.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/07/12/uncle-sam-widens-hunt-for-tax-cheats/?mod=BOLBlog">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news42398239.jpg">\r\n<h2>Hedge Funds Are Far From Dead </h2>\r\nHedge funds are down, but far from out. The New York state pension is among the big-money investors pumping more money into hedge funds and other "alternative investments" despite bad publicity and public pressure.\r\n<a target="_blank" href="http://nypost.com/2016/07/12/hedge-funds-are-far-from-dead/">READ MORE</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed4.jpg">\r\n<h2>The New Status Symbol of the Super Rich</h2>\r\n<p>\r\nNever mind the yacht, you''re nothing without your own custom-built island. From super-subs to A.I. butlers, Richard Godwin reports on the new status symbols of the super-rich\r\n<a target="_blank" href="http://www.standard.co.uk/lifestyle/esmagazine/the-new-status-symbols-of-the-superrich-from-mark-zuckerberg-s-ai-butlers-to-dubai-s-custombuilt-a3282971.html">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed3.png">\r\n<h2>Slowdown in Merger Deals Attributed to Political Uncertainty</h2>\r\n<p>\r\nIt can be largely blamed for a string of declines in acquisitions announced during the first half of the year in almost every sector, location and size compared with the same period in 2015. Many executives were hesitant to pull the trigger.\r\n<a target="_blank" href="http://www.nytimes.com/2016/07/01/business/dealbook/slowdown-in-merger-deals-attributed-to-political-uncertainty.html?ref=business&amp;_r=0">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed2.jpg">\r\n<h2>How Community Property States Are Different </h2>\r\n<p>\r\nIf you are married and living in the U.S., it''s likely you and your spouse own assets separately in the eyes of the law. Your business, equities, and chattels purchased in your name are solely yours. That''s because most states'' laws treat married individuals as financially unrelated to their spouse, excepting joint accounts or specifications built into a will. However, there are a handful of states-called community property states-that follow another set of rules. These are important to know in case you move to one, or are already living in one.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/06/28/how-community-property-states-are-different/?mod=BOLBlog">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnameds.jpg">\r\n<h2>Life,Love and Legacy </h2>\r\n<p>Whoever first said "where there''s a will there''s a way," was likely referring to humankind''s ability to achieve a positive result through rigid resolve. Through comprehensive estate planning, however, many have found a way to exert some measure of control even after their final days on Earth. While we would like to imagine that a family member''s will is a clear reflection and fulfillment of their wishes and desires, most fall short of that standard.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1163">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/counting.jpg">\r\n<h2>Counting The Super-Rich And Single-Family Offices</h2>\r\n<p>I am regularly asked about the size of the private wealth market, especially the number of people or families with hundreds of millions of dollars. Along the same lines, I am asked about the number of single-family offices.</p>\r\n<p>\r\n<a target="_blank" href="http://www.forbes.com/sites/russalanprince/2016/06/27/counting-the-super-rich-and-single-family-offices/#626a21a3610c">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/balancing.jpg">\r\n<h2>Family office: balancing the ebb and flow</h2>\r\n<p>Buddy Enterprises was founded in 2011 to develop digital health tools in collaboration with the National Health Service. Rooted in social impact, the initiative was designed to support mental health patients and take the pressure off the understaffed and overstretched NHS.</p>\r\n<p>\r\n<a target="_blank" href="http://www.ft.com/cms/s/5d8a2d48-2d51-11e6-bf8d-26294ad519fc,Authorised=false.html?siteedition=uk&amp;_i_location=http%3A%2F%2Fwww.ft.com%2Fcms%2Fs%2F0%2F5d8a2d48-2d51-11e6-bf8d-26294ad519fc.html%3Fsiteedition%3Duk&amp;_i_referer=&amp;classification=conditional_standard&amp;iab=barrier-app#axzz4Cyizoola">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/concept.png">\r\n<h2>The Rolls-Royce Vision 100 concept is completely, irredeemably ridiculous</h2>\r\n<p>Rolls-Royce is a marque known for being exceptional, and today it truly lived up to its name with the unveiling of a new Vision 100 concept car. It''s part of parent company BMW''s centenary celebrations, envisioning what the future of mobility will look like in another 20 or 30 years. The RR answer is simply staggering in the extremism of its opulence and swagger. I witnessed it rolling in to the stage here in London this morning, and it felt like I was attending the inauguration of a giant cruise ship. Measuring nearly 20 feet in length (5.9m) and five feet tall, the Vision 100 dwarfs its occupants and nearby attendants in a way that even the grandest present-day Rolls-Royces can''t quite match.</p>\r\n<p>\r\n<a target="_blank" href="http://www.theverge.com/2016/6/16/11952304/rolls-royce-vision-100-concept-car-photos">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/richkids.jpg">\r\n<h2>Can Rich Kids Learn the Value of Money?</h2>\r\nCan wealthy parents instill a sense of respect for hard-earned riches? It''s not easy but it can be done, sometimes by accident, sometimes by design. That was our takeaway from an exclusive look inside UBS''s Young Successors Program, a boot camp for wealth management for the children of ultra-high-net-worth clients.\r\n<a target="_blank" href="http://blogs.barrons.com/penta/2016/06/24/can-rich-kids-learn-the-value-of-money/?mod=BOLBlog">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/paying.jpg">\r\n<h2>Who''s Paying for All This? </h2>\r\n<p>Achieving balance amid a dizzying array of financial, business and family obligations is impossible if budgeting and spending are also a moving target. To simply focus on bottom-line wealth is only part of the battle. If there is no accountability around cash flow and changes in asset value, a family''s decision-making process can be adversely impacted. For many wealthy families, eliminating complexity and reducing family friction begins with business management.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1165">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/hedge_funds_rent.jpg">\r\n<h2>Collaborative Office Space Available for Hedge Funds, Real Estate Firms, Private Equity and RIAâ€™s</h2>\r\n<p>\r\nLocated in the Center of West Palm Beachâ€™s Business District\r\n<br>\r\n<strong>Monthly Rent : $250 to $2500</strong>\r\n</p>\r\n<p>\r\n<strong>Large Private Offices, Cubicles and Virtual Offices</strong>\r\n</p>\r\n<p>We are proud to offer Hedge Funds, Real Estate Firms, Private Equity and RIAâ€™s located in the Florida area and Around the country the Opportunity to be part of a collaborative financial industry eco-system.</p>\r\n<p>Our 5000 Sq Feet of Space is being rented by Hedge Funds and those in the financial industry community in order to be part of a an environment where everyone can meet and share their :</p>\r\n<p>Intellectual Capital, Deal Flow, Entrepreneurial experience, Best in class service providers, Hedge fund internal dynamics and solutions, Business Experience, etc.</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/shutterstock_70186621(1).jpg">\r\n<h2>Exclusive Guest Article: Jersey Finance On The Rise Of Socially-Responsible Wealth Management</h2>\r\n<p>A noticeable trend in recent years has been that of investing in order to achieve social and other non-financial goals as well as earn returns. Approaches vary: some forms of investment model screen out areas considered undesirable while others seek out companies for their positive qualities.</p>\r\n<p>\r\n<a target="_blank" href="http://www.wealthbriefing.com/html/article.php?id=168247#.VwdZ06KSfIW">Read More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/workshops-chalkboard.jpg">\r\n<h2>FOX Offering Unique Workshop on Designing a Family Office</h2>\r\n<p>Family Office Exchange (FOX), a global membership organization of enterprise families and their key advisors, will be offering its one-of-a-kind Family Office Design Workshop on June 8-9 in Chicago. The Workshop is for business-owning families and families with new liquidity who are setting up a family office or reviewing an existing family office. It provides participants with the knowledge and perspective they need to determine whether a family office is right for them, and the basic structural and background information on how to run one should they decide to do so-including detailed information on family office structures and fees.</p>\r\n<p>\r\n<a target="_blank" href="http://www.einnews.com/pr_news/320117675/fox-offering-unique-workshop-on-designing-a-family-office">Read More </a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/assets.sourcemedia.com.png">\r\n<h2>Behind the Curtain: Best Pay at Single Family Offices</h2>\r\n<p>Single family offices are probably the most opaque segment of the financial advisory business.</p>\r\n<p>\r\n<a target="_blank" href="http://www.bankinvestmentconsultant.com/gallery/fp/practice/behind-the-curtain-best-pay-at-single-family-offices-2696265-1.html">Read More</a>\r\n</p>\r\n</figure>', 'Family Office News', 'Family Office News<br>', '2016-10-22', 10),
(11, 'Whitepapers', 'whitepapers', '<section class="container">\r\n\r\n<p>Our white papers are written by industry experts and insiders on a variety of topics and are considered among the best available.</p>\r\n<figure class="papers-listing">\r\n<img alt="News Image" src="images/posts/white-papers-1.jpg">\r\n</figure>\r\n<figure class="papers-listing">\r\n<img alt="News Image" src="images/posts/white-papers-2.jpg">\r\n</figure>\r\n<figure class="papers-listing">\r\n<img alt="News Image" src="images/posts/white-papers-3.jpg">\r\n</figure>\r\n</section>', 'Whitepapers', 'Whitepapers<br>', '2016-10-23', 11),
(12, 'Press Releases', 'press-releases', 'Press Releases<br>', 'Press Releases', 'Press Releases<br>', '2016-10-20', 12);
INSERT INTO `pages` (`page_id`, `page_title`, `page_slug`, `page_detail`, `meta_title`, `meta_des`, `page_date`, `orderid`) VALUES
(13, 'Luxury', 'luxury', '<section class="container">\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/i_nteresting.jpg">\r\n<h2>14 Of The Most Interesting Facts Ever</h2>\r\nAlready a site designed to surface interesting stuff, Reddit took it to the next level with a recent thread specifically asking for the most interesting/weird facts that people know. There are more possible iterations of a game of chess than there are atoms in the known universe. - abbazabbbbbbba\r\n<a target="_blank" href="http://all-that-is-interesting.com/interesting-facts-about-the-world#16">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/appliancess.jpg">\r\n<h2>10 high-end appliances that are worth every penny</h2>\r\nLuxury appliances are as much about style and name recognition as they are about performance. Here are 10 favorites from our Ratings that have the requisite cachet-but also the ability to get the job done.\r\n<a target="_blank" href="http://familyofficenetworks.com/a-name-worth-the-price/">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/eevents.jpg">\r\n<h2>Top Luxury Events of 2016</h2>\r\nEach new year brings the best luxury events to attend in the anticipation to discover the best in every class. Whether you love private jets, haute couture, or supercars, the following events will cater to your need for high luxury. Why not meet with the best naval architect to design your own superyacht, or wear a hot new couture dress in your new Ferrari? These luxury events cater to all of your fantasies.\r\n<a target="_blank" href="http://www.forever-events.com/top-luxury-events-of-2016/">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/cigars.jpg">\r\n<h2>The 10 Best Cigars of 2016</h2>\r\nWhen it comes to choosing a great cigar, you have a lot of different options. For this reason, I chose to do our list of the "Best Cigars Of 2016" a little differently than most. I chose 10 cigar manufacturers that are currently putting out what I believe to be the best quality cigars. From there, I selected my favorite cigar from each. Did great manufacturers get snubbed from this list? Probably so. But every cigar on this list is certainly worth it''s top 10 position.\r\n<a target="_blank" href="http://blog.cigarsfor.me/the-10-best-cigars-of-2016/">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/honeymoon.jpg">\r\n<h2>Most Luxurious Honeymoon Destinations</h2>\r\nWith more than 1,000 islands to choose from, finding the perfect Maldivian honeymoon spot isn''t difficult, especially since each one comes with gourmet dining and postcard-worthy sunsets. Plus, you''ll surely revel in newlywed bliss with a few nights in an over-the-water bungalow.\r\n<a target="_blank" href="http://travel.usnews.com/Rankings/Most_Luxurious_Honeymoon_Destinations/">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/stroller.jpg">\r\n<h2>Finally, A Stroller You Don''t Have to Push</h2>\r\nSmart tech is everywhere now, from thermostats to wearable garments, and now it has hit the stroller market. The Smartbe stroller doesn''t just utilize an engine and sensors to roll along in front of you, but it also features a baby cam, temperature control, a bottle warmer, wireless speakers for lullabies and an anti-theft alarm.\r\n<a target="_blank" href="http://www.justluxe.com/lifestyle/electronics/feature-1962722.php">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/expensive.jpg">\r\n<h2>Most Expensive Yacht</h2>\r\nThis floating island, I mean yacht, is still looking for an owner. Preferably one with an extra $400 million lying around to spend (it has dropped in price from it''s original price of $1 billion) and wants to have a hyper yacht that resembles the streets of Monaco.\r\n<a target="_blank" href="http://myfirstclasslife.com/worlds-10-expensive-yachts/?singlepage=13">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Interesting-unnamed.jpg">\r\n<h2>99 Interesting Facts About The World To Blow Your Mind</h2>\r\nWhen adjusted for inflation, John D. Rockefeller is the richest man in the history of the world with a net worth 10 times more than Bill Gates.\r\n<a target="_blank" href="http://all-that-is-interesting.com/interesting-facts-about-the-world#16">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Jewelry-unnamed.png">\r\n<h2>The 10 Most Luxurious Jewelry Brands</h2>\r\nJewelry is an item of everyday life that has a larger significance than many people realize. We use jewelry to add an extra dazzle to an outfit, whether it be in the form of a bracelet, earrings, cufflinks, or even a watch. These beautiful concoctions of rare gems and diamonds being held by high quality gold, platinum or silver are very costly regardless of their small size.\r\n<a target="_blank" href="http://www.therichest.com/luxury/10-luxurious-jewelry-brands-dripping-with-elegance/">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/worth-unnamed.jpg">\r\n<h2>A name worth the price </h2>\r\nIt doesn''t come as a surprise that the most esteemed art throughout history, has always been followed by a notable name. A name followed by a notable price tag. Among those names Picasso, van Gogh, and Warhol sit at the top of our list. Known for their exquisite and Avant Garde nature, these artists have successfully created beautiful investments as we take a moment to admire the appreciation of their work.\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1229">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Beautiful-unnamed.jpg">\r\n<h2>Beautiful Cocktails</h2>\r\nThe national cocktail of Chile and Peru, this drink may have evolved from the Pisco Punch, which was all the rage in San Francisco during the 1849 gold rush.\r\n<a target="_blank" href="http://www.foodandwine.com/slideshows/beautiful-cocktails">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/">\r\n<h2>The 7 most luxurious car interiors in the world</h2>\r\nWe''ve seen some decked out private plane interiors, but not much on cars with truly luxurious insides. That''s because as beautiful as some cars are, few have astonishing interiors to match. Sure, they may come with the finest leather and cushioning, but usually the interiors are too cramped and simply typical to spend time talking about.\r\n<a target="_blank" href="http://www.techinsider.io/the-7-most-luxurious-car-interiors-photos-2016-2">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/residences-unnamed.jpg">\r\n<h2>15 Luxury residences worth your time </h2>\r\nWith the rise in rental services like Airbnb and homelier accommodations; here are 5 luxury rentals that will make you wish you were on a flight headed in that direction.\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1175">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/astoriaunnamed.jpg">\r\n<h2>Waldorf Astoria turn condo in 3 years </h2>\r\nEven if you have never stepped foot in the big apple, you probably still know a thing or two about New York City. You can probably name famous attractions like central park or time square. You can even name buildings like the Empire state Chrysler building.\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1226">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/news-unnamed.jpg">\r\n<h2>Most Expensive Shoes in the World</h2>\r\n<p>Many high-end designers have been inspired by various celebrities, iconic products, classic designs and much more to make these special shoes that cost more than a million bucks! We really wonder who those unknown people are, who have already bought many of these at auctions or across the counters. Never-the-less, let''s look at some of the most expensive shoes in the world and brands who have made it to our elaborate list.</p>\r\n<a target="_blank" href="http://www.fashionlady.in/top-10-worlds-most-expensive-shoes/973">Find Out More</a>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Expensive-Luxury-Items.jpg">\r\n<h2>10 Most Expensive Luxury Items In The World</h2>\r\n<p>Sometimes as humans we like to indulge a little bit and other times its a lot. Some of us seek the luxurious things in life because they make us feel special. Luxury is often synonymous with exclusive and elite, which can often garner negative attention from a broader audience. From Fennel Hudson''s Journal, "Anything that is exclusive will be accused of elitism; living one''s dreams will be called pretentious. So let''s indulge the whim and see where it takes us." So let us indulge in the most luxurious items the world has to offer.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1191">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Truman-Capote.jpg">\r\n<h2>Truman Capote Rendezvous and Shoots in Brazil-Life as a Vogue Assistant in the ''70s</h2>\r\n<p>Hired to be the assistant to Vogue''s Travel Editor in 1973, Richard Alleman embarked on the adventure of a lifetime.</p>\r\n<p>In September 1973, after four years as an actor whose career highlight was playing a counter boy in a McDonald''s commercial, I decided it was time to find a real job. Having majored in English, I was drawn to magazines and managed to wangle an interview at CondÃ© Nast. Vogue had two entry-level positions available, I was told, and in an odd nod to women''s lib, for the first time in the magazine''s almost 100-year history, it was looking to fill them with young men.</p>\r\n<p>\r\n<a target="_blank" href="http://www.vogue.com/13452303/assistant-richard-alleman-travel-editor-despina-messinesi/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Most-Expensive-Houses.jpg">\r\n<h2>13 Of The Most Expensive Houses In The World That Will Make Your Jaw Drop!</h2>\r\n<p>Showcasing 13 of the most expensive houses in the world. Owning a home maybe one of the most expensive things people will buy during their life time. A per Forbes list, here are the top properties on the market that continue to blow the budget of most mortgage providers.</p>\r\n<p>\r\n<a target="_blank" href="http://grabhouse.com/urbancocktail/the-most-expensive-houses-in-the-world/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/film.jpg">\r\n<h2>Film Academy Broadens Voting Pool After Oscars Criticism</h2>\r\n<p>LOS ANGELES - The Academy of Motion Picture Arts and Sciences invited many more minorities and women to join on Wednesday as the first major step in reshaping its membership after the #OscarsSoWhite controversy this year.</p>\r\n<p>The announcement of the unusually large new class - more than twice last year''s number - followed a January pledge by the academy to double its female and minority membership by 2020 after it failed to nominate any minority actors for an Oscar for the second year in a row.</p>\r\n<p>\r\n<a target="_blank" href="http://www.nytimes.com/2016/06/30/business/media/film-academy-broadens-voting-pool-after-oscars-criticism.html">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Ralph.jpg">\r\n<h2>Ralph, White, and Blue </h2>\r\n<p>Ralph Lauren is team USA''s official outfitter for the 5th time in a row. Beijing 2008, Vancouver 2010, London 2012, Sochi 2014 and now Rio 2016 Ralph Lauren will stay true to the Red, White, and Blue patriotic palette for the Rio 2016 Olympic and Paralympic Games. Royalties from the Team USA Collection sales will go to the United States Olympic Committee directly.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1167">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Cocktail-Recipes.jpg">\r\n<h2>Two Summery Cocktail Recipes, One Handy New App</h2>\r\n<p>There have long been apps for making cocktails. But now, there''s one that''s as nice-looking as it is authoritative, thanks to its founding partners: a CFDA Award-winning Instagrammer and a James Beard Award-winning bartender. The Liquor Cabinet, available on iTunes beginning today, offers classic recipes tested and refined by Maxwell Britten, who slung drinks at Williamsburg''s Maison Premiere when it was recognized for its Outstanding Bar Program at the Beard awards earlier this year.</p>\r\n<p>\r\n<a target="_blank" href="http://www.nytimes.com/2016/06/28/t-magazine/food/cocktail-recipes-tequila-mezcal.html">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/gold.jpg">\r\n<h2>Everything that glitters isn''t Gold</h2>\r\n<p>Gold and the US dollar are no longer behaving normally and now is a crucial time for investors to pay attention to this behavior. Following Brexit, investors simultaneously piled into gold and the US dollar, which are both considered safe-havens for investors in the international financial markets. Although both gold and the dollar have rallied, gold is usually considered a hedge against the US dollar. When the dollar goes down, gold goes up. However, this relationship has broken down, both gold and the dollar are surging which is not normal and cast a cloud of uncertainty over the future.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1180">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/caffeine-crazy .jpg">\r\n<h2>China is caffeine crazy </h2>\r\n<p>Coffee is making its way into Chinese culture as demand for the world''s most popular brew increases. China is currently the world''s smallest market for coffee while inhabiting 20% of the world''s population. The Chinese drink less than 2% of the world''s coffee, but that might change as China shifts to a consumer driven economy. In the past four years Coffee consumption has almost tripled, a lot faster than any other major market. An expanding middle class and young generation surrounded by Starbucks have lead the demand for more caffeine.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1189">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/firesflies.jpg">\r\n<h2>How to Talk to Fireflies</h2>\r\n<p> As Earth rotates in the summer, fireflies whisper sweet nothings to each other in the most beautiful language never heard. For millions of years the insects have called to one another secretly, using flashes of light like a romantic morse code. With some rather simple technology - a light and a battery - scientists have been decoding their love notes for years. But recently I learned that you don''t have to be an entomologist to try to talk to fireflies.</p>\r\n<p>\r\n<a target="_blank" href="http://www.nytimes.com/2016/06/30/science/how-to-talk-to-fireflies.html?_r=0">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/circus.jpg">\r\n<h2>Save The Big Apple Circus</h2>\r\n<p>In an effort to promote worthwhile charities please find a letter from Jimmy Zankel, President of the Zankel fund, a private family foundation. Since 1974, the mission of the Big Apple Circus has been to invigorate the communities they serve with the joy and wonder of classical circus. They create a unique shared experience in their tent as well as dedicated outreach programs in healthcare facilities and communities across the nation. The Big Apple Circus needs to raise $2 million to keep going.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/wp-content/themes/family_offices/pdfs/BigAppleCircus_Zankel_v2.pdf">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/billionaire.jpg">\r\n<h2>Private Equity Billionaire John Grayken Is Buying Boston''s Most Expensive Condo</h2>\r\n<p>John Grayken has quietly become the world''s second-richest private equity billionaire, diligently avoided publicity and keeping very private. But the greatest real estate investor of his generation sometimes attracts attention for his personal real estate buys. The Boston newspapers this week figured out that Grayken has struck a deal to buy Boston''s most expensive condominium, a 13,000 square-foot penthouse on the 60th-floor of Millennium Tower, for $33 million. Grayken grew up in the south Boston suburb of Cohasset, where he also owns a small island.</p>\r\n<p>\r\n<a target="_blank" href="http://www.forbes.com/forbes/welcome/#182049b32ed5">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/luxurious.png">\r\n<h2>11 of the most luxurious homes for rent on Airbnb</h2>\r\n<p>For many of us, staying in a luxury home or villa on vacation is a pipe dream - especially when those accommodations cost hundreds or thousands of dollars a night.</p>\r\n<p>\r\n<a target="_blank" href="http://www.businessinsider.com/11-airbnb-luxury-homes-2016-6">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/labels.jpg">\r\n<h2>The Luxury Fashion Labels Most Trusted In Asia</h2>\r\n<p>It''s no surprise luxury labels have rated well in a ranking of Asia''s most trusted brands. After all, despite a recent dip, the luxury fashion market has steadily grown in places like China and to a lesser extent, India, spurred on by the emergence of a new middle class.</p>\r\n<p>\r\n<a target="_blank" href="https://www.luxurydaily.com/louis-vuitton-hermes-and-chanel-only-houses-to-record-growth-report/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Elitechinese.jpg">\r\n<h2>6 Charts Showing How Elite Chinese Millennials Prefer Their Luxury Travel</h2>\r\n<p>\r\nChinese millennial travelers who are very wealthy are best described as super travelers - the average wealthy Chinese millennial has been to 13 countries and traveled abroad 3.3 times for leisure in the past year alone for an average of 25 days. That''s what Marriott International and the Hurun Research Institute highlight in their report about Chinese millennial luxury travelers, a generation that''s fueling outbound travel growth in China and putting plenty of cash behind that.\r\n<a target="_blank" href="http://www.travelmarketreport.com/articles/Six-Luxury-Hotel-Trends">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/reveals.jpg">\r\n<h2>Rolls-Royce reveals futuristic luxury car</h2>\r\n<p>\r\nUltra-luxury car brand Rolls-Royce unveiled an extreme, futuristic concept car Thursday that''s billed as its "first-ever pure vision vehicle." The wild Rolls-Royce Vision Next 100 made its splashy debut at London''s Roundhouse arts venue. It boasts a dazzling design, including 28-inch wheels and a silky wool sofa in the interior. It also has advanced technological features, such as total self-driving capability.\r\n<a target="_blank" href="http://www.usatoday.com/story/money/cars/2016/06/16/rolls-royce-vision-next-100-bmw-group/85974344/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/diamond.jpg">\r\n<h2>World''s largest diamond found in 100 years could fetch over $70M</h2>\r\n<p>\r\nA now famous three-billion-year-old diamond the size of a tennis ball found by Canada''s Lucara Diamond (TSX:LUC) last year could fetch more than US$70 million (or about Cdn$90M) when it goes under Sotheby''s hammer at the end of the month. The giant 1,109-carat rock, known as "Lesedi La Rona" or "our light" (in the Tswana language spoken in Botswana), was unearthed in November at Lucara''s Karowe Mine.\r\n<a target="_blank" href="http://www.mining.com/worlds-largest-diamond-found-in-100-years-could-fetch-over-70m/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/dsjjdslgjk.jpg">\r\n<h2>Rs 17 lakh for a dessert? This NY restaurant sells the world''s most expensive desserts and you won''t believe what they put in it</h2>\r\n<p>\r\nNew York: How would you react if somebody told you that they just ate a dessert worth $1000 (Rs 67,000 approximately)? You would probably take it as a bluff and won''t believe it.\r\n<br>\r\nMuch to your disbelief as it may come, there exists a restaurant in New York which servers the most expensive desserts and dishes in the world, the maximum being priced at a staggering $25,000 (around Rs 1686 lakh). Serendipity 3 is a restaurant located at 225 East 60th Street, between Second and Third avenues in New York City, founded by Stephen Bruce in 1954. The restaurant has been in the limelight for several films, including the 2001 romantic comedy Serendipity.\r\n</p>\r\n<p>\r\n<a target="_blank" href="http://www.indiatvnews.com/lifestyle/news-ny-restaurant-sells-the-world-s-most-expensive-desserts-335612">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/siget.jpg">\r\n<h2>Whiskey of the Year</h2>\r\n<p>A single malt masterpiece by Glenmorangie was this year''s clear star at the prestigious International Whisky Competition. With an exceptional three points shy of a perfect 100, Glenmorangie Signet snagged this year''s Whisky of the Year with a grand total of 97 points. "These awards prove what we have always believed - that Glenmorangie Signet is a truly exceptional whisky," Dr. Lumsden remarked when accepting the prestigious award.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1144">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/poloday.jpg">\r\n<h2>The Luxury Marketing Council of Connecticut-Hudson Valley Celebrates the Luxury of Family at its Second Annual Family Polo Day</h2>\r\n<p>The Luxury Marketing Council of Connecticut-Hudson Valley held its Second Annual Polo Family Day on Sunday, June 12 at Greenwich Polo Club in Greenwich, Connecticut. In attendance were more than 150 members and their families and friends from The Luxury Marketing Council''s Connecticut-Hudson Valley and New York City chapters.</p>\r\n<p>\r\n<a target="_blank" href="http://familyofficenetworks.com/?p=1093">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/travel.jpg">\r\n<h2>Checking in: The future of luxury travel</h2>\r\n<p>\r\nCape Town - IHG (Inter-Continental Hotels Group)\r\n<br>\r\nannounced that its Inter-ContinentalÂ® Hotels &amp; Resorts brand has sought the expertise of Fortune 500 Futurist, Faith Popcorn.\r\n<br>\r\nLooking at luxury travel trends of the future, Faith focused specifically on the guest experience, service, destinations as well as hotel design.\r\n</p>\r\n<p>\r\n<a target="_blank" href="http://www.iol.co.za/travel/travel-tips/checking-in-the-future-of-luxury-travel-2037860">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/2016 Singapore Yacht Show in Review.jpg">\r\n<h2>2016 Singapore Yacht Show in Review</h2>\r\n<p>The 2016 edition of the Singapore Yacht Show (SYS) went off without a hitch this year with great weather and a traditional cacophony of horns to close the event. This year''s show did well to illustrate how SYS has become the principal yachting industry platform for all of Asia. SYS featured a number of premieres, the most visible being the Sun-reef Supreme 68 catamaran, which hosted a spectacular show on the Friday evening.</p>\r\n<p>\r\n<a target="_blank" href="http://www.realtor.com/news/trends/mommie-dearest-home-is-runner-up-in-this-weeks-most-expensive-new-listings/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/Mommie.jpg">\r\n<h2>Mommie Dearest'' Mansion Is Runner-Up in the Week''s Most Expensive New Listings</h2>\r\n<p>To our mind, the true star is this week''s runner-up: a cool Colonial in Holmby Hills. This home was used as the filming location for 1981''s "Mommie Dearest," and the echoes of Faye Dunaway''s fabulously over-the-top portrayal of Joan Crawford hangs over the home''s rose garden and pool. Even if you''re not a fan of the trashy cinematic classic, you might appreciate the home''s location. It''s right across the street from the recently sold Playboy mansion.</p>\r\n<p>\r\n<a target="_blank" href="http://www.realtor.com/news/trends/mommie-dearest-home-is-runner-up-in-this-weeks-most-expensive-new-listings/">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/chines.jpg">\r\n<h2>Chinese luxury real estate investments leaving the ''golden age,'' broker says</h2>\r\n<p>As the Chinese economy is in the midst of a transition, so too, is America''s luxury real estate market, a top broker told CNBC. Chinese investors in U.S. real estate have shifted away from "golden-age" trophy properties and toward "silver" level properties near good school systems, Jacky Teplitzky of Douglas Elliman told CNBC''s "Power Lunch."</p>\r\n<p>\r\n<a target="_blank" href="http://www.cnbc.com/2016/06/06/chinese-luxury-real-estate-investments-leaving-the-golden-age-broker-says.html">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/42.jpg">\r\n<h2>Luxury Travel Trends Shift As Affluent Millennials Act On Their Aspirations</h2>\r\n<p>Many millennials today are entering their peak earning years and gaining more affluence at unprecedented rates. This new generation is changing the face of affluence forever.</p>\r\n<p>\r\n<a target="_blank" href="http://www.forbes.com/sites/jefffromm/2016/03/29/luxury-travel-trends-shift-as-affluent-millennials-act-on-their-aspirations/#6c5b68db22b4">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/52.jpg">\r\n<h2>Luxury car sales in the fast lane?</h2>\r\n<p>For luxury goods investors, high-end art sales tend to grab the biggest headlines. But with automobiles once again racing into the No. 1 slot among best-performing collectibles last year, some have questioned whether the industry will be able to repeat its success 2016.</p>\r\n<p>\r\n<a target="_blank" href="http://www.cnbc.com/2016/03/26/luxury-car-sales-in-the-fast-lane.html">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/1A.jpg">\r\n<h2>Virtual Reality Viewings: The Future of Luxury Real Estate</h2>\r\n<p>Virtual Reality is a growing trend; spanning numerous sectors from gaming to media and most recently adult pornography, itâ€™s no surprise that the property industry, too, is taking advantage of this technological development as a way of marketing luxury property.</p>\r\n<p>\r\n<a target="_blank" href="http://www.bdcmagazine.com/business/technology/virtual-reality-viewings-future-luxury-real-estate-8130">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/21.jpg">\r\n<h2>Airbus thinks it has found a way to alleviate jet lag</h2>\r\n<p>Airbus is hoping its latest feature could be a draw for airlines looking to offer their passengers something beyond the usual menu of overpriced refreshments and upgrades. Its new A350 XWB aeroplane has LED lights that can produce 16.7m different colour shades which, it says, can mimic the light effect of different times of day.</p>\r\n<p>\r\n<a target="_blank" href="http://www.economist.com/blogs/gulliver/2016/04/thatll-be-day">Find Out More</a>\r\n</p>\r\n</figure>\r\n<figure class="news-listing">\r\n<img alt="News Image" src="images/posts/31.jpg">\r\n<h2> Inside the Booming Vintage Luxury Fashion Market</h2>\r\n<p>Sales of high-end vintage attire and accessories are soaring â€“ both in volume and price â€“ and a handful of small businesses are taking advantage of market forces that are making what was old new again.</p>\r\n<p>\r\n<a target="_blank" href="http://www.businessoffashion.com/articles/news-analysis/inside-the-booming-vintage-luxury-fashion-market">Find Out More</a>\r\n</p>\r\n</figure>\r\n</section>', 'Luxury News', 'Luxury News<br>', '2016-11-13', 13),
(15, 'Locations', 'locations', '<section class="container">\r\n<figure>\r\n<figure style="margin: 0px; padding: 0px;"><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;">Family Office Networks is a global network of family offices, financial institutions, CIOâ€™s and industry professionals organized on a regional basis.</p><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;">We strive to deliver best in class service to each one of our members by providing regional offices located throughout the world to better serve you.</p></figure><section id="locations" style="margin: 40px 0px 0px; padding: 0px; float: left; width: 1150px;"><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px;"><a href="http://www.nycfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//nyc-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://londonfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//london-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://houstonfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//houston-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://hongkongfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//hongkong-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://chinafoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//china-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://www.tcifoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//chicago-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://canadafoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//canada-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://brazilfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//brazil-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://bostonfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//boston-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://singaporefoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//singapore-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://pbfoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//palmbeach-logo.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://atlantafoa.org/" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//140612586.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://ttbfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//14136b380.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://switzerlandfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//143721b07.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://sanfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org//images//1669df440.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 367px;"></a><a href="http://denverfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//1424ef29b.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://sfofoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org//images//167522849.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 354px;"></a><a href="http://dallasfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//145eedc47.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://www.miamifoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//14666e2f9.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://www.connfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//1473ba5a4.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://www.wdcfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//14834caa0.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 420px;"></a><a href="http://australiafoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//1494d1980.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://italyfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"><img alt="" src="http://pbfoa.org/images//1505f1219.jpg" style="max-width: 352px; height: 141px; float: left; margin: 0px 14px 15px; width: 375px;"></a><a href="http://www.naplesfoa.org/" target="_blank" style="text-decoration: none; display: inline-block; min-height: 120px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);"></a></p></section></figure><section id="locations">\r\n</section>\r\n</section>', 'Our Locations', 'Our Locations<br>', '2016-11-15', 15);
INSERT INTO `pages` (`page_id`, `page_title`, `page_slug`, `page_detail`, `meta_title`, `meta_des`, `page_date`, `orderid`) VALUES
(16, 'About Us', 'about-us', '<script type="text/javascript" src="js/jquery-1.3.2.js"></script>\r\n<!--<script type="text/javascript" src="js/jquery.galleriffic.js"></script>-->\r\n\r\n<!-- Optionally include jquery.history.js for history support -->\r\n<script type="text/javascript" src="js/jquery.history.js"></script>\r\n<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>\r\n\r\n<script type="text/javascript" src="js/prototype.js"></script>\r\n<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>\r\n<script type="text/javascript" src="js/lightbox.js"></script>\r\n\r\n\r\n<script type="text/javascript">\r\n			jQuery(document).ready(function($) {\r\n				// We only want these styles applied when javascript is enabled\r\n\r\n				// Initially set opacity on thumbs and add\r\n				// additional styling for hover effect on thumbs\r\n				var onMouseOutOpacity = 0.67;\r\n				$(''#more_images ul.more_images li'').opacityrollover({\r\n					mouseOutOpacity:   onMouseOutOpacity,\r\n					mouseOverOpacity:  1.0,\r\n					fadeSpeed:         ''fast'',\r\n					exemptionSelector: ''.selected''\r\n				});\r\n\r\n				// Initialize Advanced Galleriffic Gallery\r\n				var gallery = $(''#more_images'').galleriffic({\r\n					delay:                     2500,\r\n					numThumbs:                 5,\r\n					preloadAhead:              10,\r\n					enableTopPager:            true,\r\n					enableBottomPager:         true,\r\n					maxPagesToShow:            7,\r\n					imageContainerSel:         ''#b_img'',\r\n					controlsContainerSel:      ''#controls'',\r\n					captionContainerSel:       ''#caption'',\r\n					loadingContainerSel:       ''#loading'',\r\n					renderSSControls:          false,\r\n					renderNavControls:         false,\r\n					playLinkText:              ''Play Slideshow'',\r\n					pauseLinkText:             ''Pause Slideshow'',\r\n					prevLinkText:              ''â€¹ Previous Photo'',\r\n					nextLinkText:              ''Next Photo â€º'',\r\n					nextPageLinkText:          ''Next â€º'',\r\n					prevPageLinkText:          ''â€¹ Prev'',\r\n					enableHistory:             false,\r\n					autoStart:                 false,\r\n					syncTransitions:           true,\r\n					defaultTransitionDuration: 900,\r\n					onSlideChange:             function(prevIndex, nextIndex) {\r\n						// ''this'' refers to the gallery, which is an extension of $(''#thumbs'')\r\n						this.find(''ul.more_images'').children()\r\n							.eq(prevIndex).fadeTo(''fast'', onMouseOutOpacity).end()\r\n							.eq(nextIndex).fadeTo(''fast'', 1.0);\r\n					},\r\n					onPageTransitionOut:       function(callback) {\r\n						this.fadeTo(''fast'', 0.0, callback);\r\n					},\r\n					onPageTransitionIn:        function() {\r\n						this.fadeTo(''fast'', 1.0);\r\n					}\r\n				});\r\n			});\r\n		</script>\r\n\r\n\r\n	<article id="main_header_wrapper">\r\n		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>\r\n		\r\n\r\n		<script>\r\n			$(document).ready(function(){\r\n				$("#menu-icon").click(function(){\r\n					$("#menu-panel").slideToggle("slow");\r\n				});\r\n			});\r\n		</script>\r\n	</article>\r\n\r\n	   	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>\r\n\r\n		  <script>\r\n		  $(''h3'').each(function() {\r\n				var word = $(this).html();\r\n				var index = word.indexOf('' '');\r\n				if(index == -1) {\r\n					index = word.length;\r\n				}\r\n				$(this).html(''<span class="first-word">'' + word.substring(0, index) + ''</span>'' + word.substring(index, word.length));\r\n			});\r\n		  </script>\r\n\r\n	  	  		<div class="inner_banner page_id_48"></div>\r\n\r\n\r\n        <div id="main_data_div">\r\n       	  <div id="lft_data">\r\n\r\n					<article id="inner-page-wrapper">\r\n			<section class="container page_container_team">\r\n				<h1 class="entry-title">Our Team</h1>\r\n				<div class="page_content_team">\r\n				<p>Family Office Networks is a community of Family Offices located throughout the world. Organized on a regional basis, FON has associations in almost every money center in the U.S. and throughout the globe. Family Office Networks is first and foremost a community. We bring families together to share; unique deal flow, intellectual capital, philanthropic strategies, alternative investments, multi-generational capital preservation strategies, Inter-family dynamic strategies and best in class service providers.</p>\r\n				</div>\r\n\r\n						<script src="js/paging.js"></script>\r\n\r\n							<p class="next_prive_area" style="float:left; ">	<a class="prev" href="#">prev</a><button class="grid">Grid View</button>\r\n							<a class="next" href="#">next</a>\r\n							</p>\r\n\r\n							<p style="float:right; "><span id="count"></span>  <span id="total"></span></p>\r\n								<p style="clear:both; overflow:hidden; display:block;hieght:0px; margin:0px;"></p>\r\n							<ul class="grid" id="wrapper">\r\n										<figure class="team_page">\r\n			<img src="images/posts/ourteam_mand.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Mandi Schneider  <span>FON Mascot</span></h3>\r\n				<figcaption><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>\r\n\r\n<section class="container">\r\n<p>Watching</p>\r\n\r\n<ul class="watching">\r\n	<li>DogTV</li>\r\n	<li>Animal Planet</li>\r\n	<li>Iron Chef</li>\r\n</ul>\r\n\r\n<p><br>\r\nReading</p>\r\n\r\n<ul class="watching">\r\n	<li>The Dogs of War</li>\r\n	<li>The Joy of Cooking</li>\r\n	<li>Audubon Guide to Birds</li>\r\n</ul>\r\n\r\n<p>Linking</p>\r\n\r\n<ul class="watching">\r\n	<li>DogShaming.com</li>\r\n	<li>PetFinder.com</li>\r\n	<li>PackDog.com</li>\r\n</ul>\r\n\r\n<ul class="flying">\r\n	<li><img alt="" src="http://santabarbarafoa.org/images//165533099.jpg" style="width: 216px; height: 281px;"></li>\r\n	<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n</ul>\r\n</section>\r\n</figcaption>\r\n			</figure>\r\n			<figure class="team_page">\r\n			<img src="images/posts/andrew_img.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Andrew Schneider  <span>Ceo / Founder</span></h3>\r\n				<figcaption><p>Andrew Schneider Founded The Family Office Networks in 2012 after realizing the benefits of a family office network from running his own family office, the Schneider Family Office. His family office greatly benefited from a small community of his peers (FOs) with whom he shared transactions, service providers and funds. This innovative idea lead to a network of 3000 family office half of whom aredomestic and half of whom are international. Andrew Schneider is also a leading authority regarding hedge fund and related services. Most recently, he developed the group Global Hedge Fund Advisors. Mr. Schneider is the CEO and president of this group, which is an international firm that is quickly making its mark in the hedge fund industry. Prior to Global Hedge Fund Advisors, Andrew Schneider was a founding member of HedgeCo Networks, a hedge fund research and services firm. This firm provided consulting services to both new and existing hedge funds.</p>\r\n\r\n<p>Further, within this position Mr. Schneider was charged with the responsibility of overseeing more than 7,000 hedge funds, which included a community of more than 40,000 members. Previous professional appointments include both Morgan Stanley as well as Prudential Securities. At Morgan Stanley, Andrew was a vice president who managed more than $100 million of high net worth individual assets as well as helped manage assets for institutions as well as high net worth clients.</p>\r\n\r\n<p>Further, he participated in numerous private placements, PIPE transactions and public offerings with a total value of $250 million. While at Prudential, Andrew Schneider was the number one producer and broker and, in fact, managed over $50 million in his first year with them. Mr. Schneider has been quoted in several financial publications concerning the hedge fund community and has also appeared on financial networks such as CNBC. His expertise has proved to be critical in the accurate reporting of not just hedge fund issues, but other related financial topics as well. Some of these publications include the New York Post, Barrons, Markets Media and The Street.Mr. Schneider attended The State University at Albany. He is also an active member of the American Heart Association, committed to the cause of research and development of alternative remedies for cardiac disorders.</p>\r\n\r\n<section class="container">\r\n<ul class="watching">\r\n	<li>Watching</li>\r\n	<li>This Old House</li>\r\n	<li>Top Gear</li>\r\n	<li>Diners, Drive-Ins and Dives</li>\r\n</ul>\r\n\r\n<ul class="reading">\r\n	<li>Reading</li>\r\n	<li>Consumer Reports</li>\r\n	<li>Ebgineering News Record</li>\r\n	<li>Autoblog</li>\r\n</ul>\r\n\r\n<ul class="linking">\r\n	<li>Linking</li>\r\n	<li>PR Newser</li>\r\n	<li>The Verge</li>\r\n	<li>Memeoradum</li>\r\n</ul>\r\n\r\n<ul class="flying">\r\n	<li><img alt="Plying Always" src="http://santabarbarafoa.org/images/96cb4e37.jpg"></li>\r\n	<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n</ul>\r\n</section>\r\n</figcaption>\r\n			</figure>\r\n			<figure class="team_page">\r\n			<img src="images/steven_web.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Steven Saltzstein <span>CEO</span></h3>\r\n				<figcaption><p>Mr. Saltzstein has worked in the alternative investment industry since 1996 where he served as a portfolio manager of both equity and credit strategies. He has invested in such industries as: healthcare, technology, oil and gas, mining, alternative energy, bio-technology and industrial manufacturing. As well, Mr. Saltzstein worked as a fund advisor sourcing, structuring, negotiating and closing transactions on behalf of several large domestic private equity and hedge funds.</p>\r\n\r\n<p>Prior to this, Mr. Saltzstein worked at GMR Marketing where he served as Special Projects Director on accounts such as Phillip Morris, Miller Brewing Company and Kraft, Inc. As well, he spent significant time in the telecommunications industry working for such companies as AT&amp;T and Telecard, Inc.</p>\r\n\r\n<p>Mr. Saltzstein is a founding partner of LXE Marketing and Media. LXE Marketing is an agency that is focused on creating branding and marketing campaigns for the alternative investment industry with a specific focus on lead generation and asset gathering. LXEâ€™s expertise in message discovery, collateral creation, website design and thought leadership are used for marketing campaigns with extremely high ROIs. These campaigns leverage LXEs proprietary data for targeting and re-targeting of accredited investors, QPs, pension funds, endowments, SFOs, MFOs, platforms, RIAs and FAs.</p>\r\n\r\n<section class="container">\r\n<ul class="watching">\r\n	<li>Watching</li>\r\n	<li>This Old House</li>\r\n	<li>Top Gear</li>\r\n	<li>Diners, Drive-Ins and Dives</li>\r\n</ul>\r\n\r\n<ul class="reading">\r\n	<li>Reading</li>\r\n	<li>Consumer Reports</li>\r\n	<li>Ebgineering News Record</li>\r\n	<li>Autoblog</li>\r\n</ul>\r\n\r\n<ul class="linking">\r\n	<li>Linking</li>\r\n	<li>PR Newser</li>\r\n	<li>The Verge</li>\r\n	<li>Memeoradum</li>\r\n</ul>\r\n\r\n<ul class="flying">\r\n	<li><img alt="" src="http://santabarbarafoa.org/images/steven_mugshot.fw.png" style="width: 216px; height: 281px;"></li>\r\n	<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n</ul>\r\n</section>\r\n</figcaption>\r\n			</figure>\r\n\r\n			<figure class="team_page">\r\n			<img src="images/posts/peter_apostol.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Peter Apostol <span>Vice President</span></h3>\r\n				<figcaption><p>Peter was born in New York, growing up in Hudson Valley before moving to Miami to attend University of Miami. At the University of Miami, he studied international financing, marketing and English. Mr. Apostol also studied in Europe, Ukraine and South America.While in Miami, he ran a marketing company called RX Ventures and partnered with Josh Sagman Consulting when he moved to Palm Beach.While in Palm Beach, he started working in the family office space with financing private equity deals.Peter currently lives in Palm Beach enjoying tennis and sailing.</p>\r\n\r\n			<section class="container">\r\n			<ul class="watching">\r\n			<li>Watching</li>\r\n			<li>This Old House</li>\r\n			<li>Top Gear</li>\r\n			<li>Diners, Drive-Ins and Dives</li>\r\n			</ul>\r\n\r\n			<ul class="reading">\r\n			<li>Reading</li>\r\n			<li>Consumer Reports</li>\r\n			<li>Ebgineering News Record</li>\r\n			<li>Autoblog</li>\r\n			</ul>\r\n\r\n			<ul class="linking">\r\n			<li>Linking</li>\r\n			<li>PR Newser</li>\r\n			<li>The Verge</li>\r\n			<li>Memeoradum</li>\r\n			</ul>\r\n\r\n			<ul class="flying">\r\n			<li><img alt="" src="http://santabarbarafoa.org/images//152ee2901.jpg" style="width: 216px; height: 281px;"></li>\r\n			<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n			</ul>\r\n			</section>\r\n			</figcaption>\r\n			</figure>\r\n\r\n\r\n\r\n			<figure class="team_page">\r\n			<img src="images/posts/Howard_Glynn.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Howard Glynn  <span>Vice President</span></h3>\r\n				<figcaption><p>Howard Glynn, is a 18 year Wall Street veteran with experience in Institutional Sales and Trading working with Family Offices, Hedge Funds and Foundations at such firms as SG Cowen, Gruntal &amp; Co., Pali Capital and Maxim Group. Mr. Glynn has worked at GLP where he consulted with investment banks on implementing algorithmic trading systems.&nbsp;</p>\r\n\r\n<p>Along with his extensive Wall Street knowledge, Howard has over 8 years of Project management and Business Development experience in the Live Event entertainment space working at both Sony Signatures and the Araca Group. Howard worked as a project manager overseeing all the Broadway licensing and merchandise for the shows Chicago and Grease for Sony Signatures. As a Vice President of Business Development for The Araca Group, Howard developed new business ventures in live entertainment, with such projects as the Rascals reuniting for six sold out shows paving the way to a historic reunion tour and coordinating two sold out Robert Hunter tours. Bridging his Finance relationships with live events, he is now a Partner with the Family Office Networks overseeing events and client services. Howard has a B.A. from Tulane University and lives in Chappaqua, NY with his wife and three children.</p>\r\n\r\n<section class="container">\r\n<ul class="watching">\r\n	<li>Watching</li>\r\n	<li>This Old House</li>\r\n	<li>Top Gear</li>\r\n	<li>Diners, Drive-Ins and Dives</li>\r\n</ul>\r\n\r\n<ul class="reading">\r\n	<li>Reading</li>\r\n	<li>Consumer Reports</li>\r\n	<li>Ebgineering News Record</li>\r\n	<li>Autoblog</li>\r\n</ul>\r\n\r\n<ul class="linking">\r\n	<li>Linking</li>\r\n	<li>PR Newser</li>\r\n	<li>The Verge</li>\r\n	<li>Memeoradum</li>\r\n</ul>\r\n\r\n<ul class="flying">\r\n	<li><img alt="" src="http://santabarbarafoa.org/images/hav_mugshot.fw.png" style="width: 216px; height: 281px;"></li>\r\n	<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n</ul>\r\n</section>\r\n</figcaption>\r\n			</figure>\r\n\r\n\r\n\r\n\r\n\r\n\r\n			<figure class="team_page">\r\n			<img src="images/steven_web2.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Mike Mitchell  <span>Regional Director</span></h3>\r\n				<figcaption><p>Mike Mitchell has over 13 years of experience in financial analysis and consulting. He started his career as an equities trader employing a long/short trading methodology utilizing a variety of pair trading and black box quantitative strategies. Afterwards he spent over 7 years as an alternative investment consultant where he analyzed a wide spectrum of hedge and private equity funds and consulted with a variety of family office and institutional allocators.</p>\r\n\r\n			<p>He also spent 3 years as a financial advisor at Merrill Lynch and Citi where he created and implemented asset allocation strategies, worked with clients to optimize their debt structure and did syndicate work. Mike has a degree in Economics from the University of California, San Diego, is a CAIA charter holder (2007) and he is currently a CFA Level II Candidate. Mike lives in San Diego and in his free time enjoys surfing, fishing and jiu jitsu.</p>\r\n\r\n\r\n			<section class="container">\r\n			<ul class="watching">\r\n			<li>Watching</li>\r\n			<li>This Old House</li>\r\n			<li>Top Gear</li>\r\n			<li>Diners, Drive-Ins and Dives</li>\r\n			</ul>\r\n\r\n			<ul class="reading">\r\n			<li>Reading</li>\r\n			<li>Consumer Reports</li>\r\n			<li>Ebgineering News Record</li>\r\n			<li>Autoblog</li>\r\n			</ul>\r\n\r\n			<ul class="linking">\r\n			<li>Linking</li>\r\n			<li>PR Newser</li>\r\n			<li>The Verge</li>\r\n			<li>Memeoradum</li>\r\n			</ul>\r\n\r\n			<ul class="flying">\r\n			<li><img alt="" src="images/mike_mugshot.fw.png"></li>\r\n			<li><a href="#"><img alt="icon" src="images/team-facebook.jpg"></a> <a href="#"><img alt="icon" src="images/team-linkedin.jpg"></a> <a href="#"><img alt="icon" src="images/team-twitter.jpg"></a> <a href="#"><img alt="icon" src="images/team-googleplus.jpg"></a> <a href="#"><img alt="icon" src="images/team-email.jpg"></a></li>\r\n			</ul>\r\n			</section>\r\n			</figcaption>\r\n			</figure>\r\n\r\n			<figure class="team_page">\r\n			<img src="img/team/tyler_wood.jpg" class="list_prev" alt="Speakr Img">\r\n				<h3 class="list_prev">Tyler Wood  <span>Regional Director</span></h3>\r\n				<figcaption><p>Mr. Wood has been offering a suite of alternative investments in the hedge fund and managed futures industries for over 15 years to clients worldwide. Portfolios ranging from floor trading specialists to algorithmically driven, automated trading systems. Characterized throughout his career with a personal and positive communication style that inspires people to act decisively towards a common goal.</p>\r\n\r\n<p>Specialties: Alternatives Portfolio Development, Managed Futures Business Development, International Finance, Compliance, and various aspects within the Alternative Investment, and Wealth Management industries.</p>\r\n\r\n<p>Consulting private clients in the formation of trusts, hedge funds, and foundations along with construction of their alternative investment portfolios. His international business education includes studies in France, Panama, Venezuela, Brazil, South Africa, India, Malays</p></figcaption></figure></ul></section></article></div></div>', 'About Us', 'About Us', '2016-12-12', 16),
(17, 'Our Mission', 'our-mission', '<div class="page_content_team">\r\n<div class="mission-left">\r\n<p>Family Office Networks is dedicated to bringing family offices together throughout the world by leveraging our technology, personal introductions, events and news. Our platform allows Family Offices to comfortably share; unique deal flow, capital preservation strategies, philanthropic strategies, alpha generating alternative investments and best in class service providers.</p>\r\n<img src="http://japanfoa.org/images/mission-img.jpg">\r\n</div>\r\n<div class="mission-right">\r\n<p>Family Office Networks is a community of Family Offices located throughout the world. Organized on a regional basis, FON has associations in almost every money center in the U.S. and throughout the globe. Family Office Networks is first and foremost a community. We bring families together to share; unique deal flow, intellectual capital, philanthropic strategies, alternative investments, multi-generational capital preservation strategies, Inter-family dynamic strategies and best in class service providers.</p>\r\n<p>The goal is to provide multi-generational support to family structures in order to ensure continued success and wealth preservation. FON provides these services to both single family and multi-family offices. Family Office Networks, which serves as the hub of the Associations currently has over 25,000+ users including 8,000 family offices in the U.S. and throughout the world.</p>\r\n</div>\r\n</div>', 'Our Mission', 'Our Mission<br>', '2016-10-22', 17),
(19, 'In the News', 'in-the-news', 'In the News<br>', 'In the News', 'In the News<br>', '2016-10-20', 19),
(20, 'Submit to FON News', 'submit-to-fon-news', '', 'Submit to FON News', 'Blog<br>', '2016-10-26', 20),
(21, 'FAQ', 'faq', 'FAQ<br>', 'FAQ', 'FAQ<br>', '2016-10-20', 21),
(22, 'Contact us', 'contact-us', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3564.026218479091!2d-80.05441828573377!3d26.711609375150644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8d68a1fcf3cad%3A0xd7c4c8ba98d7c157!2s307+Evernia+St%2C+West+Palm+Beach%2C+FL+33401!5e0!3m2!1sen!2s!4v1467109962635" style="border:0; width:100%;" allowfullscreen="" height="400" frameborder="0"></iframe>', 'Contact us', 'Contact us<br>', '2016-11-10', 22),
(23, 'List your company', 'list-your-company', '<section class="container">\r\n				<h1>Services Provider Directory</h1>\r\n				\r\n				<p>Palm Beach Family Office Association Service Provider Directory lists over 2,000 companies which provide valuable services to the global hedge fund industry. If you would like to list your company in our service provider directory register here or contact our sales department at (561) 689-8901 or email sales@PBFOA.org.</p>\r\n				<li class="list_company_btn"><a href="http://jdhflora.com/list-your-company">LIST YOUR COMPANY </a></li>\r\n				\r\n				<section id="directory-left">\r\n				\r\n\r\n					\r\n					<ul>\r\n							<li><a href="">Accounting Firms</a></li><li><a href="">Administrators</a></li><li><a href="">Futures/Forex Brokerage</a></li><li><a href="">Advertising</a></li><li><a href="">Govt/Regulatory/Agency/Assoc</a></li><li><a href="">Asset Valuation Services</a></li><li><a href="">Health Insurance</a></li><li><a href="">Attorneys/Lawyers</a></li><li><a href="">Automated Fund Tax Calculations</a></li><li><a href="">Incubators &amp; Financing</a></li><li><a href="">Banks</a></li><li><a href="">Insurance Brokers</a></li><li><a href="">Cash Management</a></li><li><a href="">Insurance Companies</a></li><li><a href="">Charitable Organizations</a></li><li><a href="">IRA Custodian</a></li><li><a href="">Class Action Services</a></li><li><a href="">Life Settlements / Life Insurance</a></li><li><a href="">Luxury Products</a></li><li><a href="">Compliance</a></li><li><a href="">Concentrator</a></li><li><a href="">Conference / Seminar Providers</a></li><li><a href="">Consultants</a></li><li><a href="">Custodians</a></li><li><a href="">Office Space</a></li><li><a href="">Prime Brokers</a></li><li><a href="">Due Diligence</a></li><li><a href="">Email and Messaging Compliance</a></li><li><a href="">Family Office</a></li><li><a href="">Risk Management</a></li><li><a href="">Financial Publishers</a></li><li><a href="">Structured Products</a></li><li><a href="">Workshops/Seminars/Courses</a></li><li><a href="">Third Party Marketing</a></li><li><a href="">Estate Planning</a></li><li><a href="">Trading and Execution</a></li><li><a href="">Multi Family Office</a></li><li><a href="">Valuation</a></li><li><a href="">Wealth Management Services</a></li></ul></section>\r\n				\r\n				\r\n				</section>', 'List your company', 'List your company<br>', '2016-11-15', 23),
(28, 'Team', 'team', '<div id="lft_data" style="margin: 0px; padding: 0px; color: rgb(52, 52, 52); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(221, 221, 221);"><article id="inner-page-wrapper" style="padding: 50px 0px; min-width: 1150px; width: auto; background: rgb(255, 255, 255); border-bottom: 1px solid rgb(236, 239, 242); margin: 0px !important;"><section class="container page_container_team" style="margin: 0px auto; padding: 0px; width: 1150px; max-width: 1150px;"><div class="page_content_team" style="margin: 0px; padding: 0px;"><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 20px;">Family Office Networks is a community of Family Offices located throughout the world. Organized on a regional basis, FON has associations in almost every money center in the U.S. and throughout the globe. Family Office Networks is first and foremost a community. We bring families together to share; unique deal flow, intellectual capital, philanthropic strategies, alternative investments, multi-generational capital preservation strategies, Inter-family dynamic strategies and best in class service providers.</p></div><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 20px; float: right;"><span id="count"></span><span id="total"></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 20px; clear: both; overflow: hidden;"></p><ul class="grid" id="wrapper" style="margin: 0px; padding: 0px; list-style: none;"><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/ourteam_mand.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Mandi Schneider<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">FON MASCOT</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/andrew_img.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Andrew Schneider<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">CEO / FOUNDER</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/steven_web.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Steven Saltzstein<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">CEO</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/peter_apostol.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Peter Apostol<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">VICE PRESIDENT</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/Howard_Glynn.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Howard Glynn<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">VICE PRESIDENT</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/kenneth.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Kenneth Parzygnat<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DESIGNATION</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/posts/michael2.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Michael Anthony<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DESIGNATION</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/img/team/tyler_wood.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Tyler Wood<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DESIGNATION</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/steven_web2.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Mike Mitchell<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DESIGNATION</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/img/team/peter-chun.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Peter Chun<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DESIGNATION</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/mark_golden.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Mark Golden<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">EVP STRATEGIC ALLIANCES</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/sunman_web2.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Surej Kalathil<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">CREATIVE DIRECTOR</span></h3></figure><figure class="team_page" style="margin: 40px 9px 0px 8px; padding: 0px; float: left; text-align: center; width: 366px; min-height: 280px; transition: width 1s;"><img src="http://pbfoa.org/images/greg_1.jpg" class="list_prev" alt="Speakr Img" style="max-width: 100%; height: auto; cursor: pointer;"><h3 class="list_prev" style="margin-top: 20px; margin-bottom: 7px; padding-top: 0px; padding-bottom: 0px; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 22px; font-weight: 300; cursor: pointer; color: rgb(214, 37, 63) !important;">Gregg T. Warciski<span style="text-transform: uppercase; font-size: 15px; letter-spacing: 6px; margin-bottom: 20px; display: block; color: gray !important; font-family: &quot;Open Sans&quot;, sans-serif !important;">DIRECTOR OF CLIENT SERVICES</span></h3></figure></ul></section></article><div class="clr" style="margin: 0px; padding: 0px;"></div></div><footer id="footer-wrapper" style="margin: 0px auto; padding-top: 45px; padding-bottom: 0px; min-width: 1150px; width: auto; background: url(&quot;../images/footer-bg.jpg&quot;) center bottom repeat-x rgb(255, 255, 255); overflow: hidden; color: rgb(52, 52, 52); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; padding-right: 0px !important; padding-left: 0px !important;"><section class="container" style="margin: 0px auto; padding: 0px; width: 1150px; max-width: 1150px;"><nav class="register" style="margin: 0px 35px 0px 0px; padding: 0px 0px 80px; float: left;"></nav></section></footer>', 'Fon Team', 'Meet The FON team', '2016-11-15', 28),
(25, 'Member Benefits', 'member-benefits', '<section id="packages">\r\n<figure class="packages-box">\r\n<h2 class="free">Free</h2>\r\n\r\n<ul>\r\n	<li>Discounts for best in class industry professionals.</li>\r\n	<li>Listing in the PBFOA directory</li>\r\n	<li>Discounts to industry events (both domestically and globally).</li>\r\n	<li>Free access to family office webinars.</li>\r\n	<li>Use of the PBFOA logo on your website and other marketing materials.</li>\r\n	<li>May include the term PBFOA MemberÃ¢ â‚¬ â„¢ in their signature.</li>\r\n	<li>Receive our weekly newsletters.</li>\r\n	<li>Receive educational materials and whitepapers.</li>\r\n	<li>May utilize a link to PBFOA website on their website.</li>\r\n	\r\n		\r\n		<input class="free-btn signup-btn" value="Sign up" type="submit">\r\n	\r\n\r\n</ul>\r\n</figure>\r\n\r\n<figure class="packages-box">\r\n<h2 class="bronze">Bronze $1995/year</h2>\r\n\r\n<ul>\r\n	<li>Free admission to all exclusive PBFOA events.</li>\r\n	<li>Personal introductions.</li>\r\n	<li>Membership included for 1-2 employees.</li>\r\n	<li>Discounts for best in class industry professionals.</li>\r\n	<li>Listing in the PBFOA directory</li>\r\n	<li>Discounts to industry events (both domestically and globally).</li>\r\n	<li>Free access to family office webinars.</li>\r\n	<li>Use of the PBFOA logo on your websites or other marketing materials.</li>\r\n	<li>May include the term Ã¢ â‚¬ Ëœ PBFOA Member Ã¢ â‚¬ â„¢ in their signature.</li>\r\n	<li>Receive our weekly newsletters.</li>\r\n	<li>Receive educational materials and whitepapers.</li>\r\n	<li>May utilize a link to PBFOA website on their website.</li>\r\n	\r\n	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->\r\n	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n		<input name="cmd" value="_cart" style="" type="hidden">\r\n		<input name="upload" value="1" style="" type="hidden">\r\n		<input name="business" value="hedgefof@gmail.com" style="" type="hidden">\r\n		<input name="item_name_1" value="Bronze" style="" type="hidden">\r\n		<input name="amount_1" value="1995" style="" type="hidden">\r\n		<input name="currency_code" value="USD" style="" type="hidden">\r\n		<input name="bronze" value="bronze" style="" type="hidden">\r\n		<input name="shopping_url" value="http://pbfoa.org/" style="" type="hidden">\r\n		<input name="return" value="http://pbfoa.org/thank_membership.php?success_key=c7ce8b5faf0e6e7adcc24bb1241469bc" style="" type="hidden">\r\n		<input class="bronze-btn signup-btn" name="bronze" value="Sign up" type="submit">\r\n	</form>\r\n\r\n</ul>\r\n</figure>\r\n\r\n<figure class="packages-box">\r\n<h2 class="silver">Silver $3995/year</h2>\r\n\r\n<ul>\r\n	<li>Includes membership to PBFOA and two additional cities; Palm Beach, Naples, Washington D.C., New York City, Connecticut, Boston, Chicago, Denver, Texas, Seattle, Portland, San Francisco, Los Angeles, San Diego, London, Geneva, Singapore, Hong Kong(as well as other global participants).</li>\r\n	<li>Membership for 3-4 employees.</li>\r\n	<li>Free admission to all exclusive PBFOA events.</li>\r\n	<li>Receive personal introductions.</li>\r\n	<li>Free membership for 1-2 additional employees.</li>\r\n	<li>Discounts to industry events (both domestically and globally).</li>\r\n	<li>Free access to family office webinars.</li>\r\n	<li>Use of the PBFOA logo on their websites or other marketing materials.</li>\r\n	<li>May include the term Ã¢ â‚¬ Ëœ PBFOA Member Ã¢ â‚¬ â„¢ in their signature.</li>\r\n	<li>Receive our weekly newsletters.</li>\r\n	<li>Receive educational materials and whitepapers.</li>\r\n	<li>May utilize a link to PBFOA website on their website.</li>\r\n	\r\n	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->\r\n	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n		<input name="cmd" value="_cart" style="" type="hidden">\r\n		<input name="upload" value="1" style="" type="hidden">\r\n		<input name="business" value="hedgefof@gmail.com" style="" type="hidden">\r\n		<input name="item_name_1" value="Silver" style="" type="hidden">\r\n		<input name="amount_1" value="3995" style="" type="hidden">\r\n		<input name="silver" value="silver" style="" type="hidden">\r\n		<input name="currency_code" value="USD" style="" type="hidden">\r\n		<input name="shopping_url" value="http://pbfoa.org/" style="" type="hidden">\r\n		<input name="return" value="http://pbfoa.org/thank_membership.php?success_key=c7ce8b5faf0e6e7adcc24bb1241469bc" style="" type="hidden">\r\n		<input class="silver-btn signup-btn" name="silver" value="Sign up" type="submit">\r\n	</form>\r\n	\r\n</ul>\r\n</figure>\r\n\r\n<figure class="packages-box">\r\n<h2 class="gold">Gold $7995/year</h2>\r\n\r\n<ul> \r\n	<li>Access to all associations within the FON community; Palm Beach, Naples, Washington D.C., New York City, Connecticut, Boston, Chicago, Denver, Texas, Seattle, Portland, San Francisco, Los Angeles and San Diego, London, Geneva, Singapore, Hong Kong (as well as other global participants).</li>\r\n	<li>Membership for 5-7 additional employees.</li>\r\n	<li>Membership for 3-4 employees.</li>\r\n	<li>Free admission to all exclusive PBFOA events.</li>\r\n	<li>Receive personal introductions.</li>\r\n	<li>Discounts to best in class industry professionals.</li>\r\n	<li>Discounts to industry events (both domestically and globally).</li>\r\n	<li>Free access to family office webinars.</li>\r\n	<li>Use of the PBFOA logo on your websites or other marketing materials.</li>\r\n	<li>May include the term Ã¢ â‚¬ Ëœ PBFOA Member Ã¢ â‚¬ â„¢ in their signature.</li>\r\n	<li>Receive our weekly newsletters.</li>\r\n	<li>Receive educational materials and whitepapers.</li>\r\n	<li>May utilize a link to PBFOA website on their website.</li>\r\n	\r\n	<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">!-->\r\n	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n		<input name="cmd" value="_cart" style="" type="hidden">\r\n		<input name="upload" value="1" style="" type="hidden">\r\n		<input name="business" value="hedgefof@gmail.com" style="" type="hidden">\r\n		<input name="item_name_1" value="Gold" style="" type="hidden">\r\n		<input name="amount_1" value="7995" style="" type="hidden">\r\n		<input name="gold" value="gold" style="" type="hidden">\r\n		<input name="currency_code" value="USD" style="" type="hidden">\r\n		<input name="shopping_url" value="http://pbfoa.org/" style="" type="hidden">\r\n		<input name="return" value="http://pbfoa.org/thank_membership.php?success_key=c7ce8b5faf0e6e7adcc24bb1241469bc" style="" type="hidden">\r\n		<input class="gold-btn signup-btn" name="gold" value="Sign up" type="submit">\r\n	</form>\r\n \r\n</ul>\r\n</figure>\r\n</section>', 'Member Benefits', 'Member Benefits<br>', '2016-10-26', 25),
(26, 'andrew', 'andrew', 'andrew likes to fly', 's,bfljsbf', 'fsfsfbs ,bfs', '2016-11-02', 26),
(27, 'testpage', 'testpage', 'sdf', 'sf', 'adsffa', '2016-11-10', 27);

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE IF NOT EXISTS `service_providers` (
`id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_des` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `marketing_material` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `sponsoringevents` varchar(255) NOT NULL,
  `uscities` varchar(255) NOT NULL,
  `global_chk` varchar(255) NOT NULL,
  `spdire` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `Date` text NOT NULL,
  `Createdby` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `company_logo`, `marketing_material`, `videos`, `sponsoringevents`, `uscities`, `global_chk`, `spdire`, `notes`, `Date`, `Createdby`) VALUES
(17, 'dgfhgh', '', 'kjg', 'kjg', 'kgk', 'gj', 'kg', 'Kansas', 'kg', 'Kazakhstan', 'kg', '', '', '', 'Yes', 'New York City', 'Australia', 'Yes', '', '2016-11-23 12:17:00am', ''),
(12, 'jd1', 'khgd', 'khgd@gmail.com', 'khgd@gmail.com', 'gdkh', 'gdkh', 'gd', 'Kansas', 'kh', 'United States', 'dkh', '', '', '', '', '', '', '', '', '2016-11-23 01:04:47am', ''),
(13, 'hv2', 'jhv', 'ABC@ABC.COM', 'ABC@ABC.COM', ';jb', ';jb', ';jb', '', 'lj', 'United States', 'l', '', '', '', 'No', 'Boston', 'Australia,Australia', 'Yes', 'ff', '2016-11-23 01:05:05am', ''),
(14, 'lkjhgfdsa', 'oiuytrew', 'd@gmail.com', '8765432134', 'asdfghj', 'wertyuio', '654321', 'Tennessee', '12345', 'United States', 'qwerhgfdsa', '', '', '', 'Yes', 'New York City,London,China,Hongkong,Canada,Brazil,London,Chicago', 'Australia,Latin America,Eastern Europe', 'Yes', 'dfg', '2016-11-22 01:45:43am', ''),
(15, 'tt', '', 'v', 'mjv', 'm', 'kv', 'kv', 'Kansas', 'vk', 'Vanuatu', 'vk', '', '', '', '', '', '', '', '', '2016-11-22 01:48:03am', ''),
(16, 'ttr', 'jvj', 'vj,', 'v,', 'v,j', 'v,v', ',v', '', 'v,m', 'Vanuatu', 'v,mn', '', '', '', '', '', '', '', '', '2016-11-22 06:06:14am', ''),
(18, 'Brian ', 'Colonomos', '', '', 'Point One Holdings', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '', '2016-12-06 01:06:26pm', ''),
(19, 'Jesse ', 'Piccolo', 'Jesse@Veltracon.com', '386-338-2929', 'Veltracon Lifestyle ', '346 Pike Rd ', 'West Palm Beach', 'Florida', '33411', 'United States', 'World wide luxury concierge service that caters to high net worth clients when it comes to anything related to the individuals lifestyle. We source limited edition luxury goods such as timepieces & handbags, assisting in purchasing or selling of exotic ca', '', '', '', 'Yes', 'New York City,London,China,Hongkong,Canada,Brazil,London,Chicago,Boston,Houston,Palm Beach,San Francisco,Dallas,Atlanta,Naples,San Diego,Miami,Tampa Bay,Connecticut,Denver', 'Singapore,Washington DC,Australia,Latin America,Eastern Europe,Middle East,Australia,China,Canada,Brazil,Switzerland,Singapore,London', 'Yes', '', '2016-12-06 03:08:50pm', ''),
(20, 'vgvhjJ', 'bjbjhb', 'bjbjjbj@gmail.com', 'njknkj', 'jkkkjk', 'bjkk', 'bjbjk', '', 'jbjkkj', 'Jamaica', 'jjbjkkjk', '', '', '', 'No', 'Canada', 'Australia', 'No', '', '2016-12-08 12:34:56am', 'pbfoa.org'),
(21, 'hgfh', 'fhg', 'fh', 'gfh', 'fh', 'fh', 'f', 'Hawaii', 'hgf', 'Falkland Islands', 'hf', '', '', '', 'Yes', 'New York City', 'Australia', 'Yes', '2016-12-08 03:55:06am Admin - hi<br>2016-12-08 04:02:13am Admin - hjk', '2016-12-08 01:03:23am', 'Team'),
(22, 'Alan ', 'Kaye', '', '', 'CCI Benifits ', '', '', '', '', 'United States', '', '', '', '', '', '', '', '', '2016-12-12 03:55:43pm Michelle Fandozzi - 2016-12-12 03:54:41pm Michelle Fandozzi - \r\nAndrew Spoke with 12/9 - Waste of time \r\ngoing to have joint company\r\nAndrew did not like partner TIM', '2016-12-12 03:55:43pm', 'Team');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE IF NOT EXISTS `social_links` (
`social_link_id` int(11) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `facebook_link` varchar(300) NOT NULL,
  `google_link` varchar(300) NOT NULL,
  `twitter_link` varchar(300) NOT NULL,
  `myspace_link` varchar(100) NOT NULL,
  `youtube_link` varchar(100) NOT NULL,
  `vimeo_link` varchar(100) NOT NULL,
  `linkedin_link` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`social_link_id`, `site_logo`, `facebook_link`, `google_link`, `twitter_link`, `myspace_link`, `youtube_link`, `vimeo_link`, `linkedin_link`) VALUES
(1, '1476120713-49457fbd08912dd9.png', 'http://www.google.co.in/', 'http://www.google.co.in/', 'https://twitter.com/', '', '', 'http://www.facebook.com/bamdadco', 'http://www.linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE IF NOT EXISTS `sponsorship` (
`id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `company_des` varchar(255) NOT NULL,
  `filea` varchar(255) NOT NULL,
  `fileb` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id`, `fname`, `lname`, `email`, `phone`, `company`, `address`, `city`, `state`, `zip`, `country`, `company_des`, `filea`, `fileb`) VALUES
(10, 'iv', ';v', 'ABC@ABC.COM', '55844', 'k', 'vi', 'ih', 'Virginia', 'v', 'Iceland', 'piv', '', ''),
(11, 'a', 'h', 'k@gmail.com', 'l', 'hl', 'hkl', 'h', 'Louisiana', 'lh', 'Laos', 'lh', '', ''),
(12, 'hkj', 'kj', 'hkjh@gmail.com', '0234-266-5655', 'jj', 'k', 'j', 'Kansas', 'kjh', 'Kazakhstan', 'k', '', ''),
(13, 'gh', 'kjg', 'jhg@gmail.com', '0869-964-2180', 'kjh', 'gkj', 'hgkj', 'Hawaii', 'jhg', 'Kazakhstan', 'kjhg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `thankuemails`
--

CREATE TABLE IF NOT EXISTS `thankuemails` (
`id` int(11) NOT NULL,
  `emailmessage` text NOT NULL,
  `createdby` text NOT NULL,
  `Date` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thankuemails`
--

INSERT INTO `thankuemails` (`id`, `emailmessage`, `createdby`, `Date`, `status`) VALUES
(1, 'Thank you! Your email has been sent.', 'Admin', '2016-12-13 03:23:52pm', 'Active'),
(2, 'thanku 1', 'Admin', '2016-12-08 06:05:26am', 'Deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admingroup_permissions`
--
ALTER TABLE `admingroup_permissions`
 ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adminuser_forms`
--
ALTER TABLE `adminuser_forms`
 ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `adminuser_groups`
--
ALTER TABLE `adminuser_groups`
 ADD PRIMARY KEY (`group_id`), ADD UNIQUE KEY `Group_Title` (`group_title`), ADD UNIQUE KEY `Group_Title_2` (`group_title`);

--
-- Indexes for table `asset_manager`
--
ALTER TABLE `asset_manager`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannerads`
--
ALTER TABLE `bannerads`
 ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
 ADD PRIMARY KEY (`content_title`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `family_office`
--
ALTER TABLE `family_office`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fon_news`
--
ALTER TABLE `fon_news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_member`
--
ALTER TABLE `home_member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_team`
--
ALTER TABLE `home_team`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
 ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
 ADD PRIMARY KEY (`email`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `other_membership`
--
ALTER TABLE `other_membership`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
 ADD PRIMARY KEY (`social_link_id`);

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thankuemails`
--
ALTER TABLE `thankuemails`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admingroup_permissions`
--
ALTER TABLE `admingroup_permissions`
MODIFY `per_id` int(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `adminuser_forms`
--
ALTER TABLE `adminuser_forms`
MODIFY `form_id` int(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `adminuser_groups`
--
ALTER TABLE `adminuser_groups`
MODIFY `group_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `asset_manager`
--
ALTER TABLE `asset_manager`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `bannerads`
--
ALTER TABLE `bannerads`
MODIFY `advertisement_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `family_office`
--
ALTER TABLE `family_office`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `fon_news`
--
ALTER TABLE `fon_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `home_member`
--
ALTER TABLE `home_member`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home_team`
--
ALTER TABLE `home_team`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `other_membership`
--
ALTER TABLE `other_membership`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
MODIFY `social_link_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sponsorship`
--
ALTER TABLE `sponsorship`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `thankuemails`
--
ALTER TABLE `thankuemails`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
