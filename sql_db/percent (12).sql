-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2017 at 09:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `percent`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_arm` varchar(300) NOT NULL,
  `name_eng` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_arm`, `name_eng`) VALUES
(26, 'Iphone', '&#1344;&#1381;&#1404;&#1377;&#1389;&#1400;&#1405;&#1398;&#1381;&#1408;'),
(27, '&#1344;&#1377;&#1396;&#1377;&#1391;&#1377;&#1408;&#1379;&#1387;&#1401;&#1392;&#1398;&#1381;&#1408;', 'computers');

-- --------------------------------------------------------

--
-- Table structure for table `comment_db`
--

CREATE TABLE IF NOT EXISTS `comment_db` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `user_av` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `blog_heading` text NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL,
  `check_a` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `comment_db`
--

INSERT INTO `comment_db` (`id`, `user`, `user_av`, `email`, `blog_id`, `blog_heading`, `comment`, `comment_date`, `admin`, `check_a`) VALUES
(113, 'Gayane Aramyan', '89155a8f13702567e9b2190a7186166f.jpg', 'lusnyak_1992@gmail.com', 8, 'Lorem Ipsum', 'gfjghjghj', '2017-03-22 00:05:31', 0, 4),
(114, 'Aram Aramyan', '78f38d35b35e4d50e36364f515d20a8b.jpg', 'lusnyak_19911@mail.ru', 7, 'Lorem Ipsum', 'thank you for photos!!', '2017-03-22 00:05:31', 1, 3),
(115, 'Aram Aramyan', '78f38d35b35e4d50e36364f515d20a8b.jpg', 'lusnyak_19911@mail.ru', 7, 'Lorem Ipsum', 'thank you for photos!!', '2017-03-22 00:05:30', 0, 0),
(116, 'Anna Grigoryan', '1612363ae5747cf34f27f5a9f359dfc7.png', 'greg@gmail.com', 7, 'Lorem Ipsum', 'Why do we use it?', '2017-03-22 00:05:31', 1, 5),
(117, 'Anna Grigoryan', '1612363ae5747cf34f27f5a9f359dfc7.png', 'greg@gmail.com', 7, 'Lorem Ipsum', 'Why do we use it?', '2017-03-22 00:05:31', 0, 6),
(118, 'Jony Jhonatan', 'fa3d00a6b5e871f52f2b45e488b1ac5c.jpg', 'jon@mail.ru', 7, 'Lorem Ipsum', 'I really liked your blog!', '2017-03-22 00:05:31', 1, 7),
(121, 'Jony Jhonatan', 'fa3d00a6b5e871f52f2b45e488b1ac5c.jpg', 'jon@mail.ru', 7, 'Lorem Ipsum', 'I really liked your blog!', '2017-03-22 00:05:30', 0, 2),
(122, 'Jony Jhonatan', 'fa3d00a6b5e871f52f2b45e488b1ac5c.jpg', 'jon@mail.ru', 7, 'Lorem Ipsum', 'I really liked your blog!', '2017-03-22 00:05:20', 0, 0),
(123, 'Jony Jhonatan', 'fa3d00a6b5e871f52f2b45e488b1ac5c.jpg', 'jon@mail.ru', 7, 'Lorem Ipsum', 'I really liked your blog!', '2017-03-22 00:05:51', 0, 0),
(124, 'Lorem Ipsum', '9414a13b04c381d0af1354778ed1e44c.png', 'lor@mail.com', 35, 'Lorem Ipsum', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2017-03-22 00:10:39', 1, 0),
(127, 'Lorem Ipsum', '9414a13b04c381d0af1354778ed1e44c.png', 'lor@mail.com', 35, 'Lorem Ipsum', 'Where does it come from?', '2017-03-22 00:15:45', 0, 0),
(129, 'Greg Grigoryan', '0e602b89700d1549c37407cccf953282.jpg', 'greg22@mail.ru', 35, 'Lorem Ipsum', 'Where does it come from?', '2017-03-22 00:17:22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_cont`
--

CREATE TABLE IF NOT EXISTS `email_cont` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `email_cont`
--

INSERT INTO `email_cont` (`id`, `name`, `message`, `email`) VALUES
(2, 'karine', 'fdjkwehdujiow', 'kar@gmail.c'),
(3, 'dhjdfshdfs', 'hsefyufu', 'jfdjfdh@gma');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) NOT NULL,
  `eng_name` text NOT NULL,
  `eng_comment` text NOT NULL,
  `arm_name` text CHARACTER SET utf8 NOT NULL,
  `arm_comment` text CHARACTER SET utf8 NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_a` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `eng_name`, `eng_comment`, `arm_name`, `arm_comment`, `blog_date`, `check_a`) VALUES
(33, '5bec1c1932153e49d26ad407a4e09ee2.jpg', 'fghjhhgj', 'hgjghjhgjg', 'jhgjhgj', 'ghjh', '2017-03-21 14:54:25', 1),
(35, 'a71348fc9680d895135105252c418f82.jpg', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Ô»ÕžÕ¶Õ¹ Õ§ Lorem Ipsum-Õ¨', 'Lorem Ipsum-Õ¨ Õ¿ÕºÕ¡Õ£Ö€Õ¸Ö‚Õ©ÕµÕ¡Õ¶ Ö‡ Õ¿ÕºÕ¡Õ£Ö€Õ¡Õ¯Õ¡Õ¶ Õ¡Ö€Õ¤ÕµÕ¸Ö‚Õ¶Õ¡Õ¢Õ¥Ö€Õ¸Ö‚Õ©ÕµÕ¡Õ¶ Õ°Õ¡Õ´Õ¡Ö€ Õ¶Õ¡Õ­Õ¡Õ¿Õ¥Õ½Õ¾Õ¡Õ® Õ´Õ¸Õ¤Õ¥Õ¬Õ¡ÕµÕ«Õ¶ Õ¿Õ¥Ö„Õ½Õ¿ Õ§:', '2017-03-21 23:36:54', 0),
(36, '62c46cfe505619298e0ce444a400525a.jpg', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Ô»ÕžÕ¶Õ¹ Õ§ Lorem Ipsum-Õ¨', 'Lorem Ipsum-Õ¨ Õ¿ÕºÕ¡Õ£Ö€Õ¸Ö‚Õ©ÕµÕ¡Õ¶ Ö‡ Õ¿ÕºÕ¡Õ£Ö€Õ¡Õ¯Õ¡Õ¶ Õ¡Ö€Õ¤ÕµÕ¸Ö‚Õ¶Õ¡Õ¢Õ¥Ö€Õ¸Ö‚Õ©ÕµÕ¡Õ¶ Õ°Õ¡Õ´Õ¡Ö€ Õ¶Õ¡Õ­Õ¡Õ¿Õ¥Õ½Õ¾Õ¡Õ® Õ´Õ¸Õ¤Õ¥Õ¬Õ¡ÕµÕ«Õ¶ Õ¿Õ¥Ö„Õ½Õ¿ Õ§:', '2017-03-21 23:38:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE IF NOT EXISTS `like_unlike` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likes` int(11) NOT NULL,
  `unlike` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `likes`, `unlike`, `user_id`, `blog_id`) VALUES
(1, 0, 0, 0, 0),
(2, 1, 0, 42, 7),
(3, 1, 0, 41, 35),
(4, 1, 0, 45, 35);

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `percent_sum`
--

CREATE TABLE IF NOT EXISTS `percent_sum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adidas` int(11) NOT NULL,
  `nike` int(11) NOT NULL,
  `reebok` int(11) NOT NULL,
  `puma` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `percent_sum`
--

INSERT INTO `percent_sum` (`id`, `adidas`, `nike`, `reebok`, `puma`, `sum`) VALUES
(1, 6, 3, 3, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `avatar` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `img_name`, `product_id`, `avatar`) VALUES
(14, '6bb99b7837d01d34b97e9d185f374398.jpg', 59, 0),
(15, '16b849f13d00432f33742736e70c05ce.jpg', 59, 1),
(16, '$_35.jpg', 61, 1),
(17, '$_35.jpg', 61, 0),
(18, 'apple-iphone-7-rumored-image.png', 61, 0),
(19, 'blog-2-570x355.jpg', 59, 0),
(20, 'blog-2-570x355.jpg', 62, 0),
(23, 'blog-2-570x355.jpg', 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_arm` varchar(300) CHARACTER SET utf8 NOT NULL,
  `name_eng` varchar(300) CHARACTER SET utf8 NOT NULL,
  `number` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `sale` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_arm`, `name_eng`, `number`, `value`, `sale`, `description`, `category_id`) VALUES
(28, 'samsung', 'samsung', '20', '5000', '30%', 'german', ''),
(59, '&#1392;&#1381;&#1404;&#1377;&#1389;&#1400;&#1405;', 'phone', '2017', '1000$', '50%', 'hgyutc vuyuhnjmolo,lp[omiunybu niom,ol', '26'),
(61, '&#1344;&#1377;&#1396;&#1377;&#1391;&#1377;&#1408;&#1379;&#1387;&#1401;&#1398;&#1381;&#1408;', ' Mac Computers ', '2015', '3000$', '50%', 'Photo Booth. Image capture. Preview: Displays images and Portable Document Format (PDF) documents. friends and family using text and video. iChat: Instant messaging application that makes it easy to ', '27');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `arm_text` text NOT NULL,
  `eng_text` text NOT NULL,
  `images` varchar(250) NOT NULL,
  `check_a` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `arm_text`, `eng_text`, `images`, `check_a`) VALUES
(2, 'hgjg', 'kjhkh', 'd5d25d8e15265546b168a3a6d5707230.jpg', 0),
(5, 'iphone', 'iphone', '16b849f13d00432f33742736e70c05ce.jpg', 1),
(7, 'Õ†Õ¸Ö€ 2017 Õ©Õ¾Õ¡Õ¯Õ¡Õ¶Õ« Õ¡Ö€Õ¿Õ¡Õ¤Ö€Õ¸Ö‚Õ©ÕµÕ¸Ö‚Õ¶ iphon7', 'ihone7', '443044207609afc3051e3a3417a7a6f8.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `percent_sum` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `percent_sum`, `admin`) VALUES
(6, 'jon', 'jony', 'pepso@bk.ru', '333', 1, 1),
(7, 'gjhjkh', 'hjl,j', 'lusnyak_1991@mail.ru', '8888', 0, 1),
(8, 'hbhnnn', 'nmmm', 'pepso@bk.ru', '3030', 0, 1),
(9, 'hhhgh', 'hgfhgfh', 'lusnyak_1991@mail.ru', '3333', 0, 1),
(10, 'hghfgh', 'fghfghf', 'lusnyak_1991@mail.ru', '2020', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_reg`
--

CREATE TABLE IF NOT EXISTS `users_reg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users_reg`
--

INSERT INTO `users_reg` (`id`, `name`, `surname`, `email`, `password`, `images`) VALUES
(41, 'Amigo', 'Amigo', 'pepso@bk.ru', '111', 'a27f7e9963fdc4c88e8f639941169736.png'),
(42, 'Aram', 'Aramyan', 'lusnyak_19911@mail.ru', '2020', '78f38d35b35e4d50e36364f515d20a8b.jpg'),
(43, 'Anna', 'Grigoryan', 'greg@gmail.com', '1111', '1612363ae5747cf34f27f5a9f359dfc7.png'),
(44, 'Jony', 'Jhonatan', 'jon@mail.ru', '2222', 'fa3d00a6b5e871f52f2b45e488b1ac5c.jpg'),
(45, 'Lorem', 'Ipsum', 'lor@mail.com', '5555', '9414a13b04c381d0af1354778ed1e44c.png'),
(46, 'Greg', 'Grigoryan', 'greg22@mail.ru', '333', '0e602b89700d1549c37407cccf953282.jpg'),
(47, 'aram', 'Aramyan', 'aro@gmail.com', '555', '4f9fe519ac696cbe6bc4ac7c3f7008ca.jpg');
