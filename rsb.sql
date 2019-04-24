-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 09:16 PM
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
-- Database: `rsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `owner` varchar(60) NOT NULL,
  `reciever` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `owner`, `reciever`, `date`, `post_id`) VALUES
(1, 'anis', 'anis_sahnoun', 'vc', '2019-02-26 00:00:00', 1),
(2, 'kais', 'anis_sahnoun', 'anis_sahnoun', '2019-04-08 15:06:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `from` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `ridedate` date NOT NULL,
  `ridetime` time NOT NULL,
  `body` text NOT NULL,
  `owner` varchar(60) NOT NULL,
  `reciever` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `from`, `destination`, `price`, `ridedate`, `ridetime`, `body`, `owner`, `reciever`, `date`, `user_closed`, `deleted`, `likes`) VALUES
(12, 'Chico', 'Sacramento', 5, '2019-04-23', '01:00:00', 'no pets', 'anis_sahnoun', 'none', '2019-04-22 17:48:48', 'no', 'no', 0),
(13, 'Chico', 'Sacramento', 45, '2019-04-26', '13:00:00', 'no smokers', 'anis_sahnoun', 'none', '2019-04-22 17:50:08', 'no', 'no', 0),
(14, 'Chico', 'Sacramento', 50, '2019-04-25', '13:00:00', 'No pets', 'anis_sahnoun', 'none', '2019-04-23 11:23:27', 'no', 'no', 0),
(15, 'Sacramento', 'SF', 30, '2019-04-27', '13:00:00', 'no pets', 'anis_sahnoun', 'none', '2019-04-24 12:11:16', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `id` int(11) NOT NULL,
  `from` varchar(11) NOT NULL,
  `destination` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`id`, `from`, `destination`, `date`, `time`) VALUES
(1, 'Chico', 'Sacramento', '2019-04-09', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `rating_driver` double NOT NULL,
  `rating_rider` double NOT NULL,
  `followers_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `user_closed`, `rating_driver`, `rating_rider`, `followers_array`) VALUES
(19, 'Anis', 'Sahnoun', 'anis_sahnoun', 'anis@hotmail.com', '65903f5dfcccfaf9add6653fd57a5cef', '2019-04-07', 'styling/img/profile_pic/0351850eee7b88e11cd8d2c2f414f463.jpg', 9, 'no', 0, 0, ','),
(20, 'Smit', 'Con', 'smit_con', 'smit@gmail.com', '65903f5dfcccfaf9add6653fd57a5cef', '2019-04-08', 'styling/img/profile_pic/default_pics/default.png', 1, 'no', 0, 0, ','),
(21, 'Anis', 'Sahnoun', 'anis_sahnoun_1', 'asahnoun@mail.csuchico.edu', '6a69c91295821e0db570839718f759a1', '2019-04-10', 'styling/img/profile_pic/007712303a96706e6acb32d08528dda6.jpg', 2, 'no', 0, 0, ','),
(22, 'Anis', 'Sahnoun', 'anis_sahnoun_1_2', 'sahnoun@mail.com', '65903f5dfcccfaf9add6653fd57a5cef', '2019-04-10', 'styling/img/profile_pic/a366e0979d9742328a8aac4035d4db78.jpg', 1, 'no', 0, 0, ','),
(24, 'Anis', 'Sahnoun', 'anis_sahnoun_1_2_3', 'anis@gmail.com', '65903f5dfcccfaf9add6653fd57a5cef', '2019-04-10', 'styling/img/profile_pic/0a7a9cb73572727064c434fbb6cb2835.jpg', 1, 'no', 0, 0, ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
