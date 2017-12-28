-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 09:03 PM
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
-- Table structure for table `excos`
--

CREATE TABLE `excos` (
  `excos_name` varchar(255) NOT NULL,
  `excos_image` varchar(255) NOT NULL,
  `excos_title` varchar(255) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excos`
--

INSERT INTO `excos` (`excos_name`, `excos_image`, `excos_title`, `id`) VALUES
('Banso Wisdom', '76.jpg', 'PRESIDENT', 1),
('Dalahol Debbie', '93.jpg', 'VICE PRESIDENT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `id` bigint(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image`, `description`, `id`, `name`) VALUES
('54.png', 'dndhgcxghfvchhvndbvyjdc', 8, 'GDG BINGHAM'),
('69.png', 'dghghdfhhkuil;.,knfh', 9, 'GDG BINGHAM'),
('10.jpg', 'fliaiejlksjaroejwrjhdiudjfrgfvubnfvhcjhvud dbiusdhfdsufd udhfsfa7fhb', 10, 'GDG BINGHAM'),
('58.jpg', 'wtrrddfglorem ipsum', 11, 'GDG BINGHAM'),
('68.png', 'qwertyui opasdfghjkl zxcvbnm qwertyuiopasdf ghjklzxcvnm', 12, 'GDG BINGHAM'),
('14.png', 'fghgh', 13, 'GDG BINGHAM');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `matno` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `activitystate` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `level` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `matno`, `password`, `email`, `fname`, `lname`, `status`, `image`, `activitystate`, `gender`, `level`) VALUES
(28, 'bhu/15/04/05/0003', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kassandraakut@gmail.com', 'Cassandra', 'Akut', 'Student', 'CassandraAkut.jpg', '1', 'Female', 300),
(29, 'bhu/15/04/05/0012', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Cooljoe464@gmail.com', 'Joel', 'Onyedinefu', 'Student', 'JoelOnyedinefu.jpg', '1', 'Male', 300);

-- --------------------------------------------------------

--
-- Table structure for table `nacoss_admin`
--

CREATE TABLE `nacoss_admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `activitystate` varchar(50) NOT NULL,
  `email` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
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
  `image` int(11) DEFAULT NULL,
  `pdf` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `excos`
--
ALTER TABLE `excos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `excos`
--
ALTER TABLE `excos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
