-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 28, 2021 at 05:30 PM
-- Server version: 10.3.27-MariaDB-1:10.3.27+maria~focal
-- PHP Version: 7.4.11

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

CREATE TABLE `tbl_employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_position` varchar(100) CHARACTER SET utf8 NOT NULL,
  `employee_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_avatar` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`employee_id`, `employee_name`, `employee_position`, `employee_email`, `employee_avatar`) VALUES
(1, 'Josh Ackworth', 'President ', 'president@londonrefereesgroup.com', ''),
(2, 'Joe Masse', 'VP', 'vp@londonrefereesgroup.com', ''),
(3, 'Bobby Wright', 'Referee In Chief', 'ric@londonrefereesgroup.com', ''),
(4, 'Mark Lemieux', 'Secretary', 'secretary@londonrefereesgroup.com', ''),
(5, 'Rob Neable', 'Treasurer', 'treasurer@londonrefereesgroup.com', ''),
(13, 'dcea3f6f89441038517f494f4102942e.jpg', 'Elena Chechulina', 'Grand Master', 'chechulina.e@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_sections` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(150) NOT NULL DEFAULT 'image.jpg',
  `page_id` int(11) NOT NULL,
  `tagline` varchar(600) NOT NULL,
  `alt_text` text DEFAULT NULL,
  `component_type` varchar(80) NOT NULL,
  `button_text` varchar(80) DEFAULT NULL,
  `section_id` varchar(80) NOT NULL,
  `section_order` int(3) NOT NULL,
  `is_overview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`ID`, `title`, `body`, `image`, `page_id`, `tagline`, `alt_text`, `component_type`, `button_text`, `section_id`, `section_order`, `is_overview`) VALUES
(2, 'Who we are', 'As an organization we strive to maintain an environment that embodies the core values of integrity, leadership, perseverance, respect and teamwork while enhancing self-esteem, promoting self-confidence and cultivating a lifelong passion for the game.', 'WhoWeAre.jpg', 1, 'The LRG provides on ice officials for games at various levels of hockey, such as: minor hockey, high school, sledge, and adult.', 'Who we are', 'white', 'LEARN MORE', 'whoWeAre', 1, 0),
(3, 'The Referee', 'The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.', 'theReferee.jpg', 1, 'Officials play a vital role in the game, they are often described as the third team on the ice.', 'The Referee', 'black', 'LEARN MORE', 'theReferee', 2, 0),
(5, 'Don Koharski Officiating and development referee camp', 'hockey or get exposed to the professional ranks, our camps are designed to provide you that exposure and the necessary tools needed to enhance your officiating skills.\"', 'DonKoharski.jpg', 1, '\"Whether your goal is to learn the basics to get you started, move up to the Pee Wee level, JR.', 'Don Koharski', 'white', 'SIGN UP TODAY', 'donKoharski', 3, 0),
(6, 'Overview\r\n', '. Our vision is to promote the game of hockey through fair and safe play, and a respect for all individuals involved in the game.\r\n', 'OverviewAbout.jpg', 2, 'The London Referees Group is committed to providing a high standard and quality hockey officiating in the City of London and surrounding area', 'Overview', 'black', '', 'overviewAbout', 4, 1),
(10, 'Overview', 'LRG members commit to representing the vision and mission of the London Referees Group. They encourage a high standard of ethics, closer cooperation, and understanding of the role of the referee among officials, coaches, players, parents, the community and the media. Membership requires a one-time application and statement of interest. Membership is open to all genders, ages 14 and up.\r\nAs an organization, we are focused on developing and maintaining a membership consisting of experienced and capable on ice officials. They are advocates for the ideals of good sportsmanship and fair play through qualifying officiating in hockey and respect for the authority of hockey officials at all levels of competition.\r\n', 'OverviewMembership.jpg', 3, 'LRG members commit to representing the vision and mission of the London Referees Group.', 'Overview', 'black', '', 'overviewMembership', 5, 1),
(12, 'Schedule', 'Remember to check your games on HorizonWebRef - 1 week prior to the game to ensure it is there and correct.\r\nCheck ref room 30 min before game - if no refs - Please Call:\r\nMarc 519-871-9449 (AAA-AA-MD-Girls Comp.-OMHA-Timekeepers)\r\nJamie 519-868-9449 (House League Boys & Girls-Novice&Atom MD-HS-Mens-Sledge)\r\n \r\nlink to Horizon (Schedule Website): https://www.horizonwebref.com/?pageID=1102', 'Schedule.jpg', 3, 'Do you need to verify if your home game schedule has been uploaded?', 'Schedule', 'white', 'LEARN MORE', 'Schedule', 7, 0),
(13, 'Skill building', 'This program consistently proves to be instrumental with guiding young officials for improvement of:\r\nDecision making skills\r\nOn ice awareness as an official\r\nCommunication skills\r\nApplying the rules of the game to promote safe and fair play\r\nAs part of this program we assign experienced officials as mentors to assist with the training and develop our younger officials. The on-ice mentorship and off-ice guidance brings practical and classroom style learning together with positive reinforcement in order to build their self-confidence.\r\n', 'Skills.jpg', 3, 'The LRG training and development program is designed to assist young officials learn their role in the game and develop the skills necessary to ensure a safe and fair hockey game.', 'Skills', 'black', '', 'Skills', 8, 0),
(15, 'Overview', 'It will provide all the information needed to get your kids officiating careers started.', 'OverviewJrOfficals.jpg', 4, 'Do you have hockey-loving kids? Responsible and careful who admire the referee when they watch a hockey game?', 'Overview', 'black', '', 'overviewJRofficials', 9, 1),
(18, 'Contact', 'Are you interested in becoming a referee, hire some of ours to your league or even just would like to know a bit more about who we are and what we do? You have come to the right place, then! Fill out the following contact form and ask away, we will get back to you as soon as 2 business days to set up an appointment.', 'image.jpg', 6, 'We would love to hear from you!', 'image.jpg', '', 'SEND', 'contact', 17, 0),
(23, 'Overview', 'We know that not all hockey games are the same and neither are seasons, that is why we have trained our team for any situation.\r\n\r\nOur referees are prepared and certified to whistle a wide variety of types of hockey games. LRG provides referee services for the following types of hockey\r\n', 'OverviewHire.jpg', 5, 'We are ready and we have a solution for everyone!', 'Overview', 'black', NULL, 'overviewHire', 10, 1),
(24, 'Minor Hockey', ' Players are classified in different leagues depending on their age, and likewise the rules also vary, mainly those of physical contact.\r\nIf you or your children are part of minor hockey and you need one of our referees, contact us by filling out the form on our contact page.\r\nBut if you want to know more about minor hockey and the requirements to be part of it, you can click on the following button.\r\n', 'MinorHockey.jpg', 5, 'Minor hockey is a category of ice hockey where 20 years old players and younger participate.', 'Minor Hockey', 'white', 'LEARN MORE', 'minorHockey', 11, 0),
(25, 'Sledge Hockey', ' By the nature of the sport, some rules vary from ice hockey. Tied to the sleds, the participants glide across the field with the help of two sticks.\r\nIf you need a referee for one or more sledge hockey matches, contact us by filling the form in our contact page.\r\nWant to know more about sledge hockey? Click the button\r\n', 'SledgeHockey.jpg', 5, 'Sledge hockey is a sport that is designed for players with physical disabilities.', 'Sledge Hockey', 'black', 'LEARN MORE', 'sledgeHockey', 12, 0),
(26, 'Recreational Hockey', 'Whoever you are we will help you, if you play recreational games and you are looking for a referee to help you direct a healthy and safe game, we are willing and able to referee your and your team\'s hockey game. Want to learn more about recreational hockey?', 'RecreationalHockey.jpg', 5, 'Are you a 26-year-old beginner or a 42-year-old former pro that plays recreational hockey?', 'Recreational Hockey', 'white', 'LEARN MORE', 'recreationalHockey', 13, 0),
(27, 'City of london regular season', 'Because the best hockey players are not those who only score goals but also those who play responsibly and with all the precautions and clear rules, that\'s what we are for, we will take care of your team and your game.', 'RegularSeason.jpg', 5, 'Play responsibly, we are the best referees in London, and we serve the best players, that is, you!', 'London Regular Season', 'black', '', 'regularSeason', 14, 0),
(28, 'Tournaments', 'We assure you a fair and safe game, we have years of experience in the field of referee hockey. Contact us and let\'s start the tournament in a big way.', 'Tournaments.jpg', 5, 'You are organizing a hockey tournament and you have everything ready, the teams, the prize and the hockey fields ready to go, but Do you have the best referees in London?', 'Tournaments', 'white', '', 'tournaments', 15, 0),
(29, 'Winter, spring and summer', 'We have availability during all seasons of the year and in any month of the seasons. LRG does not rest, we are committed to providing you with the best games for your hockey team at all times. Get in touch with us and you will have the best trained referee in your match.', 'WS&S.jpg', 5, 'Who said that hockey on ice can only be played in winter?', 'Winter Spring and Summer', 'black', '', 'winterSpringSummer', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_level` varchar(2) NOT NULL DEFAULT '0',
  `user_lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_level`, `user_lname`) VALUES
(1, 'Admin', 'Admin', '$2y$10$BzOPT4tkL1qIPuI/Tby8xepaOETyaAFiUUlhlJt1PZDyBjLk4xQWm', 'admin@lrg.ca', '2021-03-28 14:59:28', '172.26.0.1', '1', 'Admin'),
(2, 'Test', 'Test', '$2y$10$wna42cBvBOmDES5td07osOT85bZe.x9.4DQD2mQ5wYBsJvRf77962', 'test@test.ca', '2021-02-25 03:44:11', '172.28.0.1', '0', 'Test'),
(3, 'Elena', 'Lena', '$2y$10$.LL/xtaKJYylwPUpCgcFC.GCG6xQ843.VM6WRxkmYwAQj.A/wZbjS', 'chechulina.e@yahoo.com', '2021-03-25 19:33:31', '172.26.0.1', '0', 'Chechulina'),
(4, 'Bob', 'bob', '$2y$10$UezFezwcf9rGJ34lPD2lb.uwXT7mc094aGq3Uzj8Cb7P9tPjbGGb.', 'bob@test.ca', '2021-03-28 14:57:16', '172.26.0.1', '0', 'Bobov');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;