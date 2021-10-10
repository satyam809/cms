-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 02:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `fname`, `lname`, `phone`, `email`, `date`) VALUES
(51, 'satyam', 'shivam', '8907654321', 'satyamshivam570@gmail.com', '2021-10-10 08:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `fee` varchar(500) NOT NULL,
  `duration` varchar(500) NOT NULL,
  `type` varchar(255) NOT NULL,
  `feature` text NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`course_id`, `course_name`, `fee`, `duration`, `type`, `feature`, `insert_date`, `modify_date`) VALUES
(6, 'Frontend Web Development', 'Rs 10000', '6 months', 'Our Courses', '<ul class=\"privacy-listing\"><li>HTML</li><li>CSS</li><li>JavaScript</li><li>Bootsrap</li><li>Jquery</li><li>Ajax</li><li>Json</li><li>React/Angular</li><li>Git & GitHub</li><li>Projects(1 minor and 1 Major)</li></ul>', '2020-04-23 11:49:29', '2021-10-06 11:53:02'),
(7, 'Backend Developement', 'Rs 1000', '6 months', 'Our Courses', '<ul class=\"privacy-listing\">\r\n                            <li>Php/Python</li><li>Sql/NoSql</li><li>Laravel/django</li><li>Data structure and Algorithm</li><li>Git & GitHub</li><li>Projects(1 minor and 1 Major)</li>\r\n                        </ul>', '2020-04-23 11:58:35', '2021-09-20 09:39:00'),
(9, 'Full Stack Web Development', 'Rs 2000', '1 year', 'Our Courses', '<ul class=\"privacy-listing\">\r\n                            <li>HTML</li><li>CSS</li><li>JavaScript</li><li>Bootsrap</li><li>Jquery</li><li>Ajax</li><li>Json</li><li>React/Angular</li><li>Php/Python</li><li>Sql/NoSql</li><li>Laravel/django</li><li>Data structure and Algorithm</li><li>Git & GitHub</li><li>Projects(1 minor and 1 Major)</li>\r\n                            \r\n                        </ul>', '2020-04-23 21:01:20', '2021-09-20 09:42:07'),
(10, 'Mobile Application Development', 'Rs 1000', '6 months', 'Our Courses', '<ul class=\"privacy-listing\">\r\n                            <li>JavaScript</li><li>ReactNative</li><li>Redux</li><li>Git & GitHub</li><li>Projects(1 Minor & 1 Major)</li>\r\n                           \r\n                        </ul>', '2020-04-24 14:39:41', '2021-09-20 09:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `download_table`
--

CREATE TABLE `download_table` (
  `download_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download_table`
--

INSERT INTO `download_table` (`download_id`, `file_name`, `file`, `insert_date`, `modify_date`) VALUES
(77, 'test3', 'Senior Software Engineer Resume.doc', '0000-00-00 00:00:00', '2021-09-21 12:01:46'),
(81, 'test2', 'dbms - Copy.pptx', '0000-00-00 00:00:00', '2021-10-07 09:57:06'),
(88, 'satyam jha', 'Relieving Letter_Satyam.pdf', '0000-00-00 00:00:00', '2021-10-10 05:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `image_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`image_id`, `images`) VALUES
(128, 'about-video-bg.jpg'),
(129, 'blog-detail-img.jpg'),
(130, 'blog-img1.jpg'),
(131, 'blog-img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `name`, `password`) VALUES
(1, 'satyam', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `download_table`
--
ALTER TABLE `download_table`
  ADD PRIMARY KEY (`download_id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `download_table`
--
ALTER TABLE `download_table`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
