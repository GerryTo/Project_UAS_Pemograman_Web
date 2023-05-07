-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_contactus`
--

CREATE TABLE `tb_contactus` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_contactus`
--

INSERT INTO `tb_contactus` (`id`, `nama`, `email`, `subject`, `pesan`) VALUES
(1, 'gerry tannoto', 'gerry@gmail.com', 'mengenai website ', 'Menurut saya cukup menarik dari design, terus kebangkan ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job`
--

CREATE TABLE `tb_job` (
  `id_job` int(11) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_job`
--

INSERT INTO `tb_job` (`id_job`, `job`) VALUES
(1, 'admin'),
(2, 'writter');

-- --------------------------------------------------------

--
-- Table structure for table `tb_talks`
--

CREATE TABLE `tb_talks` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `id_author` int(255) NOT NULL,
  `date` date NOT NULL,
  `isi` longtext NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_talks`
--

INSERT INTO `tb_talks` (`id`, `title`, `id_author`, `date`, `isi`, `name`, `location`) VALUES
(1, 'Create: Trendy Social Media Post Design', 1, '2021-06-09', '<p>Today many young people use social media, especially Instagram, which has the ability to post photos and videos. Not a few people who want to have an interesting post that starts with design!</p><p>Here is one way to create an attractive, beautiful and elegant post design:</p>', 'Trendy Social Media.mp4', 'video/Trendy Social Media.mp4'),
(2, 'Traveling to Singapore!', 2, '2021-06-09', '<p>We visited Singapore to take part in the Graphic Design Legion Trend Series. And one of our member have good friend living over there! Ideal to pay them a visit and in the meanwhile discover a bit of Singapore, a city we have heard so much about.</p><p>We also visited some place like Marina Bay Sands, Gardens by the Bay, Chinatown, Sentosa Island, and many more. Even though we were here for a short period of time, Singapore already impressed us a lot and we definitely want to come back!</p>', '', 'video/'),
(3, 'our Website is Created', 2, '2021-06-09', '<p>Today is the day our portfolio website about design created. Thanks for all support from team, family, and friends. I hope visitors can enjoy using this website. Thank you!</p>', '', 'video/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `age`, `password`, `id_job`) VALUES
(1, 'Gerry', 'gerry.tannoto@gmail.com', 19, '$2y$10$lMMATr5zYAfpF6/p27a7f.aHN/ptT0c7BMpO4/QNb9qy8Vok26s.S', 1),
(2, 'Andreas', 'andreas@gmail.com', 20, '$2y$10$x0IciJ7Nyi77ozTB9gCMNu7p8L0oQl9H/RxRiXsbf1RzBQZk6ZOdq', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contactus`
--
ALTER TABLE `tb_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `tb_talks`
--
ALTER TABLE `tb_talks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_job` (`id_job`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_contactus`
--
ALTER TABLE `tb_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_talks`
--
ALTER TABLE `tb_talks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_talks`
--
ALTER TABLE `tb_talks`
  ADD CONSTRAINT `tb_talks_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_job`) REFERENCES `tb_job` (`id_job`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
