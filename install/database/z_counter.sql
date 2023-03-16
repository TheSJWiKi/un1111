-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 03:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `z_counter`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`content`) VALUES
('The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_token` varchar(32) NOT NULL,
  `token_expiry` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_address`, `password`, `auth_token`, `token_expiry`) VALUES
(1, 'admin@website.test', '$2y$10$yhjvs.pMOL1HheMPtoK21eCsKvofcvEVgFcf3qiVDilxPOCDgq4da', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL,
  `is_replied` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `ip_address` varchar(45) NOT NULL,
  `replied_at` varchar(19) NOT NULL,
  `received_at` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `short_description`, `image`, `created_at`) VALUES
(1, 'Web Designing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', 'a3973639efb32ec3ea83b39c1979a114.jpg', '2020-09-08 14:30:57'),
(2, 'SEO Optimization', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '73a0cd431173be84b6276121006369fc.jpg', '2020-09-08 14:31:28'),
(3, 'Bug Fixing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '582160d6a4c28e9eb9e03169c9e91d64.jpg', '2020-09-08 14:32:10'),
(4, 'Maintenance', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '382756c4b94d58dd7dbae7577afe33b9.jpg', '2020-09-08 14:32:35'),
(5, 'Support', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '62623c65addf3c3241dd01a744be0a19.jpg', '2020-09-08 14:32:50'),
(6, 'E-Commerce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '112e44364787e3585a08c5f52b22130f.jpg', '2020-09-08 14:33:07'),
(7, 'Marketing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut axe numquam Molestias nisi odio.', '0a63d545ba614d063d9f257080ef35a6.jpg', '2020-09-08 14:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_key` varchar(33) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `access_key`, `value`) VALUES
(1, 'e_host', ''),
(2, 'e_username', ''),
(3, 'e_password', ''),
(4, 'e_sender', ''),
(5, 'e_sender_name', ''),
(6, 'e_encryption', ''),
(7, 'e_port', ''),
(8, 'g_site_name', 'Z Counter'),
(9, 'g_site_desc', 'The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.'),
(10, 'g_site_keywords', 'z counter, countdown, counter'),
(11, 'g_site_logo', '3137363bfaa395f2cc2d996beb4d4d67.png'),
(12, 'g_site_favicon', '2765af1d0a949b1fb75118788f909287.png'),
(13, 'sl_facebook', 'https%3A%2F%2Fwww.facebook.com'),
(14, 'sl_instagram', 'http%3A%2F%2Fwww.instagram.com'),
(15, 'sl_youtube', 'https%3A%2F%2Fwww.youtube.com'),
(16, 'sl_twitter', 'https%3A%2F%2Ftwitter.com'),
(17, 'sl_linkedin', 'http%3A%2F%2Flinkedin.com.pk'),
(18, 'sl_pinterest', 'https%3A%2F%2Fwww.pinterest.com'),
(19, 'c_bg_image', 'dbb2b11b2f3dcecd5de6716111b43a22.jpg'),
(20, 'c_bg_effect', 'particles'),
(21, 'c_type_text1', 'We are Coming Soon'),
(22, 'c_type_text2', 'Subscribe Now to Stay'),
(23, 'c_type_text3', 'Connected with Us'),
(24, 'cu_form_status', '1'),
(25, 'cu_address', '45 Park Avenue, New York City, NY 10016'),
(26, 'cu_email_address', ''),
(27, 'cu_phone', '+92-300-1234567'),
(28, 'g_timezone', ''),
(29, 'e_protocol', 'mail'),
(30, 'c_rhours', '23'),
(31, 'c_rminutes', '59'),
(32, 'c_rdate', 'Jul 27, 2023'),
(33, 'c_jump_url', ''),
(34, 'gr_public_key', ''),
(35, 'gr_secret_key', ''),
(36, 'gr_status', '1'),
(37, 'about_us_status', '1'),
(38, 'sevices_status', '1'),
(39, 'contact_us_status', '1'),
(40, 'gmap_status', '1'),
(41, 'google_analytics', ''),
(42, 'g_site_color', 'color_02'),
(43, 'newsletter_status', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `auth_token` varchar(32) NOT NULL,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `confirmed_at` varchar(19) NOT NULL,
  `subscribed_at` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
