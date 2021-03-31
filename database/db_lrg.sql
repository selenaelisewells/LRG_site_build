-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2021 at 06:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lrg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

DROP TABLE IF EXISTS `tbl_employees`;
CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_position` varchar(100) CHARACTER SET utf8 NOT NULL,
  `employee_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_avatar` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`employee_id`, `employee_name`, `employee_position`, `employee_email`, `employee_avatar`) VALUES
(1, 'Josh Ackworth', 'President', 'josh@londonrefereesgroup.com', 'josh.svg'),
(2, 'Joe Masse', 'Vice President', 'joe@londonrefereesgroup.com', 'joe.svg'),
(3, 'Bobby Wright', 'Referee in Cheif', 'bobby@londonrefereesgroup.com', 'bobby.svg'),
(4, 'Mark Lemieux', 'Secretary', 'mark@londonrefereesgroup.com', 'mark.svg'),
(5, 'Rob Neable', 'Treasurer', 'rob@londonrefereesgroup.com', 'rob.svg'),
(20, 'Paul Raes', 'Membership Rep', 'paul@londonrefereesgroup.com', 'paulR.svg'),
(21, 'Melanie Alexander', 'Membership Rep', 'melanie@londonrefereesgroup.com', 'melanie.svg'),
(22, 'Marc Giroux', 'Assignor', 'marc@londonrafereesgroup.com', 'marc.svg'),
(23, 'Jamie Deward', 'Assignor', 'jamie@londonrafereesgroup.com', 'jamie.svg'),
(24, 'Paul Schofield', 'Scheduler', 'paul@londonrafereesgroup.com', 'paulS.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

DROP TABLE IF EXISTS `tbl_pages`;
CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `path` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`ID`, `title`, `path`) VALUES
(1, 'index', 'index.php'),
(2, 'about', 'about.php'),
(3, 'membership', 'membership.php'),
(4, 'junior_officials', 'jr-officials.php'),
(5, 'hiring_officials', 'hire.php'),
(6, 'contact', 'contact.php'),
(7, 'login', 'login.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

DROP TABLE IF EXISTS `tbl_sections`;
CREATE TABLE IF NOT EXISTS `tbl_sections` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(150) NOT NULL DEFAULT 'image.jpg',
  `page_id` int(11) NOT NULL,
  `tagline` varchar(600) NOT NULL,
  `alt_text` text,
  `component_type` varchar(80) NOT NULL,
  `button_text` varchar(80) DEFAULT NULL,
  `button_link` varchar(150) NOT NULL,
  `section_id` varchar(80) NOT NULL,
  `section_order` int(3) NOT NULL,
  `is_overview` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`ID`, `title`, `body`, `image`, `page_id`, `tagline`, `alt_text`, `component_type`, `button_text`, `button_link`, `section_id`, `section_order`, `is_overview`) VALUES
(2, 'Who we are', 'We at LRG provide on-ice officials for games at various levels of hockey, such as minor, high school, sled, and adult hockey. As an organization, we always strive to create an environment that incentivizes fair play and safety above all else.\r\nTo that end, we cultivate core values such as integrity, leadership, perseverance, respect, and teamwork to promote self-confidence and cultivate a lifelong passion for the game.', 'WhoWeAre.jpg', 1, 'We come together for the love of the game.', 'Who we are', 'white', 'LEARN MORE', './about.php', 'whoWeAre', 1, 0),
(3, 'The Referee', 'Officials play a vital role in the game, they are often described as the third team on the ice.\r\nThe basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.', 'theReferee.jpg', 1, 'promote fair and safe play', 'The Referee', 'black', 'Hire a referee', './hire.php', 'theReferee', 2, 0),
(6, 'Overview\r\n', 'The London Referees Group provides on-ice officials for games at various levels of hockey, such as minor, high school, sledge and adult hockey. As an organization, we always strive to create an environment that incentivizes fair play and safety above all else.\r\n<br><br>\r\nWe at LRG are committed to providing a high standard of quality when it comes to officiating hockey matches for the City of London and its surrounding area. Our vision is to promote the game through fair and safe play, as well as respect for all its participants.', 'OverviewAbout.jpg', 2, 'The London Referees Group is committed to providing a high standard and quality hockey officiating in the City of London and surrounding area', 'Overview', 'black', '', '', 'overviewAbout', 4, 1),
(10, 'Overview', 'We are a collective of members consisting of officials of varying levels that are properly trained and able to represent our core values at every game.\r\nWe are committed to be paragons of fairness and defenders of safety in the game. As such, we strive to maintain the highest standards of ethics, while also promoting awareness of the role of referees to coaches, players, parents, the community and the media.\r\nTo become a member, the only requirement is to be of age 14 or older. Elsewise, we are open to all genders and backgrounds and would love to hear from you want to become a referee and would know more about it.\r\n', 'OverviewMembership.jpg', 3, 'LRG members commit to representing the vision and mission of the London Referees Group.', 'Overview', 'black', '', '', 'overviewMembership', 5, 1),
(12, 'Schedule', 'Do you need to verify if your home game schedule has been uploaded? Remember to check your games on HorizonWebRef - 1 week prior to the game to ensure it is there and correct.\r\n<br><br>\r\nCheck ref room 30 min before game - if no refs - Please Call:\r\nMarc <a href=\"tel:519-871-9449\">519-871-9449</a> AAA-AA-MD-Girls Comp.-OMHA-Timekeepers)\r\n<br><br>\r\nJamie <a href=\"tel:519-868-9449\">519-868-9449</a> (House League Boys & Girls-Novice&Atom MD-HS-Mens-Sledge) \r\n', 'Schedule.png', 3, 'Need to check your schedule?', 'Schedule', 'black', 'Login to Scheduler', 'https://www.horizonwebref.com/?pageID=1102', 'Schedule', 7, 0),
(13, 'Skill building', 'The LRG training and development program is designed to assist young officials learn their role in the game and develop the skills necessary to ensure a safe and fair hockey game.\r\n<br><br>\r\nAs part of this program we assign experienced officials as mentors to assist with the training and develop our younger officials. The on-ice mentorship and off-ice guidance brings practical and classroom style learning together with positive reinforcement in order to build the self-confidence they need to realize their potential. Have questions about Junior Officials?\r\n', 'Skills.jpg', 4, 'ready to level up your skills?', 'Skills', 'white', 'Contact us', './contact.php', 'Contact Us', 8, 0),
(15, 'Overview', 'Are you a youth that loves hockey? Do you admire the role performed by referees during the game and are curious to know more about it? If that is the case, the Junior Officials program may be right for you!\r\n<br><br>\r\nThis program consistently proves to be instrumental with guiding young officials for improvement of :\r\ndecision-making skills,\r\non ice awareness as an official,\r\ncommunication skills, and applying the rules of the game to promote safe and fair play.', 'OverviewJrOfficials.jpg', 4, '', 'Overview', 'black', '', '', 'overviewJRofficials', 9, 1),
(23, 'Overview', 'If you are currently looking for an organization to referee your hockey league, our team would like the opportunity to assist.\r\n<br><br>\r\nWe at LRG are committed to providing safe and fair games no matter the type, level, or size of your hockey game. <a class=\"red\" href=\"./contact.php\">CONTACT US</a> today and we will provide you with a team of fiercely committed on-ice officials that will ensure everything goes smoothly with your hockey games.\r\n<br><br>\r\nWe officiate many different types of hockey, check them out below!', 'OverviewHire.jpg', 5, 'We are ready and we have a solution for everyone!', 'Overview', 'black', NULL, '', 'overviewHire', 10, 1),
(24, 'Minor Hockey', 'A category for players 20 and younger. Participants are classified in different leagues in accordance to their age group, and rules vary slightly - most notable in matters of physical contact.\r\n<br><br>\r\nIf you or your children are part of a minor hockey league and are in need of a referee, contact us and we’ll be happy to help.\r\n\r\n\r\n', 'MinorHockey.jpg', 5, '', 'Minor Hockey', 'white', 'contact us', './contact.php', 'minorHockey', 11, 0),
(25, 'Sledge Hockey', 'A variant of hockey designed for players with physical disabilities. To better accommodate the needs of its players, Sledge Hockey’s rules vary slightly from regular Ice Hockey.\r\n<br><br>\r\nAll players are tied to sleds and move within the rink through traction created by two sticks they carry, one on each hand. This unique set up levels the playing field and allows this particular style of hockey to be as fast and dynamic as what you would expect of players on skates.\r\n<br><br>\r\nNeed a referee for your Sledge Hockey league? Contact us today!\r\n', 'SledgeHockey.jpg', 5, '', 'Sledge Hockey', 'black', 'Hire an Official', './contact.php', 'sledgeHockey', 12, 0),
(26, 'Recreational Hockey', 'Are you 26 and have never even played hockey before? Or maybe a former pro who retired to only playing it at a recreational level? Whichever the case, we are here to help you.\r\n<br><br>\r\nIf you are playing recreational games and are looking for a referee to officiate your matches and ensure a healthy and safe game, we are both able and willing to referee for recreational matches. \r\n', 'RecreationalHockey.jpg', 5, '', 'Recreational Hockey', 'white', 'Hire a referee', './contact.php', 'recreationalHockey', 13, 0),
(27, 'City of london regular season', 'Are you looking for officiants for the City of London\'s regular hockey season? We are here to help.\r\n<br><br>\r\nWe have hockey officials for every league and level at the ready to assist. Contact us today to find an officiant right for your hockey league.', 'RegularSeason.jpg', 5, 'Play responsibly with LRG!', 'London Regular Season', 'black', 'Contact Us', './contact.php', 'regularSeason', 14, 0),
(28, 'Tournaments', 'Do you need a team of referees for your hockey tournament? We have years of experience in officiating hockey tournaments and our officials will make sure that the matches are played in a manner that is both safe and fair. Let’s come together for the love of the game! ', 'Tournaments.jpg', 5, '', 'Tournaments', 'white', 'Hire Officials', './contact.php', 'tournaments', 15, 0),
(29, 'Winter, spring and summer', 'Who was it that said hockey can only be played in winter? We at LRG are committed to providing safe and fair games throughout the year, regardless of season. All you need to do is get in touch with us and we will provide you with a team of fiercely committed on-ice officials that will ensure everything goes smoothly with your games.', 'WS&S.jpg', 5, '', 'Winter Spring and Summer', 'black', 'hire officials', './contact.php', 'winterSpringSummer', 16, 0),
(30, 'History & Values', 'We came together to advocate for sportsmanship, safety and fairness throughout every match, as well as to lead by example for our less experienced colleagues. \r\n<br><br>\r\nAs an organization, we are focused on developing and maintaining a collective of members consisting of officials of varying levels who are properly trained and able to represent our core values at every game. We hold core values such as integrity, leadership, perseverance, respect and teamwork to promote self-confidence and cultivate a lifelong passion for the game.\r\n<br><br>\r\nIf you are currently looking for an organization to referee your hockey league, our team would like the opportunity to assist! \r\n', 'mainLogo.svg', 2, 'Founded in 1952', 'referee', 'white', 'Contact Us', './contact.php', 'history', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_level` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_level`) VALUES
(1, 'Admin', 'Admin', 'admin', '$2y$10$nSfb1VJgAoa0B0RjnMcv4.7FNObHT2k9OuMJ8AfGdmCM8aXiJwSiK', 'admin@lrg.ca', '2021-03-29 17:26:02', '172.28.0.1', '1'),
(2, 'Test', 'Test', 'Test', '$2y$10$vD6ftJbvKgeUfzvEoHqXreiR7bWb3u8OnXQmYIx3uzjaeiugdFVOG', 'test@test.ca', '2021-02-25 03:44:11', '172.28.0.1', '0'),
(3, 'Elena', 'Chechulina', 'Lena', '$2y$10$.LL/xtaKJYylwPUpCgcFC.GCG6xQ843.VM6WRxkmYwAQj.A/wZbjS', 'chechulina.e@yahoo.com', '2021-03-25 19:33:31', '172.26.0.1', '0'),
(4, 'Bob', 'Bobov', 'bob', '$2y$10$UezFezwcf9rGJ34lPD2lb.uwXT7mc094aGq3Uzj8Cb7P9tPjbGGb.', 'bob@test.ca', '2021-03-29 17:24:29', '172.28.0.1', '0'),
(7, 'Elena', 'Chechulina', 'guest_test', '$2y$10$M6kWKQ05zOdYVcxyGAkVPuZgIjCgZOhtL.Wmgz0EfyWt0DO.Fuc72', 'chechulina.e@yahoo.com', '2021-03-29 16:37:43', 'no', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
