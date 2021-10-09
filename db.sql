-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 11:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id` int(11) NOT NULL,
  `config_key` text NOT NULL,
  `value` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id`, `config_key`, `value`, `updated_at`) VALUES
(1, 'logo', '1633772782.png', '2021-10-09 09:46:22'),
(2, 'site_name', 'ETS', '2021-10-09 09:48:31'),
(3, 'favicon', '1633772791.png', '2021-10-09 09:46:31'),
(4, 'site_keywords', 'Events, Ticket, System', '2021-10-09 09:47:34'),
(5, 'site_description', 'This app manage events and help selling their tickets.\r\n', '2021-10-09 09:47:34'),
(6, 'site_currency', 'RWF', '2021-04-22 21:52:03'),
(7, 'footer_about', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>', '2021-04-22 21:52:03'),
(8, 'site_address', 'Kigali, RWANDA', '2021-05-27 10:55:21'),
(9, 'footer_facebook', 'https://mobile.facebook.com', '2021-04-22 21:52:03'),
(10, 'footer_twitter', 'http://twitter.com/', '2021-04-22 21:52:03'),
(11, 'footer_youtube', 'https://youtube.com', '2021-05-27 10:46:10'),
(12, 'footer_linkedin', 'asfdsf', '2021-05-27 11:14:20'),
(13, 'site_about', 'About', '2021-04-22 21:52:03'),
(14, 'site_contact_email', 'support@example.com', '2021-04-24 13:55:31'),
(15, 'site_terms', '<p align=\"center\"><b>Terms and condition.</b></p><p align=\"left\">Terms and condition<b><br></b></p><div align=\"left\"><br></div><p align=\"center\"><br><br></p>', '2021-07-08 13:24:53'),
(16, 'site_privacy', '<div align=\"center\"><b>Privacy policy</b></div><div align=\"center\"><div align=\"left\">Policy<br></div><br></div>', '2021-05-27 10:45:54'),
(17, 'flutterwave_secret_key', 'FLWSECK_TEST-dffccda97f63602c57e113d48ad03eae-X', '2021-04-22 21:52:03'),
(18, 'flutterwave_public_key', ' FLWPUBK_TEST-97a9f213aecc38d73ab80095d1aa8b97-X', '2021-04-22 21:52:03'),
(19, 'flutterwave_encryption_key', 'encrtyption key', '2021-05-27 10:46:33'),
(20, 'site_contact_phone', '+(250) 780 000 000', '2021-10-09 09:40:49'),
(21, 'site_emailer', 'mail', '2021-04-24 13:55:19'),
(22, 'total_seats', '150', '2021-08-29 08:44:07'),
(23, 'site_email', 'info@eventer.cm', '2021-05-27 10:45:32'),
(24, 'footer_instagram', 'https://instagram.com', '2021-05-27 10:46:10'),
(25, 'news_per_page', '3', '2021-09-27 10:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `date_` varchar(50) NOT NULL,
  `time_` varchar(50) NOT NULL,
  `thumbnail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `thumbnail` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `page_slug`, `content`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'contact', 'Form', 1, '2021-09-10 08:59:39', '2021-09-10 08:59:39'),
(2, 'about', 'About', 1, '2021-09-10 08:59:39', '2021-09-10 11:26:33'),
(3, 'terms', 'Terms', 1, '2021-09-10 08:59:39', '2021-09-10 11:27:02'),
(4, 'privacy', 'Privacy', 1, '2021-09-10 08:59:39', '2021-09-10 11:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency_code` varchar(55) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(50) NOT NULL DEFAULT '',
  `event_id` int(11) NOT NULL,
  `tickets_nbr` int(11) NOT NULL,
  `ticket_plan_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'NOT_PAYED',
  `tx_ref` varchar(255) DEFAULT NULL,
  `qr` text DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `ticket_no`, `event_id`, `tickets_nbr`, `ticket_plan_id`, `amount`, `names`, `email`, `phone`, `status`, `tx_ref`, `qr`, `used`, `updated_at`, `created_at`) VALUES
(1, 'DOVTGHJ1', 18, 1, 0, 5000, '', 'rulindanal@gmail.com', '', 'PAYED', '60afacd235c3f0.82010359', '', 0, '2021-05-27 14:31:29', '2021-05-27 14:29:38'),
(2, '6ZF9BLOBNO', 18, 4, 0, 20000, '', 'turner.tremblay@example.net', '', 'PAYED', '60afae495c4ca3.46388377', '', 0, '2021-05-27 14:37:19', '2021-05-27 14:35:53'),
(3, 'XYWSQB6MIF', 20, 2, 0, 4000, '', 'consultant@yahoo.fr', '+250 784 354 460', 'PAYED', '60b4f1f8546622.59907329', '', 1, '2021-10-09 08:14:11', '2021-05-31 14:26:00'),
(4, 'M1YATK2M0F', 20, 5, 12, 50000, '', 'a.anaclet920@gmail.com', '0784354460', 'PAYED', '60b75130660af5.58052200', '', 0, '2021-06-02 09:37:59', '2021-06-02 09:36:48'),
(5, 'MU41BIN4PI', 21, 2, 14, 5000, '', 'a.anaclet920@gmail.com', '0784354460', 'NOT_PAYED', '60e70c69226dc6.47896930', '', 0, '2021-07-08 14:32:09', '2021-07-08 14:32:09'),
(6, 'NGWR6JP94D', 21, 1, 15, 1500, '', 'a.anaclet920@gmail.com', '0784354460', 'NOT_PAYED', '60e70cf5c1b1c9.04585079', '', 0, '2021-07-08 14:34:29', '2021-07-08 14:34:29'),
(7, '22IA9V1RLP', 21, 1, 15, 1500, '', 'a.anaclet920@gmail.com', '0784354460', 'NOT_PAYED', '60e70d1ea602e2.87989430', '', 0, '2021-07-08 14:35:10', '2021-07-08 14:35:10'),
(8, 'F6S991CY3Z', 21, 1, 15, 1500, '', 'a.anaclet920@gmail.com', '0784354460', 'PAYED', '60e9857a6a49a7.01233251', '', 0, '2021-08-30 14:32:20', '2021-07-10 11:33:14'),
(9, 'G0HHASTB9P', 22, 2, 16, 8000, '', 'a.anaclet920@gmail.com', '0784354460', 'NOT_PAYED', '613e1a2adaf781.69772866', '', 0, '2021-09-12 15:18:02', '2021-09-12 15:18:02'),
(10, 'ZNAVT5VKX3', 23, 2, 18, 10000, 'Nama', 'a.anaclet920@gmail.com', '0784354460', 'PAYED', 'txn_3JiFipIs4uWMCIDj0z92j3uk', 'ZNAVT5VKX3.png', 1, '2021-10-09 08:32:44', '2021-10-08 09:50:33'),
(11, '5OQO047AU2', 23, 1, 18, 5000, 'Names', 'a.anaclet920@gmail.com', '0727598920', 'PAYED', 'txn_3JiGFOIs4uWMCIDj0OwAwTRS', '5OQO047AU2.png', 1, '2021-10-09 08:18:24', '2021-10-08 10:24:12'),
(12, '29H12UQIC3', 23, 1, 18, 5000, 'Anaclet', 'a.anaclet920@gmail.com', '0784354460', 'PAYED', 'txn_3JiL5bIs4uWMCIDj21Vn1e91', NULL, 0, '2021-10-08 15:34:28', '2021-10-08 15:34:25'),
(13, 'B8TG0AIL0P', 23, 1, 18, 5000, 'Anaclet', 'a.anaclet920@gmail.com', '0784354460', 'PAYED', 'txn_3JiL8FIs4uWMCIDj2jsUtaDG', 'B8TG0AIL0P.png', 1, '2021-10-09 08:39:23', '2021-10-08 15:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets_plans`
--

CREATE TABLE `tbl_tickets_plans` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `profile_pic` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `email`, `phone`, `address`, `password`, `role`, `profile_pic`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anaclet Ahish', 'a.anaclet920@gmail.com', '0784354460', '', '13399d110a67a367366b39c57e03db848784c7b35bdb8e09f76b16584bb5921a9179f1657abeeb5f69c8ad3ca923d09e2e2bda273e116674937a8daf23f06f02', 'admin', '1622105676.jpg', 1, '2021-09-26 08:40:39', '2021-09-26 08:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verification_codes`
--

CREATE TABLE `tbl_verification_codes` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tx_ref` (`tx_ref`);

--
-- Indexes for table `tbl_tickets_plans`
--
ALTER TABLE `tbl_tickets_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_verification_codes`
--
ALTER TABLE `tbl_verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_tickets_plans`
--
ALTER TABLE `tbl_tickets_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_verification_codes`
--
ALTER TABLE `tbl_verification_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
