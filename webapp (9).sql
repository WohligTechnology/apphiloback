-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2015 at 06:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(0, 'Access Level'),
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `text` text NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `content`, `text`, `type`, `image`, `description`) VALUES
(4, 'Login', '                                                                                                                                                                                                [{"name":"email","value":true},{"name":"Google","value":true,"appid":"dfdf","secret":"fdfdf"},{"name":"Facebook","value":true,"appid":"","secret":""},{"name":"twitter","value":false,"appid":"","secret":""},{"name":"instagram","value":true,"appid":"","secret":""}]                                                                                                                                                                ', '[{"name":"email","value":true},{"name":"Google","value":false,"appid":"fsdfds","secret":"fsdsfdfs"},{"name":"Facebook","value":false,"appid":"dssdf","secret":"fsdfsd"},{"name":"twitter","value":false,"appid":"","secret":""},{"name":"instagram","value":false,"appid":"","secret":""}]', '2', '', '0'),
(5, 'Blogs', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        want Blog1222ttgsd                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '[{"name":"cms","value":true},{"name":"wordpress","value":false,"appid":""},{"name":"tumblr","value":false,"appid":""}]', '1', '', '0'),
(6, 'Gallery', 'Gallery Content                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'Drop down yes', '3', '', '0'),
(7, 'Videos', 'want Video Gallery                                                                                                                                                                                ', 'Drop down yes', '3', '', '0'),
(8, 'Events', 'Event content  for evtn                                                                                                                                                                                                                                                                           ', 'Drop down yes', '3', '', '0'),
(11, 'Contact Us', 'Plot no. 3, Flat no. A/30 Laxmi Nivas , 3rd Floor , Near Sadhana School , Sion (W) , Mumbai 400022.dfad<b>dfafadsf<i>dfadsf</i></b>', '+91 98200 42222 / +91 9819222221', 'info@wohlig.com', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7543.043871128432!2d72.8626547!3d19.04077635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf2cc4000001%3A0xc683a42662527334!2sSadhana+English+Primary+School!5e0!3m2!1sen!2sin!4v1443430462486" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `linktype`
--

CREATE TABLE IF NOT EXISTS `linktype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linktype`
--

INSERT INTO `linktype` (`id`, `name`, `status`, `order`, `link`) VALUES
(1, 'Home', '1', '', 'home'),
(2, 'Article', '1', '', 'article'),
(3, 'Events', '1', '', 'eventdetail'),
(4, 'Event List', '1', '', 'events'),
(5, 'Photo Gallery', '1', '', 'photogallerycategory'),
(6, 'Photo Gallery Category', '1', '', 'photogallery'),
(7, 'Video Gallery', '1', '', 'videogallerycategory'),
(8, 'Video Gallery Category', '1', '', 'videogallery'),
(9, 'Blog', '1', '', 'blogs'),
(10, 'Blog Detail', '1', '', 'blogdetail'),
(11, 'Social Feeds', '1', '', 'social'),
(12, 'Contact Us', '1', '', 'contact'),
(13, 'Notification', '1', '', 'notification'),
(14, 'settings', '1', '', 'setting'),
(15, 'Profile', '1', '', 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Articles', '', '', 'site/viewarticles', 1, 0, 1, 5, 'icon-book'),
(3, 'Menu', '', '', 'site/viewfrontmenu', 1, 0, 1, 4, 'icon-list'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Gallery', '', '', 'site/viewgallery', 1, 0, 1, 7, 'icon-th'),
(6, 'Config', '', '', 'site/viewconfig', 1, 0, 1, 12, 'icon-fire'),
(7, 'Videos', '', '', 'site/viewvideogallery', 1, 0, 1, 6, 'icon-camera'),
(9, 'Events', '', '', 'site/viewevents', 1, 0, 1, 8, 'icon-bell-alt'),
(12, 'Enquiry', '', '', 'site/viewenquiry', 1, 0, 1, 9, 'icon-coffee'),
(13, 'Notification', '', '', 'site/viewnotification', 1, 0, 1, 10, 'icon-bell'),
(15, 'Blog', '', '', 'site/viewblog', 1, 0, 1, 11, 'icon-leaf'),
(18, 'Home Slider', '', '', 'site/viewslider', 1, 0, 1, 3, 'icon-gittip'),
(19, 'Home', '', '', 'site/editarticles?id=1', 1, 0, 1, 2, 'icon-gittip');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `order`, `status`, `alt`) VALUES
(1, 'Event-management6.png', 1, 1, ''),
(2, 'delorean3.jpg', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Enable'),
(2, 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Text'),
(2, 'File');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `dob` date DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `instagram` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `eventnotification` varchar(50) NOT NULL,
  `photonotification` varchar(50) NOT NULL,
  `videonotification` varchar(50) NOT NULL,
  `blognotification` varchar(50) NOT NULL,
  `coverimage` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`, `instagram`, `contact`, `eventnotification`, `photonotification`, `videonotification`, `blognotification`, `coverimage`) VALUES
(1, 'Admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', 1, '2015-10-02 06:05:05', 1, 'user.png', '', '', '', '', NULL, NULL, 'Sion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9896251463', 'false', 'true', 'false', 'true', 'Screen_Shot_2015-08-21_at_1.04_.08_am_.png'),
(2, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '2015-10-02 13:37:45', 0, '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'false', 'true', 'true', 'false', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_articles`
--

CREATE TABLE IF NOT EXISTS `webapp_articles` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_articles`
--

INSERT INTO `webapp_articles` (`id`, `status`, `title`, `json`, `content`, `timestamp`, `image`) VALUES
(1, 1, 'Home', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>', '2015-10-02 12:03:54', ''),
(2, 1, 'About', '[{"placeholder":"","value":"","label":"Meta Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"Meta Description","type":"text","options":"","classes":""}]', '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>', '2015-10-02 12:06:32', 'images_(5).jpg'),
(3, 1, 'Team', '[{"placeholder":"","value":"","label":"Meta Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"Meta Description","type":"text","options":"","classes":""}]', '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>', '2015-10-02 12:07:19', 'images_(6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blog`
--

CREATE TABLE IF NOT EXISTS `webapp_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blog`
--

INSERT INTO `webapp_blog` (`id`, `name`, `title`, `json`, `content`, `timestamp`) VALUES
(1, 'William Michael', 'Project Management', '[{"placeholder":"","value":"","label":"Meta Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"Meta Description","type":"text","options":"","classes":""}]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2015-10-02 11:20:37'),
(2, 'Martin Kerry', 'Presentation Skills', '[{"placeholder":"","value":"","label":"Meta Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"Meta Description","type":"text","options":"","classes":""}]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2015-10-02 11:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blogimages`
--

CREATE TABLE IF NOT EXISTS `webapp_blogimages` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blogimages`
--

INSERT INTO `webapp_blogimages` (`id`, `blog`, `status`, `order`, `image`) VALUES
(1, 1, 1, 1, 'images_(7)1.jpg'),
(2, 2, 1, 1, 'diverse_business_man_and_woman_40435468.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blogvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_blogvideo` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blogvideo`
--

INSERT INTO `webapp_blogvideo` (`id`, `blog`, `status`, `order`, `video`) VALUES
(1, 1, 1, 1, 'mTijtdjzg8U'),
(2, 2, 1, 1, 'FCojpFwWuG0');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_enquiry`
--

CREATE TABLE IF NOT EXISTS `webapp_enquiry` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_enquiry`
--

INSERT INTO `webapp_enquiry` (`id`, `user`, `name`, `email`, `title`, `timestamp`, `content`) VALUES
(1, 0, 'rtwtwrtwr', 'poojathakare55@gmail.com', '', '2015-10-02 09:51:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_eventimages`
--

CREATE TABLE IF NOT EXISTS `webapp_eventimages` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventimages`
--

INSERT INTO `webapp_eventimages` (`id`, `event`, `status`, `order`, `image`) VALUES
(1, 2, 1, 1, 'images_(2)2.jpg'),
(2, 1, 1, 1, 'gallery-corporate_event-23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_events`
--

CREATE TABLE IF NOT EXISTS `webapp_events` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `venue` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_events`
--

INSERT INTO `webapp_events` (`id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime`, `venue`) VALUES
(1, 1, 'Sona Mohapatra', '2015-10-02 11:18:28', '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b><br>', 'Event-management11.png', '2015-10-17', '03:05:00', 'California, USA'),
(2, 1, 'Company Event Hamburg March 2015', '2015-10-02 12:58:11', '<b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>', 'gallery-corporate_event-231.jpg', '2015-10-24', '08:00:00', 'Newyork');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_eventvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_eventvideo` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventvideo`
--

INSERT INTO `webapp_eventvideo` (`id`, `event`, `videogallery`, `status`, `order`, `url`) VALUES
(1, 2, 1, 1, 1, 'fesO8XgRWhU');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_frontmenu`
--

CREATE TABLE IF NOT EXISTS `webapp_frontmenu` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `linktype` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `blog` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `typeid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_frontmenu`
--

INSERT INTO `webapp_frontmenu` (`id`, `order`, `parent`, `status`, `name`, `json`, `image`, `linktype`, `link`, `event`, `blog`, `video`, `article`, `gallery`, `typeid`) VALUES
(1, 1, 0, 1, 'Home', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '1', 'ln-home3', '', '', '', '', '', ''),
(2, 2, 0, 1, 'Notification', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '13', 'ln-bell', '', '', '', '', '', '0'),
(3, 3, 0, 1, 'About', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '2', 'ln-diamond3', '', '', '', '1', '', '0'),
(4, 4, 0, 1, 'Team', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '2', 'ln-users', '', '', '', '2', '', ''),
(5, 5, 0, 1, 'Images', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '6', 'ln-picture', '', '', '', '', '1', '0'),
(6, 6, 0, 1, 'Videos', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '8', 'ln-film-play', '', '', '1', '', '', '0'),
(7, 7, 0, 1, 'Blog', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '10', 'ln-quote-open', '', '2', '', '', '', '0'),
(8, 8, 0, 1, 'Social Feeds', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '11', 'ln-chat', '', '', '', '', '', ''),
(9, 9, 0, 1, 'Event', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '3', 'ln-heart', '2', '', '', '', '', '0'),
(10, 10, 0, 1, 'Contact us', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '12', 'ln-phone2', '', '', '', '', '', ''),
(11, 11, 0, 1, 'Profile', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '15', 'ln-user', '', '', '', '', '', ''),
(12, 12, 0, 1, 'Settings', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '', '14', 'ln-gear2', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_gallery`
--

CREATE TABLE IF NOT EXISTS `webapp_gallery` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_gallery`
--

INSERT INTO `webapp_gallery` (`id`, `order`, `status`, `name`, `json`, `timestamp`, `image`) VALUES
(1, 1, 1, 'Corporate', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 06:42:04', 'image1.jpg'),
(2, 2, 1, 'Presentation Skills', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 11:22:42', 'images_(4).jpg'),
(3, 3, 1, 'Multinational Companies', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 11:23:01', 'images_(2).jpg'),
(4, 4, 1, 'Project Management', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 11:23:21', 'images_(3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_galleryimage`
--

CREATE TABLE IF NOT EXISTS `webapp_galleryimage` (
  `id` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_galleryimage`
--

INSERT INTO `webapp_galleryimage` (`id`, `gallery`, `order`, `status`, `image`, `alt`) VALUES
(1, 1, 1, 1, 'image7.jpg', ''),
(2, 1, 2, 1, 'image3.jpg', ''),
(3, 1, 3, 1, 'image5.jpg', ''),
(4, 1, 4, 1, 'image2.jpg', ''),
(5, 1, 5, 1, 'user1.jpg', ''),
(6, 1, 6, 1, 'image8.jpg', ''),
(7, 1, 7, 1, 'image.png', ''),
(8, 1, 8, 1, 'image1.png', ''),
(9, 1, 9, 1, 'photo-1416339134316-0e91dc9ded92.jpg', ''),
(10, 1, 10, 1, 'image2.png', ''),
(11, 1, 11, 1, 'corporate.png', ''),
(12, 1, 12, 1, '71.jpg', ''),
(13, 1, 13, 1, 'user3.jpg', ''),
(14, 1, 14, 1, 'image31.jpg', ''),
(15, 1, 15, 1, 'image51.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_notification`
--

CREATE TABLE IF NOT EXISTS `webapp_notification` (
  `id` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `videogalleryvideo` int(11) DEFAULT NULL,
  `galleryimage` int(11) DEFAULT NULL,
  `article` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_notification`
--

INSERT INTO `webapp_notification` (`id`, `videogallery`, `event`, `videogalleryvideo`, `galleryimage`, `article`, `status`, `link`, `image`, `timestamp`, `content`) VALUES
(2, 0, 0, 0, 0, 0, 0, '', '', '2015-10-02 10:16:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_notificationuser`
--

CREATE TABLE IF NOT EXISTS `webapp_notificationuser` (
  `id` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timestamp_receive` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `webapp_videogallery`
--

CREATE TABLE IF NOT EXISTS `webapp_videogallery` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subtitle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogallery`
--

INSERT INTO `webapp_videogallery` (`id`, `order`, `status`, `name`, `json`, `timestamp`, `subtitle`) VALUES
(1, 1, 1, 'Bekaert Corporate Presentation ''Wire can tell a story''', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 06:37:12', 'English version 2012'),
(2, 2, 1, 'Multinational Companies', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 10:46:45', 'MNC''s'),
(3, 3, 1, 'Professional skills', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 10:56:15', 'List of Professional skills'),
(4, 4, 1, 'It Services Industry', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 10:57:47', 'Technology Innovation'),
(5, 5, 1, 'Project Management', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 10:59:53', 'Project Tracking'),
(6, 6, 1, 'Presentation Skills', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', '2015-10-02 11:09:08', 'Corporate Training');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_videogalleryvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_videogalleryvideo` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogalleryvideo`
--

INSERT INTO `webapp_videogalleryvideo` (`id`, `order`, `status`, `videogallery`, `url`, `alt`) VALUES
(1, 1, 1, 1, 'l2x9E23CjsQ', 'Bekaert Corporate Presentation'),
(3, 2, 1, 1, 'IL-MKrTESas', 'Corporate Presentation'),
(4, 3, 1, 1, 'TpZxdfciSX0', 'Volvo Group Corporate presentation'),
(5, 4, 1, 1, 'mTijtdjzg8U', 'Presentation Skills - Corporate Training'),
(6, 5, 1, 1, 'ae_j2k4hf7k', 'Slide Corporate Presentation | After Effects Template | Project Files'),
(7, 6, 1, 1, 'dUTmR3AOefg', 'Company Profile Template After Effect Template'),
(8, 1, 1, 2, 'FCojpFwWuG0', 'Multinational Corporations'),
(9, 2, 1, 2, 'szH2g1dQdCM', 'Word of the Day: Multinational Corporation (MNC)'),
(10, 3, 1, 2, 'mr1ZrMBgbSY', 'What are the challenges facing multinational companies?'),
(11, 4, 1, 2, 'r8JFpFsaN5Y', 'Fortune Magazine announces its ''Top 25 best multinational companies to work for'''),
(12, 5, 1, 2, 'bz8Orc57EaI', 'Noida is the hub of Multinational companies'),
(13, 6, 1, 2, 'KC4H1ZgCf2s', 'European multinational companies in SA are freezing future investments'),
(14, 1, 1, 3, 'FCojpFwWuG0', 'Multinational Corporations'),
(15, 2, 1, 3, 'bz8Orc57EaI', 'Noida Hub of MNC''s'),
(16, 1, 1, 4, 'ae_j2k4hf7k', 'It Sector'),
(17, 1, 1, 5, 'FCojpFwWuG0', 'Enterprise'),
(18, 1, 1, 6, 'mTijtdjzg8U', 'Quality of Research');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linktype`
--
ALTER TABLE `linktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_articles`
--
ALTER TABLE `webapp_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blog`
--
ALTER TABLE `webapp_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blogimages`
--
ALTER TABLE `webapp_blogimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blogvideo`
--
ALTER TABLE `webapp_blogvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_enquiry`
--
ALTER TABLE `webapp_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_eventimages`
--
ALTER TABLE `webapp_eventimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_events`
--
ALTER TABLE `webapp_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_eventvideo`
--
ALTER TABLE `webapp_eventvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_frontmenu`
--
ALTER TABLE `webapp_frontmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_gallery`
--
ALTER TABLE `webapp_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_galleryimage`
--
ALTER TABLE `webapp_galleryimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_notification`
--
ALTER TABLE `webapp_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_notificationuser`
--
ALTER TABLE `webapp_notificationuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_videogallery`
--
ALTER TABLE `webapp_videogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_videogalleryvideo`
--
ALTER TABLE `webapp_videogalleryvideo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `linktype`
--
ALTER TABLE `linktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `webapp_articles`
--
ALTER TABLE `webapp_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_blog`
--
ALTER TABLE `webapp_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_blogimages`
--
ALTER TABLE `webapp_blogimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_blogvideo`
--
ALTER TABLE `webapp_blogvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_enquiry`
--
ALTER TABLE `webapp_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webapp_eventimages`
--
ALTER TABLE `webapp_eventimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_events`
--
ALTER TABLE `webapp_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_eventvideo`
--
ALTER TABLE `webapp_eventvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webapp_frontmenu`
--
ALTER TABLE `webapp_frontmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `webapp_gallery`
--
ALTER TABLE `webapp_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webapp_galleryimage`
--
ALTER TABLE `webapp_galleryimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `webapp_notification`
--
ALTER TABLE `webapp_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_notificationuser`
--
ALTER TABLE `webapp_notificationuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webapp_videogallery`
--
ALTER TABLE `webapp_videogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `webapp_videogalleryvideo`
--
ALTER TABLE `webapp_videogalleryvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
