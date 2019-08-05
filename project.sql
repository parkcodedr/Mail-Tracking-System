-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 10:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(250) NOT NULL,
  `ad_email` varchar(150) NOT NULL,
  `ad_phone` varchar(17) NOT NULL,
  `ad_description` varchar(2000) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(10) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(200) NOT NULL,
  `fac_id` int(10) NOT NULL,
  `dept_description` varchar(20000) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `fac_id`, `dept_description`) VALUES
(1, 'bgfdvght', 1, 'vgervwevbwe5&lt;br&gt;'),
(2, 'bgfdvght', 1, 'vgervwevbwe5&lt;br&gt;'),
(3, 'FDFDDF', 1, 'TBEEB VGGV&lt;br&gt;'),
(4, 'vte', 1, 'gfbgfbebe&lt;br&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `fac_id` int(10) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(200) NOT NULL,
  `fac_description` varchar(20000) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`, `fac_description`) VALUES
(1, 'ghgfr', 'frtgvvbdghjmmkm,&lt;br&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int(10) NOT NULL AUTO_INCREMENT,
  `body` varchar(20000) NOT NULL,
  `subject` varchar(20000) NOT NULL,
  `date_sent` varchar(100) NOT NULL,
  `time_sent` varchar(100) NOT NULL,
  `mail_type` varchar(100) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `sender_phone` varchar(20) NOT NULL,
  `sender_email` varchar(200) NOT NULL,
  `class_of_sender` varchar(100) NOT NULL,
  `sending_office` varchar(10) NOT NULL,
  `tracking_code` varchar(70) NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `body`, `subject`, `date_sent`, `time_sent`, `mail_type`, `sender_name`, `sender_phone`, `sender_email`, `class_of_sender`, `sending_office`, `tracking_code`) VALUES
(1, '                                                                                                                                    &lt;p&gt;&lt;img style=&quot;width: 582px;&quot; src=&quot;upload/DSC_9156.jpg&quot;&gt;                                 hardcreate is a boy called from Israel. Wed look for him &lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Kai Walahi come here &lt;img style=&quot;width: 359.823px; height: 240.5px;&quot; src=&quot;upload/DSC_9205.jpg&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;img style=&quot;width: 495.948px; height: 331px;&quot; src=&quot;upload/DSC_9213.jpg&quot;&gt;&lt;/p&gt;&gt;hello&lt;p&gt;&lt;/p&gt;    ', 'Realease Of Single', '11-10-2017', '20:40:16', 'soft', 'Nwabueze Miracle', '08105605545', 'nwabuezemiracle@yahoo.com', 'Staff', '1', 'UNIUYO-3JSJ1JR'),
(2, '<p><br><img style="width: 176.25px; height: 117.392px;" src="upload/IMG_0281.JPG"></p><p>g5h35y3nju4j</p><p><br></p><p>nyfdmj,kt6</p><p><br></p><p>y5esjryiwekykoe4iyj5rlsd57tgrresjewtgjw     gh5esj4qt44q3j<br></p><p><br></p>', 'hello world', '11-10-2017', '21:10:30', 'soft', 'Nwabueze Miracle', '08105605545', 'nwabuezemiracle@yahoo.com', 'Student', '1', 'UNIUYO-5R73SR4'),
(3, '<p><span style="font-weight: bold;">hardcreate </span>is a boy called from Israel. Wed look for him <br></p><p><br></p><p><br><img style="width: 495.948px; height: 331px;" src="upload/DSC_9213.jpg"></p>', 'I want to collect But i cant yet.Dont Know why. Please how will i be able to collect?', '12-10-2017', '01:58:00', 'soft', 'hello gustavo', '08105605545', 'gusta@gmail.com', 'Student', '1', 'UNIUYO-XRUX24P'),
(4, '<p><span style="font-weight: bold;">hardcreate </span>is a boy called from Israel. Wed look for him <br></p><p><br></p><p><br><img style="width: 495.948px; height: 331px;" src="upload/DSC_9213.jpg"></p>', 'love is all over the world. I want to love too. But where do we find this love we so seek ? answer', '12-10-2017', '02:04:59', 'soft', 'Love Gatsta', '08105605545', 'gasterZ@gmail.com', 'Student', '1', 'UNIUYO-9PKB9MM'),
(5, 'Hello Please Extend School Fees<br>', 'Extension Of schol Fees', '12-10-2017', '17:43:38', 'hard', 'Eshter', '08105605545', 'Eshter@gmail.com', 'Student', '1', 'UNIUYO-EJLQDR5'),
(6, '                                 &lt;p&gt;Subject&lt;/p&gt;&lt;p&gt;&lt;br&gt;&nbsp;&nbsp;&nbsp; hfikfofgl;gf;lg&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;img style=&quot;width: 139px; height: 82.9516px;&quot; src=&quot;upload/signature.png&quot;&gt;&lt;/p&gt; ', 'Tranfer of department', '16-10-2017', '14:43:03', 'soft', 'Obi', '08069793443', 'obi@gmail.com', 'Student', '1', 'UNIUYO-7QFPKSP');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `trans_id` int(10) NOT NULL,
  `message_body` varchar(10000) NOT NULL,
  `message_time` varchar(100) NOT NULL,
  `message_date` varchar(100) NOT NULL,
  `whosent` varchar(50) NOT NULL,
  `reader` int(5) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `trans_id`, `message_body`, `message_time`, `message_date`, `whosent`, `reader`) VALUES
(1, 5, 'yolo yolo', '21:27:51', '2017/10/13', 'sender', 1),
(2, 5, 'hello, Hi', '21:34:58', '2017/10/13', 'sender', 1),
(4, 5, 'Hello Here', '23:44:13', '2017/10/13', 'staff', 1),
(5, 5, 'come lets fuck man', '23:46:27', '2017/10/13', 'sender', 1),
(6, 5, 'how are you sir', '00:18:32', '2017/10/14', 'sender', 1),
(8, 5, 'kai walahi come here', '02:24:37', '2017/10/14', 'staff', 1),
(10, 5, 'me am here ', '08:27:17', '2017/10/14', 'sender', 1),
(11, 5, 'hellol world', '08:36:14', '2017/10/14', 'sender', 1),
(14, 5, 'hi come here', '10:01:10', '2017/10/14', 'staff', 1),
(15, 5, 'hello, where are u going?', '10:02:25', '2017/10/14', 'staff', 1),
(16, 5, 'I am coming there Now &lt;br&gt;', '10:03:53', '2017/10/14', 'sender', 1),
(17, 5, 'cool down ans stop over heating', '14:06:21', '2017/10/14', 'sender', 1),
(18, 5, 'Hunger Dey&lt;br&gt;', '19:20:37', '2017/10/14', 'staff', 1),
(19, 5, 'Esther dey type&lt;br&gt;', '19:22:31', '2017/10/14', 'staff', 1),
(20, 5, 'Project Api&lt;br&gt;', '19:28:37', '2017/10/14', 'staff', 1),
(21, 5, 'kai&lt;br&gt;', '19:31:22', '2017/10/14', 'staff', 1),
(22, 5, 'Please Come here Now&lt;br&gt;', '19:33:06', '2017/10/14', 'staff', 1),
(23, 5, 'Immorality is &lt;br&gt;&lt;br&gt;&lt;br&gt;on the Rise..&lt;br&gt;&lt;br&gt;&lt;br&gt;&lt;br&gt;', '19:49:11', '2017/10/14', 'staff', 1),
(24, 5, 'Immortality&lt;br&gt;', '20:10:34', '2017/10/14', 'staff', 1),
(25, 5, 'head<br>', '20:13:00', '2017/10/14', 'staff', 1),
(26, 5, 'See Your Head <br><br><br>', '20:13:21', '2017/10/14', 'staff', 1),
(27, 5, 'hello<br>', '20:49:59', '2017/10/14', 'staff', 1),
(28, 5, 'hello man.. early church', '20:53:07', '2017/10/14', 'sender', 1),
(29, 5, 'hi man', '20:57:56', '2017/10/14', 'staff', 1),
(30, 5, '&nbsp;', '20:58:32', '2017/10/14', 'staff', 1),
(31, 5, 'Hi from Student', '21:09:54', '2017/10/14', 'sender', 1),
(32, 5, 'hello sir', '21:11:14', '2017/10/14', 'sender', 1),
(33, 5, 'kai', '21:11:41', '2017/10/14', 'sender', 1),
(34, 5, 'hello sir', '21:30:00', '2017/10/14', 'sender', 1),
(35, 5, 'How are you?<br><br>', '11:27:12', '2017/10/15', 'staff', 1),
(36, 5, 'am sir', '11:27:56', '2017/10/15', 'sender', 1),
(37, 5, 'hello sir', '11:28:47', '2017/10/15', 'sender', 1),
(38, 5, 'How are you my son<br>', '11:29:06', '2017/10/15', 'staff', 1),
(39, 5, 'Come here quickly', '11:41:32', '2017/10/15', 'sender', 1),
(40, 5, 'bebe', '11:42:44', '2017/10/15', 'sender', 1),
(41, 5, 'People Here', '11:55:06', '2017/10/15', 'sender', 1),
(42, 5, 'bia', '11:56:18', '2017/10/15', 'sender', 1),
(43, 7, 'helolo sir', '14:45:55', '2017/10/16', 'sender', 1),
(44, 7, 'I am here whats your problem<br>', '14:46:47', '2017/10/16', 'staff', 1),
(45, 5, 'hello admin', '17:51:54', '2017/10/17', 'sender', 1),
(46, 5, 'sir, How may we help u?<br>', '17:56:28', '2017/10/17', 'staff', 1),
(47, 5, 'kai<br>', '17:58:14', '2017/10/17', 'staff', 1),
(48, 5, 'Despacitor<br>', '18:06:03', '2017/10/17', 'staff', 1),
(49, 5, 'All Over<br>', '18:08:34', '2017/10/17', 'staff', 1),
(50, 5, 'how far', '14:51:55', '2017/10/18', 'sender', 1),
(51, 5, 'am good and you?<br><br>', '14:52:23', '2017/10/18', 'staff', 1),
(52, 5, 'come and get your mail<br>', '14:52:54', '2017/10/18', 'staff', 1),
(53, 5, 'hellol world', '14:21:48', '2017/11/14', 'sender', 1),
(54, 5, 'how are u boy<br>', '14:23:06', '2017/11/14', 'staff', 1),
(55, 5, 'Come here now<br>', '14:24:23', '2017/11/14', 'staff', 1),
(56, 5, 'Good Morning Sir', '11:11:32', '2017/11/19', 'sender', 1),
(57, 5, 'Mr Nwabueze Miracle, How may we help you<br>', '11:12:06', '2017/11/19', 'staff', 1),
(58, 5, 'I want to check the status of my Mail I submitted a month ago', '11:15:48', '2017/11/19', 'sender', 1),
(59, 5, '<i><b></b></i><b></b>Okay sir, It is currently in our office and it is been being processed.<br>&nbsp;When will you like to get it?', '11:17:11', '2017/11/19', 'staff', 1),
(60, 5, 'I want to get the mail today', '11:21:37', '2017/11/19', 'sender', 1),
(61, 5, 'Okay.. So?', '11:21:55', '2017/11/19', 'staff', 1),
(62, 5, 'Can I come To your Office Later today?', '11:22:13', '2017/11/19', 'sender', 1),
(63, 5, 'Sir whats the state of my mail? Mbok', '11:47:39', '2017/11/20', 'sender', 1),
(64, 5, 'Stupid boy, Why didnt yoiu come to collect it since', '11:48:14', '2017/11/20', 'staff', 1),
(65, 5, 'HEllo sir how nis may mail doin', '13:25:58', '2017/11/21', 'sender', 1),
(66, 5, 'Wee are processing it pick it up mao', '13:26:23', '2017/11/21', 'staff', 1),
(67, 5, 'sorry', '23:03:45', '2017/11/21', 'sender', 1),
(68, 5, 'hi<br><br>', '23:05:51', '2017/11/21', 'staff', 1),
(69, 5, 'kai zo', '01:09:50', '2017/11/22', 'sender', 1),
(70, 5, 'where is my mail', '13:03:45', '2017/11/22', 'sender', 1),
(71, 5, 'Its been Moved now', '13:04:02', '2017/11/22', 'staff', 1),
(72, 8, 'Hello sir..', '13:18:19', '2017/11/22', 'sender', 1),
(73, 8, 'My mail ohh', '13:18:27', '2017/11/22', 'sender', 1),
(74, 8, 'relax young man we are on it', '13:21:16', '2017/11/22', 'staff', 1),
(75, 8, 'Okay I am relaxing', '13:23:07', '2017/11/22', 'sender', 1),
(76, 8, 'hello', '19:10:23', '2017/11/24', 'sender', 1),
(77, 8, 'How are you?<br><br>', '19:10:40', '2017/11/24', 'staff', 1),
(78, 8, 'am good bro', '19:10:48', '2017/11/24', 'sender', 1),
(79, 8, 'comot or here', '16:23:39', '2017/11/26', 'sender', 1),
(80, 8, 'why i go comot', '16:23:53', '2017/11/26', 'staff', 1),
(81, 8, 'you dey make noise', '16:24:21', '2017/11/26', 'sender', 1),
(82, 8, 'stop making noise', '16:29:16', '2017/11/26', 'staff', 1),
(83, 8, 'here', '16:29:30', '2017/11/26', 'sender', 1),
(84, 8, 'Question Mark', '16:29:51', '2017/11/26', 'staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
CREATE TABLE IF NOT EXISTS `office` (
  `office_id` int(10) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(300) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `office_description` varchar(20000) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_name`, `dept_id`, `office_description`) VALUES
(1, 'Registrar', 1, 'sqgfrsds&lt;br&gt;'),
(2, 'Computer Engineering', 1, 'In charge of all mails from computer engineering'),
(3, 'Civil Engineering', 1, 'In Charge of all Mails from Civil Engineering'),
(4, 'Directorate of Academics', 1, 'In charge of mails as regarding the Academics Of students');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
CREATE TABLE IF NOT EXISTS `officers` (
  `officers_id` int(10) NOT NULL AUTO_INCREMENT,
  `office_id` int(10) NOT NULL,
  `officers_phone` varchar(50) NOT NULL,
  `officers_email` varchar(200) NOT NULL,
  `officers_post` varchar(200) NOT NULL,
  `officers_name` varchar(200) NOT NULL,
  `officer_description` varchar(20000) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`officers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officers_id`, `office_id`, `officers_phone`, `officers_email`, `officers_post`, `officers_name`, `officer_description`, `password`) VALUES
(1, 2, '08105605545', 'admin@gmail.com', 'admin', 'fgreetgtfr', 'gergv&lt;br&gt;', '$2y$10$6OdS2ycmp49LCVKx.vGBr.epV2hBMQ06ppIkB1O4q9dR743EyBdc6'),
(2, 0, '08105605545', 'vb@mj.uu', 'admin', 'fgreetgtfr', 'gergv&lt;br&gt;', '$2y$10$MdG6SbvFobuKNonRgt37E.LLgvq.uxpEnb037ma2C4Wi1j7nQCV72'),
(3, 1, '07035700944', 'gfgft@rt.gh', 'admin', 'GGFGG', 'jhmnhgcvfr&lt;br&gt;&lt;br&gt;&lt;br&gt;hted&lt;br&gt;', '$2y$10$hcb25hTGFujs3TAKWda5Tu.fOZEsCn/a.THSWtVcNl0WrGZqzP.d.'),
(4, 1, '08105605545', 'ygh@rffg.jj', 'admin', 'frwgfw', '&amp;nbsp;csavqfvqe&lt;br&gt;', '$2y$10$uLO3RkxWUUhDD0.bf7fiA.9XJafTYMwHsMlvIB/5jD.gV1kbTcql2'),
(5, 1, '08105605545', 'mklef121@gmail.com', 'staff', 'Miracle Nwabueze', 'trhghh&lt;br&gt;', '$2y$10$6OdS2ycmp49LCVKx.vGBr.epV2hBMQ06ppIkB1O4q9dR743EyBdc6'),
(6, 2, '08105605545', 'mklef@gmail.com', 'staff', 'Kuddof', 'Handles all mails from from Computer Engineering', '$2y$10$mw.GHWeFJlWpwUFXwfPBEuyaKIaQ2cpRuPK3uRyTyXbV1IsMtoAz6'),
(7, 4, '09086052186', 'peter@gmail.com', 'staff', 'peter', 'To attend to mails in this office', '$2a$07$cDSJPykxONgQQzyNoQC3ceMhRBiJTcYcR1OSlFMfUMyZQtmP0rY.u');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `route_id` int(10) NOT NULL AUTO_INCREMENT,
  `mail_id` int(10) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `mail_id`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

DROP TABLE IF EXISTS `tester`;
CREATE TABLE IF NOT EXISTS `tester` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `details` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(10) NOT NULL AUTO_INCREMENT,
  `route_id` int(10) NOT NULL,
  `office_id` int(10) NOT NULL,
  `status` int(5) NOT NULL,
  `from_office` int(10) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `route_id`, `office_id`, `status`, `from_office`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 0, 1),
(3, 3, 1, 0, 1),
(4, 4, 1, 0, 1),
(5, 1, 2, 1, 1),
(6, 5, 1, 0, 1),
(7, 6, 2, 1, 1),
(8, 1, 4, 1, 2),
(9, 1, 2, 0, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
