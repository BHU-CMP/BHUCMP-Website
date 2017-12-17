-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 01:07 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nacoss`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image`       VARCHAR(50) NOT NULL,
  `description` VARCHAR(500) DEFAULT NULL,
  `id`          BIGINT(50)  NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id`            INT(50)      NOT NULL,
  `matno`         VARCHAR(50)  NOT NULL,
  `password`      VARCHAR(255) NOT NULL,
  `email`         VARCHAR(50)  NOT NULL,
  `fname`         VARCHAR(50)  NOT NULL,
  `lname`         VARCHAR(50)  NOT NULL,
  `status`        TEXT         NOT NULL,
  `image`         VARCHAR(50)  NOT NULL,
  `activitystate` VARCHAR(20)  NOT NULL,
  `gender`        VARCHAR(50)  NOT NULL,
  `level`         BIGINT(20)   NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `matno`, `password`, `email`, `fname`, `lname`, `status`, `image`, `activitystate`, `gender`, `level`)
VALUES
  (25, 'bhu/15/04/05/0012', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Cooljoe464@gmail.com',
       'Joel', 'Onyedinefu', 'Student', '473427.jpg', '1', 'Male', 300);

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_admin`
--

CREATE TABLE `nacoss_admin` (
  `id`            int(50)     NOT NULL,
  `username`      varchar(50) NOT NULL,
  `password`      varchar(50) NOT NULL,
  `activitystate` VARCHAR(50) NOT NULL,
  `email`         INT(11)     NOT NULL,
  `fname`         VARCHAR(50) NOT NULL,
  `lname`         VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nacoss_admin`
--

INSERT INTO `nacoss_admin` (`id`, `username`, `password`, `activitystate`, `email`, `fname`, `lname`) VALUES
  (1, 'adminusername', '1234', '1', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_contact`
--

CREATE TABLE `nacoss_contact` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nacoss_contact`
--

INSERT INTO `nacoss_contact` (`id`, `name`, `phonenumber`, `email`, `message`) VALUES
(1, 'jerry tadi', '21345678', 'jerrytadi@gmail.com', '      \r\n    ,jbv'),
(2, 'jerry tadi', '21345678', 'jerrytadi@gmail.com', '      \r\n    ,jbv'),
(3, '', '', '', '      \r\n    '),
(4, 'paulina kwaphier', '435678980', 'loco@gail.com', '      \r\n    henbvfcx'),
(5, 'paulina kwaphier', '435678980', 'loco@gail.com', '      \r\n    henbvfcx');

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_forum_answers`
--

CREATE TABLE `nacoss_forum_answers` (
  `answer_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `question_id` int(56) NOT NULL,
  `answer_given` text NOT NULL,
  `submitted_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_forum_questions`
--

CREATE TABLE `nacoss_forum_questions` (
  `question_id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `submitted_time` varchar(50) NOT NULL,
  `question_tags` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_likeanddislike`
--

CREATE TABLE `nacoss_likeanddislike` (
  `answer_id` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `likes` int(50) NOT NULL,
  `dislikes` int(50) NOT NULL,
  `action` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `image` INT(11) DEFAULT NULL,
  `pdf`   VARCHAR(30) NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login_matno_uindex` (`matno`),
  ADD UNIQUE KEY `login_email_uindex` (`email`);

--
-- Indexes for table `nacoss_admin`
--
ALTER TABLE `nacoss_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nacoss_admin_email_uindex` (`email`);

--
-- Indexes for table `nacoss_contact`
--
ALTER TABLE `nacoss_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nacoss_forum_answers`
--
ALTER TABLE `nacoss_forum_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `nacoss_forum_questions`
--
ALTER TABLE `nacoss_forum_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `nacoss_likeanddislike`
--
ALTER TABLE `nacoss_likeanddislike`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` BIGINT(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` INT(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 26;
--
-- AUTO_INCREMENT for table `nacoss_admin`
--
ALTER TABLE `nacoss_admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nacoss_contact`
--
ALTER TABLE `nacoss_contact`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nacoss_forum_answers`
--
ALTER TABLE `nacoss_forum_answers`
  MODIFY `answer_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nacoss_forum_questions`
--
ALTER TABLE `nacoss_forum_questions`
  MODIFY `question_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nacoss_likeanddislike`
--
ALTER TABLE `nacoss_likeanddislike`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
