-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2014 at 11:27 AM
-- Server version: 5.1.68-cll
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dwauanni_p4_dwa-uannipu_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE IF NOT EXISTS `estimates` (
  `estimation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `work_type_code` varchar(2) NOT NULL,
  `resource_type_code` varchar(2) NOT NULL,
  `test_subject_code` varchar(3) NOT NULL,
  `hours` int(11) NOT NULL,
  `resource_name` varchar(40) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`estimation_id`),
  KEY `estimation_id` (`estimation_id`),
  KEY `user_id` (`user_id`),
  KEY `year` (`year`),
  KEY `work_type_code` (`work_type_code`),
  KEY `resource_type_code` (`resource_type_code`),
  KEY `test_subject_code` (`test_subject_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`estimation_id`, `user_id`, `year`, `work_type_code`, `resource_type_code`, `test_subject_code`, `hours`, `resource_name`, `creation_date`, `modified_date`) VALUES
(16, 10, 2014, 'M', 'T', 'GEN', 90, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 10, 2014, 'M', 'T', 'GEN', 90, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 10, 2014, 'M', 'T', 'GEN', 90, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 10, 2014, 'M', 'T', 'GEN', 90, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 10, 2015, 'D', 'T', 'MTH', 90, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 10, 2015, 'D', 'D', 'MTH', 23, 'D', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 10, 2015, 'D', 'A', 'MTH', 45, 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 10, 2015, 'D', 'T', 'GEN', 12, 'T', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 10, 2015, 'D', 'A', 'GEN', 45, 'usha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 10, 2014, 'M', 'B', 'GEN', 90, 'viva', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 10, 2015, 'M', 'A', 'GEN', 50, 'hgfh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 10, 2016, 'M', 'B', 'GEN', 90, 'dsads', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 10, 2014, 'D', 'B', 'GEN', 67, 'two', '2013-12-22 19:26:00', '2013-12-22 19:26:00'),
(77, 10, 2014, 'D', 'D', 'GEN', 90, 'sadsa', '2013-12-22 20:00:00', '2013-12-22 20:00:00'),
(78, 22, 2014, 'M', 'A', 'BIO', 120, 'Bob', '2013-12-22 22:47:00', '2013-12-22 22:47:00'),
(79, 22, 2015, 'D', 'D', 'CMP', 220, 'Bill', '2013-12-22 22:47:00', '2013-12-22 22:47:00'),
(80, 23, 2015, 'D', 'B', 'GEN', 25, 'Jenny', '2013-12-22 22:48:00', '2013-12-22 22:48:00'),
(83, 24, 2015, 'D', 'A', 'CMP', 25, 'Ram', '2013-12-22 22:50:00', '2013-12-22 22:50:00'),
(84, 24, 2014, 'M', 'B', 'ENG', 125, 'Neil', '2013-12-22 22:50:00', '2013-12-22 22:50:00'),
(85, 24, 2015, 'D', 'B', 'GEN', 80, 'Terri', '2013-12-22 22:50:00', '2013-12-22 22:50:00'),
(88, 10, 2014, 'D', 'A', 'GEN', 90, 'Peter', '2013-12-22 22:51:00', '2013-12-22 22:51:00'),
(89, 10, 2015, 'D', 'A', 'ENG', 100, 'George', '2013-12-22 22:51:00', '2013-12-22 22:51:00'),
(90, 10, 2016, 'D', 'B', 'MTH', 120, 'Ron', '2013-12-22 22:51:00', '2013-12-22 22:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `resource_type`
--

CREATE TABLE IF NOT EXISTS `resource_type` (
  `resource_type_code` varchar(2) NOT NULL,
  `resource_type_desc` varchar(40) NOT NULL,
  `hourly_rate` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`resource_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_type`
--

INSERT INTO `resource_type` (`resource_type_code`, `resource_type_desc`, `hourly_rate`, `creation_date`, `modified_date`) VALUES
('A', 'Architect', 120, '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('B', 'BSA', 85, '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('D', 'Developer', 100, '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('T', 'Tester', 75, '2013-12-13 00:00:00', '2013-12-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_program`
--

CREATE TABLE IF NOT EXISTS `test_program` (
  `test_program_code` varchar(3) NOT NULL,
  `test_program_desc` varchar(40) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`test_program_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_program`
--

INSERT INTO `test_program` (`test_program_code`, `test_program_desc`, `creation_date`, `modified_date`) VALUES
('ELT', 'ELTeach', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('GAT', 'Georgia', '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('GRE', 'GRE', '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('PRX', 'Praxis', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('SAT', 'SAT', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('TFL', 'TOEFL', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('WCA', 'Washington', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('WYM', 'Wyoming', '2013-12-22 00:00:00', '2013-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_subject`
--

CREATE TABLE IF NOT EXISTS `test_subject` (
  `test_subject_code` varchar(3) NOT NULL,
  `test_subject_desc` varchar(40) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`test_subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_subject`
--

INSERT INTO `test_subject` (`test_subject_code`, `test_subject_desc`, `creation_date`, `modified_date`) VALUES
('BIO', 'Biology', '2013-12-15 00:00:00', '2013-12-22 00:00:00'),
('CMP', 'Computers', '2013-12-15 00:00:00', '2013-12-22 00:00:00'),
('ENG', 'English', '2013-12-22 00:00:00', '2013-12-22 00:00:00'),
('GEN', 'General', '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('MTH', 'Math', '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('SCI', 'Science', '2013-12-22 00:00:00', '2013-12-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `timezone` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `first_name`, `last_name`, `email_id`, `token`, `created_date`, `last_modified_date`, `timezone`) VALUES
(10, '529ae91173faf1c3161b7a4b9d5adf1bb55826cb', 'Ushaaa', 'Annipu', 'uannipu@gmail.com', 'c8a5f45be083b05aea708c08a083631c6b18f199', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, '6d61b7d6abee9f9c4dc4ef01e827a1bf050f7d10', 'viva', 'ravi', 'viva@gmail.com', '191aff8c342607089c7a0e90d416a30ee402975f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, '7015e4a9795d923130ab2a44175348fc2ef67ac2', 'riya', 'ravi', 'riyar@gmail.com', '88adbdfd67b25594468a50b0bd50924a7a00bc15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'b3662d21d0d1e96936bfe4844601a295736aa8fd', 'alain', 'ibrahim', 'alain_ibrahim@hotmail.com', 'f8ed65c904c40e41d36b17febd526dd96acf087e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, '5eaba77a182fe92c3ee9d48a329bad2b3179f8b9', 'Dave', 'Smith', 'dsmith@gmail.com', 'acdc4e0ab2c15c605d2a3d733ee1b6a6cfc08f12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, '16c29d9bfc34531757b704a039a89ebdbfe724ca', 'a', 'a', 'a', 'b50ea9ebf9994f9b8e99eaf699fdefde94426dcf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, 'cd4fde4fcf77c68eea529cf0d4f6280864c5a236', 'fdsfdfa', 'ffff', 'fsdfa', 'a8b4bdb8b1e1aeb0c8d27b999081127b85fc92e1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, '6e2205b6ca4511917b3ecff932a2a6c0d6280449', 'Susan', 'Buck', 'asdf', '8bc840241f2492cd9ba68428f504170bc427337f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, '6e2205b6ca4511917b3ecff932a2a6c0d6280449', 'Susan', 'Buck', 'susan@susanbuck.net', 'c1e4c9daf4150e16e115342bdf7ef680b4b31c39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, '6e2205b6ca4511917b3ecff932a2a6c0d6280449', 'Susan', 'Buck', 'susanbuck@fas.harvard.edu', '6a825b57c0ba06a21b8484b516dd3dc4fd23b3b3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(21, 'e76e1be02eeca06574bc7467a22b025d17249df3', 'sashi', 'ann', 'sashi@gmail.com', 'c9944d925c2081f7f5138a525e083484fda7647f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, '5f25f26301a2ad0b1a9f98953a9afe0d4adda7c6', 'user1', 'user1', 'user1@gmail.com', 'b37b3dc4d6857acbb24e8deb8295496b80cef12e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(23, '04ed7db98b171b1b6a47bd39cdf427f5e0adac0d', 'user2', 'user2', 'user2@gmail.com', '53cf2c6dc77391a3f2dc3e963689c46effc4d9d6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(24, '6dbb2126c9560d71094f2929cce07cc9582d119f', 'user3', 'user3', 'user3@gmail.com', '2966a66efed134d3175179f80e1248e252b5058a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_package`
--

CREATE TABLE IF NOT EXISTS `work_package` (
  `work_pckg_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_pckg_desc` varchar(255) NOT NULL,
  `test_program_code` varchar(3) NOT NULL,
  `requestor_name` varchar(40) NOT NULL,
  `requested_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `Application_team` varchar(255) NOT NULL,
  PRIMARY KEY (`work_pckg_id`),
  KEY `user_id` (`user_id`),
  KEY `test_program_code` (`test_program_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `work_package`
--

INSERT INTO `work_package` (`work_pckg_id`, `work_pckg_desc`, `test_program_code`, `requestor_name`, `requested_date`, `due_date`, `user_id`, `Application_team`) VALUES
(1, 'support continuous testing', 'GAT', 'Greg', '2013-12-15 00:00:00', '2013-12-20 00:00:00', 10, 'ESKM'),
(2, 'Add fields to extract', 'GRE', 'Ruth', '2013-12-15 00:00:00', '2013-12-23 00:00:00', 10, 'ESKM'),
(3, 'GRE Linear Support', 'GRE', 'Greg', '2013-12-23 00:00:00', '2013-12-27 00:00:00', 10, 'ESKM'),
(4, 'TOEFL iBT support', 'TFL', 'Greg', '2013-12-22 00:00:00', '2013-12-24 00:00:00', 24, 'ESKM'),
(5, 'Praxis onboarding', 'PRX', 'Ruth', '2013-12-22 00:00:00', '2013-12-31 00:00:00', 24, 'ESKM'),
(6, 'SAT onboarding', 'SAT', 'Bill', '2013-12-15 00:00:00', '2013-12-29 00:00:00', 23, 'IBIS'),
(7, 'WCAP onboarding', 'WCA', 'Greg', '2013-12-15 00:00:00', '2013-12-31 00:00:00', 23, 'IBIS'),
(8, 'ELTeach onboarding', 'ELT', 'Bill', '2013-12-15 00:00:00', '2013-12-31 00:00:00', 22, 'CRDS'),
(9, 'Georgia Multi stage testing', 'GAT', 'Ruth', '2013-12-08 00:00:00', '2013-12-27 00:00:00', 22, 'CRDS');

-- --------------------------------------------------------

--
-- Table structure for table `work_pckg_estimates`
--

CREATE TABLE IF NOT EXISTS `work_pckg_estimates` (
  `work_pckg_id` int(11) NOT NULL,
  `estimates_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`work_pckg_id`,`estimates_id`),
  KEY `estimates_id` (`estimates_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_pckg_estimates`
--

INSERT INTO `work_pckg_estimates` (`work_pckg_id`, `estimates_id`, `creation_date`) VALUES
(1, 88, '0000-00-00 00:00:00'),
(1, 89, '0000-00-00 00:00:00'),
(1, 90, '0000-00-00 00:00:00'),
(2, 66, '0000-00-00 00:00:00'),
(3, 77, '0000-00-00 00:00:00'),
(4, 83, '0000-00-00 00:00:00'),
(4, 84, '0000-00-00 00:00:00'),
(4, 85, '0000-00-00 00:00:00'),
(7, 80, '0000-00-00 00:00:00'),
(8, 78, '0000-00-00 00:00:00'),
(8, 79, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE IF NOT EXISTS `work_type` (
  `work_type_code` varchar(1) NOT NULL,
  `work_type_desc` varchar(40) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`work_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_code`, `work_type_desc`, `creation_date`, `modified_date`) VALUES
('D', 'Development', '2013-12-13 00:00:00', '2013-12-13 00:00:00'),
('M', 'Maintenance', '2013-12-13 00:00:00', '2013-12-13 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estimates`
--
ALTER TABLE `estimates`
  ADD CONSTRAINT `estimates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `estimates_ibfk_2` FOREIGN KEY (`work_type_code`) REFERENCES `work_type` (`work_type_code`),
  ADD CONSTRAINT `estimates_ibfk_3` FOREIGN KEY (`resource_type_code`) REFERENCES `resource_type` (`resource_type_code`),
  ADD CONSTRAINT `estimates_ibfk_5` FOREIGN KEY (`test_subject_code`) REFERENCES `test_subject` (`test_subject_code`);

--
-- Constraints for table `work_package`
--
ALTER TABLE `work_package`
  ADD CONSTRAINT `work_package_ibfk_2` FOREIGN KEY (`test_program_code`) REFERENCES `test_program` (`test_program_code`),
  ADD CONSTRAINT `work_package_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `work_pckg_estimates`
--
ALTER TABLE `work_pckg_estimates`
  ADD CONSTRAINT `work_pckg_estimates_ibfk_2` FOREIGN KEY (`estimates_id`) REFERENCES `estimates` (`estimation_id`),
  ADD CONSTRAINT `work_pckg_estimates_ibfk_1` FOREIGN KEY (`work_pckg_id`) REFERENCES `work_package` (`work_pckg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
