-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 10:06 AM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_send` varchar(60) NOT NULL,
  `user_recv` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_send`, `user_recv`, `body`, `date`) VALUES
(1, 'smitkumar_contractor', 'guddu_conti', 'hello', '2019-05-11 17:20:41');

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
(4, 'i\'m interested. i will pay max 90$.', 'guddu_conti', 'smitkumar_contractor', '2019-05-11 12:41:37', 17),
(5, 'okay! i will reserve your seat!', 'smitkumar_contractor', 'smitkumar_contractor', '2019-05-11 12:42:09', 17);

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
  `start` varchar(20) NOT NULL,
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

INSERT INTO `posts` (`id`, `start`, `destination`, `price`, `ridedate`, `ridetime`, `body`, `owner`, `reciever`, `date`, `user_closed`, `deleted`, `likes`) VALUES
(16, 'Chico', 'Sacramento', 100, '2019-05-22', '02:00:00', 'No pets.', 'smitkumar_contractor', 'none', '2019-05-11 11:53:28', 'no', 'no', 0),
(17, 'Chico', 'Sacramento', 120, '2019-05-14', '02:01:00', 'No snakes.', 'smitkumar_contractor', 'none', '2019-05-11 12:00:05', 'no', 'no', 0),
(18, 'Chico', 'SF', 100, '2019-05-12', '01:00:00', 'No drinks.', 'guddu_conti', 'none', '2019-05-11 12:01:33', 'no', 'no', 0);

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
(32, 'Smitkumar', 'Contractor', 'smitkumar_contractor', 'smitcontractor@gmail.com', 'af69ec0d459d14bee97dadaff0ca23e7', '2019-05-11', 'styling/img/profile_pic/default_pics/default.png', 2, 'no', 0, 0, ',guddu_conti,'),
(33, 'Guddu', 'Conti', 'guddu_conti', 'guddu@gmail.com', 'faaa2828bbe0c1a9be6637ee2420d11c', '2019-05-11', 'styling/img/profile_pic/default_pics/default.png', 1, 'no', 0, 0, ',smitkumar_contractor,'),
(34, 'Lalu', 'Ji', 'lalu_ji', 'lalu@gmail.com', '72768226989056dc016522e198f4ae41', '2019-05-11', 'styling/img/profile_pic/default_pics/default.png', 0, 'yes', 0, 0, ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
