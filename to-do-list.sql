-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2016 at 05:03 AM
-- Server version: 5.7.10
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to-do-list`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `date`, `time`, `checked`) VALUES
(136, 'Hello, World.', '2016-02-28', '17:57:35', 0),
(268, 'This is an example task.', '2016-02-29', '23:47:09', 0),
(269, 'Add as many as you want!', '2016-02-29', '23:47:20', 0),
(270, 'To mark a task as complete, click the task\'s green check.', '2016-02-29', '23:47:54', 0),
(273, 'This is a task marked as complete. Toggle by clicking the check again.', '2016-02-29', '23:50:10', 1),
(276, 'Easily delete a task by clicking on the trash can.', '2016-02-29', '23:51:24', 0),
(278, 'Try clicking the trash can to delete this task.', '2016-02-29', '23:51:52', 0),
(279, 'Hover over a task\'s time icon to see when the task was added.', '2016-02-29', '23:52:41', 0),
(280, 'Complete reading this to-do list :-)', '2016-02-29', '23:53:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
