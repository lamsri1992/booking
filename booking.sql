-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2018 at 03:34 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meet`
--

CREATE TABLE `tbl_meet` (
  `meet_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `meet_title` varchar(255) DEFAULT NULL,
  `meet_room` varchar(5) DEFAULT NULL,
  `meet_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `meet_start` timestamp NULL DEFAULT NULL,
  `meet_end` timestamp NULL DEFAULT NULL,
  `meet_maker` varchar(5) DEFAULT NULL,
  `meet_color` text,
  `meet_status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_meet`
--

INSERT INTO `tbl_meet` (`meet_id`, `meet_title`, `meet_room`, `meet_create`, `meet_start`, `meet_end`, `meet_maker`, `meet_color`, `meet_status`) VALUES
(00001, 'Test Booking', '1', '2018-11-16 14:23:01', '2018-11-28 03:00:00', '2018-11-28 05:00:00', '1', '#0071c5', 'cancel'),
(00002, 'Testing Booking', '5', '2018-11-16 14:26:11', '2018-11-29 06:00:00', '2018-11-29 08:00:00', '1', '#008000', 'active'),
(00003, 'Test By User', '8', '2018-11-16 14:27:09', '2018-11-29 07:00:00', '2018-11-29 10:00:00', '2', '#FFD700', 'active'),
(00004, 'Test again', '9', '2018-11-16 14:27:55', '2018-11-12 03:00:00', '2018-11-12 05:00:00', '2', '#FF0000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meetroom`
--

CREATE TABLE `tbl_meetroom` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `room_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_meetroom`
--

INSERT INTO `tbl_meetroom` (`room_id`, `room_name`, `room_status`) VALUES
(1, 'A304 (15 seat)', 'active'),
(2, 'A406 (6 seat)', 'active'),
(3, 'A407 (8 seat)', 'active'),
(4, 'A408 (10 seat)', 'active'),
(5, 'A409 (15 seat)', 'active'),
(6, 'D201	(Meeting Room) 10 seat	', 'active'),
(7, 'D202 (Meeting Room) 15 seat	', 'active'),
(8, 'D203 (Meeting Room) 	6-8 seat', 'active'),
(9, 'D204 (Multipurpose Room) 50 seat	', 'active'),
(10, 'D205 (Multipurpose Room) 50 seat', 'active'),
(11, 'D206 (Conference Hall) 80 seat', 'active'),
(12, 'D405 (Training Hall) 80 seat', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(5) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_permission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_email`, `user_pass`, `user_name`, `user_permission`) VALUES
(1, 'admin@mail', 'admin', 'Administrator System', 'admin'),
(2, 'user@mail', 'user', 'User System', 'user'),
(3, 'satiya3577@gmail.com', '1234', 'Satiya Chiangrang', 'admin'),
(4, 'test@mail', '1234', 'Test Test', 'user'),
(5, 'ars@mail', '1234', 'Arse Wenger', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_meet`
--
ALTER TABLE `tbl_meet`
  ADD PRIMARY KEY (`meet_id`);

--
-- Indexes for table `tbl_meetroom`
--
ALTER TABLE `tbl_meetroom`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_meet`
--
ALTER TABLE `tbl_meet`
  MODIFY `meet_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_meetroom`
--
ALTER TABLE `tbl_meetroom`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
