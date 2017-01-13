-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2010 at 10:45 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `josh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `adminUserID` int(10) NOT NULL AUTO_INCREMENT,
  `adminUserName` varchar(255) NOT NULL,
  `adminUserPass` varchar(255) NOT NULL,
  `adminUserEmail` varchar(255) NOT NULL,
  `adminUserLevel` varchar(255) NOT NULL,
  PRIMARY KEY (`adminUserID`),
  UNIQUE KEY `adminUserName` (`adminUserName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Admin Users Table' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`adminUserID`, `adminUserName`, `adminUserPass`, `adminUserEmail`, `adminUserLevel`) VALUES
(1, 'demo', 'demo', 'demo', '0'),
(2, 'admin', 'admin', 'sid@crewlogix.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ad_categories`
--

DROP TABLE IF EXISTS `ad_categories`;
CREATE TABLE IF NOT EXISTS `ad_categories` (
  `cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` varchar(255) NOT NULL,
  `cat_parent` int(20) NOT NULL,
  `cat_param` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ad_categories`
--

INSERT INTO `ad_categories` (`cat_id`, `cat_name`, `cat_status`, `cat_parent`, `cat_param`) VALUES
(1, 'Category', 'Active', 0, ''),
(2, 'Market', 'Active', 0, ''),
(3, 'Auction', 'Active', 1, ''),
(4, 'Lease', 'Active', 1, ''),
(5, 'Sale', 'Active', 1, ''),
(6, 'Sublease', 'Active', 1, ''),
(7, 'Business Brokerage', 'Active', 2, ''),
(8, 'Industrial', 'Active', 2, ''),
(9, 'Investment', 'Active', 2, ''),
(10, 'Land', 'Active', 2, ''),
(11, 'Office', 'Active', 2, ''),
(12, 'Retail', 'Active', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_posts`
--

DROP TABLE IF EXISTS `ad_posts`;
CREATE TABLE IF NOT EXISTS `ad_posts` (
  `ad_id` int(255) NOT NULL AUTO_INCREMENT,
  `ad_user` varchar(255) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_content` varchar(500) NOT NULL,
  `ad_image` varchar(255) NOT NULL,
  `ad_city` varchar(255) NOT NULL,
  `ad_state` varchar(255) NOT NULL,
  `ad_zipcode` varchar(255) NOT NULL,
  `ad_country` varchar(255) NOT NULL,
  `ad_type` varchar(255) NOT NULL,
  `ad_cat` varchar(255) NOT NULL,
  `ad_markets` varchar(255) NOT NULL,
  `ad_time` varchar(255) NOT NULL,
  `ad_status` varchar(255) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ad_posts`
--

INSERT INTO `ad_posts` (`ad_id`, `ad_user`, `ad_title`, `ad_content`, `ad_image`, `ad_city`, `ad_state`, `ad_zipcode`, `ad_country`, `ad_type`, `ad_cat`, `ad_markets`, `ad_time`, `ad_status`) VALUES
(2, '3', 'House For Sale 2200 sq Yards Sydney Australia', 'The House is situated at the heart of commercial area of city besides main link road', '3_1272272394_02188_theothersideofmanhattan_1440x900.jpg', 'Sydney', 'AAT', '12345', 'AU', 'Have', '', '', 'Monday 26th of April 2010 02:59:54 PM', 'Active'),
(4, '2', 'Want Commercial Flat In NY Hall Square', 'I need commercial property in NY ', 'noimage.jpg', 'NY City', 'NY', '12345', 'US', 'Need', '', '', 'Monday 26th of April 2010 03:16:59 PM', 'Active'),
(5, '3', 'Property Need in South West 22', '<span style="font-weight: bold;">test desc</span>', '3_1276513419_paypalLOGO.png', 'LA', 'CA', '90001', 'US', 'Have', '3,11,5', '', 'Monday 14th of June 2010 05:03:39 PM', 'Active'),
(6, '3', 'Property Need in South West 22', '<span style="font-weight: bold;">test desc</span>', '3_1276513454_paypalLOGO.png', 'LA', 'CA', '90001', 'US', 'Have', '3,11,5', '8,10', 'Monday 14th of June 2010 05:04:14 PM', 'Active'),
(7, '2', 'Property Need in South West 23', 'test description about listing', '2_1276513843_paypalLOGO.png', 'LA', 'CA', '90001', 'US', 'Have', '3,10,6,10', '7,11', 'Monday 14th of June 2010 05:10:43 PM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu`
--

DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE IF NOT EXISTS `cms_menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(255) NOT NULL,
  `menu_alt` varchar(255) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_target` varchar(255) NOT NULL,
  `menu_parent` int(10) NOT NULL,
  `menu_status` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cms_menu`
--


-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
CREATE TABLE IF NOT EXISTS `cms_pages` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `left_content` text NOT NULL,
  `page_metatags` text NOT NULL,
  `page_keywords` text NOT NULL,
  `page_parent` int(10) NOT NULL,
  `page_time` varchar(100) NOT NULL,
  `page_status` varchar(255) NOT NULL,
  `page_type` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_name` (`page_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`page_id`, `page_title`, `page_name`, `page_content`, `left_content`, `page_metatags`, `page_keywords`, `page_parent`, `page_time`, `page_status`, `page_type`) VALUES
(23, 'Home', 'Home', '', '<p class="h18">\r\n	PROFILE</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	We are a Sydney based design studio offering a personalised &amp; professional service catering to your specific needs. With a portfolio of diverse and interesting projects throughout Australia and a passion for achieving good design that listens; each outcome is as individual as the client. The variety of styles is influenced by the site&#39;s topography, client&#39;s tastes, budget and environmental factors. However, a common theme of roomy, comfortable, light and breezy spaces opening onto various outdoor areas runs through. The architecture we create facilitates and enhances the client&#39;s ideas turning them into reality!<br />\r\n	<br />\r\n	Projects include high-end residential, owner builder designs, mixed-use developments and a variety of bars, restaurants and gaming lounges.<br />\r\n	<br />\r\n	Other areas of expertise include architectural illustration, presentation booklets and signage design.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p class="h18">\r\n	PRINCIPLE</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<table cellpadding="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td width="75%">\r\n				Joshua Bacon:</td>\r\n			<td width="25%">\r\n				BA(arch)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Registered Architect:</td>\r\n			<td>\r\n				7116 (nsw)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Australian Institute of Architects:</td>\r\n			<td>\r\n				33121</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n<p class="h18">\r\n	CONTACT</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Joshua Bacon Design<br />\r\n	61 Boyce Street, Glebe, NSW<br />\r\n	P: +61 2 9566 4460<br />\r\n	F: +61 2 9566 4480<br />\r\n	design@joshuabacon.com.au</p>\r\n', '', '', 0, 'Thursday 1st of July 2010 08:33:40 PM', 'Active', 'gallery'),
(24, 'GRAPHICS', 'GRAPHICS', 'Graphic', 'graphic', '', '', 0, 'Thursday 1st of July 2010 06:56:43 PM', 'Active', 'content'),
(25, 'residential', 'residential', '  <div style="margin-top:27px; color:#97988d;">\r\n          	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue.\r\n          </div>', '<p>\r\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in, consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.</p>\r\n', '', '', 0, 'Thursday 1st of July 2010 08:45:49 PM', 'Active', 'gallery'),
(26, 'illustration', 'illustration', 'illustration', '', '', '', 0, 'Thursday 1st of July 2010 06:58:23 PM', 'Active', 'content'),
(27, 'urban development', 'urban development', 'urban development', '', '', '', 0, 'Thursday 1st of July 2010 06:58:43 PM', 'Active', 'content'),
(28, 'commercial', 'commercial', 'commercial', 'commercial', 'commercial', '', 0, 'Thursday 1st of July 2010 06:59:01 PM', 'Active', 'content'),
(29, 'OWNER BUILDER', 'OWNER BUILDER', 'OWNER BUILDER', 'OWNER BUILDER', '', '', 0, 'Thursday 1st of July 2010 06:59:25 PM', 'Active', 'content'),
(30, 'references', 'references', '<p class="h22" >References</p><br />\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in, consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.<br /><br />\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In posuere felis nec tortor. Pellentesque faucibus. Ut accumsan ultricies elit. Maecenas at justo id velit placerat molestie. Donec dictum lectus non odio. Cras a ante vitae enim iaculis aliquam. Mauris nunc quam, venenatis nec, euismod sit amet, egestas placerat, est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras id elit. Integer quis urna. Ut ante enim, dapibus malesuada, fringilla eu, condimentum quis, tellus. Aenean porttitor eros vel dolor. Donec convallis pede venenatis nibh. Duis quam. Nam eget lacus. Aliquam erat volutpat. Quisque dignissim congue leo.<br /><br />\r\n\r\nMauris vel lacus vitae felis vestibulum volutpat. Etiam est nunc, venenatis in, tristique eu, imperdiet ac, nisl. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In iaculis facilisis massa. Etiam eu urna. Sed porta. Suspendisse quam leo, molestie sed, luctus quis, feugiat in, pede. Fusce tellus. Sed metus augue, convallis et, vehicula ut, pulvinar eu, ante. Integer orci tellus, tristique vitae, consequat nec, porta vel, lectus. Nulla sit amet diam. Duis non nunc. Nulla rhoncus dictum metus. Curabitur tristique mi condimentum orci. Phasellus pellentesque aliquam enim. Proin dui lectus, cursus eu, mattis laoreet, viverra sit amet, quam. Curabitur vel dolor ultrices ipsum dictum tristique. Praesent vitae lacus. Ut velit enim, vestibulum non, fermentum nec, hendrerit quis, leo. Pellentesque rutrum malesuada neque.<br /><br />\r\n\r\nNunc tempus felis vitae urna. Vivamus porttitor, neque at volutpat rutrum, purus nisi eleifend libero, a tempus libero lectus feugiat felis. Morbi diam mauris, viverra in, gravida eu, mattis in, ante. Morbi eget arcu. Morbi porta, libero id ullamcorper nonummy, nibh ligula pulvinar metus, eget consectetuer augue nisi quis lacus. Ut ac mi quis lacus mollis aliquam. Curabitur iaculis tempus eros. Curabitur vel mi sit amet magna malesuada ultrices. Ut nisi erat, fermentum vel, congue id, euismod in, elit. Fusce ultricies, orci ac feugiat suscipit, leo massa sodales velit, et scelerisque mi tortor at ipsum. Proin orci odio, commodo ac, gravida non, tristique vel, tellus. Pellentesque nibh libero, ultricies eu, sagittis non, mollis sed, justo. Praesent metus ipsum, pulvinar pulvinar, porta id, fringilla at, est.<br /><br />\r\n\r\nPhasellus felis dolor, scelerisque a, tempus eget, lobortis id, libero. Donec scelerisque leo ac risus. Praesent sit amet est. In dictum, dolor eu dictum porttitor, enim felis viverra mi, eget luctus massa purus quis odio. Etiam nulla massa, pharetra facilisis, volutpat in, imperdiet sit amet, sem. Aliquam nec erat at purus cursus interdum. Vestibulum ligula augue, bibendum accumsan, vestibulum ut, commodo a, mi. Morbi ornare gravida elit. Integer congue, augue et malesuada iaculis, ipsum dui aliquet felis, at cursus magna nisl nec elit. Donec iaculis diam a nisi accumsan viverra. Duis sed tellus et tortor vestibulum gravida. Praesent elementum elit at tellus. Curabitur metus ipsum, luctus eu, malesuada ut, tincidunt sed, diam. Donec quis mi sed magna hendrerit accumsan. Suspendisse risus nibh, ultricies eu, volutpat non, condimentum hendrerit, augue. Etiam eleifend, metus vitae adipiscing semper, mauris ipsum iaculis elit, congue gravida elit mi egestas orci. Curabitur pede.<br /><br />\r\n\r\nMaecenas aliquet velit vel turpis. Mauris neque metus, malesuada nec, ultricies sit amet, porttitor mattis, enim. In massa libero, interdum nec, interdum vel, blandit sed, nulla. In ullamcorper, est eget tempor cursus, neque mi consectetuer mi, a ultricies massa est sed nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Proin nulla arcu, nonummy luctus, dictum eget, fermentum et, lorem. Nunc porta convallis pede.<br /><br />', '	<p>\r\n                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in, consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros.\r\n            </p>\r\n', '', '', 0, 'Thursday 1st of July 2010 08:47:50 PM', 'Active', 'content'),
(31, 'art', 'art', 'art', 'art', '', '', 0, 'Thursday 1st of July 2010 07:00:44 PM', 'Active', 'content'),
(32, 'Sub Navigation 1', 'Sub Navigation 1', 'Sub Navigation 1', 'Sub Navigation 1', '', '', 25, 'Thursday 1st of July 2010 07:01:25 PM', 'Active', 'content'),
(33, 'Sub Navigation 2', 'Sub Navigation 2', 'Sub Navigation Sub Navigation 22', 'Sub Navigation 2', '', '', 25, 'Thursday 1st of July 2010 07:02:00 PM', 'Active', 'content'),
(34, 'Sub Navigation 3', 'Sub Navigation 3', 'Sub Navigation 3', 'Sub Navigation 3', '', 'Sub Navigation 3', 0, 'Thursday 1st of July 2010 07:02:16 PM', 'Active', 'content');

-- --------------------------------------------------------

--
-- Table structure for table `cms_services`
--

DROP TABLE IF EXISTS `cms_services`;
CREATE TABLE IF NOT EXISTS `cms_services` (
  `service_id` int(10) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `service_content` varchar(2000) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_color` varchar(255) NOT NULL,
  `service_parent` int(10) NOT NULL,
  `pricelist_page` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `cms_services`
--

INSERT INTO `cms_services` (`service_id`, `service_name`, `service_content`, `service_image`, `service_color`, `service_parent`, `pricelist_page`) VALUES
(44, 'General', 'General Service', '3381040501_dda14fe3d5_o.jpg', '#FFFFFF', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gal_galleries`
--

DROP TABLE IF EXISTS `gal_galleries`;
CREATE TABLE IF NOT EXISTS `gal_galleries` (
  `gallery_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_parent` int(10) NOT NULL,
  `gallery_folder` varchar(255) NOT NULL,
  `gallery_xml` varchar(255) NOT NULL,
  `gallery_seq` int(10) NOT NULL,
  `gallery_status` varchar(255) NOT NULL,
  PRIMARY KEY (`gallery_id`),
  UNIQUE KEY `gallery_name` (`gallery_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `gal_galleries`
--

INSERT INTO `gal_galleries` (`gallery_id`, `page_id`, `gallery_title`, `gallery_name`, `gallery_parent`, `gallery_folder`, `gallery_xml`, `gallery_seq`, `gallery_status`) VALUES
(25, 25, 'Residential', 'residential', 0, 'residential', 'residential.xml', 2, 'active'),
(24, 23, 'Home gallery', 'home', 0, 'home', 'home.xml', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `gal_image`
--

DROP TABLE IF EXISTS `gal_image`;
CREATE TABLE IF NOT EXISTS `gal_image` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) NOT NULL,
  `image_thumb` varchar(255) NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `image_gallery` varchar(255) NOT NULL,
  `image_time` varchar(50) NOT NULL,
  `img_seq` int(10) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

--
-- Dumping data for table `gal_image`
--

INSERT INTO `gal_image` (`image_id`, `image_title`, `image_thumb`, `image_main`, `image_dir`, `image_gallery`, `image_time`, `img_seq`) VALUES
(271, 'yy', 'img_2.jpg', 'big_img.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 07:02:22 PM', 10),
(269, '7 image', 'img_4.jpg', 'big_img.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 07:01:52 PM', 8),
(270, '', 'img_3.jpg', 'big_img.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 07:02:05 PM', 9),
(268, '6th image', 'img_3.jpg', 'big_img.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 07:01:30 PM', 6),
(267, '5 th image', 'img_2.jpg', 'big_img.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 07:01:05 PM', 5),
(266, 'Image 5', 'img_5.jpg', 'big_img.jpg', 'home', 'home', 'Friday 2nd of July 2010 12:09:04 PM', 5),
(265, 'Image 4', 'img_4.jpg', 'big_img.jpg', 'home', 'home', 'Friday 2nd of July 2010 12:08:49 PM', 4),
(264, 'Image 3', 'img_3.jpg', 'big_img.jpg', 'home', 'home', 'Friday 2nd of July 2010 12:08:20 PM', 3),
(263, 'Image 2', 'img_2.jpg', 'big_img.jpg', 'home', 'home', 'Friday 2nd of July 2010 12:08:01 PM', 2),
(262, 'Image 1', 'img_1.jpg', 'big_img.jpg', 'home', 'home', 'Friday 2nd of July 2010 12:07:42 PM', 1),
(257, '1st image', 'Sunset.jpg', 'Winter.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 11:55:58 AM', 1),
(258, '2nd image', 'Water lilies.jpg', 'Blue hills.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 11:56:16 AM', 2),
(260, '3rd image', 'Sunset.jpg', 'Sunset.jpg', 'residential', 'residential', 'Friday 2nd of July 2010 11:56:59 AM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gal_retouch`
--

DROP TABLE IF EXISTS `gal_retouch`;
CREATE TABLE IF NOT EXISTS `gal_retouch` (
  `img_id` int(10) NOT NULL AUTO_INCREMENT,
  `img_before` varchar(255) NOT NULL,
  `img_after` varchar(255) NOT NULL,
  `img_caption` varchar(255) NOT NULL,
  `img_seq` int(10) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `gal_retouch`
--


-- --------------------------------------------------------

--
-- Table structure for table `gal_settings`
--

DROP TABLE IF EXISTS `gal_settings`;
CREATE TABLE IF NOT EXISTS `gal_settings` (
  `gal_setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `gal_setting_name` varchar(255) NOT NULL,
  `gal_setting_value` varchar(255) NOT NULL,
  `gal_setting_status` varchar(255) NOT NULL,
  PRIMARY KEY (`gal_setting_id`),
  UNIQUE KEY `gal_setting_name` (`gal_setting_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gal_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `sys_settings`
--

DROP TABLE IF EXISTS `sys_settings`;
CREATE TABLE IF NOT EXISTS `sys_settings` (
  `sysID` int(10) NOT NULL AUTO_INCREMENT,
  `sName` varchar(255) NOT NULL,
  `sValue` varchar(255) NOT NULL,
  `sParam` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sysID`),
  UNIQUE KEY `sName` (`sName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Admin Panel System Settings' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sys_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

DROP TABLE IF EXISTS `web_users`;
CREATE TABLE IF NOT EXISTS `web_users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `profile_avatar` varchar(255) NOT NULL,
  `profile_content` varchar(650) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `last_updated` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`user_id`, `username`, `firstname`, `lastname`, `email`, `sex`, `country`, `zipcode`, `profile_avatar`, `profile_content`, `user_type`, `user_status`, `last_updated`) VALUES
(3, 'sid', 'Sid', 'Crewlogix', 'sid.crewlogix@gmail.com', 'male', 'US', '333322', 'sid_1271339867_avatar.JPG', 'Sid is developer for ReLinkt Website', 'provider', 'Active', 'Thursday 15th of April 2010 07:57:47 PM'),
(2, 'jason', 'Jason', 'ReLinkt', 'sid@xrchive.com', 'male', 'US', '90001', 'jason_1271339243_', 'Jason is the owner and administrator of ReLinkt', 'provider', 'Active', 'Thursday 15th of April 2010 07:47:23 PM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
