-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2021 at 03:06 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
-- Table structure for table `tbl_pages`
--

DROP TABLE IF EXISTS `tbl_pages`;
CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `path` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`ID`, `title`, `path`) VALUES
(1, 'index', 'index.thml'),
(2, 'about', 'about.html'),
(3, 'membership', 'membership.html'),
(4, 'junior_officails', 'junior_officails.html'),
(5, 'looking_for_officials', 'looking_for_officials.html'),
(6, 'contact', 'contact.html');

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
  `all_text` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`ID`, `title`, `body`, `image`, `page_id`, `tagline`, `all_text`) VALUES
(1, '“We come together for the love of the game”', 'This is body', 'image.jpg', 1, 'This is body', 'image.jpg'),
(2, 'Who we are', 'The LRG provides on ice officials for games at various levels of hockey, such as: minor hockey, high school, sledge, and adult. As an organization we strive to maintain an environment that embodies the core values of integrity, leadership, perseverance, respect and teamwork while enhancing self-esteem, promoting self-confidence and cultivating a lifelong passion for the game.', 'image.jpg', 1, 'The LRG provides on ice officials for games at various levels of hockey, such as: minor hockey, high school, sledge, and adult.', 'image.jpg'),
(3, 'The Referee', 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.', 'image.jpg', 1, 'Officials play a vital role in the game, they are often described as the third team on the ice.', 'image.jpg'),
(4, 'Our Services', '1. Training and Mentorship\r\n2. Service #2\r\n3. Service #3\r\n', 'image.jpg', 1, '', 'image.jpg'),
(5, 'Don Koharski', 'Whether your goal is to learn the basics to get you started, move up to the Pee Wee level, JR. hockey or get exposed to the professional ranks, our camps are designed to provide you that exposure and the necessary tools needed to enhance your officiating skills.', 'image.jpg', 1, 'Whether your goal is to learn the basics to get you started, move up to the Pee Wee level, JR.', 'image.jpg'),
(6, 'Overview\r\n', 'The London Referees Group is committed to providing a high standard and quality hockey officiating in the City of London and surrounding area. Our vision is to promote the game of hockey through fair and safe play, and a respect for all individuals involved in the game.\r\n', 'image.jpg', 2, 'The London Referees Group is committed to providing a high standard and quality hockey officiating in the City of London and surrounding area', 'image.jpg'),
(7, 'History', 'As an organization, we are focused on developing and maintaining a membership consisting of experienced and capable on ice officials. They are advocates for the ideals of good sportsmanship and fair play through qualifying officiating in hockey and respect for the authority of hockey officials at all levels of competition. ', 'image.jpg', 2, 'As an organization, we are focused on developing and maintaining a membership consisting of experienced and capable on ice officials.', 'image.jpg'),
(8, 'BANNER', 'ARE YOU LOOKING TO SIGN UP YOUR KIDS UP TO BECOME A REFEREE?', 'image.jpg', 1, '', 'image.jpg'),
(9, 'Membership', '“Referees are the law. They have a whistle. They blow it. And that whistle is the articulation of God\'s justice.”', 'image.jpg', 3, 'Referees are the law.', 'image.jpg'),
(10, 'Overview', 'LRG members commit to representing the vision and mission of the London Referees Group. They encourage a high standard of ethics, closer cooperation, and understanding of the role of the referee among officials, coaches, players, parents, the community and the media. Membership requires a one-time application and statement of interest. Membership is open to all genders, ages 14 and up.\r\nAs an organization, we are focused on developing and maintaining a membership consisting of experienced and capable on ice officials. They are advocates for the ideals of good sportsmanship and fair play through qualifying officiating in hockey and respect for the authority of hockey officials at all levels of competition.\r\n', 'image.jpg', 3, 'LRG members commit to representing the vision and mission of the London Referees Group.', 'image.jpg'),
(11, 'Structure', 'The executive leadership of the LRG supports ongoing development of its members by promotion of education and training programs that advance the skills of hockey officials. As well as providing information programs to coaches, parents, and community members that advocate for a stronger understanding for the role of the on-ice officials and the competence of these individuals.', 'image.jpg', 3, 'The executive leadership of the LRG supports ongoing development of its members by promotion of education and training programs that advance the skills of hockey officials.', 'image.jpg'),
(12, 'Schedule', 'Do you need to verify if your home game schedule has been uploaded? \r\nRemember to check your games on HorizonWebRef - 1 week prior to the game to ensure it is there and correct.\r\nCheck ref room 30 min before game - if no refs - Please Call:\r\nMarc 519-871-9449 (AAA-AA-MD-Girls Comp.-OMHA-Timekeepers)\r\nJamie 519-868-9449 (House League Boys & Girls-Novice&Atom MD-HS-Mens-Sledge)\r\n \r\nlink to Horizon (Schedule Website): https://www.horizonwebref.com/?pageID=1102', 'image.jpg', 3, 'Do you need to verify if your home game schedule has been uploaded?', 'image.jpg'),
(13, 'Skill building', 'The LRG training and development program is designed to assist young officials learn their role in the game and develop the skills necessary to ensure a safe and fair hockey game. This program consistently proves to be instrumental with guiding young officials for improvement of:\r\nDecision making skills\r\nOn ice awareness as an official\r\nCommunication skills\r\nApplying the rules of the game to promote safe and fair play\r\nAs part of this program we assign experienced officials as mentors to assist with the training and develop our younger officials. The on-ice mentorship and off-ice guidance brings practical and classroom style learning together with positive reinforcement in order to build their self-confidence.\r\n', 'image.jpg', 3, 'The LRG training and development program is designed to assist young officials learn their role in the game and develop the skills necessary to ensure a safe and fair hockey game.', 'image.jpg'),
(14, 'Junior Officials', 'Join our ever growing roster of junior officials', 'image.jpg', 4, 'Join our ever growing roster of junior officials', 'image.jpg'),
(15, 'Overview', 'If you are interested in becoming a hockey official, this is for you! It will provide all the information needed to get your officiating career started.', 'image.jpg', 4, 'If you are interested in becoming a hockey official, this is for you!', 'image.jpg'),
(16, 'Which level I am in?\r\n', 'The level system, Level I through Level VI, is the foundation for the training and development of officials across Canada. Hockey Canada has categorized the hockey played in Canada into four basic streams, each with different priorities. They include:\r\n     Initiation          Recreational            Competitive           Program of Excellence\r\n \r\nThe Hockey Canada Officiating Program has opportunities for everyone from the Initiation at Level I, through to the Program of Excellence at Levels V and VI.\r\nSelect a level, each one has a purpose and start officiating!\r\n', 'image.jpg', 4, 'The level system, Level I through Level VI, is the foundation for the training and development of officials across Canada', 'image.jpg'),
(17, 'How to join', 'empty', 'image.jpg', 4, 'empty', 'image.jpg'),
(18, 'Contact', 'Are you interested in becoming a referee, hire some of ours to your league or even just would like to know a bit more about who we are and what we do? You have come to the right place, then! Fill out the following contact form and ask away, we will get back to you as soon as 2 business days to set up an appointment.', 'image.jpg', 6, 'We would love to hear from you!', 'image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_level` varchar(2) NOT NULL DEFAULT '0',
  `user_lname` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_level`, `user_lname`) VALUES
(1, 'Admin', 'Admin', '$2y$10$BzOPT4tkL1qIPuI/Tby8xepaOETyaAFiUUlhlJt1PZDyBjLk4xQWm', 'admin@lrg.ca', '2021-02-25 03:42:27', '172.28.0.1', '1', 'Admin'),
(2, 'Test', 'Test', '$2y$10$wna42cBvBOmDES5td07osOT85bZe.x9.4DQD2mQ5wYBsJvRf77962', 'test@test.ca', '2021-02-25 03:44:11', '172.28.0.1', '0', 'Test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
