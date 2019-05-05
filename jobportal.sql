-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 01:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `email`, `password`, `logo`, `phone`, `address`) VALUES
(3, 'Audenberg Technologies', 'ssameer.md@gmail.com', '1234', 'CrwgVR7WIAAhWby.jpg', '01969344192', '241, South Peererbag, 60 Feet Road, Aamtola, Mirpur, Dhaka 1216'),
(4, 'Wipro Technologies ', 'admin@wipro.com', '1234', '', NULL, NULL),
(9, 'Mahindra & Mahindra', 'admin@mahindra.com', '1234', '', NULL, NULL),
(10, 'Mahindra', 'admin@mahindra.com', '1234', '', NULL, NULL),
(11, 'Ins It Services', 'admin@ins.com', '1234', '', NULL, NULL),
(14, 'infosys', 'admin@infosys.com', '1234', '', NULL, NULL),
(15, 'Paladion Networks', 'admin@paladion.com', '1234', 'AudenbergBanne.jpg', NULL, NULL),
(16, 'Accenture', 'admin@accenture.com', '1234', '1.jpg', NULL, NULL),
(17, 'babu', 'abusaidskbabu@gmail.com', '123', 'CrwgVR7WIAAhWby.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_rating`
--

CREATE TABLE `employer_rating` (
  `id` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_rating`
--

INSERT INTO `employer_rating` (`id`, `eid`, `sid`, `pid`, `rating`) VALUES
(1, 3, 2, 4, 5),
(2, 3, 2, 5, 3),
(3, 14, 2, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jobsapplied`
--

CREATE TABLE `jobsapplied` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobsapplied`
--

INSERT INTO `jobsapplied` (`id`, `date`, `pid`, `sid`, `status`) VALUES
(15, '2018-10-05', 4, 2, 'Accepted'),
(16, '2018-10-05', 5, 2, 'Rejected'),
(17, '2018-10-05', 6, 2, 'Accepted'),
(18, '2018-10-05', 4, 3, 'Accepted'),
(19, '2018-10-05', 8, 4, 'Accepted'),
(20, '2019-03-14', 8, 2, 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(500) NOT NULL,
  `minexp` varchar(100) NOT NULL,
  `desc` varchar(5000) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `employmentType` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `date`, `eid`, `name`, `category`, `minexp`, `desc`, `salary`, `industry`, `role`, `duration`, `employmentType`, `status`) VALUES
(4, '2019-03-18 18:00:00', 3, 'Software Engineer', 'Accounting Jobs', '5', 'writing, data entry and design right through to engineering, the sciences, sales and marketing, accounting and legal services.\r\n\r\nFreelancer Limited is trading on the Australian Securities Exchange under the ticker ASX:FLN', '500000-700000', 'Accounting , Finance', 'Software Engineer', '', 'Part-Time', 'closed'),
(5, '2018-10-03 18:30:00', 3, 'Network engineer', 'IT Jobs', '2', 'Engineer having skills of configuring routers and switches', '300000-400000', 'IT-Hardware & Networking', 'L1 engineer', NULL, 'Permanent', 'open'),
(6, '2018-10-04 18:30:00', 14, 'Team Lead', 'IT Jobs', '8', 'Lead a team of 10 developers', '1000000-1500000', 'IT-Software , Software Services', 'Team Lead', NULL, 'Permanent', 'open'),
(8, '2018-10-04 18:30:00', 16, 'Accounts manager', 'Accounting Jobs', '6', 'Manage a team of 10 employees', '700000-800000', 'Accounting , Finance', 'Account Manager', NULL, 'Permanent', 'open'),
(9, '2019-03-18 18:00:00', 3, 'errtet', 'Content Writing Jobs', '5', 'fdhsrhsrtyhtryrtyrty', '354345', 'Accounting , Finance', 'accountance', '5 to 10 days , 8 hour per day', 'Permanent', 'open'),
(10, '2019-03-18 18:00:00', 3, 'errtet', 'Content Writing Jobs', '5', '4yw5hrthrghdfgsfdyr', '354345', 'Consumer Electronics , Appliances , Durables', 'accountance', '5 to 10 days , 8 hour per day', 'Permanent', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `qualification` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `skills` varchar(2000) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`id`, `name`, `email`, `password`, `qualification`, `dob`, `skills`, `resume`, `father_name`, `mother_name`, `phone`, `nid`, `address`, `profile_image`) VALUES
(2, 'Mohammed Sameer', 'shaheer8967@gmail.com', '1234', 'be', '1994-10-14', 'java bootstrap', '', 'Md. Jalil Miah', 'Rina', '945384385', '199951917571000153', 'H#1, R#1, DIT Project, Badda, Dhaka-1212', 'big.jpg'),
(3, 'Aziz', 'aziz@gmail.com', '1234', 'Mtech', '1991-01-24', 'Java, Bootstrap, PHP', 'DOC-20171020-WA0005.pdf', NULL, NULL, NULL, NULL, NULL, 'u3.jpg'),
(4, 'Imtiaz', 'imtiaz@gmail.com', '1234', 'MBA', '1993-11-21', 'Accounts, GST, MBA', 'balanceSheetTest.pdf', NULL, NULL, NULL, NULL, NULL, 'u2.jpg'),
(5, 'sk', 'sk@gmail.com', '123', 'test', '1995-04-09', 'php, laravel, javascript', 'wuba.PNG', 'Auyal sk', 'Hasina Begum', '01969344192', '19950420124124214145525', 'House :169/A, Moddho Paikpara, Boubazar', 'u4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seeker_accomplishments`
--

CREATE TABLE `seeker_accomplishments` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `concentration` varchar(50) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `passing_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeker_accomplishments`
--

INSERT INTO `seeker_accomplishments` (`id`, `sid`, `title`, `institute`, `concentration`, `result`, `passing_year`) VALUES
(1, 2, 'Secondary School certificate (SSC)', 'Manikar char L. L. High School', 'Science', 'GPA 4.94 out of 5.00', '2011'),
(2, 5, 'Secondary School certificate (SSC)', 'Suagram High School', 'Science', 'GPA 4.50 out of 5.00', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `seeker_ratings`
--

CREATE TABLE `seeker_ratings` (
  `id` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeker_ratings`
--

INSERT INTO `seeker_ratings` (`id`, `eid`, `sid`, `pid`, `rating`) VALUES
(3, 3, 2, 4, 4),
(4, 3, 3, 4, 5),
(5, 3, 2, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_rating`
--
ALTER TABLE `employer_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobsapplied`
--
ALTER TABLE `jobsapplied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobapplied_seekerFK` (`sid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `employer_postFK` (`eid`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeker_accomplishments`
--
ALTER TABLE `seeker_accomplishments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeker_ratings`
--
ALTER TABLE `seeker_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employer_rating`
--
ALTER TABLE `employer_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobsapplied`
--
ALTER TABLE `jobsapplied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seeker_accomplishments`
--
ALTER TABLE `seeker_accomplishments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seeker_ratings`
--
ALTER TABLE `seeker_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobsapplied`
--
ALTER TABLE `jobsapplied`
  ADD CONSTRAINT `jobapplied_seekerFK` FOREIGN KEY (`sid`) REFERENCES `seeker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `employer_postFK` FOREIGN KEY (`eid`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
